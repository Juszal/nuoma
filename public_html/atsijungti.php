<?php
	session_start();
	
	session_destroy();
	
	header ('Location: http://localhost/nuoma/public_html/index.php');
?>