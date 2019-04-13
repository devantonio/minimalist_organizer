<?php 




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
		$residential = trim(filter_input(INPUT_POST,"residential", FILTER_SANITIZE_STRING));
        $business    = trim(filter_input(INPUT_POST,"business", FILTER_SANITIZE_STRING));
        $paper   = trim(filter_input(INPUT_POST,"paper", FILTER_SANITIZE_EMAIL));
        $moving = trim(filter_input(INPUT_POST,"moving", FILTER_SANITIZE_SPECIAL_CHARS));

		$closet = trim(filter_input(INPUT_POST,"closet", FILTER_SANITIZE_STRING));
        $downsizing    = trim(filter_input(INPUT_POST,"downsizing", FILTER_SANITIZE_STRING));
        $home   = trim(filter_input(INPUT_POST,"home", FILTER_SANITIZE_EMAIL));
        $other = trim(filter_input(INPUT_POST,"other", FILTER_SANITIZE_SPECIAL_CHARS));

        $start = trim(filter_input(INPUT_POST,"start", FILTER_SANITIZE_STRING));
        $deadline    = trim(filter_input(INPUT_POST,"deadline", FILTER_SANITIZE_STRING));
        $files  = trim(filter_input(INPUT_POST,"files", FILTER_SANITIZE_EMAIL));
        $other_info = trim(filter_input(INPUT_POST,"other-info", FILTER_SANITIZE_SPECIAL_CHARS));

 		$name = trim(filter_input(INPUT_POST,"name", FILTER_SANITIZE_STRING));
        $phone    = trim(filter_input(INPUT_POST,"phone", FILTER_SANITIZE_STRING));
        $email  = trim(filter_input(INPUT_POST,"email", FILTER_SANITIZE_EMAIL));
        $city = trim(filter_input(INPUT_POST,"city", FILTER_SANITIZE_SPECIAL_CHARS));
		$state = trim(filter_input(INPUT_POST,"state", FILTER_SANITIZE_SPECIAL_CHARS));
		$zip = trim(filter_input(INPUT_POST,"zip", FILTER_SANITIZE_SPECIAL_CHARS));
		$subject = "HELLO";	



echo $email;


 



$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'tonio.ae26@gmail.com';                 // SMTP username
		$mail->Password = 'D@tpiff0';                           // SMTP password
		$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom($email, $name);
		$mail->addAddress('devantonio.inq@gmail.com');     // Add a recipient             
		$mail->addReplyTo($email, $name);                        // Set email format to HTML

		//$mail->Subject = $subject;
		$mail->Body    = $residential;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		//if ($subject == '') {$mail->Subject = 'INQUIRY';}
		        
		if ($_POST["address"] !== "") {echo("Bad input.");exit;}

		if ($mail->send()) {echo('<div><p>Thank you '  .'<span>'.$name.'!'.'</span>' . ' Your message has been sent.</p></div>');}  



		
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}





?>