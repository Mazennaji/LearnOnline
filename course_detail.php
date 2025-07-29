<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'includes/config.php';
require_once 'includes/header.php';

$courses = getData('courses.json');
$course_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$selected_course = null;

foreach ($courses as $course) {
    if ($course['id'] == $course_id) {
        $selected_course = $course;
        break;
    }
}
?>

<?php if (!$selected_course): ?>
    <div class="alert alert-danger">Course not found.</div>
<?php else: ?>
    <div class="row">
        <div class="col-md-8">
            <h1><?= htmlspecialchars($selected_course['title']) ?></h1>
            <p><strong>Instructor:</strong> <?= htmlspecialchars($selected_course['instructor']) ?></p>
            <p><strong>Category:</strong> <?= htmlspecialchars($selected_course['category']) ?></p>
            <p><strong>Duration:</strong> <?= $selected_course['duration_weeks'] ?> weeks</p>
            <?php if (isset($selected_course['price'])): ?>
                <p><strong>Price:</strong> $<?= number_format($selected_course['price'], 2) ?></p>
            <?php endif; ?>
            <img src="<?= htmlspecialchars($selected_course['image']) ?>" class="img-fluid mb-3" style="max-height:300px;" alt="Course image">
            <p><?= htmlspecialchars($selected_course['description']) ?></p>

            <?php if (isset($selected_course['weekly_content'])): ?>
                <h3>Weekly Breakdown</h3>
                <ul class="list-group">
                    <?php foreach ($selected_course['weekly_content'] as $week => $content): ?>
                        <li class="list-group-item">
                            <strong><?= ucfirst(str_replace('_', ' ', $week)) ?>:</strong> <?= $content ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <hr>
            <h3>Course Reviews</h3>

            <?php
            $reviews = file_exists('reviews.json') ? json_decode(file_get_contents('reviews.json'), true) : [];
            $courseReviews = $reviews[$selected_course['id']] ?? [];

            if ($courseReviews):
                foreach ($courseReviews as $rev):
            ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <strong><?= htmlspecialchars($rev['user']) ?></strong> -
                        <?= str_repeat('⭐', $rev['rating']) ?> (<?= $rev['rating'] ?>/5)<br>
                        <small class="text-muted"><?= $rev['date'] ?></small>
                        <p><?= htmlspecialchars($rev['review']) ?></p>
                    </div>
                </div>
            <?php
                endforeach;
            else:
                echo "<p>No reviews yet. Be the first to review!</p>";
            endif;
            ?>

            <?php if (isset($_SESSION['user'])): ?>
                <form action="reviews.php" method="POST" class="mt-3">
                    <input type="hidden" name="course_id" value="<?= $selected_course['id'] ?>">
                    <div class="mb-2">
                        <label for="rating">Rating:</label>
                        <select name="rating" id="rating" class="form-select" required>
                            <option value="">Select stars</option>
                            <?php for ($i = 5; $i >= 1; $i--): ?>
                                <option value="<?= $i ?>"><?= $i ?> Star<?= $i > 1 ? 's' : '' ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="review">Review:</label>
                        <textarea name="review" id="review" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Submit Review</button>
                </form>
            <?php else: ?>
                <p><a href="login.php">Login</a> to leave a review.</p>
            <?php endif; ?>
        </div>

        <div class="col-md-4">
            <?php if (isset($_SESSION['user'])):
                $enrolled = $_SESSION['user']['enrolled_courses'] ?? [];
                $is_enrolled = in_array($selected_course['id'], $enrolled);
            ?>
                <?php if ($is_enrolled): ?>
                    <div class="alert alert-success">You're enrolled in this course!</div>
                    <form action="unenroll.php" method="POST">
                        <input type="hidden" name="course_id" value="<?= $selected_course['id'] ?>">
                        <button type="submit" class="btn btn-danger">Unenroll</button>
                    </form>
                <?php else: ?>
                    <?php if (isset($selected_course['price']) && $selected_course['price'] > 0): ?>
                        <!-- Payment form for paid courses -->
                        <form action="payment.php" method="post">
                            <input type="hidden" name="course_id" value="<?= $selected_course['id'] ?>">
                            <input type="hidden" name="price" value="<?= $selected_course['price'] ?>">
                            <button type="submit" class="btn btn-success">
                                Pay $<?= number_format($selected_course['price'], 2) ?> & Enroll
                            </button>
                        </form>
                    <?php else: ?>
                        <!-- Direct enroll for free courses -->
                        <a href="enroll.php?course_id=<?= $selected_course['id'] ?>" class="btn btn-success">Enroll for Free</a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary">Login to Enroll</a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>
