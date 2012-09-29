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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo $siteName; ?> - Contact Us</title>
<meta http-equiv="Content-Type" content=
"text/html; charset=us-ascii">
<link rel="stylesheet" type="text/css" href=
"templates/contactForm.css">
<script type="text/javascript">
<!--
// From freecap v1.4 creates a new captcha image.
function new_freecap() {
        // loads new freeCap image
        if(document.getElementById) {
                // extract image name from image source (i.e. cut off ?randomness)
                thesrc = document.getElementById("freecap").src;
                thesrc = thesrc.substring(0,thesrc.lastIndexOf(".")+4);
                // add ?(random) to prevent browser/isp caching
                document.getElementById("freecap").src = thesrc+"?"+Math.round(Math.random()*100000);
        } else {
                alert("Sorry, cannot autoreload freeCap image\nSubmit the form and a new freeCap will be loaded");
        }
}
//-->
</script>
</head>
<body>
<table width="100%" summary="">
<tr>
<td>
<table width="80%" class="mainLayout" summary="">
<tr>
<td>
<div class="contactForm"><span class="header"><?php echo $siteName; ?> - Contact
Us</span></div>
