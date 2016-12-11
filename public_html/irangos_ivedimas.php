<?php
    require_once '../app.php';
    
    $pageTitle = 'Pridėti įrangą';
    
    require_once TEMPLATES_PATH . 'menu.php';
    
?>

<div class="container">
    <div class="row">
	<h3>Pridėti įrangą</h3>
    </div>
    <div class="row">
        <div class="radio">
            <label><input type="radio" name="optradio" value ="Navigacija">Kompiuteris</label>
	</div>
	<div class="radio">
            <label><input type="radio" name="optradio" value ="Kėdutė">Monitorius </label>
	</div>
    </div>
</div>


<?php
    require_once TEMPLATES_PATH . 'footer.php';
?>