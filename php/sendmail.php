<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(
            !empty($_POST['fname'])
            && !empty($_POST['email'])
            && !empty($_POST['message'])
        ){
            $name = $_POST["fname"];
            $email = $_POST["email"];
            $message = $_POST["message"];


            $to = "stnv.design@gmail.com";
            $subject = "New message from portfolio website";
            $body = "Name: {$name}\nEmail: {$email}\nMessage: {$message}";
            $headers = "From: {$email}";


            if (mail($to, $subject, $body, $headers)) {
                echo "Message sent successfully!";
            } else {
                echo "Failed to send message.";
            }
        }
    }
    $recaptcha_secret = "6LcWtDwoAAAAAHe-kv80X4youyvIq6nRrfqbkQIM";
    $recaptcha_response = $_POST["g-recaptcha-response"];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response";
    $response = file_get_contents($url);
    $response_data = json_decode($response, true);

    if (!$response_data["success"]) {
        // reCaptcha validation failed, return an error message
    } else {
        // Your email sending code here
    }
?>