<?php
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'/config/db.php');
include '/etc/apache2/php_includes/loading_groups.php';


// $servername= "127.0.0.1";
// $dbname = "barret_test";
// $username = "phpuser";
// $password = "goofball";


// echo "<h1>MOA Results</h1>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select groups.group_size_moa as 'MOA',
	groups.num_in_group as '# of shots',
	loads.caliber as 'Caliber',
	loads.bullet as 'Bullet',
	loads.b_grains as 'bullet wt',
	cartridge_case.brand as 'Case' from groups
	inner join loads on groups.load_id=loads.id
	inner join cartridge_case on loads.cartridge_case_id = cartridge_case.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>MOA</th><th>Number of Shots</th><th>Caliber</th><th>Buller</th><th>Case</th>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td style='text-align:right'>" . $row["MOA"]. "</td>" .
	"<td style='text-align:center'>" . $row["# of shots"]. "</td>" .
	"<td style='text-align:center'>" . $row["Caliber"]. "</td>" .
	"<td style='text-align:center'>" . $row["Bullet"]. "</td>" .
	"<td style='text-align:center'>" . $row["Case"] . "</td>"; echo "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
