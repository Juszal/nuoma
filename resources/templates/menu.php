<!DOCTYPE html>
<html>  
    <head>  
	<meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/> 
        <title><?php echo $pageTitle ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $config['baseUrl'] . 'css/bootstrap-datetimepicker.min.css'?>">
        <link href="include/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="<?php echo $config['baseUrl'] . 'js/moment.js'?>"></script>
        <script src="<?php echo $config['baseUrl'] . 'js/bootstrap-datetimepicker.js'?>"></script>
	</head>
        <body>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo $config['baseUrl'] . 'index.php'?>">CarRental</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="#">Automobiliai</a></li> 
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Papildoma įranga
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $config['baseUrl'] . 'irangos_perziura.php'?>">Įrangos peržiūra</a></li>
                                <li><a href="<?php echo $config['baseUrl'] . 'irangos_ivedimas.php'?>">Pridėti įrangą</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo $config['baseUrl'] . 'uzsakymu_perziura.php'?>">Užsakymai</a></li>
                    </ul>
					<?php if(arPrisijunges()){?>
					<!-- prisijungusio vartotojo meniu -->
						<ul class="nav navbar-nav navbar-right">
							<li><a href="atsijungti.php"> Atsijungti</a></li>
						</ul>
					<?php }else{?>
					<!-- neprisijungusio vartotojo meniu -->
						<ul class="nav navbar-nav navbar-right">
							<li><a href="registracija.php"><span class="glyphicon glyphicon-user"></span> Registracija</a></li>
							<li><a href="prisijungti.php"><span class="glyphicon glyphicon-log-in"></span> Prisijungti</a></li>
						</ul>
					<?php }?>
                </div>
            </nav>