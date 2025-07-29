<?php
require_once 'includes/config.php';

if (!isset($_SESSION['user'])) {
    redirect('login.php');
}

if (!isset($_GET['course_id'])) {
    redirect('courses.php');
}

$course_id = (int) $_GET['course_id'];
$users = getData('users.json');
$current_user = $_SESSION['user'];
$updated_users = [];

foreach ($users as $user) {
    if ($user['id'] === $current_user['id']) {
        if (!isset($user['enrolled_courses'])) {
            $user['enrolled_courses'] = [];
        }

        if (!in_array($course_id, $user['enrolled_courses'])) {
            $user['enrolled_courses'][] = $course_id;
        }

        // Update session data too
        $_SESSION['user'] = $user;
    }

    $updated_users[] = $user;
}

saveData('users.json', $updated_users);
redirect('courses.php');
