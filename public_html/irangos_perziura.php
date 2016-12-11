<?php
    require_once '../app.php';
    
    $pageTitle = 'Įrangos peržiūra';
    
    require_once TEMPLATES_PATH . 'menu.php';
    
    $dbc = mysqli_connect($config['db']['hostname'], $config['db']['username'], 
                                $config['db']['password'], $config['db']['database']);
		if (!$dbc) 
		{
			die('Negaliu prisijungti: ' . mysqli_error($dbc));
		}
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
		<th>Kaina</th>
		<th>Komentarai</th>
                <th>Įvedimo data</th>
            </tr>
	</thead>
	<tbody>
            <!--<?php
		while ($row = mysqli_fetch_array($result))
                {
                    echo "<tr>"
                            .	"<td>" . $row['komp_m'] . "</td>"
                            .	"<td>" . $row['mon_m'] . "</td>"
                            .	"<td>" . $row['klav_m'] . "</td>"
                            .	"<td>" . $row['pel_m'] . "</td>"
                            .	"<td>" . array_sum(array($row['komp_k'], $row['mon_k'], $row['klav_k'], $row['pel_k'])) . "</td>"
                            .	"<td>" . $row['name'] . "</td>"
                            .	"<td>" . $row['mail'] . "</td>"
                            .	"</tr>";
		}
            ?>-->
	</tbody>
    </table>
</div>


<?php
    require_once TEMPLATES_PATH . 'footer.php';
?>