<?php

// from swiftmailer documentation
require_once 'vendor/autoload.php';
require_once 'config/constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token)
{
	global $mailer;
	
	$body ='&lt;!DOCTYPE html&gt;
	&lt;html&gt;
	&lt;head&gt;
		&lt;meta charset=&quot;UTF-8&quot;&gt;
		&lt;title&gt;Verify Email&lt;/title&gt;
	&lt;/head&gt;

	&lt;body&gt;
		&lt;div class=&quot;wrapper&quot;&gt;
			&lt;p&gt;
				Thank you for signing up on our website. Please click on the link below to verify your email.
			&lt;/p&gt;
			
			&lt;a href=&quot;http://localhost:8081/zhang_kevin_project/index.php?token='. $token .'&quot;&gt;
				Verify your email address
			&lt;/a&gt;
		&lt;/div&gt;
	&lt;/body&gt;

	&lt;/html&gt;';
	
	
	// Create a message
	$message = (new Swift_Message('Verify you email address'))
	  ->setFrom(EMAIL)
	  ->setTo($userEmail)
	  ->setBody($body, 'text/html')
	  ;

	// Send the message
	$result = $mailer->send($message);
}

function sendPasswordEmail($userEmail, $token)
{
	// for resetting password
	// use same code as verifEmail, but w/ diff message
}

?>