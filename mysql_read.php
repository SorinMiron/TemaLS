<?php

$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "tema_db");

$sql_read = "SELECT * FROM locatii";

$result = mysqli_query($conn, $sql_read);
if(! $result )
{
  die('Could not read data: ' . mysqli_error());
}

echo "<table border='1' style='border-collapse: collapse'>
<tr>
    <th>ID</th>
    <th>Latitudine</th>
    <th>Longitudine</th>
    <th>Zoom</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	$id = $row['ID'];
	$lat = $row['Latitudine'];
	$long = $row['Longitudine'];
	$zoom = $row['Zoom'];
	echo "<td>".$id."</td>";
	echo "<td>".$lat."</td>";
	echo "<td>".$long."</td>";
	echo "<td>".$zoom."</td>";
	
	echo "</tr>";
}

echo "</table>";
?>
