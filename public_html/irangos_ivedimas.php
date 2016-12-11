<?php
    require_once '../app.php';
    
    $pageTitle = 'Pridėti įrangą';
    
    require_once TEMPLATES_PATH . 'menu.php';
    
    if (isset($_POST["navigacija"])){
        $pavadinimas = $_POST['pavadinimas'];
        $zemelapio_metai = $_POST['zemelapio_metai'];
        $istrizaine = $_POST['istrizaine'];
        $vidine_atmintis = $_POST['vidine_atmintis'];
        $bluetooth = $_POST['bluetooth'];
        $isigyjimo_kaina = $_POST['isigyjimo_kaina'];
        $komentarai = $_POST['komentarai'];
        
        $query = "INSERT INTO Navigacijos(pavadinimas, zemelapio_metai, istrizaine,
                                vidine_atmintis, bluetooth, isigyjimo_kaina,
                                komentarai)
			VALUES ('$pavadinimas', '$zemelapio_metai', '$istrizaine', 
                            '$vidine_atmintis', '$bluetooth', '$isigyjimo_kaina', 
                            '$komentarai')";

        $result = @mysqli_query($dbc, $query);
    }
    
?>

<div class="container">
    <div class="row">
	<h3>Pridėti įrangą</h3>
    </div>
    <div class="row">
        <div class="radio">
            <label><input type="radio" name="optradio" value ="Navigacija">Navigacija</label>
	</div>
	<div class="radio">
            <label><input type="radio" name="optradio" value ="Kedutė">Kėdutė </label>
	</div>
    </div>
    <div class="form-horizontal col-md-6">
        <form action="irangos_ivedimas.php" method="post" id="forma"></form>
    </div>
</div>

<script>
    $(document).ready(function() {
    $('input[type=radio][name=optradio]').change(function() {
        if (this.value == 'Navigacija') {
            navForm();
        }
        else if (this.value == 'Kedutė') {
            kedForm();
        }
    });
});

    function navForm(){
        var html ='<div class="form-group">' +
                    '<label class="col-md-3 control-label">Pavadinimas</label>' +
                    '<div class="col-md-9">' +
                        '<input name="pavadinimas" class="form-control" />' +
                    '</div></div>' +
                    '<div class="form-group">' +
                    '<label class="col-md-3 control-label">Žemėlapio metai</label>' +
                    '<div class="col-md-9">' +
                        '<input name="zemelapio_metai" class="form-control" />' +
                    '</div></div>' +
                    '<div class="form-group">' +
                    '<label class="col-md-3 control-label">Įstrižainė</label>' +
                    '<div class="col-md-9">' +
                        '<input name="istrizaine" class="form-control" />' +
                    '</div></div>' +
                    '<div class="form-group">' +
                    '<label class="col-md-3 control-label">Vidinė atmintis</label>' +
                    '<div class="col-md-9">' +
                        '<input name="vidine_atmintis" class="form-control" />' +
                    '</div></div>' +
                    '<div class="form-group">' +
                    '<label class="col-md-3 control-label">Bluetooth</label>' +
                    '<div class="col-md-9">' +
                        '<input name="bluetooth" class="form-control" />' +
                    '</div></div>' +
                    '<div class="form-group">' +
                    '<label class="col-md-3 control-label">Įsigyjimo kaina</label>' +
                    '<div class="col-md-9">' +
                        '<input name="isigyjimo_kaina" class="form-control" />' +
                    '</div></div>' +
                    '<div class="form-group">' +
                    '<label class="col-md-3 control-label">Komentarai</label>' +
                    '<div class="col-md-9">' +
                        '<input name="komentarai" class="form-control" />' +
                    '</div></div>' +
                    '<div class="form-group">' +
                    '<div>' +
                    '<input type="submit" name="navigacija" value="Įvesti" class="btn btn-default btn pull-left" />' +
                    '</div></div>';
        
        document.getElementById('forma').innerHTML = html;
    };
    
     function kedForm(){
        document.getElementById('forma').innerHTML = 'Kedute';
    }
</script>

<?php
    require_once TEMPLATES_PATH . 'footer.php';
?>