<?php require_once 'includes/config.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic validation
    $errors = [];
    if (empty($username)) $errors[] = "Username is required";
    if (empty($email)) $errors[] = "Email is required";
    if (empty($password)) $errors[] = "Password is required";
    if ($password !== $confirm_password) $errors[] = "Passwords don't match";

    if (empty($errors)) {
        $users = getData('users.json');
        
        // Check if user exists
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                $errors[] = "Username already taken";
                break;
            }
            if ($user['email'] === $email) {
                $errors[] = "Email already registered";
                break;
            }
        }

        if (empty($errors)) {
            $new_user = [
                'id' => count($users) + 1,
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $users[] = $new_user;
            saveData('users.json', $users);

            $_SESSION['user'] = $new_user;
            redirect('profile.php');
        }
    }
}
?>

<?php require_once 'includes/header.php'; ?>

<h1>Register</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

<p class="mt-3">Already have an account? <a href="login.php">Login here</a></p>

<?php require_once 'includes/footer.php'; ?>