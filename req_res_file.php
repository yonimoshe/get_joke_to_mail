<?php require_once("session.php") ?>
<?php require_once("functions.php"); ?>
<?php require_once("validtion_functions.php"); ?>

<?php
         if (isset($_POST["submit"])) {
            $Email = $_POST["Email"];
            $box = $_POST["box"];
                //valdtion
                $require_empty_fields = array("Email","box");
                check_empty_fields($require_empty_fields);

                if(!empty($errorAry)) {
                  $_SESSION["error"] = $errorAry;
                  redirect("index.php");
                }else {
                  require("sendgrid-php/sendgrid-php.php");
                  $api_key = "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";
                  $email = new \SendGrid\Mail\Mail();
                  $email->setFrom("test@example.com", "yoni");
                  $email->setSubject("Test1234");
                  $email->addTo( $Email, "yoni");
                  $email->addContent("text/plain", $box);
                  $email->addContent(
                      "text/html", "<strong>\"$box\"</strong>"
                  );
                  $sendgrid = new \SendGrid($api_key);
                  try {
                      $response = $sendgrid->send($email);
                      print $response->statusCode() . "\n";
                      if ($response->statusCode() == 202) {
                        $_SESSION["msg"] = "The joke was sent successfully!";
                      }
                      print_r($response->headers());
                      print $response->body() . "\n";
                  } catch (Exception $e) {
                      echo 'Caught exception: '. $e->getMessage() ."\n";
                  }
                  redirect('index.php');
                }


          }else {
           redirect('index.php');
          }
?>
