<?php
/*
 * Mike's Contact Script - A web based contact form.
 * Copyright (C) 2005  Mike Hanson (themike.com)
 *
 * This file is part of Mike's Contact Script.
 *
 * Mike's Contact Script is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Mike's Contact Script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Mike's Contact Script; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */
 
/*
 * Version: 1.1.0
 * Last Updated: 10/3/2005
 *
 * Mike's Contact Script - http://programs.themike.com/
 *
 *  (I write to you, dear children,
 *      because your sins have been forgiven on account of his name.)
 *                                                      1 John 2:12
 */
 
// Import our constants 
require('constants.php');

/* Error messages */
$error_messages = array(
    // The subject was to long.
    'overSubject'   => array( false, "<span class=\"error\">**Sorry, your subject was to long. Please shorten it to under $maxSubject characters.</span><br>"),
    // The message was to long.
    'overMessage'   => array( false, "<span class=\"error\">**Sorry, your message was to long. Please shorten it to under $maxMessage characters.</span><br>"),
    // The name was to long.
    'overName'      => array( false, "<span class=\"error\">**Sorry, your Name was to long. Please shorten it to under $maxName characters.</span><br>"),
    // The address was to long.
    'overAdress'    => array( false, "<span class=\"error\">**Sorry, your message was to long. Please shorten it to under $maxAddress characters.</span><br>"),
    // The address was wrong or possible dosn't work.
    'badAddress'    => array( false, "<span class=\"error\">**Please enter a <strong>valid email address.</strong></span><br>"),
    // There was no message entered.
    'noMessage'     => array( false, "<span class=\"error\">**Please enter a <strong>message.</strong></span><br>"),
    // There was no to address selected.
    'noTo'          => array( false, "<span class=\"error\">**Please select a recipient in the <strong>To</strong> field.</span><br>"),
    // The user screwed up to many times, bad user no cookie!
    'toManyErrors'  => array( false, "<span class=\"error\">Sorry you made to many errors. Please try again later.</span><br>"),
    // The user entered the wrong code.
    'badCode'       => array( false, "<span class=\"error\">**Sorry, the <strong>code</strong> you entered was wrong.  Please enter the <strong>correct code.</strong></span><br>")
);

session_start();
header("Cache-control: private"); // For lovely IE 6

// Set up our session
if( !isset($_SESSION['vaildSession']) ) {
    session_regenerate_id();
    $_SESSION['vaildSession'] = session_id();
    $_SESSION['numTries'] = 0;
} else if ($_SESSION['vaildSession'] != session_id()) {
    // Possibly a hijack attempt, kill off the session and inform the user to try again.
    echo "Sorry please try again from the main page.";
    session_unset();
    session_destroy();
	session_write_close();
	exit(0);
}

// We'll use whatever CAPTCHA that the user picked
if ( $captcha == 1 ) { // Use freecap
    // From freecap v1.4.  Set up the freecap session variables.
    if(!empty($_SESSION['freecap_word_hash']) && !empty($_POST['word'])) {
        if($_SESSION['hash_func'](strtolower($_POST['word']))==$_SESSION['freecap_word_hash']) {
            $_SESSION['freecap_attempts'] = 0;
            $_SESSION['freecap_word_hash'] = false;
            $word_ok = true;
        } else {
            $word_ok = false;
        }
    }
} else if ( $captcha == 2 ) { // Use gotcha
    if(isset($_POST['code'])){
        // From GOTCHA 0.01
        $text = isset($_SESSION['CAPTCHA'])? $_SESSION['CAPTCHA'] : NULL;
        
        if(!$p = trim($_POST['code'])){
            $word_ok = false;
        }
        else if((strtolower($p)) != ($c = strtolower($text))){
            $word_ok = false;
        }
        else{
            $word_ok = true;
        }
        $_SESSION['CAPTCHA'] = NULL;
    }
} else { // Use nothing
    $word_ok = true;
}

// Include the header file
require(dirname(__FILE__) . "/templates/header.php");

if( isset($_POST['submitted']) ) {
    // Assume the message should be sent.  We will find reasons not to send it.
    $sendMessage = true;

    /* Preform several checks on the message to be sent. */
	// Check for subject overflow
	if ( strlen($_POST['subject']) > $maxSubject ) {
        $error_messages['overSubject'][0] = true;
        $sendMessage = false;
	}
    // Check for message overflow
    if ( strlen($_POST['message']) > $maxMessage ) {
        $error_messages['overMessage'][0] = true;
        $sendMessage = false;
	} else if ( strlen($_POST['message']) <= 0 ) { // Check for no message
        $error_messages['noMessage'][0] = true;
        $sendMessage = false;
	}
    // Check for from name overflow
    if ( strlen($_POST['fromName']) > $maxName ) {
        $error_messages['overName'][0] = true;
        $sendMessage = false;
	}
    // Check for from address overflow
    if ( strlen($_POST['fromAddress']) > $maxAddress ) {
        $error_messages['overAddress'][0] = true;
        $sendMessage = false;
	}
	
	// Check for a valid email address.
	//   Regexp modified from http://www.developer.com/lang/php/article.php/10941_3290141_2
	//   Original regexp did not take into account .travel and .museum tld's.
	$regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,6})$";
	// Get the hostname.
	$fromHost = explode("@", $_POST['fromAddress']);
    // Test for both valid syntax and a valid server.
	if ( !eregi($regexp, $_POST['fromAddress']) || !checkdnsrr($fromHost[1], "MX") ) {
        $error_messages['badAddress'][0] = true;
        $sendMessage = false;
	}
	
 	// Check for a TO selection
	$to = $_POST['to'];
	// Trust no input, Make sure that the to field is numeric
	for ( $i=0; $i<count($to) ; ++$i ) {
        if ( !is_numeric(trim($to[$i])) ) {
            $error_messages['noTo'][0] = true;
            $sendMessage = false;
            break;
        }
	}
    if ( count($to) <= 0 ) { // Nothing was selected
        $error_messages['noTo'][0] = true;
        $sendMessage = false;
    } else if ( (count($to) == 1) && ($to[0] == 0) ) { // Only the default was selected
        $error_messages['noTo'][0] = true;
        $sendMessage = false;
    }

	// Check for a valid code
    if($word_ok == false) {
        $error_messages['badCode'][0] = true;
		$sendMessage = false;
    }
	
	// Looks good, send the message.
    if ( $sendMessage == true ) {
        /* Ok they have passed everything, prepair to send the message */
    	// Get the form data, being a little anal here by trimming off to the maximum lengths.
    	$subject 		= trim(substr( $_POST['subject'], 0, $maxSubject ));
    	$message 		= trim(substr( $_POST['message'], 0, $maxMessage ));
    	$fromName 		= trim(substr( $_POST['fromName'], 0, $maxName ));
    	$fromAddress	= trim(substr( $_POST['fromAddress'], 0, $maxAddress ));

        /* Now for a little security, ensure that no extra headers are injected into the email. */
        // Characters not allowed are the carriage return or new line.
        $badChars = array("\r", "\n");
        // Turn them into *'s, sort of a warning flag for those that recieve the message.
        $subject = str_replace($badChars, "*", $subject);
        $fromName = str_replace($badChars, "*", $fromName);
        $fromAddress = str_replace($badChars, "*", $fromAddress);
        // We don't need to do the message body because it's supposed to have new lines in it.

        // Time to select the email addresses to send to.
        for ($i=0; $i<count($to); ++$i) {
            // Get our emails file.
            require(dirname(__FILE__) . "/emails.php");

        	// Put the email addresses into the correct format.
        	//   Add a comma if there is more than one email address
        	//   e.g. "Name" <email@example.com>, "Name2" <email2@example.com>
        	if( (count($to)>1) && (($i+1)<count($to)) && ($to[$i]!=0) ) {
                $sendTo .= ", ";
                $toName .= ",\n";
        	}
        	
        } // end for
    	
        // Remove formatting added by magic quotes
        $fromName = stripslashes($fromName);

    	// Write our headers.
    	$headers  = "From: $fromName\r\n";
        $headers .= "     <$fromAddress>\r\n";
    	$headers .= "Reply-To: $fromName\r\n";
        $headers .= "     <$fromAddress>\r\n\r\n";
        
        // make sure all lines end with a CRLF because rfc2822 says so...
        $message = str_replace("\n", "\r\n", $message);

    	// Tack on some explanation of where the email came from.
    	$subject = "Message from $siteName: $subject\r\n";
    	$time = date("M jS, Y \a\\t g:i A");
    	$senderIP = $_SERVER['REMOTE_ADDR'];
    	// This is the signature attached to each message:
    	$message .= "\n--------------------------------------------------\r\n";
    	$message .= "This message was sent by $fromAddress\r\n";
    	$message .= "on $time from $siteName.\r\n";
    	$message .= "Sender IP address: $senderIP\r\n";
    	$message .= "--------------------------------------------------\r\n";

        // Run through the message and make sure there are no lines longer than 70 chars
        //   "Each line should be separated with a LF (\n). Lines should not be larger than 70 characters."
        //   http://us2.php.net/manual/en/function.mail.php
        $subject = wordwrap($subject, 70, "\r\n", 1);
        $message = wordwrap($message, 70, "\r\n", 1);
        // The headers are already broken down as much as I feel comfortable right now.

        // Remove formatting added by magic quotes
        $subject = stripslashes($subject);
        $message = stripslashes($message);

    	// Send the message.
   		mail( $sendTo, $subject, $message, $headers );
   		
        // Show the user what we've sent, include the sent template.
        require(dirname(__FILE__) . "/templates/sent.php");

        // Clean up!
        session_unset();
		session_destroy();
		session_write_close();
		
    } else { // There was an error somewhere
        $_SESSION['numTries']++;

        // To many tries!
        if ( $_SESSION['numTries'] >= $maxAttempts ) {
            echo "<div class=\"contactForm\">";
            echo $error_messages['toManyErrors'][1];
            echo "</div>";
    		session_destroy();
    		session_write_close();
    		exit(0);
        } else { // The user has more tries, give a hint and continue.
        
            // Print out each mistake the user made.
            echo "<div class=\"contactForm\">";
            foreach ( $error_messages as $v ) {
                if ($v[0] == true) {
                    echo $v[1]; // Print out the error.
                }
            }
            echo "</div>";

            // Remove formatting added by magic quotes
            $_POST['fromName'] = stripslashes($_POST['fromName']);
            $_POST['fromAddress'] = stripslashes($_POST['fromAddress']);
            $_POST['subject'] = stripslashes($_POST['subject']);
            $_POST['message'] = stripslashes($_POST['message']);
            
            // Stop special characters from messing up our form.
            $_POST['fromName']= htmlspecialchars($_POST['fromName'], ENT_QUOTES);
            $_POST['fromAddress']= htmlspecialchars($_POST['fromAddress'], ENT_QUOTES);
            $_POST['subject']= htmlspecialchars($_POST['subject'], ENT_QUOTES);
            $_POST['message']= htmlspecialchars($_POST['message'], ENT_QUOTES);
        }

        // Now print the form again.
        require(dirname(__FILE__) . "/templates/form.php");
    }
} else {
    // Print out the form for the first time.
    require(dirname(__FILE__) . "/templates/form.php");
}

// Include the footer file.
require(dirname(__FILE__) . "/templates/footer.php");
?>
