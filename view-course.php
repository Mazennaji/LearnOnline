<?php
require_once 'includes/config.php';
require_once 'includes/header.php';

if (!isset($_GET['id'])) {
    echo "<p class='text-danger'>Course not found.</p>";
    require_once 'includes/footer.php';
    exit;
}

$courses = getData('courses.json');
$course_id = intval($_GET['id']);
$selected_course = null;

foreach ($courses as $course) {
    if ($course['id'] == $course_id) {
        $selected_course = $course;
        break;
    }
}

if (!$selected_course) {
    echo "<p class='text-danger'>Course not found.</p>";
    require_once 'includes/footer.php';
    exit;
}

$is_enrolled = false;
if (isset($_SESSION['user'])) {
    $enrolled = $_SESSION['user']['enrolled_courses'] ?? [];
    $is_enrolled = in_array($course_id, $enrolled);
}
?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h1><?= htmlspecialchars($selected_course['title']) ?></h1>
            <p><strong>Instructor:</strong> <?= htmlspecialchars($selected_course['instructor']) ?></p>
            <p><strong>Duration:</strong> <?= $selected_course['duration_weeks'] ?> weeks</p>
            <?php if (isset($selected_course['price'])): ?>
                <p><strong>Price:</strong> $<?= number_format($selected_course['price'], 2) ?></p>
            <?php endif; ?>
            <p><?= htmlspecialchars($selected_course['description']) ?></p>

            <?php if (isset($selected_course['skills'])): ?>
                <h5>Skills You'll Gain:</h5>
                <ul>
                    <?php foreach ($selected_course['skills'] as $skill): ?>
                        <li><?= htmlspecialchars($skill) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if (isset($selected_course['weekly_content'])): ?>
                <h5>Weekly Modules:</h5>
                <div class="accordion" id="courseModules">
                    <?php foreach ($selected_course['weekly_content'] as $week => $content): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?= $week ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $week ?>">
                                    <?= ucwords(str_replace('_', ' ', $week)) ?>
                                </button>
                            </h2>
                            <div id="collapse<?= $week ?>" class="accordion-collapse collapse">
                                <div class="accordion-body"><?= htmlspecialchars($content) ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-4">
            <img src="<?= htmlspecialchars($selected_course['image']) ?>" class="img-fluid mb-3" alt="<?= htmlspecialchars($selected_course['title']) ?>">
            
            <?php if (isset($_SESSION['user'])): ?>
                <?php if ($is_enrolled): ?>
                    <a href="unenroll.php?course_id=<?= $course_id ?>" class="btn btn-danger w-100">Unenroll</a>
                <?php else: ?>
                    <a href="enroll.php?course_id=<?= $course_id ?>" class="btn btn-success w-100">Enroll Now</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary w-100">Login to Enroll</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
