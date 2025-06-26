<?php


use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
//eytikmqixfjxquby

    $to=$_POST["email"];
    $conn=new PDO("mysql:host=localhost;dbname=laundry","root",null);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt=$conn->prepare("select password from customer where email=?");
        $stmt->bindParam(1,$to);
        $stmt->execute();
        $r=$stmt->rowCount();

        if($r==1)
        {
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $password=$row["password"];
            $mail=new PHPMailer(true);
            $mail->isSMTP();

            $mail->Host='smtp.gmail.com';
            $mail->Port=465;

            $mail->Password='jlzkrdtfxlmzzkxc';
            $mail->SMTPSecure='ssl';
            $mail->SMTPAuth=true;
        
        //sender info
        $mail->Username='aishwarya832003@gmail.com';
        $mail->setFrom('aishwarya832003@gmail.com');

        //Add a recipent
        $mail->addAddress($to);

        //Set email format to HTML
        $mail->isHTML(true);
        
        //Mail subject
        $mail->subject='Email from Localhost';

        //Mail body content
        $bodyContent='<h1>Forgot password</h1>';
        $bodyContent.='<p>Your password is' .$password.'</p>';
        $mail->Body = $bodyContent;

        //send email
        if(!$mail->send())
        {
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
        }
        else{
            echo 'Message has been sent.';
        }
    }
    else
    {
        echo "No such emailid";
    }
?>