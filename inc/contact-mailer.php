<?php 

error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
		
		
		$contact_name = trim(filter_input(INPUT_POST,"contact-name", FILTER_SANITIZE_STRING));
		 $contact_email  = trim(filter_input(INPUT_POST,"contact-email", FILTER_SANITIZE_EMAIL));
		  $message  = trim(filter_input(INPUT_POST,"message", FILTER_SANITIZE_EMAIL));


	





$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 3;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'tonio.ae26@gmail.com';                 // SMTP username
		$mail->Password = 'D@tpiff0';                           // SMTP password
		$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
$mail->addAddress('devantonio.inq@gmail.com');     // Add a recipient    

		$mail->Subject = "";


 
$mail->setFrom($contact_email, $contact_name);
		         
		$mail->addReplyTo($contact_email, $contact_name);
		$mail->Body   = $message;




		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		//if ($subject == '') {$mail->Subject = 'INQUIRY';}
		        
		if ($_POST["address"] !== "") {echo("Bad input.");exit;}

		if ($mail->send()) {echo("Thank you <strong>$contact_name</strong> Your message has been sent.");}  

	}   catch (Exception $e) {
	        echo "Message could not be sent.";
        }



?>