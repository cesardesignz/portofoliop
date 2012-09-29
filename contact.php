<?php 
	/*******************************************************************************
	| Project Name: Contact  													|
	|    File Name: contact.php														|
	|  Description: a meter															|
	|-------------------------------------------------------------------------------|
	|               C O P Y R I G H T												|
	|------------------------------------------------------------------------------|
	|        Copyright (c) 2012 by César Silva A.K.A tHc     All rights reserved.	|
	|-------------------------------------------------------------------------------|
	|               A U T H O R   I D E N T I T Y									|
	|-------------------------------------------------------------------------------|
	| Initials   Name                 Contact                       Company			|
	| --------   ------------------   ---------------------------   ----------------|
	| CS         César Silva       contacto@cesarzdesignz.com        Gamming4Fun	|
	|-------------------------------------------------------------------------------|
	| Date         Ver   Author  Description										|
	| 13-08-12     1.0    CS     Starting Code...									|
	|*******************************************************************************|

  /* ========================= Begin Configuration ============================ */
	define("kContactEmail","your@email.com");
  /* ========================= End Configuration ============================== */

  // init variables
	$error_msg = 'The following fields were left empty or contain invalid information:<ul>';
	$error = false;

	// determine is the form was submitted
	$submit = $_POST['submit'];
	if (empty($submit)) 
		$form_submitted = false;
	else
	  $form_submitted = true;

  if ($form_submitted) {
	  // read out data
	  $name = $_POST['name'];
		$company = $_POST['company'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		
		// verify required data
		if(!$name) { $error_msg .= "<li>Full Name</li>"; $error = true; }
		if(!$email) { $error_msg .= "<li>E-mail Address</li>"; $error = true; }
		if(!$subject) { $error_msg .= "<li>Subject</li>"; $error = true; }
		if(!$message) { $error_msg .= "<li>Message</li>"; $error = true; }
		if($email) { if(!eregi("^[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$", $email)){ $error_msg .= "<li>E-mail Address</li>"; $error = true; }}
		$error_msg .= "</ul>";
		
		// email message if no errors occurred
		if (!$error) {
      // prepare message
			$msg  = "Full Name: \t $name \n";
			$msg .= "Company: \t $company \n";
			$msg .= "E-mail Address: \t $email \n";
			$msg .= "Phone Number: \t $phone \n";
			$msg .= "Message: \n---\n $message \n---\n";

			// prepare message header
			$mailheaders  = "MIME-Version: 1.0\r\n";
			$mailheaders .= "Content-type: text/plain; charset=iso-8859-1\r\n";
			$mailheaders .= "From: $name <$email>\r\n";
			$mailheaders .= "Reply-To: $name <$email>\r\n"; 

		  // send out email
			mail(kContactEmail, $subject ,stripslashes($msg), $mailheaders);
		}
	} 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="author" content="Feaser">
<meta name="expires" content="NEVER">
<meta name="publisher" content="Feaser">
<meta name="copyright" content="Feaser">
<meta name="page-topic" content="Computer/Software/Internet">
<meta name="keywords" content="inexpensive small business web design, professional web site design company">
<meta name="description" content="inexpensive small business web design, professional web site design company">
<meta name="page-type" content="Commercial Organisation">
<meta name="audience" content="Professionals">
<meta name="robots" content="INDEX,FOLLOW">
<title>Contact Us</title>
<style type="text/css">
<!--
	td.form         { color: #606060; font-family: "Verdana","Arial"; font-size: 11; }
	td.main         { color: #000000; font-family: "Verdana","Arial"; font-size: 12; }
	font.form_check {	color: red; }
	input           { font-family: "Verdana","Arial"; color:#606060; font-size: 11px; }
	textarea        { font-family: "Verdana","Arial"; color:#606060; font-size: 11px; }
	div#form_box    { margin: 2px; width: 615px; border: 1px; border-style: solid; border-color: #606060; background: #f8f8f8; padding: 5px; }
	h1              { font-size:16; color: #606060; }
-->
</style>
</head>
<body>
<!-- box around the page -->
<div id="form_box"> 
<table border="0" width="100%" cellpadding="5" cellspacing="0" height="470">
	<tr>
		<td class="main" valign="top">
			<!-- page heading-->
			<h1>Contact Us</h1>
			<?php
				// email was successfully send
				if (($form_submitted) && (!$error)) {
			?>
			<!-- display submitted data -->
			Thank you for your feedback, <?php echo $name; ?>.
			This is the information you submitted:<br><br><?php echo nl2br(stripslashes($msg)); ?>
			<?php	
				}
				// display contact form
				else {
					// display error message
					if ($error) {	
						echo "<font class='form_check'>" . $error_msg . "</font>\n";
					} 
			?>
			<!-- display form information -->
			Please fill out and submit the form on this page to contact us. We will get back to you 
			as soon as we can. Note that fields marked with (<font class="form_check">*</font>) are 
			required fields.
			<!-- display form -->
			<form action="<?php echo $PHP_SELF; ?>" method="post" name="contact">
			<table border="0" width="100%" cellspacing="5" cellpadding="0">
				<tr>
					<td class="form" width="50%">
						Full Name (<font class="form_check">*</font>)<br>
						<input name="name" type="text" value="<?php echo $name ?>" size="40">
					</td>
					<td class="form">
						Company<br>
						<input name="company" type="text" value="<?php echo $company ?>" size="40">
					</td>
				</tr>
			</table>
			<table border="0" width="100%" cellspacing="5" cellpadding="0">
				<tr>
					<td class="form" width="50%">
						E-mail Address (<font class="form_check">*</font>)<br>
						<input name="email" type="text" value="<?php echo $email ?>" size="40">
					</td>
					<td class="form">
						Phone Number<br>
						<input name="phone" type="text" value="<?php echo $phone ?>" size="40">
					</td>
				</tr>
			</table>
			<table border="0" width="100%" cellpacing="5" cellpadding="0">
				<tr>
					<td class="form" width="50%">
						Subject (<font class="form_check">*</font>)<br>
						<input name="subject" type="text" value="<?php echo $subject ?>" size="89">
					</td>
				</tr>
			</table>
			<table border="0" width="100%" cellspacing="5" cellpadding="0">
				<tr>
					<td class="form">
						Message (<font class="form_check">*</font>)<br>
						<textarea name="message" cols="88" rows="12"><?php echo $message ?></textarea>
					</td>
				</tr>
			</table>
			<table border="0" width="100%" cellspacing="5" cellpadding="0">
				<tr>
					<td class="form">
						<input name="submit" type="submit" value="Send Message">
					</td>
				</tr>
			</table>
			</form>
			<?php
				}
			?>
		</td>
	</tr>
</table>
</div>
</body>
</html>
