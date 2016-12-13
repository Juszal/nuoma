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

function addKedute($dbc, $navPost){
    $pavadinimas = mysqli_real_escape_string($dbc, $navPost['pavadinimas']);
    $spalva = mysqli_real_escape_string($dbc, $navPost['spalva']);
    $svoris = mysqli_real_escape_string($dbc, $navPost['svoris']);
    $isigyjimo_kaina = mysqli_real_escape_string($dbc, $navPost['isigyjimo_kaina']);
    $komentarai = mysqli_real_escape_string($dbc, $navPost['komentarai']);
        
    $query = "INSERT INTO Kedutes(pavadinimas, spalva, svoris,
                                isigyjimo_kaina, komentarai)
			VALUES ('$pavadinimas', '$spalva', '$svoris', 
                            '$isigyjimo_kaina', '$komentarai')";

    $result = @mysqli_query($dbc, $query);
}

function getOrders($dbc, $orderStart, $orderEnd){
    $query = "SELECT Uzsakymai.pristatymo_laikas,
                     Uzsakymai.grazinimo_laikas,
                     p.miestas pmiestas,
                     p.gatve pgatve,
                     p.namo_nr pnamo_nr,
                     g.miestas gmiestas,
                     g.gatve ggatve,
                     g.namo_nr gnamo_nr,
                     Automobiliai.valstybinis_nr,
                     Modeliai.pavadinimas modelis,
                     Markes.pavadinimas marke
                FROM Uzsakymai
                LEFT JOIN Adresai p
                    ON p.adreso_id = Uzsakymai.pristatymo_adreso_id
                LEFT JOIN Adresai g
                    ON g.adreso_id = Uzsakymai.grazinimo_adreso_id
                LEFT JOIN Automobiliai
                    ON Automobiliai.id = Uzsakymai.automobilio_id
                LEFT JOIN Modeliai
                    ON Modeliai.id = Automobiliai.id
                LEFT JOIN Markes
                    ON Markes.id = Modeliai.id
                WHERE pristatymo_laikas >= " . $orderStart . 
                    " AND pristatymo_laikas <= " . $orderEnd .
                " ORDER BY Uzsakymai.pristatymo_laikas ASC";
    
    $result = @mysqli_query($dbc, $query);
    
    return $result;
}