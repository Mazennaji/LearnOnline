<?php require_once 'includes/header.php'; ?>

<h2>Search Results</h2>

<?php
$query = isset($_GET['query']) ? strtolower(trim($_GET['query'])) : '';

$courses = [];

if (file_exists('includes/data/courses.json')) {
    $json = file_get_contents('includes/data/courses.json');
    $courses = json_decode($json, true);
} else {
    echo "<p class='text-danger'>Error: courses.json file not found.</p>";
    require_once 'includes/footer.php';
    exit;
}

$results = [];

if ($query !== '') {
    foreach ($courses as $course) {
        if (
            strpos(strtolower($course['title']), $query) !== false ||
            strpos(strtolower($course['instructor']), $query) !== false ||
            strpos(strtolower($course['category']), $query) !== false
        ) {
            $results[] = $course;
        }
    }
}
?>

<?php if (empty($results)): ?>
    <p>No courses found matching "<?= htmlspecialchars($query) ?>".</p>
<?php else: ?>
    <div class="row">
        <?php foreach ($results as $course): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?= htmlspecialchars($course['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($course['title']) ?>" onerror="this.src='image/placeholder.png'">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($course['description']) ?></p>
                        <p class="text-muted">
                            <strong>Instructor:</strong> <?= htmlspecialchars($course['instructor']) ?><br>
                            <strong>Category:</strong> <?= htmlspecialchars($course['category']) ?><br>
                            <strong>Duration:</strong> <?= $course['duration_weeks'] ?> weeks
                        </p>
                        <a href="courses.php" class="btn btn-primary">Go to Course</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>

