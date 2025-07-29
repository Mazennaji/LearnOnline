<?php
session_start();
require 'db_connection.php';

// Step 1: Check user authentication
if (!isset($_SESSION['user_id'])) {
    echo "<h2 style='color:red;'>❌ You must be logged in to make a payment.</h2>";
    echo "<a href='login.php'>Login Here</a>";
    exit;
}

// Step 2: Validate POST data
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || 
    !isset($_POST['course_id']) || 
    !isset($_POST['price'])) {
    echo "<h2 style='color:red;'>❌ Invalid payment request.</h2>";
    exit;
}

$user_id = $_SESSION['user_id'];
$course_id = (int) $_POST['course_id'];
$price = (float) $_POST['price'];

// Step 3: Check if already enrolled
$check = $conn->prepare("
    SELECT 1 FROM enrollments 
    WHERE user_id = :user_id AND course_id = :course_id
");
$check->execute([
    'user_id' => $user_id,
    'course_id' => $course_id
]);

if ($check->rowCount() > 0) {
    echo "<h3>⚠️ You are already enrolled in this course.</h3>";
    echo "<a href='my-courses.php'>Go to My Courses</a>";
    exit;
}

// Step 4: Insert payment record
$insert_payment = $conn->prepare("
    INSERT INTO payments (user_id, course_id, amount, payment_date)
    VALUES (:user_id, :course_id, :amount, NOW())
");
$insert_payment->execute([
    'user_id' => $user_id,
    'course_id' => $course_id,
    'amount' => $price
]);

// Step 5: Enroll user in course
$enroll = $conn->prepare("
    INSERT INTO enrollments (user_id, course_id, enrolled_at)
    VALUES (:user_id, :course_id, NOW())
");
$enroll->execute([
    'user_id' => $user_id,
    'course_id' => $course_id
]);

// Step 6: Success Message
echo "<h2 style='color:green;'>✅ Payment Successful!</h2>";
echo "<p>You have been enrolled in the course.</p>";
echo "<a href='my-courses.php'>View My Courses</a>";
?>

<form action="payment.php" method="POST">
  <input type="hidden" name="course_id" value="101">
  <input type="hidden" name="price" value="49.99">
  <button type="submit">Pay Now</button>
</form>
