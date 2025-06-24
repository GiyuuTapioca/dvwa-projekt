<?php

// The page we wish to display
$file = $_GET[ 'page' ];

// Input validation
if( !in_array($file, ['allowedfile1.php', 'allowedfile2.php'])) {
	// This isn't the page we want!
	die('Access Denied')
}

?>
