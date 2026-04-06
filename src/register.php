<?php
session_start();
require_once 'db.php';

if (isset($_SESSION['user_id'])) {
    header('Location: profile.php');
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $major = $_POST['major'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $gender = $_POST['gender'] ?? 'Male';

    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $error = "Username or Email already exists.";
    } else {
        $conn->begin_transaction();
        
        $stmt1 = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
        $stmt1->bind_param("sss", $username, $email, $password);
        
        if ($stmt1->execute()) {
            $user_id = $conn->insert_id;
            $stmt2 = $conn->prepare("INSERT INTO profiles (user_id, first_name, last_name, major, phone, gender) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt2->bind_param("isssss", $user_id, $first_name, $last_name, $major, $phone, $gender);
            
            if ($stmt2->execute()) {
                $conn->commit();
                $success = "Registration successful! You can now <a href='index.php'>login</a>.";
            } else {
                $conn->rollback();
                $error = "Error saving profile.";
            }
        } else {
            $conn->rollback();
            $error = "Error creating user.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - University App</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <?php if ($error): ?><p class="error"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
        <?php if ($success): ?><p class="success"><?php echo $success; ?></p><?php endif; ?>
        <?php if (!$success): ?>
        <form method="POST" action="register.php">
            <label>First Name:</label><br>
            <input type="text" name="first_name" required><br><br>
            
            <label>Last Name:</label><br>
            <input type="text" name="last_name" required><br><br>

            <label>Major:</label><br>
            <input type="text" name="major" required><br><br>

            <label>Phone:</label><br>
            <input type="text" name="phone"><br><br>

            <label>Gender:</label><br>
            <select name="gender" required style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 8px; background: rgba(255, 255, 255, 0.05); color: #fff; font-size: 14px;">
                <option value="Male" style="color: #333;">Male</option>
                <option value="Female" style="color: #333;">Female</option>
            </select><br><br>

            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>
            
            <label>Email:</label><br>
            <input type="email" name="email" required><br><br>

            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>
            
            <button type="submit">Register</button>
        </form>
        <?php endif; ?>
        <div class="auth-links">
            <p>Already have an account? <a href="index.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
