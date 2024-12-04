<?php

  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace with your actual receiving email address
  $receiving_email_address = 'zacharydwaynejimmy@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  // Set up form data
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Optional SMTP setup, uncomment and fill in if needed
  /*
  $contact->smtp = array(
    'host' => 'smtp.example.com',
    'username' => 'your-email@example.com',
    'password' => 'your-email-password',
    'port' => '587'
  );
  */

  // Add message data
  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  // Send the email and handle success/failure
  if($contact->send()) {
    echo "Message sent successfully.";
  } else {
    echo "Message failed to send.";
  }

?>