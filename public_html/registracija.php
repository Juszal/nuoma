<?php
    require_once '../app.php';
    
    $pageTitle = 'Įrangos peržiūra';
    
    require_once TEMPLATES_PATH . 'menu.php';
	
	if (empty($_POST)==false){
		$minFieldLength = 3;
		$klaida = 0;
		$require = array("vardas", "pavarde", "slaptazodis", "slaptazodis2", "el_pastas", "telefonas");
		foreach($_POST as $key=>$val){
			if (empty($val)  && in_array($key, $require)=== true){
				echo "Butina uzpildyti privalomus laukelius";
				$klaida = 1;
				break;
			}
		}
		
		$klaida += tikrinkLauka('/^[0-9]+$/', $_POST['telefonas'], "<br>Telefonas gali buti tik is skaiciu <br>");
		$klaida += tikrinkLauka('/^[a-zA-z]+$/i', $_POST['vardas'], "vardas gali buti tik is skaiciu<br>");
		$klaida += tikrinkLauka('/^[a-zA-z]+$/i', $_POST['pavarde'], "pavarde gali buti tik is skaiciu<br>");
		
		$klaida += tikrinkLaukaJeiIvesta('/^[0-9]+$/', $_POST['namo_nr'], "namo nr gali buti tik is skaiciu <br>");
		$klaida += tikrinkLaukaJeiIvesta('/^[a-zA-z]+$/i', $_POST['salis'], "salis gali buti tik is skaiciu<br>");
		$klaida += tikrinkLaukaJeiIvesta('/^[a-zA-z]+$/i', $_POST['miestas'], "miestas gali buti tik is skaiciu<br>");
		$klaida += tikrinkLaukaJeiIvesta('/^[a-zA-z]+$/i', $_POST['rajonas'], "rajonas gali buti tik is skaiciu<br>");
		
		$address = array("salis", "miestas", "adresas", "pasto_kodas", "rajonas");
		foreach($_POST as $key=>$val){
			if (!empty($val) && strlen($val) < $minFieldLength && in_array($key, $address)=== true){
				echo "Gyvenamosios vietos adreso laukai neturi buti trumpesni nei ".$minFieldLength;
				$klaida = 1;
				break;
			}
		}
		
		if(strcmp($_POST['slaptazodis'], $_POST['slaptazodis2']) !== 0 ){
			echo "slaptazodziai nesutampa";
			$klaida = 1;
		}
		
		$klaida += arElpastasEgzistuoja($dbc, $_POST['el_pastas'], "egzistuoja toks elpastas");
		//doto check fields max lenght
		//doto check if int is int
		//doto check if passwords are equal
		if($klaida == 0){
			registruoti($dbc, $_POST);
			header("Location: prisijungti.php");
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