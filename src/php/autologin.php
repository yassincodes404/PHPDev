<?php
require_once 'bootstrap.php';
require_once 'db.php';

// Get the token from the URL
$token = $_GET['token'] ?? '';

if ($token) {
    // Find the user with this token
    $stmt = $conn->prepare("SELECT id FROM users WHERE login_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Token is valid! 
        // 1. Clear the token immediately so it can't be reused
        $user_id = $row['id'];
        $stmt_clear = $conn->prepare("UPDATE users SET login_token = NULL WHERE id = ?");
        $stmt_clear->bind_param("i", $user_id);
        $stmt_clear->execute();

        // 2. Set the PHP session
        $_SESSION['user_id'] = $user_id;

        // 3. Redirect to the dashboard
        header("Location: dashboard.php");
        exit();
    }
}

// If token is invalid or missing, redirect to the normal login page
header("Location: login.php");
exit();
