<?php
include '/etc/apache2/php_includes/loading_groups.php';

if (isset($_REQUEST['Caliber'])){


echo "<form action='find.php'>";

echo "<input type='text' name='Caliber'>";

echo "<input type='submit' value='Search!'>";

echo "</form>";







} else {// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "testing";

$sql = "SELECT id,
	powder,
	p_grains,
	bullet,
	b_grains,
	caliber,
	match(caliber) against ('$Caliber')
	FROM loads";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    //	echo "<table><tr><th>Load #</th><th>Powder</th><th>Charge</th><th>Buller</th><th>Bullet Weight</th><th>Caliber</th>";
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
}
?>
