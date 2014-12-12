<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
include '/etc/apache2/php_includes/loading_groups.php';


// echo "Loads currently in the database:";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id,
	powder,
	p_grains,
	bullet,
	b_grains,
	caliber FROM loads";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    	echo "<table><tr><th>Load #</th><th>Powder</th><th>Charge</th><th>Buller</th><th>Bullet Weight</th><th>Caliber</th>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td style='text-align:right'>" . $row["id"]."</td>" .
	"<td style='text-align:center'>" . $row["powder"]."</td>" .
	"<td style='text-align:center'>" . $row["p_grains"]."</td>" .
	"<td style='text-align:center'>" . $row["bullet"]."</td>" .
	"<td style='text-align:center'>" . $row["b_grains"]."</td>" .
	"<td style='text-align:center'>" . $row["caliber"]."</td>"; echo "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
