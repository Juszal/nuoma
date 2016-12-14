<?php
    require_once '../app.php';
    
    $pageTitle = 'Įrangos peržiūra';
    
    require_once TEMPLATES_PATH . 'menu.php';
    
	if (empty($_POST)==false){
	
	$id = prijungti($dbc, $_POST);
	if($id != 0){
		$_SESSION['id'] = $id;
		header ('Location: index.php');
		echo " sekmingai prisiregistravai";
	}else{
		echo "Nepavyko rasti tokio vartotojo";
	}
	}
    
?>
		<div class="login-container">
			<form action="" method="post">
    			<ul class='login'>
					<li>El. pastas:<br><input name="el_pastas" type="text" /></li>
					<li>Slaptazodis:  <br><input name="slaptazodis"   type="text" /></li>
					<li><input type="submit" value="prisijungti" /></li>
				</ul>
			</form>
		</div>
<?php
    require_once TEMPLATES_PATH . 'footer.php';
?>