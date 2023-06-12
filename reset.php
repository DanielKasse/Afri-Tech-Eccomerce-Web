<?php use PHPMailer\PHPMailer\PHPMailer; ?>
<?php
define('FILTER_FLAG_HOST_REQUIRED', 0x0002);
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/SMTP.php';

if (isset($_POST['reset'])) {
  $email = $_POST['email'];
include 'includes/session.php';
  $conn = $pdo->open();

  $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
  $stmt->execute(['email' => $email]);
  $row = $stmt->fetch();

  if ($row['numrows'] > 0) {
    // Generate code
    $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = substr(str_shuffle($set), 0, 15);

    $stmt = $conn->prepare("UPDATE users SET reset_code=:code WHERE id=:id");
    $stmt->execute(['code' => $code, 'id' => $row['id']]);

    $message = "
      <h2>Password Reset</h2>
      <p>Your Account:</p>
      <p>Email: " . $email . "</p>
      <p>Please click the link below to reset your password.</p>
      <a href='http://localhost/Afri-Tech-Eccomerce-Web/password_reset.php?code=" . $code . "&user=" . $row['id'] . "'>Reset Password</a>
    ";

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
    $mail->Subject = 'Afri-Tech Password Reset';
    $mail->Body = $message;

    if ($mail->send()) {
      $_SESSION['success'] = 'Password reset link sent';
    } else {
      $_SESSION['error'] = 'Failed to send password reset email';

    }
  }

  $pdo->close();
  header('location: password_forgot.php');
}
?>