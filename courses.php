<?php require_once 'includes/config.php'; ?>
<?php require_once 'includes/header.php'; ?>

<h1>All Courses</h1>

<!-- Search Form -->
<form method="GET" action="search.php" class="mb-4">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search courses..." required>
        <button type="submit" class="btn btn-outline-primary">Search</button>
    </div>
</form>

<div class="row">
    <?php
    $courses = getData('courses.json');
    foreach ($courses as $course):
        $is_enrolled = false;
        if (isset($_SESSION['user'])) {
            $enrolled = $_SESSION['user']['enrolled_courses'] ?? [];
            $is_enrolled = in_array($course['id'], $enrolled);
        }
    ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="<?= htmlspecialchars($course['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($course['title']) ?>" onerror="this.src='image/placeholder.png'">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($course['description']) ?></p>
                    <p class="text-muted">Instructor: <?= htmlspecialchars($course['instructor']) ?></p>
                    <p class="text-muted">Duration: <?= $course['duration_weeks'] ?> weeks</p>

                    <div class="mt-auto">
                        <a href="view-course.php?id=<?= $course['id'] ?>" class="btn btn-outline-primary w-100 mb-2">View Course</a>

                        <?php if (isset($_SESSION['user'])): ?>
                            <?php if ($is_enrolled): ?>
                                <a href="unenroll.php?course_id=<?= $course['id'] ?>" class="btn btn-danger w-100">Unenroll</a>
                            <?php else: ?>
                                <a href="enroll.php?course_id=<?= $course['id'] ?>" class="btn btn-success w-100">Enroll Now</a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-primary w-100">Login to Enroll</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once 'includes/footer.php'; ?>

