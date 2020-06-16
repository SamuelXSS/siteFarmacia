<?php
Include ('../config.php');
require('../../../scripts/restrito.php');
$cnpj = $_SESSION['cnpj'];

$columns = array('NOME_PACIENTE_RECEITA', 'CPF_PACIENTE_RECEITA', 'STATUS_RECEITA', 'DATA_RECEITA');

if(isset($_POST["vendida"])){
	$query = "SELECT * FROM receitas WHERE STATUS_RECEITA = 'Vendida' ";
}
else{
	$query = "SELECT * FROM receitas WHERE STATUS_RECEITA = 'Disponível' ";
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
 AND CPF_PACIENTE_RECEITA LIKE "%'.$_POST["search"]["value"].'%"';
}
else{
	$query .= '';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY ID_RECEITA DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query . $query1);

$data = array();




while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<a class="update" href="'.$row["ID_RECEITA"].'" data-id="'.$row["ID_RECEITA"].'" data-column="NOME_PACIENTE_RECEITA">' . $row["NOME_PACIENTE_RECEITA"] . '</a>';

 $sub_array[] = '<div class="update" data-id="'.$row["ID_RECEITA"].'" data-column="CPF_PACIENTE_RECEITA">' . $row["CPF_PACIENTE_RECEITA"] . '</div>';
 if($row["STATUS_RECEITA"] == 'Disponível'){
 	$sub_array[] = '<div class="update" data-id="'.$row["ID_RECEITA"].'" data-column="STATUS_RECEITA"><span class="badge badge-pill badge-success">' . $row["STATUS_RECEITA"] . '</span></div>';
 }
 else if($row["STATUS_RECEITA"] == 'Vendida'){
 	$sub_array[] = '<div class="update" data-id="'.$row["ID_RECEITA"].'" data-column="STATUS_RECEITA"><span class="badge badge-pill badge-danger">' . $row["STATUS_RECEITA"] . '</span></div>';
 }
 $sub_array[] = '<div class="update" data-id="'.$row["ID_RECEITA"].'" data-column="DATA_RECEITA">' . $row["DATA_RECEITA"] . '</div>';
 $data[] = $sub_array;
}

function get_all_data($conn)
{
 $query = "SELECT * FROM receitas";
 $result = mysqli_query($conn, $query);
 return mysqli_num_rows($result);
	
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($conn),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);




echo json_encode($output);

?>