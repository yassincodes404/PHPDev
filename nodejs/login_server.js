const express = require('express');
const mysql = require('mysql2');
const crypto = require('crypto');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();
const port = 3000;

/**
 * Database connection configuration.
 * Note: Use 'localhost' if running locally, or 'db' if running within the project's Docker network.
 */
const dbConfig = {
    host: '127.0.0.1', // Using 127.0.0.1 instead of localhost for better compatibility
    port: 3307,        // The port mapped in your docker-compose.yml (3307:3306)
    user: 'user',
    password: 'password',
    database: 'myapp',
    waitForConnections: true,
    connectionLimit: 10,
    queueLimit: 0
};

// Create a connection pool to the database
const pool = mysql.createPool(dbConfig).promise();

// Middleware to parse request bodies
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// HTML Template with CSS (similar to PHP project UI)
const getAuthPage = (error = '') => `
<!DOCTYPE html>
<html>
<head>
    <title>Login - University App</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        :root {
            --primary-color: #1abc9c;
            --primary-hover: #16a085;
            --bg-color: #f4f7f6;
            --text-main: #2c3e50;
            --text-muted: #7f8c8d;
            --border-color: #e2e8f0;
            --danger-color: #e74c3c;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background-color: white; height: 100vh; overflow: hidden; }
        .auth-wrapper { display: flex; height: 100vh; width: 100%; animation: fadeIn 0.5s ease-out; }
        .auth-sidebar {
            flex: 1;
            background: linear-gradient(135deg, #1abc9c, #0b8770);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            position: relative;
        }
        .auth-sidebar-content { max-width: 480px; }
        .auth-sidebar h1 { font-size: 3rem; font-weight: 700; margin-bottom: 20px; display: flex; align-items: center; gap: 15px; }
        .logo-icon { width: 50px; height: 50px; background-color: white; color: var(--primary-color); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; }
        .auth-sidebar p { font-size: 1.1rem; line-height: 1.6; opacity: 0.9; }
        .auth-form-container { flex: 1; display: flex; justify-content: center; align-items: center; padding: 40px; }
        .auth-card { width: 100%; max-width: 420px; }
        .auth-card h2 { font-size: 1.8rem; color: var(--text-main); margin-bottom: 10px; font-weight: 700; }
        .auth-card > p { color: var(--text-muted); margin-bottom: 30px; }
        .auth-form label { display: block; margin-bottom: 8px; font-weight: 500; font-size: 0.9rem; color: var(--text-main); }
        input {
            width: 100%; padding: 14px 15px; margin-bottom: 20px; border: 1.5px solid var(--border-color);
            border-radius: 10px; font-size: 0.95rem; outline: none; transition: all 0.2s ease;
        }
        input:focus { border-color: var(--primary-color); box-shadow: 0 0 0 3px rgba(26, 188, 156, 0.1); }
        .auth-form button {
            width: 100%; padding: 12px; background-color: var(--primary-color); color: white; border: none;
            border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.2s ease;
        }
        .auth-form button:hover { background-color: var(--primary-hover); transform: translateY(-1px); }
        .auth-links { text-align: center; margin-top: 20px; font-size: 0.9rem; }
        .auth-links a { color: var(--primary-color); text-decoration: none; font-weight: 500; }
        .error {
            background-color: #fdf5f5; color: var(--danger-color); padding: 10px; border-radius: 6px;
            margin-bottom: 20px; font-size: 0.9rem; border: 1px solid #fab2b2;
        }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        @media (max-width: 768px) { .auth-sidebar { display: none; } }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-sidebar">
            <div class="auth-sidebar-content">
                <h1><div class="logo-icon">🎓</div> Agora AI</h1>
                <p>Stop building pages. Start building a living neural network where every thought connects.</p>
            </div>
        </div>
        <div class="auth-form-container">
            <div class="auth-card">
                <h2>Welcome back</h2>
                <p>Enter your details to access your workspace.</p>
                ${error ? `<div class="error">${error}</div>` : ''}
                <form class="auth-form" method="POST" action="/login">
                    <label>Username</label>
                    <input type="text" name="username" required>
                    <label>Password</label>
                    <input type="password" name="password" required>
                    <button type="submit">Login</button>
                </form>
                <div class="auth-links">
                    <p>Don't have an account? <a href="#">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
`;

/**
 * Login GET route
 */
app.get('/', (req, res) => {
    res.send(getAuthPage());
});

/**
 * Login POST route
 */
app.post('/login', async (req, res) => {
    const { username, password } = req.body;

    if (!username || !password) {
        return res.status(400).send(getAuthPage('Username and password are required.'));
    }

    try {
        const [rows] = await pool.query('SELECT id, password_hash FROM users WHERE username = ?', [username]);

        if (rows.length === 0) {
            return res.status(401).send(getAuthPage('User not found.'));
        }

        const user = rows[0];
        const hashedPassword = crypto.createHash('sha256').update(password).digest('hex');

        if (hashedPassword === user.password_hash) {
            // Login Success - Generate a one-time token for PHP autologin
            const token = crypto.randomBytes(32).toString('hex');
            
            // Save token to database
            await pool.query('UPDATE users SET login_token = ? WHERE id = ?', [token, user.id]);

            console.log(`Login successful for user: ${username}. Redirecting to PHP autologin...`);
            
            // Redirect to the PHP autologin script with the token
            res.redirect(`http://localhost:8085/php/autologin.php?token=${token}`);
        } else {
            res.status(401).send(getAuthPage('Invalid password.'));
        }
    } catch (err) {
        console.error('❌ Database error during login:', err.message);
        console.error('Stack trace:', err.stack);
        res.status(500).send(getAuthPage(`Server error: Could not connect to database. Details: ${err.message}`));
    }
});

app.listen(port, async () => {
    console.log(`Node.js Login Server running at http://localhost:${port}`);
    
    // Test database connection on startup
    try {
        const connection = await pool.getConnection();
        console.log('✅ Successfully connected to the database.');
        connection.release();
    } catch (err) {
        console.error('❌ Failed to connect to the database on startup:');
        console.error(err.message);
        console.log('Please ensure your Docker containers are running and the database is healthy.');
    }
});
