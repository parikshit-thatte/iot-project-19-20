<?php echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n"; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
    if (isset($_POST['name'])&&isset($_POST['email'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $subject=$_POST['subject'];
      $body=$_POST['body'];
      require_once "PHPMailer/PHPMailer.php";
      require_once "PHPMailer/SMTP.php";
      require_once "PHPMailer/Exception.php";
      require_once "PHPMailer/OAuth.php";
      require_once "PHPMailer/POP3.php";

      $mail = new PHPMailer();

      //SMTP iis_set_app_settings

      $mail->isSMTP();
      $mail->HOST = "smtp.gmail.com";
      $mail->SMTPAuth = true;
      $mail->Username = "jokerhardy1234@gmail.com";
      $mail->Password="Jokerhardy1599";
      $mail->Port=587;
      $mail->SMTPSecure ="tls";
      $mail->Host = 'tls://smtp.gmail.com:587';
      $mail->isHTML(true);
      $mail->setFrom($email,$name);
      $mail->addAddress("shindetejas15081999@gmail.com");
      $mail->Subject=$subject;
      $mail->Body = $body;

      if($mail->send()){
        $response = "Email is send";
        header("Location: landingPage.php");
      }
      else {
        $response = "something is wrong <br><br>".$mail->ErrorInfo;
      }
      exit(json_encode(array("response"=>$response)));
    }
?>
