<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course_id'], $_POST['rating'], $_POST['review'])) {
    $courseId = intval($_POST['course_id']);
    $rating = intval($_POST['rating']);
    $review = trim($_POST['review']);

    $reviewsFile = 'reviews.json';
    $reviews = file_exists($reviewsFile) ? json_decode(file_get_contents($reviewsFile), true) : [];

    $reviews[$courseId][] = [
        'user' => $_SESSION['user']['username'] ?? 'Anonymous',
        'rating' => $rating,
        'review' => $review,
        'date' => date('Y-m-d H:i:s')
    ];

    file_put_contents($reviewsFile, json_encode($reviews, JSON_PRETTY_PRINT));
    header("Location: course_detail.php?id=$courseId");
    exit;
}
?>

