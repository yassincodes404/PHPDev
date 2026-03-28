<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['student_id'])) {
    header('Location: index.php');
    exit();
}

$stmt = $conn->prepare("SELECT username, name, major FROM students WHERE id = ?");
$stmt->bind_param("i", $_SESSION['student_id']);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    session_destroy();
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Student Profile</title></head>
<body>
    <h1>Student Profile</h1>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($student['name']); ?></p>
    <p><strong>Username:</strong> <?php echo htmlspecialchars($student['username']); ?></p>
    <p><strong>Major:</strong> <?php echo htmlspecialchars($student['major']); ?></p>
    
    <a href="logout.php">Logout</a>
</body>
</html>
