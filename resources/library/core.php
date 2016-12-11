<?php

function dd($obj, $die = true){
    echo '<html><pre>';
    print_r($obj);
    echo '</pre></html>';
    if($die){
        die();
    }
}

function user_logged_in(){
	return (isset($_SESSION['id'])) ? true : false;
}
