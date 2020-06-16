<?php
Include('../config.php');
require('../../../scripts/restrito.php');
$cnpj = $_SESSION['cnpj'];

$sql = "SELECT * FROM receitas WHERE STATUS_RECEITA = 'Vendida' AND FARMACIA_VEND = '$cnpj'";
$sql2 = "SELECT * FROM receitas WHERE STATUS_RECEITA = 'Disponível'";
$total = "SELECT max(ID_RECEITA) as ID_RECEITA FROM receitas";

$dados = array();

if($result = mysqli_query($conn, $sql)){
    $dados[] = mysqli_num_rows($result);
}
if($result2 = mysqli_query($conn, $sql2)){

    $dados[] = mysqli_num_rows($result2);
}


$result3 = mysqli_query($conn, $total);
$dados[] = mysqli_fetch_row($result3);


echo json_encode($dados);

