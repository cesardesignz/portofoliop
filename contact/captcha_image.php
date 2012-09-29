<?php
/*
 *  Modified for use in Mike's Contact Script Copyright (C) 2005  Mike Hanson (themike.com).
 */

/**
 * Project:     GOTCHA!: the PHP implementation of captcha.
 * File:        gotcha_image.php
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * For questions, help, comments, discussion, etc., please write to: sol2ray at gmail dot com
 *
 * @link http://phpbtree.com/captcha/
 * @copyright 2003-2005 Smart Friend Network, Inc.
 * @author Sol Toure <sol2ray at gmail dot com>
 * @version alpha 0.01;
 */

error_reporting(E_ALL);
session_start();
//Please modify this file to match your environment.
// Set up our session
if( !isset($_SESSION['vaildSession']) || ($_SESSION['vaildSession'] != session_id()) ) {
    // Possibly a hijack attempt, kill off the session and inform the user to try again.
    echo "Sorry please try again from the main page.";
    session_unset();
    session_destroy();
    session_write_close();
    exit(0);
}

include_once('gotcha.php');

//Generate a random text.
//Feel free to replace this with a custom solution.
$t =  md5(uniqid(rand(), 1));

$CAPTCHA_SESSION_KEY = 'CAPTCHA';

//You can eliminate the above variable ($CAPTCHA_SESSION_KEY) and use 
// the key string literal directly below.

$_SESSION[$CAPTCHA_SESSION_KEY] =  $text = substr($t, rand(0, (strlen($t)-4)), rand(3,4));


$img = new GotchaJpeg();

// repeat the process for as much fonts as you want. Actually, the more the better.
// A font type will be randomly selected for each character in the text code.
$img->addFont('.ht_VeraSeBd.ttf', '.ht_VeraMoBd.ttf');

$image_width = 230;
$image_height = 60;
$font_size = 30;
$font_depth = 7; //this is the size of shadow behind the character creating the 3d effect.
//could not find a better name.
if($img->create($image_width, $image_height)){
	//The method call order:
	// fill() must be called first and render() last;
	//applyDots(), applayText, applayGrid may be optionaly called in any order
	// to acheive interesting results. 
	
	
	//fill the background color.
	$img->fill();
	//Add dots to the background
	$img->applyDots();
	//Add the text.
	$img->applyText($text, $font_size, $font_depth);
	//Apply the Grid.
	$img->applyGrid();
	//Add more dots
	$img->applyDots();
	//Output the image.
	$img->render();
}
?>
