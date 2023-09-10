<?php

error_reporting( -1 );
ini_set( 'display_errors', 'On' );
set_error_handler( "var_dump" );

print_r( $_POST );

if ( isset( $_POST ) ) {
  $to = "matthewmammola@gmail.com"; // this is your Email address
  $from = $_POST[ 'email' ]; // this is the sender's Email address
  $first_name = $_POST[ 'first_name' ];
  $last_name = $_POST[ 'last_name' ];
  $subject = "Form submission";
  $subject2 = "Copy of your form submission";
  $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST[ 'message' ];
  $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST[ 'message' ];

  $headers = "From:" . $from;
  $headers2 = "From:" . $to;
  $success = mail( $to, $subject, $message, $headers );
  if ( !$success ) {
    $errorMessage = error_get_last()[ 'message' ];
    print_r( error_get_last() );
  } else {
    echo "\n\n Your message has been sent. Thank you " . $first_name . ", I'll receive your message shortly.";
  }

  // You can also use header('Location: thank_you.php'); to redirect to another page.
  // You cannot use header and echo together. It's one or the other.
} else {
  echo "Error occured - post submit not set";

}
?>
