<?php
$servername = "localhost";
$username = "alek";
$password = "Cthulhu2209";
$dbname = "receita_digital";

$conn = mysqli_connect($servername,$username,$password,$dbname);
$con = new PDO("mysql:host=$servername;port=3306;dbname=$dbname",$username,$password);