<?php
    require_once '../app.php';
    
    $pageTitle = 'Pridėti įrangą';
    
    require_once TEMPLATES_PATH . 'menu.php';
    
    if (isset($_POST["navigacija"])){
        addNavigacija($dbc, $_POST);
        header("Location: irangos_perziura.php");
    }
    
    if (isset($_POST["kedute"])){
        addKedute($dbc, $_POST);
        header("Location: irangos_perziura.php");
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
        <form action="irangos_ivedimas.php" method="post" id="nav_forma">
            <div class="form-group">
                <label class="col-md-3 control-label">Pavadinimas</label>
                <div class="col-md-9">
                    <input name="pavadinimas" class="form-control" required="required"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Žemėlapio metai</label>
                <div class="col-md-9">
                    <input type= "number" name= "five_steps" max= "2025" min= "2000" name="zemelapio_metai" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Įstrižainė</label>
                <div class="col-md-9">
                    <input type="number" step="0.01" name="istrizaine" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Vidinė atmintis</label>
                <div class="col-md-9">
                    <input type="number" step="0.01" name="vidine_atmintis" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Bluetooth</label>
                <div class="col-md-9">
                    <select class="form-control" name="bluetooth">
                        <option>Ne</option>
                        <option>Taip</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Įsigyjimo kaina</label>
                <div class="col-md-9">
                    <input type="number" step="0.01" name="isigyjimo_kaina" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Komentarai</label>
                <div class="col-md-9">
                    <textarea rows="5" name="komentarai" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <input type="submit" name="navigacija" value="Įvesti" class="btn btn-default btn pull-left" />
                </div>
            </div>
        </form>
        <form action="irangos_ivedimas.php" method="post" id="ked_forma">
            <div class="form-group">
                <label class="col-md-3 control-label">Pavadinimas</label>
                <div class="col-md-9">
                    <input name="pavadinimas" class="form-control" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Spalva</label>
                <div class="col-md-9">
                    <input name="spalva" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Svoris</label>
                <div class="col-md-9">
                    <input type="number" step="0.01" name="svoris" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Įsigyjimo kaina</label>
                <div class="col-md-9">
                    <input type="number" step="0.01" name="isigyjimo_kaina" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Komentarai</label>
                <div class="col-md-9">
                    <textarea rows="5" name="komentarai" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <input type="submit" name="kedute" value="Įvesti" class="btn btn-default btn pull-left" />
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
    document.getElementById("nav_forma").style.display="none";
    document.getElementById("ked_forma").style.display="none";
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
        document.getElementById("nav_forma").style.display="block";
        document.getElementById("ked_forma").style.display="none";
    }
    
     function kedForm(){
        document.getElementById("nav_forma").style.display="none";
        document.getElementById("ked_forma").style.display="block";
    }
</script>

<?php
    require_once TEMPLATES_PATH . 'footer.php';
?>