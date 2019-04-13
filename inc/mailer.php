<?php 

error_reporting(0);

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
        $other1 = trim(filter_input(INPUT_POST,"other1", FILTER_SANITIZE_SPECIAL_CHARS));

        $start = trim(filter_input(INPUT_POST,"start", FILTER_SANITIZE_STRING));
        $deadline    = trim(filter_input(INPUT_POST,"deadline", FILTER_SANITIZE_STRING));

	    // $files_tmp_name = $_FILES['files']['tmp_name'];
	    // $files = $_FILES['files']['name']; 
	    // $fileSize = $_FILES['files']['size'];
     //    $file_error = $_FILES['files']['error'];
        
        $other_info = trim(filter_input(INPUT_POST,"other-info", FILTER_SANITIZE_SPECIAL_CHARS));
 		$name = trim(filter_input(INPUT_POST,"name", FILTER_SANITIZE_STRING));
        $phone    = trim(filter_input(INPUT_POST,"phone", FILTER_SANITIZE_STRING));
        $email  = trim(filter_input(INPUT_POST,"email", FILTER_SANITIZE_EMAIL));
        $city = trim(filter_input(INPUT_POST,"city", FILTER_SANITIZE_SPECIAL_CHARS));
		$state = trim(filter_input(INPUT_POST,"state", FILTER_SANITIZE_SPECIAL_CHARS));
		$zip = trim(filter_input(INPUT_POST,"zip", FILTER_SANITIZE_SPECIAL_CHARS));
		
	


		$checkbox_input = array($residential, $business, $paper, $moving, $closet, $downsizing, $home, $other);





		$i=0;
		while($i<sizeof($checkbox_input) + 2 ) {
			$i++;
			if (empty($checkbox_input[$i])) {
			   unset($checkbox_input[$i]);
		    }
		}






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
		                        // Set email format to HTML

    
 // $file_error_msg;
 //        switch ($file_error) {
 //            case 1:
 //                $file_error_msg = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
 //                break;
 //            case 2:
 //                $file_error_msg = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
 //                break;
 //            case 3:
 //                $file_error_msg = "The uploaded file was only partially uploaded";
 //                break;
 //            case 4:
 //                $file_error_msg = "No file was uploaded";
 //                break;
 //            case 5:
 //                $file_error_msg = "Missing a temporary folder";
 //                break;
 //            case 6:
 //                $file_error_msg = "Failed to write file to disk";
 //                break;
 //            case 7:
 //                $file_error_msg = "File upload stopped by extension";
 //                break;

 //            default:
 //                $file_error_msg = "Unknown upload error";
 //                break;
 //        }
    


// if(!empty($files)) {
//     $mail->AddAttachment($files_tmp_name, $files);
// } 
		$mail->Subject = "";

		


 
$mail->setFrom($email, $name);
		         
		$mail->addReplyTo($email, $name);
		$mail->Body   .= nl2br(
						"<h3 style='color: crimson' >Questionaire</h3>
						<strong>I need assistance with?:</strong>
						" . implode($checkbox_input,"<br>") . "

						<strong>Other assistance:</strong> $other1

						<strong>I would like to start:</strong> $start

						<strong>Do you have a deadline:</strong> $deadline

						<strong>Other info you would like to share:</strong> $other_info

						<strong>Contact info:</strong> 
						$name
						$email
						$phone
						$city, $state $zip
						");
	

			


		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		//if ($subject == '') {$mail->Subject = 'INQUIRY';}
		        
		if ($_POST["address"] !== "") {echo("Bad input.");exit;}

		if ($mail->send()) {echo("Thank you <strong>$name</strong> Your message has been sent.");}  

	}   catch (Exception $e) {
	        echo "Message could not be sent.";
        }



?>