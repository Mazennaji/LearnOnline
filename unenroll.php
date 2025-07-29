<?php
session_start();

$courseId = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course_id'])) {
    $courseId = intval($_POST['course_id']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['course_id'])) {
    $courseId = intval($_GET['course_id']);
}

if ($courseId !== null && isset($_SESSION['user']['enrolled_courses'])) {
    $_SESSION['user']['enrolled_courses'] = array_filter(
        $_SESSION['user']['enrolled_courses'],
        function ($id) use ($courseId) {
            return $id != $courseId;
        }
    );
    // Re-index array
    $_SESSION['user']['enrolled_courses'] = array_values($_SESSION['user']['enrolled_courses']);
}

// Redirect back to the course detail page
header('Location: course_detail.php?id=' . $courseId);
exit;
?>