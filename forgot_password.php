<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.";
        exit;
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        
        echo "If this email is registered, a reset link will be sent.";
        exit;
    }

    
    $token = bin2hex(random_bytes(16)); 

   
    $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

   
    $update = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE id = ?");
    $update->execute([$token, $expiry, $user['id']]);

   
    $resetLink = "https://learnonline.rf.gd/reset_password.php?token=" . $token;

    
    $to = $email;
    $subject = "Password Reset Request";
    $message = "Hi,\n\nTo reset your password, please click the link below:\n\n" . $resetLink . "\n\nIf you didn't request a password reset, please ignore this email.";
    $headers = "From: no-reply@yourdomain.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "If this email is registered, a reset link will be sent.";
    } else {
        echo "Failed to send reset email. Please try again later.";
    }
} else {
    // Show form
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Forgot Password</title>
    </head>
    <body>
        <h2>Forgot Password</h2>
        <form method="POST">
            <label>Email Address:</label><br>
            <input type="email" name="email" required><br><br>
            <button type="submit">Send Reset Link</button>
        </form>
    </body>
    </html>
    <?php
}
?>

