<?php
    require_once '../app.php';
    
    $pageTitle = 'Įrangos peržiūra';
    
    require_once TEMPLATES_PATH . 'menu.php';
	
	if (empty($_POST)==false){
		$klaida = 0;
		
		$klaida += tikrinkLauka('/^[0-9]+$/', $_POST['telefonas'], "<br>Telefonas gali buti tik is skaiciu <br>", 3, 20);
		$klaida += tikrinkLauka('/^[a-zA-z]+$/i', $_POST['vardas'], "vardas gali buti tik is skaiciu<br>", 3, 20);
		$klaida += tikrinkLauka('/^[a-zA-z]+$/i', $_POST['pavarde'], "pavarde gali buti tik is skaiciu<br>", 3, 20);
		$klaida += tikrinkLauka('/^[a-zA-z]+$/i', $_POST['slaptazodis'], "slaptazodis gali buti tik is skaiciu<br>", 3, 20);
		
		$klaida += tikrinkLaukaJeiIvesta('/^[0-9]+$/', $_POST['namo_nr'], "namo nr gali buti tik is skaiciu <br>", 3, 20);
		$klaida += tikrinkLaukaJeiIvesta('/^[a-zA-z]+$/i', $_POST['salis'], "salis gali buti tik is skaiciu<br>", 3, 20);
		$klaida += tikrinkLaukaJeiIvesta('/^[a-zA-z]+$/i', $_POST['miestas'], "miestas gali buti tik is skaiciu<br>", 3, 20);
		$klaida += tikrinkLaukaJeiIvesta('/^[a-zA-z]+$/i', $_POST['rajonas'], "rajonas gali buti tik is skaiciu<br>", 3, 20);
		$klaida += tikrinkLaukaJeiIvesta('/^[a-zA-z0-9]+$/i', $_POST['pasto_kodas'], "pasto_kodas gali buti tik is skaiciu<br>", 3, 20);
		
		if(strcmp($_POST['slaptazodis'], $_POST['slaptazodis2']) !== 0 ){
			echo "slaptazodziai nesutampa";
			$klaida = 1;
		}
		
		$klaida += arElpastasEgzistuoja($dbc, $_POST['el_pastas'], "egzistuoja toks elpastas");
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
				<li>Slaptazodis:<br><input name="slaptazodis" type="password" /></li>
				<li>Pakartoti slaptazodi:<br><input name="slaptazodis2" type="password" /></li>
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