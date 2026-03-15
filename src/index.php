<?php
$host = 'db';
$db   = 'myapp';
$user = 'user';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     $error = $e->getMessage();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $stmt = $pdo->prepare("INSERT INTO USERS (id, name) VALUES (?, ?)");
    $stmt->execute([rand(100, 999), $_POST['name']]);
    header("Location: index.php");
    exit;
}

// Fetch users
$users = [];
if (isset($pdo)) {
    $stmt = $pdo->query("SELECT * FROM USERS");
    $users = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.1);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            background-image: 
                radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .container {
            width: 100%;
            max-width: 600px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header h1 {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fff 0%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: var(--text-muted);
            font-size: 1.1rem;
        }

        .card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .status {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .status.online { background: rgba(34, 197, 94, 0.1); color: #4ade80; border: 1px solid rgba(34, 197, 94, 0.2); }
        .status.offline { background: rgba(239, 68, 68, 0.1); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.2); }

        .indicator { width: 8px; height: 8px; border-radius: 50%; background: currentColor; box-shadow: 0 0 12px currentColor; }

        .user-list {
            list-style: none;
            display: grid;
            gap: 12px;
            margin-bottom: 2rem;
        }

        .user-item {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--glass-border);
            padding: 16px 20px;
            border-radius: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.2s ease;
        }

        .user-item:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: scale(1.02);
        }

        .user-id {
            color: var(--text-muted);
            font-family: monospace;
            font-size: 0.8rem;
        }

        form {
            display: flex;
            gap: 12px;
        }

        input {
            flex: 1;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            padding: 14px 18px;
            color: white;
            font-family: inherit;
            transition: all 0.2s;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        button {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px 24px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        button:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4);
        }

        .empty-state {
            text-align: center;
            color: var(--text-muted);
            padding: 2rem;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>PHP Cloud</h1>
            <p>Database Management Service</p>
        </header>

        <main class="card">
            <?php if (isset($pdo)): ?>
                <div class="status online">
                    <div class="indicator"></div>
                    Database Connected Successfully
                </div>
            <?php else: ?>
                <div class="status offline">
                    <div class="indicator"></div>
                    Connection Failed: <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <ul class="user-list">
                <?php if (empty($users)): ?>
                    <li class="empty-state">No users clusters found.</li>
                <?php else: ?>
                    <?php foreach ($users as $u): ?>
                        <li class="user-item">
                            <span><?= htmlspecialchars($u['name']) ?></span>
                            <span class="user-id">ID: <?= $u['id'] ?></span>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>

            <?php if (isset($pdo)): ?>
            <form action="index.php" method="POST">
                <input type="text" name="name" placeholder="Enter new username..." required autocomplete="off">
                <button type="submit">Deploy User</button>
            </form>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
