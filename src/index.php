<?php
session_start();
require_once 'db.php';

if (isset($_SESSION['user_id'])) {
    header('Location: profile.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (hash('sha256', $password) === $row['password_hash']) {
            $_SESSION['user_id'] = $row['id'];
            header('Location: profile.php');
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - University App</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if ($error): ?><p class="error"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
        <form method="POST" action="index.php">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>
            
            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>
            
            <button type="submit">Login</button>
        </form>
        <div class="auth-links">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>
