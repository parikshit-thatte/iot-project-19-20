<?php session_start(); ?>
<?php echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n"; ?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ip-project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }
    $username = $_SESSION['currentUser'];
    $sql = "select id from users where username='$username'";
    $result = $conn->query($sql);
    $r = $result->fetch_array();
    $user_id = $r['id'];

    $sql2 = "SELECT email FROM users WHERE username='$username'";
    $result2 = $conn->query($sql2);
      foreach ($result2 as $res3) {
      $email=$res3['email'];
      }
    $sql3= "UPDATE alerts SET mailsent=1 WHERE user_id=$user_id and reminder='House Rent'";
    $result3 = $conn->query($sql3);
    $conn->close();


    use PHPMailer\PHPMailer\PHPMailer;
      $body="Hii this is reminder mail very important";
      $subject="reminder mail success";
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
      $mail->Password="Johnsaitama1599!!";
      $mail->Port=587;
      $mail->SMTPSecure ="tls";
      $mail->Host = 'tls://smtp.gmail.com:587';
      $mail->isHTML(true);
      $mail->setFrom($email,$username);
      $mail->addAddress($email);
      $mail->Body = $body;
      $mail->Subject=$subject;
      // $mail->Body = $body;

      if($mail->send()){
        $response = "Email is send";
        $_SESSION['successMsg'] = "Response sent successfully";
        header("Location: http://localhost/ip-project-19-20/userDashboard.php#");
        // header("Location: contactus.php");
      }
      else {
        $response = "something is wrong <br><br>".$mail->ErrorInfo;
      }
      exit(json_encode(array("response"=>$response)));

?>
