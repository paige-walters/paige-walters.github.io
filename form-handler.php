<?php
  $firstName = $_POST['firstname'];
  $lastName = $_POST['lastname'];
  $visitor_email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];


	$email_from = 'paige.walters92@gmail.com';

	$email_subject = "Someone has contacted you, $subject";

	$email_body = "You have received a new message from the user $firstName $lastName.\n".
                            "Here is the message:\n $message".


    $to = "paige.walters92@gmail.com";

    $headers = "From: $email_from \r\n";

    $headers .= "Reply-To: $visitor_email \r\n";
                          
    mail($to,$email_subject,$email_body,$headers);

    function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
?>