<?php

print "<font face='verdana' size='1'>";

If (file_exists( "includes/counter/counter.txt" )){
	include_once "includes/counter/read.php";

	$count++;

	include_once "includes/counter/write.php";
} else {
	print "<font color='red'><b>Error</b>: Cannot find Counter Data File!</font>";
}

print "</font>";

?>