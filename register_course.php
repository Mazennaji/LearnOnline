<?php
// register_course.php

require 'db_connection.php';

session_start();

$course_id = $_GET['id'] ?? null;

if (!$course_id) {
    echo "Invalid course.";
    exit;
}

// Assuming you have a user logged in
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    echo "Please log in to register.";
    exit;
}

// Register logic (basic example)
$stmt = $conn->prepare("INSERT INTO registrations (user_id, course_id) VALUES (?, ?)");
$stmt->execute([$user_id, $course_id]);

// Fetch full course details
$courseStmt = $conn->prepare("SELECT * FROM courses WHERE id = ?");
$courseStmt->execute([$course_id]);
$course = $courseStmt->fetch();

if (!$course) {
    echo "Course not found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($course['title']); ?> - Registered</title>
</head>
<body>
    <h1><?php echo htmlspecialchars($course['title']); ?></h1>
    <p><strong>Instructor:</strong> <?php echo htmlspecialchars($course['instructor']); ?></p>
    <p><strong>Category:</strong> <?php echo htmlspecialchars($course['category']); ?></p>
    <p><strong>Duration:</strong> <?php echo $course['duration_weeks']; ?> weeks</p>
    <img src="<?php echo htmlspecialchars($course['image']); ?>" alt="Course Image" style="width:200px;"><br><br>
    
    <h3>Full Description:</h3>
    <p><?php echo nl2br(htmlspecialchars($course['full_description'])); ?></p>
</body>
</html>
