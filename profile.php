<?php 
require_once 'includes/config.php';

if (!isset($_SESSION['user'])) {
    redirect('login.php');
}

$user = $_SESSION['user'];
?>

<?php require_once 'includes/header.php'; ?>

<h1>Welcome, <?= htmlspecialchars($user['username']) ?></h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Your Profile</h5>
        <p class="card-text">
            <strong>Email:</strong> <?= htmlspecialchars($user['email']) ?><br>
            <strong>Member since:</strong> <?= $user['created_at'] ?>
        </p>
        <a href="courses.php" class="btn btn-primary">Browse Courses</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>