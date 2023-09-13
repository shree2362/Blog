<?php
include(ROOT_PATH . "/vendor/autoload.php");
include(ROOT_PATH . "/app/database/constants.php");

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function PasswordResetLink($userEmail, $token)
{
    // Create a message
    global $mailer;
    $body ='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Verify email</title>
    </head>
    <body>
        <div class="wrapper">
            <p>
                Hey,<br>
                Please Click on the link below 
                to Recover your password.
            </p>
            <a href="http://localhost:8080/blog/welcome.php?password-token=' . $token .'">
                Recover Your Password
            </a>
            <p>
                Thank You :)
            </p>
            
    
        </div>
        
    </body>
    </html>';

    $message = (new Swift_Message('Recover Your Password'))
        ->setFrom(EMAIL)
        ->setTo($userEmail)
        ->setBody($body,'text/html');
        ;

    // Send the message
    $result = $mailer->send($message);
}

function sendVerification($userEmail, $token)
{
    // Create a message
    global $mailer;
    $body ='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Verify email</title>
    </head>
    <body>
        <div class="wrapper">
            <p>
                Hey,<br>
                Thank you for signing up on our website. Please Click on the link below 
                to verify your email.
            </p>
            <a href="http://localhost:8080/blog/welcome.php?token=' . $token .'">
                Verify Your email
            </a>
            <p>
                Thank You :)
            </p>
    
        </div>
        
    </body>
    </html>';

    $message = (new Swift_Message('Verify your email address'))
        ->setFrom(EMAIL)
        ->setTo($userEmail)
        ->setBody($body,'text/html');
        ;

    // Send the message
    $result = $mailer->send($message);
}
