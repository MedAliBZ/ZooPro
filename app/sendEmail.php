<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['nom-popups']) && isset($_POST['email-popups'])){
    $name=$_POST['nom-popups'];
    $email=$_POST['email-popups'];
    $subject=$_POST['sujet-popups'];
    $body=$_POST['message-popups'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "zoopro2021@gmail.com"
    $mail->Password = 'espritzoo2021@'
    $mail->port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("zoopro2021@gmail.com");
    $mail->$Subject = ("email($subject)");
    $mail->Body = $body;

    if($mail->send()){
        $status = "success";
        $reponse ="Email is sent!";

    }
    else
    {
        $status = "failed";
        $reponse = "something is worong: <br>" . $mail->ErrorInfo;
    }

    exit(Json_encode(array("status" => $status, "reponse" => $reponse)));   



}


?>