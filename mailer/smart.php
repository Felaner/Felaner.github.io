<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer(true);

try {
	$mail->CharSet = 'utf-8';

	$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'kirill.deykun1@gmail.com';                 // Наш логин
	$mail->Password = 'Leonardo2801';                           // Наш пароль от ящика
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to
	
	$mail->setFrom('kirill.deykun1@gmail.com', 'Portfolio');   // От кого письмо 
	$mail->addAddress('kirillvestejn@gmail.com');     // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	//$mail->addReplyTo('info@example.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');
	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Данные';
	$mail->Body    = '
			Пользователь оставил данные <br> 
		Имя: ' . $name . ' <br>
		E-mail: ' . $email . '' <br>
		Сообщение: ' . $text . ';

	$mail->send();
	print_r('Message send');
} catch (\Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>