<?php
$conn = mysqli_connect("localhost","root","","celulares") ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>