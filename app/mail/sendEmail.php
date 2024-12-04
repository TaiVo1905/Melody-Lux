<?php
// error_reporting(E_ALL ^ E_DEPRECATED);
require_once("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");
require_once("../../vendor/phpmailer/phpmailer/SMTP.php");
require_once("../../vendor/phpmailer/phpmailer/Exception.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendEmailCode($email){;
    $randomNumber = random_int(100000, 999999);
    setcookie("code", $randomNumber, time() + 180, "/");
    setcookie("email", $email, time() + 180, "/");
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();// Set mailer to use SMTP
        $mail->CharSet = "utf-8";// set charset to utf8
        $mail->SMTPAuth = true;// Enable SMTP authentication
        $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
        $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
        $mail->Port = 587;// TCP port to connect to
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );                               
        //Enable SMTP authentication
        $mail->Username   = 'congdoan0806@gmail.com';//SMTP username
        $mail->Password   = 'mjtr obtf igwy eqtn';//SMTP password
        //Recipients
        $mail->setFrom('congdoan0806@gmail.com', 'Melody Lux');
        $mail->addAddress($email);//Add a recipient

        $mail->isHTML(true);//Set email format to HTML
        $mail->Subject = 'MÃ XÁC THỰC ĐĂNG KÝ MELODY LUX WEBSITE';
        $mail->Body    = "
            <p>Chào bạn,</p>
            <p>Đây là mã xác thực của bạn để hoàn tất quá trình đăng ký:</p>
            <p><strong>$randomNumber</strong></p>
            <p>Mã này có hiệu lực trong 3 phút. Vui lòng nhập mã vào trang đăng ký để xác nhận tài khoản của bạn.</p>
            <p>Trân trọng, <br>Melody Lux</p>
        ";
        $mail->AltBody = "Chào bạn,\n\nĐây là mã xác thực của bạn: $randomNumber\nMã này có hiệu lực trong 3 phút.";

        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        return 'Message has been sent';
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
};
function sendConfirmationEmail($name, $email, $password){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();// Set mailer to use SMTP
        $mail->CharSet = "utf-8";// set charset to utf8
        $mail->SMTPAuth = true;// Enable SMTP authentication
        $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
        $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
        $mail->Port = 587;// TCP port to connect to
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );                               
        //Enable SMTP authentication
        $mail->Username   = 'congdoan0806@gmail.com';//SMTP username
        $mail->Password   = 'mjtr obtf igwy eqtn';//SMTP password
        //Recipients
        $mail->setFrom('congdoan0806@gmail.com', 'Melody Lux');
        $mail->addAddress($email);//Add a recipient

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
};


if (isset($_GET['func'])) {
    $function = $_GET['func'];
    if ($function == "sendEmailCode" && isset($_GET['email'])) {
        $email = $_GET['email'];
        echo sendEmailCode($email);
    } elseif ($func == "sendConfirmationEmail") {
        $name = $_GET['name'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        echo sendConfirmationEmail($name, $email, $password); 
    } else { 
        echo "Hàm không hợp lệ hoặc tham số không hợp lệ.";
    }
} else {
    echo "Không có hàm nào được chỉ định.";
}
?>