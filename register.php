<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	define('FILTER_FLAG_HOST_REQUIRED', 0x0002);
	require_once 'PHPMailer/PHPMailer.php';
	require_once 'PHPMailer/Exception.php';
	require_once 'PHPMailer/SMTP.php';
	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;

		// if(!isset($_SESSION['captcha'])){
		// 	require('recaptcha/src/autoload.php');		
		// 	$recaptcha = new \ReCaptcha\ReCaptcha('6LevO1IUAAAAAFCCiOHERRXjh3VrHa5oywciMKcw', new \ReCaptcha\RequestMethod\SocketPost());
		// 	$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		// 	if (!$resp->isSuccess()){
		//   		$_SESSION['error'] = 'Please answer recaptcha correctly';
		//   		header('location: signup.php');	
		//   		exit();	
		//   	}	
		//   	else{
		//   		$_SESSION['captcha'] = time() + (0);
		//   	}

		// }

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: signup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

					$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :code, :now)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>$code, 'now'=>$now]);
					$userid = $conn->lastInsertId();	
					$output = 
					"<h2>Thank you for Registering.</h2>
					<p>Your Account: ".$firstname." ".$lastname."</p>
					<p>Email: ".$email."</p>
					<p>Please click the link below to activate your account.</p>
					<a href='http://localhost/Afri-Tech-Eccomerce-Web/activate.php?code=".$code."&user=".$userid."'>Activate Account</a>";
					$message = $output;
					$mail = new PHPMailer(true);
					$mail->isSMTP();
					$mail->Host = 'smtp.gmail.com';
					$mail->SMTPAuth = true;
					$mail->Username = 'wd.concepts00@gmail.com';
					$mail->Password = 'hvtjpiucrkvhlelc';
					$mail->SMTPSecure = 'ssl';
					$mail->Port = 465;
					$mail->setFrom('wd.concepts00@gmail.com', 'afri');
					$mail->addAddress($email);
					$mail->isHTML(true);
					$mail->Subject = 'Afri-Tech Account Activation';
					$mail->Body = $message;
					if ($mail->send()) {
						unset($_SESSION['firstname']);
				        unset($_SESSION['lastname']);
				        unset($_SESSION['email']);

				        $_SESSION['success'] = 'Account created. Check your email to activate.';
				        header('location: signup.php');
					  } else {
						$_SESSION['error'] = 'Failed to send account activation email';
				  
					  }

				}

				$pdo->close();

			}

		}

	//}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}

?>
