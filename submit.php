<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(trim($_POST["fullName"] ?? ''));
    $email = htmlspecialchars(trim($_POST["email"] ?? ''));
    $phone = htmlspecialchars(trim($_POST["phone"] ?? ''));
    $message = htmlspecialchars(trim($_POST["message"] ?? ''));

    $to = "maryespinosa560@hotmail.com";
    $subject = "New Contact Form Message";

    $body = "
New message from website:

Name: $name
Email: $email
Phone: $phone

Message:
$message
";

    // FIXED HEADERS (IMPORTANT)
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    $headers .= "From: Mary Espinosa <maryespinosa@maryespinosa.com>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    $mailSent = mail($to, $subject, $body, $headers);

    if ($mailSent) {

        echo "
        <script>
            alert('Thank you $name! Your message has been sent successfully.');
            window.location.href='https://maryespinosa.com/';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Mail sending failed. Please check server SMTP settings.');
            window.history.back();
        </script>
        ";
    }

} else {
    echo "Invalid Request";
}

?>