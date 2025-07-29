<?php
// Session configuration for InfinityFree or similar
ini_set('session.cookie_domain', '.epizy.com'); 
session_start();

require_once 'includes/config.php'; 

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username)) $errors[] = "Username is required";
    if (empty($password)) $errors[] = "Password is required";

    if (empty($errors)) {
        // Check if user exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        // Validate password
        if ($user && password_verify($password, $user['password'])) {
            // ✅ Store session data
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to a secure page
            header("Location: profile.php");
            exit;
        } else {
            $errors[] = "Invalid username or password.";
        }
    }
}
?>

<?php require_once 'includes/header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Login</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

        <p class="mt-3">
            <a href="forgot_password.php">Forgot your password?</a><br>
            Don’t have an account? <a href="register.php">Register here</a>
        </p>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>


