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
 ?>
<div class="contactForm">
<form name="email" method="post" action="index.php">
<table width="760" align="center" summary="Contact Form">
<colgroup span="2">
<col width="125">
<col></colgroup>
<tr>
<td>
<div class="contactDescript">Your Name:</div>
</td>
<td><input name="fromName" type="text" size="92" maxlength="<?php echo $maxName; ?>" value="<?php if(isset($_POST['fromName'])) { echo $_POST['fromName']; } ?>"></td>
</tr>
<tr>
<td>
<div class="contactDescript">*E-mail Address:</div>
</td>
<td><input name="fromAddress" type="text" size="92" maxlength="<?php echo $maxAddress; ?>" value="<?php if(isset($_POST['fromAddress'])) { echo $_POST['fromAddress']; } ?>"></td>
</tr>
<tr>
<td valign="top"><div class="contactDescript">*Send To:</div></td>
<td>
<?php
require('formSelection.php');
?>
</td>
</tr>
<tr>
<td><div class="contactDescript">Subject:</div></td>
<td><input name="subject" type="text" size="92" maxlength="<?php echo $maxSubject; ?>" value="<?php if(isset($_POST['subject'])) { echo $_POST['subject']; } ?>"></td>
</tr>
<tr>
<td valign="top"><div class="contactDescript">*Message:</div></td>
<td><textarea name="message" rows="15" cols="70" wrap="off"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea></td>
</tr>
<?php if ( $captcha == 1 ) { // Use Freecap ?>
<tr>
<td>&nbsp;</td>
<td><img src="freecap14.php" id="freecap" height="90" alt="CAPTCHA image">
<br><div class="contactFinePrint">If you can't read the word, <a href="#" onClick="this.blur();new_freecap();return false;">click here</a> to get a new one.</div></td>
</tr>
<tr>
<td><div class="contactDescript">*Code Above:</div></td>
<td><input type="text" name="word" size="10" maxlength="10"></td>
</tr>
<?php } else if ( $captcha == 2 ) { // Use GOTCHA ?>
<tr>
<td>&nbsp;</td>
<td><img src="captcha_image.php" id="gotcha-captcha" style="width: 230px; height: 60px" alt="CAPTCHA image">
<br><div class="contactFinePrint">If you can't read the image text <a href="#" onClick="document.getElementById('gotcha-captcha').src +='?'+ Math.round(Math.random()*100000); return false;" name="reload-captcha">click here</a> to load another one. </div></td>
</tr>
<tr>
<td><div class="contactDescript">*Code Above:</div></td>
<td><input type="text" name="code" id="code" size="10" maxlength="10"></td>
</tr>
<?php } // Use nothing ?>
<tr>
<td>&nbsp;</td>
<td><input type="hidden" name="submitted" value="1"><input type="submit" name="send" value="Send E-mail"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
<div class="contactDescript" id="left">* Indicates a Required
field.</div>
</td>
</tr>
<tr>
<td colspan="2">
<div class="contactCopyright">Powered by <a href=
"http://programs.themike.com/">Mike's Contact Script</a> &#169;
2005</div>
<?php
/*
 *  This function determines if the user selected an email address the last time
 *      they tried to submit the form.
 *
 *  $num - The number or option that you wish to check.
 *
 *  Post-conditions: Will echo "selected" if the email address was selected by the user.
 *
 */
function checkSelected($num) {

    if( isset($_POST['to']) ) {
        $to = $_POST['to'];

        // Loop through each of the values in the $to array, if one of them matches
        //  our $num we can quit looking.
        for ($i=0; $i<count($to); ++$i) {
            if ( $to[$i] == $num ) {
                echo "selected";
                return;
            }
        }
    } else if ( $num == 0 ) {
        // By default the 0 option should be selected.
        echo "selected";
        return;
    }
}
?>
