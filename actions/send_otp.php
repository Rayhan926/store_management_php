
  <?php
  
  
  require_once '../vendor/autoload.php';
  require_once '../config/auth.php';

  if (isset($_POST["otp_title1"]) && isset($_POST["otp_title2"]) && isset($_POST["otp_email_is"]) && isset($_POST["otp_code"])) {


    $otp_title1 = $_POST["otp_title1"];
    $otp_title2 = $_POST["otp_title2"];
    $otp_email_is = $_POST["otp_email_is"];
    $otp_code = $_POST["otp_code"];
    
  

    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
      ->setUsername(EMAIL)
      ->setPassword(PASSWORD)
    ;

      // Create the Mailer using your created Transport
      $mailer = new Swift_Mailer($transport);

      // Create a message
      $message = (new Swift_Message($otp_title1))
        ->setFrom([EMAIL  => $otp_title2])
        ->setTo([$otp_email_is])
        ->setBody($otp_code)
        ;

      // Send the message
      $result = $mailer->send($message);
      if ($result == true) {
        echo "yes";
      }else{
        echo "no";
      }

  }
  
  ?>
