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
<table width="760" align="center" border="0" summary="Sent Email">
    <colgroup span="2">
    <col width="125">
    <col>
    </colgroup>
    <tr>
    <td colspan="2"><div class="contactDescript" id="center">Thank you for your message!<br>
    <a href="<?php echo $scriptName; ?>">Please click here to go back.</a></div>
    </td>
    </tr>
    <tr>
    <td colspan="2"><p class="center"><strong>Here's a copy of your message.</strong></p></td>
    </tr>
    <tr><td valign="top"><div class="contactDescript">To:</span></td><td><span class="contactMessage"><?php echo str_replace( "\n", "<br>", $toName ); ?></div></td></tr>
    <tr><td><div class="contactDescript">From:</span></td><td><span class="contactMessage"><?php echo "\"$fromName\" &lt;$fromAddress&gt;"; ?></div></td></tr>
    <tr><td><div class="contactDescript">Subject:</span></td><td><span class="contactMessage"><?php echo "$subject"; ?></div></td></tr>
    <tr><td valign="top"><div class="contactDescript">Message:</span></td><td><span class="contactMessage"><?php echo str_replace( "\n", "<br>", $message ); ?></div></td></tr>
</table>
</div>
