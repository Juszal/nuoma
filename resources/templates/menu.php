<?php   
    require_once CONFIG_PATH . 'config.php';   
?>
<!DOCTYPE html>
<html>  
    <head>  
	<meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/> 
        <title><?php echo $pageTitle ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="include/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
        <body>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo $config['baseUrl'] . 'index.php'?>">CarRental</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="#">Automobiliai</a></li>    
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Registracija</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Prisijungti</a></li>
                    </ul>
                </div>
            </nav>