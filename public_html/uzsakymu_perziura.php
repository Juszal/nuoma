<?php
    require_once '../app.php';
    
    $pageTitle = 'Užsakymai';
    
    require_once TEMPLATES_PATH . 'menu.php';
?>

<div class="container">  
    <form action='' method=''>
    <div class="row margin20">
        <div class="col-md-5">
            <div class="form-group">
                <label class="col-md-4 control-label">Nuomos pradžia</label>
                <div class="col-md-8">
                    <div class='input-group date' id='datetimepickerstart'>
                        <input name="startdate" type='text' class="form-control" id="orderStart" required="required" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label class="col-md-4 control-label">Nuomos pabaiga</label>
                <div class="col-md-8">
                    <div class='input-group date' id='datetimepickerend'>
                        <input name="enddate" type='text' class="form-control" id="orderEnd" required="required" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">          
            <button type="submit" class="btn btn-success">Ieškoti</button>
        </div>
    </div>
    </form>
    <div class="row">
	<h3>Užsakymai</h3>
    </div>
    <table class="table table-bordered">
	<thead>
            <tr>
		<th>Nuomos pradžia</th>
		<th>Nuomos pabaiga</th>
                <th>Pristatymo vieta</th>
		<th>Grąžinimo vieta</th>
		<th>Modelis</th>  
		<th>Valst. Nr.</th>
                <th>Priedai</th>
                <th>Kliento komentarai</th>
		<th>Vadybininko komentarai</th>               
            </tr>
	</thead>
	<tbody>

	</tbody>
    </table>
</div>

<script type="text/javascript">
    $(function () {
        $('#datetimepickerstart').datetimepicker({           
            format: 'YYYY-MM-DD HH:mm',
        });
        $('#datetimepickerend').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepickerstart").on("dp.change", function (e) {
            $('#datetimepickerend').data("DateTimePicker").minDate(e.date);
            //orderTime(orderStart.value, orderEnd.value);
        });
        $("#datetimepickerend").on("dp.change", function (e) {
            $('#datetimepickerstart').data("DateTimePicker").maxDate(e.date);
            //orderTime(orderStart.value, orderEnd.value);
        });
    });

</script>
<?php
    require_once TEMPLATES_PATH . 'footer.php';
?>