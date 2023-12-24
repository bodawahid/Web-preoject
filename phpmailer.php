<?php require_once("complementary/header.php");
// if (!isset($_SESSION["send"])) {
//     header("location:homepage.php");
// }
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $insert = $conn->prepare('INSERT into contact (name,email,message,user_id) VALUES(:name,:email,:message,:user_id)');
    $insert->execute(
        [
            ':name' => $name,
            ':email' => $email,
            ':message' => $message,
            ':user_id' => (isset($_SESSION['user_id'])? $_SESSION['user_id'] : null),
        ]
    );
}
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';
//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'abdelrahmanwahid555@gmail.com';                     //SMTP username
    $mail->Password   = 'halzupcqlvvqoqrb';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    if (isset($_SESSION['user_id'])) {
        $email = $conn->query("select * from users where id = " . $_SESSION['user_id'])->fetch(PDO::FETCH_ASSOC);
        $mail->setFrom($email['email'], $email['username']);
    } else
        $mail->setFrom('guest@gmail.com',$name);
    $mail->addAddress('bodawahid456@gmail.com', 'Owner');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contact from a User';
    $mail->Body    = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('location:messageSent.php');
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
