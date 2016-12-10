<?php

function dd($obj, $die = true){
    echo '<html><pre>';
    print_r($obj);
    echo '</pre></html>';
    if($die){
        die();
    }
}