<?php
    require_once '../app.php';
    
    $pageTitle = 'Įrangos peržiūra';
    
    require_once TEMPLATES_PATH . 'menu.php';
    
    $result = getExtras($dbc);   
?>

<div class="container">
    <div class="row">
	<h3>Navigacijos</h3>
    </div>
    <table class="table table-bordered">
	<thead>
            <tr>
		<th>Pavadinimas</th>
		<th>Žemėlapių metai</th>
		<th>Įstrižainė</th>  
		<th>Atmintis</th>
		<th>Bluetooth</th>
		<th>Įsigyjimo kaina</th>
		<th>Komentarai</th>
                <th>Įvedimo data</th>
            </tr>
	</thead>
	<tbody>
            <?php
		while ($row = mysqli_fetch_array($result['nav_result']))
                {
                    echo "<tr>"
                            .	"<td>" . $row['pavadinimas'] . "</td>"
                            .	"<td>" . $row['zemelapio_metai'] . "</td>"
                            .	"<td>" . $row['istrizaine'] . " cm" . "</td>"
                            .	"<td>" . $row['vidine_atmintis'] . " mb" . "</td>"
                            .	"<td>" . $row['bluetooth'] . "</td>"
                            .	"<td>" . $row['isigyjimo_kaina'] . " Eur" . "</td>"
                            .	"<td>" . $row['komentarai'] . "</td>"
                            .   "<td>" . $row['ivedimo_data'] . "</td>"
                            .	"</tr>";
		}
            ?>
	</tbody>
    </table>
    <div class="row">
	<h3>Kėdutės</h3>
    </div>
    <table class="table table-bordered">
	<thead>
            <tr>
		<th>Pavadinimas</th>
		<th>Spalva</th>
		<th>Svoris</th>  
		<th>Įsigyjimo kaina</th>
		<th>Komentarai</th>
                <th>Įvedimo data</th>
            </tr>
	</thead>
	<tbody>
            <?php
		while ($row = mysqli_fetch_array($result['ked_result']))
                {
                    echo "<tr>"
                            .	"<td>" . $row['pavadinimas'] . "</td>"
                            .	"<td>" . $row['spalva'] . "</td>"
                            .	"<td>" . $row['svoris'] . " kg" . "</td>"
                            .	"<td>" . $row['isigyjimo_kaina'] . " Eur" . "</td>"
                            .	"<td>" . $row['komentarai'] . "</td>"
                            .   "<td>" . $row['ivedimo_data'] . "</td>"
                            .	"</tr>";
		}
            ?>
	</tbody>
    </table>
</div>


<?php
    require_once TEMPLATES_PATH . 'footer.php';
?>