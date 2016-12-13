<?php
    require_once '../app.php';
    
    $pageTitle = 'Pirmas';
    
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
</div>

<script type="text/javascript">
    $(function () {
        $('#datetimepickerstart').datetimepicker({           
            format: 'YYYY-MM-DD HH:mm',
            minDate: moment().add(1, 'd').toDate(),
            useCurrent: false
        });
        $('#datetimepickerend').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            minDate: moment().add(1, 'd').toDate(),
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