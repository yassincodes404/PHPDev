<?php
require_once 'bootstrap.php';
require_once 'db.php';

// Auth check
if (!isset($_SESSION['user_id'])) {
    redirect_to('login.php');
}

$stmt = $conn->prepare("SELECT role FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$role_res = $stmt->get_result()->fetch_assoc();

if (!$role_res || $role_res['role'] !== 'admin') {
    redirect_to('profile.php');
}

// Search Logic
$search = $_GET['search'] ?? '';
$search_term = "%$search%";

// Fetch students
$students = [];
$stu_stmt = $conn->prepare("
    SELECT u.id, u.username, u.email, p.first_name, p.last_name, p.major, p.phone, p.gender 
    FROM users u 
    JOIN profiles p ON u.id = p.user_id 
    WHERE u.role = 'student' AND (
        u.username LIKE ? OR 
        u.email LIKE ? OR 
        p.first_name LIKE ? OR 
        p.last_name LIKE ? OR 
        p.phone LIKE ?
    )
");
$stu_stmt->bind_param("sssss", $search_term, $search_term, $search_term, $search_term, $search_term);
$stu_stmt->execute();
$stu_res = $stu_stmt->get_result();
while ($r = $stu_res->fetch_assoc()) {
    $students[] = $r;
}

// Fetch all courses
$courses = [];
$c_res = $conn->query("SELECT id, course_name, course_code FROM courses");
while ($c = $c_res->fetch_assoc()) {
    $courses[] = $c;
}

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $student_id = $_POST['student_id'] ?? 0;
    $course_id = $_POST['course_id'] ?? 0;
    
    if ($action === 'add_grade') {
        $grade_value = $_POST['grade_value'] ?? 0;
        $stmt_g = $conn->prepare("INSERT INTO grades (user_id, course_id, grade_value) VALUES (?, ?, ?)");
        $stmt_g->bind_param("iid", $student_id, $course_id, $grade_value);
        if ($stmt_g->execute()) {
            $msg = "<p class='success'>Grade successfully added!</p>";
        } else {
            $msg = "<p class='error'>Error adding grade.</p>";
        }
    } elseif ($action === 'add_attendance') {
        $session_date = $_POST['session_date'] ?? date('Y-m-d');
        $status = $_POST['status'] ?? 'present';
        $stmt_a = $conn->prepare("INSERT INTO attendance (user_id, course_id, session_date, status) VALUES (?, ?, ?, ?)");
        $stmt_a->bind_param("iiss", $student_id, $course_id, $session_date, $status);
        if ($stmt_a->execute()) {
            $msg = "<p class='success'>Attendance successfully logged!</p>";
        } else {
            $msg = "<p class='error'>Error logging attendance.</p>";
        }
    }
}
?>
<?php page_start(); ?>
<div class="content-area">
    <div class="card admin-container">
        <h1>Admin Control Panel</h1>
        <?php echo $msg; ?>
        
        <div class="profile-card">
            <h2>Student Search</h2>
            <form method="GET" action="admin.php" class="search-bar">
                <input type="text" name="search" placeholder="Search by name, email, username, phone..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Search</button>
            </form>
            
            <div style="overflow-x: auto;">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Major</th>
                    </tr>
                    <?php if (count($students) > 0): ?>
                        <?php foreach ($students as $stu): ?>
                        <tr>
                            <td><?php echo $stu['id']; ?></td>
                            <td><?php echo htmlspecialchars($stu['first_name'] . ' ' . $stu['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($stu['username']); ?></td>
                            <td><?php echo htmlspecialchars($stu['email']); ?></td>
                            <td><?php echo htmlspecialchars($stu['phone'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($stu['gender'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($stu['major'] ?? 'N/A'); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" style="text-align: center;">No students found.</td></tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>

        <div class="profile-card">
            <h2>Add Student Grade</h2>
            <form method="POST" action="admin.php">
                <input type="hidden" name="action" value="add_grade">
                
                <label>Select Student:</label>
                <select name="student_id" required>
                    <option value="">-- Choose Student --</option>
                    <?php foreach ($students as $stu): ?>
                        <option value="<?php echo $stu['id']; ?>"><?php echo htmlspecialchars($stu['first_name'] . ' ' . $stu['last_name'] . " (" . $stu['username'] . ")"); ?></option>
                    <?php endforeach; ?>
                </select>
                
                <label>Select Course:</label>
                <select name="course_id" required>
                    <option value="">-- Choose Course --</option>
                    <?php foreach ($courses as $c): ?>
                        <option value="<?php echo $c['id']; ?>"><?php echo htmlspecialchars($c['course_name']); ?></option>
                    <?php endforeach; ?>
                </select>
                
                <label>Grade Score (0-100):</label>
                <input type="number" step="0.01" name="grade_value" min="0" max="100" required>
                
                <button type="submit">Submit Grade</button>
            </form>
        </div>

        <div class="profile-card">
            <h2>Log Attendance</h2>
            <form method="POST" action="admin.php">
                <input type="hidden" name="action" value="add_attendance">
                
                <label>Select Student:</label>
                <select name="student_id" required>
                    <option value="">-- Choose Student --</option>
                    <?php foreach ($students as $stu): ?>
                        <option value="<?php echo $stu['id']; ?>"><?php echo htmlspecialchars($stu['first_name'] . ' ' . $stu['last_name'] . " (" . $stu['username'] . ")"); ?></option>
                    <?php endforeach; ?>
                </select>
                
                <label>Select Course:</label>
                <select name="course_id" required>
                    <option value="">-- Choose Course --</option>
                    <?php foreach ($courses as $c): ?>
                        <option value="<?php echo $c['id']; ?>"><?php echo htmlspecialchars($c['course_name']); ?></option>
                    <?php endforeach; ?>
                </select>

                <label>Session Date:</label>
                <input type="date" name="session_date" required>
                
                <label>Status:</label>
                <select name="status" required>
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                    <option value="late">Late</option>
                    <option value="excused">Excused</option>
                </select>
                
                <button type="submit">Log Attendance</button>
            </form>
        </div>
        
        <div class="actions">
            <a href="profile.php" class="btn">Back to Profile</a>
        </div>
        </div>
    </div>
</div>
<?php page_end(); ?>
