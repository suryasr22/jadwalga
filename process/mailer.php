<?php
	//PHPMailer
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/autoload.php';

	//Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
	    $mail->isSMTP();                                            // Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                    	// Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'sys.ga.mailer@gmail.com';              // SMTP username
	    $mail->Password   = 'kromosomjadwal55';                     // SMTP password
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
	    $mail->Port       = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('sys.ga.mailer@gmail.com', 'Mailer Penjadwalan Dosen');
	    $mail->addAddress('pukyu.sunofbeach@gmail.com');     		// Add a recipient
	    $mail->addAddress('surya.sahri@student.unri.ac.id');        // Name is optional

	    // Content
	    $mail->isHTML(true);                                  		// Set email format to HTML
	    $mail->Subject = 'Masa Pengisian Data Dosen';
	    $mail->Body    = 'Diberitahukan kepada seluruh dosen prodi Teknik Informatika untuk mengisi data
	    					pada website penjadwalan dikarenakan telah masuk masa pengisian data dosen';

	    $mail->send();
	    echo 'Message has been sent';
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
?>