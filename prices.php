<?php
require_once 'includes/config.php';
require_once 'includes/header.php';

$courses = getData('courses.json');
?>

<div class="container mt-4">
    <h2 class="mb-3">Course Prices</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Course Title</th>
                <th>Instructor</th>
                <th>Category</th>
                <th>Price (USD)</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <?php if (isset($course['price'])): ?>
                    <tr>
                        <td><?= htmlspecialchars($course['title']) ?></td>
                        <td><?= htmlspecialchars($course['instructor']) ?></td>
                        <td><?= htmlspecialchars($course['category']) ?></td>
                        <td>$<?= number_format($course['price'], 2) ?></td>
                        <td><a href="course_detail.php?id=<?= $course['id'] ?>" class="btn btn-info btn-sm">View</a></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>

