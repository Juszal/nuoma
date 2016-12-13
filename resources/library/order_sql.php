<?php

function getExtras($dbc){
    $nav_query = 'SELECT * FROM Navigacijos';
    $nav_result = @mysqli_query($dbc, $nav_query);
    
    $ked_query = 'SELECT * FROM Kedutes';
    $ked_result = @mysqli_query($dbc, $ked_query);
    
    $result = array('nav_result' => $nav_result, 'ked_result' => $ked_result);
    
    return $result;
}

