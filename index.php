<?php require_once 'includes/config.php'; ?>
<?php require_once 'includes/header.php'; ?>

<h1>Welcome to LearnOnline</h1>
<p>Start your learning journey today with our practical and comprehensive tech courses. Whether you're a beginner or looking to advance your skills, we have the right course for you—designed to help you grow and succeed!</p>

<hr>

<h3>Explore Our Most Popular Courses</h3>
<p>Here's what you'll learn and how long it takes to finish:</p>


<form method="GET" action="search.php" class="mb-4">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search courses..." required>
        <button type="submit" class="btn btn-outline-primary">Search</button>
    </div>
</form>

<div class="row">
    <?php
    $courses = getData('courses.json');
    foreach (array_slice($courses, 0, 101) as $course): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="<?= htmlspecialchars($course['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($course['title']) ?>" onerror="this.src='image/placeholder.png'">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
                    <p class="card-text">
                        <?= substr(strip_tags($course['description']), 0, 120) ?>...
                    </p>
                    <p class="text-muted">
                        <strong>Duration:</strong> <?= isset($course['duration_weeks']) ? $course['duration_weeks'] . ' weeks' : 'N/A' ?>
                    </p>
                    <a href="courses.php" class="btn btn-primary">View Course</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once 'includes/footer.php'; ?>


