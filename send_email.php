<?php
header('Content-Type: application/json');

$toEmail = "nourbalata773@gmail.com";

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(['success' => false, 'error' => 'Please fill in all fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'error' => 'Invalid email address.']);
    exit;
}

$subject = "New message from portfolio site";

$emailContent = "You have received a new message from your portfolio website:\n\n";
$emailContent .= "Name: $name\n";
$emailContent .= "Email: $email\n\n";
$emailContent .= "Message:\n$message\n";

$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail('nourbalata773@gmail.com', 'Test mail', 'This is a test mail')) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Mail function failed']);
}

?>
