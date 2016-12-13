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
    $pavadinimas = $navPost['pavadinimas'];
    $zemelapio_metai = $navPost['zemelapio_metai'];
    $istrizaine = $navPost['istrizaine'];
    $vidine_atmintis = $navPost['vidine_atmintis'];
    $bluetooth = $navPost['bluetooth'];
    $isigyjimo_kaina = $navPost['isigyjimo_kaina'];
    $komentarai = $navPost['komentarai'];
        
    $query = "INSERT INTO Navigacijos(pavadinimas, zemelapio_metai, istrizaine,
                                vidine_atmintis, bluetooth, isigyjimo_kaina,
                                komentarai)
			VALUES ('$pavadinimas', '$zemelapio_metai', '$istrizaine', 
                            '$vidine_atmintis', '$bluetooth', '$isigyjimo_kaina', 
                            '$komentarai')";

    $result = @mysqli_query($dbc, $query);
}