<?php

// Replace with your own email and password
$sender_email = 'your_email@gmail.com';
$sender_password = 'your_password';

// Recipient email address
$recipient_email = 'recipient_email@example.com';

// Email subject and body
$email_subject = 'Test email';
$email_body = 'Hello, this is a test email sent from PHP using Gmail SMTP.';

// SMTP server configuration
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587;
$smtp_username = $sender_email;
$smtp_password = $sender_password;

// Create SMTP transport object
$transport = (new Swift_SmtpTransport($smtp_host, $smtp_port))
    ->setUsername($smtp_username)
    ->setPassword($smtp_password)
    ->setEncryption('tls');

// Create the message
$message = (new Swift_Message($email_subject))
    ->setFrom([$sender_email => 'Your Name'])
    ->setTo([$recipient_email])
    ->setBody($email_body);

// Create the mailer using the SMTP transport
$mailer = new Swift_Mailer($transport);

// Send the message
$result = $mailer->send($message);

if ($result) {
    echo 'Email sent successfully.';
} else {
    echo 'Failed to send email.';
}

?>
