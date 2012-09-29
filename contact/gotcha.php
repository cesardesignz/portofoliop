<?php
/*
 *  Modified for use in Mike's Contact Script Copyright (C) 2005  Mike Hanson (themike.com).
 */

/**
 * Project:     GOTCHA!: the PHP implementation of captcha.
 * File:        gotcha.php
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



class GotchaImage{
	var $handle;
	var $fonts;
	var $bg;
	var $types;
	var $type;
	function GotchaImage(){
		$this->handle = NULL;
		$this->fonts = array();
		$this->types = array( 'unknow'
						,'GIF'
						, 'JPG'
						, 'PNG'
						, 'SWF'
						, 'PSD'
						, 'BMP'
						, 'TIFF'
						, 'TIFF'
						, 'JPC'
						, 'JP2'
						, 'JPX'
						, 'JB2'
						, 'SWC'
						, 'IFF'
						, 'WBMP'
						, 'XBM');
	}
	function addFont($path){
		if(file_exists($path)){
			$this->fonts[] = realpath($path);
		}
	}
	function create($w, $h){
		return ($this->handle = @imagecreate($this->width = $w, $this->height = $h));
	}

	
	function applyText($text, $size, $depth=5){
        $c = @imagecolorallocate($this->handle, rand(0, 255), rand(0, 255), rand(0, 255));
        $this->bg = ($this->bg)? $this->bg : @imagecolorallocate($this->handle, rand(0, 255), rand(0, 255), rand(0, 255));
		$width = $this->width;
		$height = $this->height;
        $text = strtoupper($text);
		$num_fonts = count($this->fonts);
		if($num_fonts > 0){
			for($i = 0, $strlen = strlen($text), $p = floor(abs((($width-($size*$strlen))/2)-floor($size/2))); $i < $strlen; $i++, $p +=$size){
				$f = $this->fonts[rand(0, $num_fonts-1)];
				$d = rand(-45, 45);
				$y = rand(floor(($height-($size/2))/2)+floor($size/2), ($height-($size/2))-floor($size/2));
				for($b = 0; $b <= $depth; $b++){
					imagettftext($this->handle, $size, $d, $p++, $y++, $c, $f, $text{$i});
				}
				@imagettftext($this->handle, $size, $d, $p, $y, $this->bg, $f, $text{$i});
			}
		}
		else{
			imagestring ( $this->handle, $size, floor(abs(((($width/2)-($size*strlen($text)))/2))), floor(($height/2)-($size/2)), $text, $c );
		}
	}
	function fill($r=0, $g=0,  $b=0){
		for($i = 0, $rd=($r>0)? $r : rand(0, 100), $gr=($g>0)? $g : rand(0, 100), $bl=($b>0)? $b : rand(0, 100); $i <= $this->height; $i++){
			$g = @imagecolorallocate($this->handle, $rd+=2, $gr+=2, $bl+=2);
			@imageline($this->handle, 0, $i, $this->width, $i, $g);
		}
		$this->bg = $g;
	}
	function applyDots(){
		for($i = 0; $i < $this->width; $i++){
			imagesetpixel ( $this->handle, rand(0, $this->width), rand(0, $this->height), @imagecolorallocate($this->handle, rand(0, 255), rand(0, 255), rand(0, 255)) );
		}
	}
	function applyGrid($size=2){
		$size = rand($size, 10);
		for($i = 0, $x = 0, $z = $this->width; $i < $this->width; $i++, $z -= $size, $x+=$size){
			@imageline($this->handle, $x, 0, $x+10, $this->height, $this->bg);
			@imageline($this->handle, $z, 0, $z-10, $this->height, $this->bg);
		}
	}
	function render($quality = 100){
		header("Content-type: image/$this->type");
		@imageinterlace($this->handle, 1);
		@imagepng($this->handle, NULL, $quality);
		@imagedestroy($this->handle);
	}
}
class GotchaPng extends GotchaImage{
	function Ipng(){
		$this->GotchaImage();
		$this->type = $this->types[3];
	}
	function createFrom($src){
		return ($this->handle = @imagecreatefrompng($src));
	}
	function render($quality = 100){
		header("Content-type: image/$this->type");
		@imageinterlace($this->handle, 1);
		@imagepng($this->handle, NULL, $quality);
		@imagedestroy($this->handle);
	}
}
class GotchaJpeg extends GotchaImage{
	function Ijpeg(){
		$this->GotchaImage();
		$this->type = $this->types[2];
	}
	function createFrom($src){
		return ($this->handle = @imagecreatefromjpeg($src));
	}
	function render($quality = 100){
		header("Content-type: image/$this->type");
		@imageinterlace($this->handle, 1);
		@imagejpeg($this->handle, NULL, $quality);
		@imagedestroy($this->handle);
	}
}
class GotchaGif extends GotchaImage{
	function Igif(){
		$this->GotchaImage();
		$this->type = $this->types[1];
	}
	function createFrom($src){
		return ($this->handle = @imagecreatefromgif($src));
	}
	function render($quality = 100){
		header("Content-type: image/$this->type");
		@imageinterlace($this->handle, 1);
		@imagegif($this->handle, NULL, $quality);
		@imagedestroy($this->handle);
	}
}
?>
