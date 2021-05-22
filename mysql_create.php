<?php

$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "tema_db");

$sql_create = "CREATE TABLE locatii
(
ID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(ID),
Latitudine varchar(20),
Longitudine varchar(20),
Zoom varchar(20)
)
";

$retval = mysqli_query($conn, $sql_create);
if(! $retval )
{
  die('Could not create table:');
}
echo "Table created successfully\n";


?>