<?php
include '../components/register_login.php';
error_reporting(E_ALL ^ E_DEPRECATED);
require("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("../../vendor/phpmailer/phpmailer/SMTP.php");
require("../../vendor/phpmailer/phpmailer/Exception.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
    function sendEmailCode($email){;
        $randomNumber = random_int(100000, 999999);
        setcookie("code", $randomNumber, time() + 180, "/");
        
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'congdoan0806@gmail.com';                     //SMTP username
            $mail->Password   = 'mjtr obtf igwy eqtn';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('congdoan0806@gmail.com', 'Melody Lux');
            $mail->addAddress($email);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Ma xac thuc cua ban';
            $mail->Body    = "
                <p>Chào bạn,</p>
                <p>Đây là mã xác thực của bạn để hoàn tất quá trình đăng ký:</p>
                <p><strong>$randomNumber</strong></p>
                <p>Mã này có hiệu lực trong 3 phút. Vui lòng nhập mã vào trang đăng ký để xác nhận tài khoản của bạn.</p>
                <p>Trân trọng, <br>Melody Lux</p>
            ";
            $mail->AltBody = "Chào bạn,\n\nĐây là mã xác thực của bạn: $randomNumber\nMã này có hiệu lực trong 10 phút.";

            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      
    }   ;
    function sendConfirmationEmail($name, $email, $password){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'congdoan0806@gmail.com';                     //SMTP username
            $mail->Password   = 'mjtr obtf igwy eqtn';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('congdoan0806@gmail.com', 'CongDoanFashion');
            $mail->addAddress($email);     //Add a recipient
    
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Thong tin tai khoan moi';
            $mail->Body    = "
                <p>Chào bạn,</p>
                <p>Cảm ơn bạn đã đăng ký tài khoản trên hệ thống của chúng tôi. Dưới đây là thông tin đăng ký của bạn:</p>
                <ul>
                    <li><strong>Tên:</strong> $name</li>
                    <li><strong>Email:</strong> $email</li>
                    <li><strong>Mật khẩu:</strong> $password</li>
                </ul>
                <p>Vui lòng giữ thông tin này một cách an toàn.</p>
                <p>Trân trọng, <br>Melody Lux</p>
            ";
            $mail->AltBody = "
                Chào bạn,
            
                Cảm ơn bạn đã đăng ký tài khoản trên hệ thống của chúng tôi. Dưới đây là thông tin đăng ký của bạn:
                - Tên: $name
                - Email: $email
                - Mật khẩu: $password
            
                Vui lòng giữ thông tin này một cách an toàn.
            
                Trân trọng, 
                Melody Lux
            ";
            

            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
           
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>