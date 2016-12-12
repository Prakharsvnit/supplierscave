<?php

// grab recaptcha library
require_once "recaptchalib.php";

// your secret key
$secret = "6Lenfg4UAAAAABFjmmqWuv-o6xIoG5fZf_gQb3Ix";

// empty response
$response = null;

// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success) {
    echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting the form!";
  } else
  {
    echo "no";
  }
?>
