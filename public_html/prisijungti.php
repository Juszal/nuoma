<?php
    require_once '../app.php';
    
    $pageTitle = 'Įrangos peržiūra';
    
    require_once TEMPLATES_PATH . 'menu.php';
    
	if (empty($_POST)==false){
	$el_pastas = $_POST['el_pastas'];
	$slaptazodis = $_POST['slaptazodis'];
	
    $result = @mysqli_query($dbc, "SELECT * FROM klientas WHERE el_pastas = '".$_POST['el_pastas']."' AND slaptazodis = '".md5($_POST['slaptazodis'])."'");
	$id = 0;
	while ($row = mysqli_fetch_array($result)){$id = $row['klientas_id'];}
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