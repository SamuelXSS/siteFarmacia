<?php
require_once "../config.php";
$id = $_POST["id"];

	$sql = $con->query("SELECT * FROM receitas WHERE ID_RECEITA = '$id'");
 	

	echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));

