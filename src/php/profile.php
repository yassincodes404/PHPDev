<?php
require_once 'bootstrap.php';
require_once 'db.php';
require_auth();

function fetch_rows(mysqli $conn, string $sql, int $user_id): array
{
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

$stmt = $conn->prepare("
    SELECT u.username, u.email, u.role, p.first_name, p.last_name, p.major, p.phone 
    FROM users u 
    LEFT JOIN profiles p ON u.id = p.user_id 
    WHERE u.id = ?
");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    session_destroy();
    redirect_to('login.php');
}

$attendance_records = [];
$grades_records = [];
if ($user['role'] === 'student') {
    $attendance_records = fetch_rows($conn, "
        SELECT c.course_name, a.session_date, a.status
        FROM attendance a
        JOIN courses c ON a.course_id = c.id
        WHERE a.user_id = ?
        ORDER BY a.session_date DESC
    ", $_SESSION['user_id']);
    $grades_records = fetch_rows($conn, "
        SELECT c.course_name, g.grade_value, g.grade_letter
        FROM grades g
        JOIN courses c ON g.course_id = c.id
        WHERE g.user_id = ?
    ", $_SESSION['user_id']);
}
?>
<?php page_start(); ?>
<div class="content-area">
    <div class="card profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?>!</h1>
        
        <div class="profile-card">
            <h2>Profile Details</h2>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Role:</strong> <?php echo ucfirst(htmlspecialchars($user['role'])); ?></p>
            <?php if ($user['major']): ?>
                <p><strong>Major:</strong> <?php echo htmlspecialchars($user['major']); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($user['role'] === 'student'): ?>
            <div class="attendance-section">
                <h2>My Attendance</h2>
                <?php if (count($attendance_records) > 0): ?>
                    <table>
                        <tr>
                            <th>Course Name</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach ($attendance_records as $record): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($record['course_name']); ?></td>
                            <td><?php echo htmlspecialchars($record['session_date']); ?></td>
                            <td><?php echo ucfirst(htmlspecialchars($record['status'])); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>No attendance records found.</p>
                <?php endif; ?>
            </div>

            <div class="attendance-section">
                <h2>My Grades</h2>
                <?php if (count($grades_records) > 0): ?>
                    <table>
                        <tr>
                            <th>Course Name</th>
                            <th>Score</th>
                            <th>Grade</th>
                        </tr>
                        <?php foreach ($grades_records as $record): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($record['course_name']); ?></td>
                            <td><?php echo htmlspecialchars($record['grade_value']); ?></td>
                            <td><strong><?php echo htmlspecialchars($record['grade_letter']); ?></strong></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>No grades found.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <div class="actions">
            <?php if ($user['role'] === 'admin'): ?>
                <a href="admin.php" class="btn">Admin Dashboard</a>
            <?php endif; ?>
            <a href="logout.php" class="btn btn-logout">Logout</a>
        </div>
        </div>
    </div>
</div>
<?php page_end(); ?>
