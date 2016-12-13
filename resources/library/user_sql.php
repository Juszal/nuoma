<?php

function arPrisijunges(){
	return (isset($_SESSION['id'])) ? true : false;
}

function registruoti($dbc, $post){
	$salis = empty($post['salis']) ? '' : $post['salis'];
	$miestas = empty($post['miestas']) ? '' : $post['miestas'];
	$adresas = empty($post['adresas']) ? '' : $post['adresas'];
	$pasto_kodas = empty($post['pasto_kodas']) ? '' : $post['pasto_kodas'];
	$rajonas = empty($post['rajonas']) ? '' : $post['rajonas'];
	$namo_nr = empty($post['namo_nr']) ? '0' : $post['namo_nr'];
	@mysqli_query($dbc, "INSERT INTO `klientas`(
											`vardas`,
											`pavarde`, 
											`slaptazodis`,
											`el_pastas`, 
											`telefonas`, 
											`salis`,
											`miestas`, 
											`adresas`, 
											`pasto_kodas`, 
											`rajonas`, 
											`namo_nr`, 
											`registracijos_data`, 
											`pakvietimo_kodas`
											) VALUES (
											'".$post['vardas']."',
											'".$post['pavarde']."',
											'".md5($post['slaptazodis'])."',
											'".$post['el_pastas']."',
											'".$post['telefonas']."',
											'".$salis."',
											'".$miestas."',
											'".$adresas."',
											'".$pasto_kodas."',
											'".$rajonas."',
											'".$namo_nr."',
											NOW(),
											'".substr(md5(microtime()),rand(0,26),5)."')") or die ("query klaida". mysql_error());
}

function tikrinkLauka($regex, $laukas, $klaida){
	if(!preg_match($regex, $laukas)){
		echo $klaida;
		return 1;
	}
	return 0;
}

function tikrinkLaukaJeiIvesta($regex, $laukas, $klaida){
	if(!preg_match($regex, $laukas) && !isset($laukas)){
		echo $klaida;
		return 1;
	}
	return 0;
}

function arElpastasEgzistuoja($dbc, $email, $klaida){
	$result = @mysqli_query($dbc, "SELECT `klientas_id` FROM `klientas` WHERE el_pastas = '$email'") or die ("query klaida". mysql_error());
	if(mysqli_fetch_array($result)){
		echo $klaida;
		return 1;
	}
	return 0;
}