<?php
require_once 'bootstrap.php';
require_once 'db.php';

redirect_if_auth();

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
            redirect_to('dashboard.php');
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>
<?php
$page_title = 'Login - University App';
$sidebar_text = 'Stop building pages. Start building a living neural network where every thought connects.';
include '../html/auth_top.php';

$fields = [
    ['label' => 'Username', 'name' => 'username', 'type' => 'text'],
    ['label' => 'Password', 'name' => 'password', 'type' => 'password'],
];
?>
<div class="auth-card">
    <h2>Welcome back</h2>
    <p>Enter your details to access your workspace.</p>
    <?php if ($error): ?><p class="error"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
    <form class="auth-form" method="POST" action="login.php">
        <?php foreach ($fields as $field): ?>
            <label><?php echo $field['label']; ?>:</label><br>
            <input type="<?php echo $field['type']; ?>" name="<?php echo $field['name']; ?>" required><br><br>
        <?php endforeach; ?>
        <button type="submit">Login</button>
    </form>
    <div class="auth-links">
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</div>
<?php include '../html/auth_bottom.php'; ?>
