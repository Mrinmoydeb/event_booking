<?php
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once '/path/to/vendor/autoload.php';
    use Twilio\Rest\Client;
    $sid    = "AC5f7b28815fcc88aeadea47b47c72d550";
    $token  = "07beeed28eec98f7bbb8cb8981348b74";
    $twilio = new Client($sid, $token);
    $message = $twilio->messages
      ->create("+18777804236", // to
        array(
          "from" => "+19497795417",
          "body" => "hello"
        )
      );
print($message->sid);
?>
