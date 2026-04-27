<?php
require_once 'bootstrap.php';
require_once 'db.php';

redirect_if_auth();

$error = '';
$success = '';
$gender_options = ['Male', 'Female'];
$fields = [
    ['label' => 'First Name', 'name' => 'first_name', 'type' => 'text', 'required' => true],
    ['label' => 'Last Name', 'name' => 'last_name', 'type' => 'text', 'required' => true],
    ['label' => 'Major', 'name' => 'major', 'type' => 'text', 'required' => true],
    ['label' => 'Phone', 'name' => 'phone', 'type' => 'text', 'required' => false],
    ['label' => 'Username', 'name' => 'username', 'type' => 'text', 'required' => true],
    ['label' => 'Email', 'name' => 'email', 'type' => 'email', 'required' => true],
    ['label' => 'Password', 'name' => 'password', 'type' => 'password', 'required' => true],
];

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
                $success = "Registration successful! You can now <a href='login.php'>login</a>.";
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
<?php
$page_title = 'Register - University App';
$sidebar_text = 'Join the neural network. Elevate your research, studying, and focus workflows.';
include '../html/auth_top.php';
?>
<div class="auth-card" style="max-height: 90vh; overflow-y: auto;">
    <h2>Create Account</h2>
    <p>Fill out the form below to get started.</p>
    <?php if ($error): ?><p class="error"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
    <?php if ($success): ?><p class="success"><?php echo $success; ?></p><?php endif; ?>
    <?php if (!$success): ?>
    <form class="auth-form" method="POST" action="register.php">
        <?php foreach ($fields as $field): ?>
            <label><?php echo $field['label']; ?>:</label><br>
            <input type="<?php echo $field['type']; ?>" name="<?php echo $field['name']; ?>" <?php echo $field['required'] ? 'required' : ''; ?>><br><br>
            <?php if ($field['name'] === 'phone'): ?>
                <label>Gender:</label><br>
                <select name="gender" required>
                    <?php foreach ($gender_options as $option): ?>
                        <option value="<?php echo $option; ?>" style="color: #333;"><?php echo $option; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
            <?php endif; ?>
        <?php endforeach; ?>
        <button type="submit">Register</button>
    </form>
    <?php endif; ?>
    <div class="auth-links">
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>
<?php include '../html/auth_bottom.php'; ?>
