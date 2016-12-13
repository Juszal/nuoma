<?php

function getExtras($dbc){
    $nav_query = 'SELECT * FROM Navigacijos';
    $nav_result = @mysqli_query($dbc, $nav_query);
    
    $ked_query = 'SELECT * FROM Kedutes';
    $ked_result = @mysqli_query($dbc, $ked_query);
    
    $result = array('nav_result' => $nav_result, 'ked_result' => $ked_result);
    
    return $result;
}

function addNavigacija($dbc, $navPost){
    $pavadinimas = mysqli_real_escape_string($dbc, $navPost['pavadinimas']);
    $zemelapio_metai = mysqli_real_escape_string($dbc, $navPost['zemelapio_metai']);
    $istrizaine = mysqli_real_escape_string($dbc, $navPost['istrizaine']);
    $vidine_atmintis = mysqli_real_escape_string($dbc, $navPost['vidine_atmintis']);
    $bluetooth = mysqli_real_escape_string($dbc, $navPost['bluetooth']);
    $isigyjimo_kaina = mysqli_real_escape_string($dbc, $navPost['isigyjimo_kaina']);
    $komentarai = mysqli_real_escape_string($dbc, $navPost['komentarai']);
        
    $query = "INSERT INTO Navigacijos(pavadinimas, zemelapio_metai, istrizaine,
                                vidine_atmintis, bluetooth, isigyjimo_kaina,
                                komentarai)
			VALUES ('$pavadinimas', '$zemelapio_metai', '$istrizaine', 
                            '$vidine_atmintis', '$bluetooth', '$isigyjimo_kaina', 
                            '$komentarai')";

    $result = @mysqli_query($dbc, $query);
}