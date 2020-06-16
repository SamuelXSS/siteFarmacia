<?php 
Include('../config.php');
require('../../../scripts/restrito.php');

$cnpj = $_SESSION['cnpj'];
$id   = mysqli_real_escape_string($conn, $_POST["id"]);

$sql  = "UPDATE receitas SET STATUS_RECEITA = 'Vendida', FARMACIA_VEND = '$cnpj' WHERE ID_RECEITA = '$id'";
$sql1 = "SELECT * FROM farmacia";
$result = mysqli_query($conn, $sql1);
$row    = mysqli_fetch_assoc($result);
$vendas = $row["VENDAS"];
$totalV = $vendas + 1;
$sql2   = "UPDATE farmacia SET VENDAS = '$totalV' WHERE CNPJ = '$cnpj'";


if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
	echo "Receita vendida com sucesso!";
}