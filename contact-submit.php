<?php
// define variables and set to empty values
$nameErr = $emailErr = $messageErr = '';
$name = $email = $message = '';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo 'got to php body';
  $email_to = 'kevingao52997@gmail.com';
  $email_subject = 'New kevingao.live Contact Message';

  if (empty($_POST['name'])) {
    $nameErr = 'Name is required.';
  } else {
    $name = test_input($_POST['name']);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = 'Name can only contain letters and white spaces.'
    }
  }

  if (empty($_POST['email'])) {
    $nameErr = 'Email is required.';
  } else {
    $name = test_input($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = 'Invalid email.'
    }
  }

  if (empty($_POST['message'])) {
    $nameErr = 'Message is required.';
  } else {
    $name = test_input($_POST['message']);
  }
}

$email_message = "Form details below.\n\n";
$email_message .= "Name: " . clean_string($name) . "\n";
$email_message .= "Email: " . clean_string($email) . "\n";
$email_message .= "Message: " . clean_string($message) . "\n";

?>
