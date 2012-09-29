<?php
	$file = "includes/counter/counter.txt";

	$open = fopen( $file, "w" );
	fwrite( $open, $count );
	fclose( $open );
?>