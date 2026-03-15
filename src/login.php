<?php

$conn = new mysqli("db", "root", "root", "login_system");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Fetch user by username only
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify hashed password
        if (password_verify($password, $user['password'])) {
            echo "Login Successful";
        } else {
            // Handle old plain-text passwords for the "admin" user if needed, 
            // but ideally we should update the DB. This logic assumes hashed passwords.
            if ($password === $user['password']) {
                echo "Login Successful (Insecure Password)";
            } else {
                echo "Wrong username or password";
            }
        }
    } else {
        echo "Wrong username or password";
    }
} else {
    // Redirect to login page if accessed directly via GET
    header("Location: index.html");
    exit();
}

?>