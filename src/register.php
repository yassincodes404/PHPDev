<?php
session_start();
require_once 'db.php';

if (isset($_SESSION['student_id'])) {
    header('Location: profile.php');
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $name = $_POST['name'] ?? '';
    $major = $_POST['major'] ?? '';

    $stmt = $conn->prepare("SELECT id FROM students WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $error = "Username already exists.";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO students (username, password, name, major) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $hashed, $name, $major);
        if ($stmt->execute()) {
            $success = "Registration successful! You can now <a href='index.php'>login</a>.";
        } else {
            $error = "Error during registration.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
    <h1>Register</h1>
    <?php if ($error): ?><p style="color:red;"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
    <?php if ($success): ?><p style="color:green;"><?php echo $success; ?></p><?php endif; ?>
    <?php if (!$success): ?>
    <form method="POST" action="register.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        
        <label>Major:</label><br>
        <input type="text" name="major" required><br><br>
        
        <button type="submit">Register</button>
    </form>
    <?php endif; ?>
    <p>Already have an account? <a href="index.php">Login here</a></p>
</body>
</html>
