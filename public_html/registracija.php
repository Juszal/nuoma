<?php
    require_once '../app.php';
    
    $pageTitle = 'Įrangos peržiūra';
    
    require_once TEMPLATES_PATH . 'menu.php';
	
	if (empty($_POST)==false){
		$minFieldLength = 3;
		$error = false;
		$require = array("vardas", "pavarde", "slaptazodis", "slaptazodis2", "el_pastas", "telefonas");
		foreach($_POST as $key=>$val){
			if (empty($val)  && in_array($key, $require)=== true){
				echo "Butina uzpildyti privalomus laukelius";
				$error = true;
				break;
			}
		}
		
		$address = array("salis", "miestas", "adresas", "pasto_kodas", "rajonas");
		foreach($_POST as $key=>$val){
			if (!empty($val) && strlen($val) < $minFieldLength && in_array($key, $address)=== true){
				echo "Gyvenamosios vietos adreso laukai neturi buti trumpesni nei ".$minFieldLength;
				$error = true;
				break;
			}
		}
		
		//doto validate user email
		//doto check fields max lenght
		//doto check if int is int
		//doto check if passwords are equal
		$salis = empty($_POST['salis']) ? '' : $_POST['salis'];
		$miestas = empty($_POST['miestas']) ? '' : $_POST['miestas'];
		$adresas = empty($_POST['adresas']) ? '' : $_POST['adresas'];
		$pasto_kodas = empty($_POST['pasto_kodas']) ? '' : $_POST['pasto_kodas'];
		$rajonas = empty($_POST['rajonas']) ? '' : $_POST['rajonas'];
		$namo_nr = empty($_POST['namo_nr']) ? '0' : $_POST['namo_nr'];
		if($error == false){
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
													'".$_POST['vardas']."',
													'".$_POST['pavarde']."',
													'".md5($_POST['slaptazodis'])."',
													'".$_POST['el_pastas']."',
													'".$_POST['telefonas']."',
													'".$salis."',
													'".$miestas."',
													'".$adresas."',
													'".$pasto_kodas."',
													'".$rajonas."',
													'".$namo_nr."',
													NOW(),
													'".substr(md5(microtime()),rand(0,26),5)."')") or die ("query klaida". mysql_error());
			echo "registracija sekminga. Galite prisijungti";
			}
	}
?>

	<div class="login-container">
		<form action="" method="post">
			<ul class='login'>
				<li>Vardas:<br><input name="vardas" type="text"></li>
				<li>Pavarde:<br><input name="pavarde" type="text" /></li>
				<li>Slaptazodis:<br><input name="slaptazodis" type="text" /></li>
				<li>Pakartoti slaptazodi:<br><input name="slaptazodis2" type="text" /></li>
				<li>E. pastas:<br><input name="el_pastas" type="text" /></li>
				<li>Telefonas:<br><input name="telefonas" type="text" /></li>
				<li>Salis:<br><input name="salis" type="text" /></li>
				<li>Miestas:<br><input name="miestas" type="text" /></li>
				<li>Adresas:<br><input name="adresas" type="text" /></li>
				<li>Pasto kodas:<br><input name="pasto_kodas" type="text" /></li>
				<li>Rajonas:  <br><input name="rajonas"   type="text" /></li>
				<li>Namo nr.:  <br><input name="namo_nr"   type="text" /></li>
				<li><input type="submit" value="prisijungti" /></li>
			</ul>
		</form>
	</div>


<?php
    require_once TEMPLATES_PATH . 'footer.php';
?>