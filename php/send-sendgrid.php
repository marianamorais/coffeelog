<?php

require("./sendgrid-php/sendgrid-php.php");

$email_site = "marianamorais.dev@gmail.com";
$name_site = "Coffeelog";

$email_user = $_POST["email"];
$name_user = $_POST["name"];

$body_content = "";
foreach( $_POST as $field => $value) {
  if( $field !== "leaveblank" && $field !== "dontchange" && $field !== "send") {
    $sanitize_value = filter_var($value, FILTER_SANITIZE_STRING);
    $body_content .= "$field: $value \n";
  }
}

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom($email_site, $name_site);
$email->addTo($email_site, $name_site);

$email->setReplyTo($email_user, $name_user);

$email->setSubject("Form Coffeelog");
$email->addContent("text/plain", $body_content);

$sendgrid = new \SendGrid("");
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo "Caught exception: ". $e->getMessage() ."\n";
}