<?php
Include ('../config.php');
$columns = array('NOME_RECEITA_PACIENTE', 'CPF_RECEITA_PACIENTE', 'STATUS_RECEITA', 'DATA_RECEITA');

$query = "SELECT * FROM receitas WHERE STATUS_RECEITA = 'Disponível' ";

if(isset($_POST["search"]["value"]))
{
 $query .= '"
 AND CPF_RECEITA_PACIENTE LIKE "%'.$_POST["search"]["value"].'%" 
 OR NOME_RECEITA_PACIENTE LIKE "%'.$_POST["search"]["value"].'%" 
 OR CARTAO_SUS_PACIENTE LIKE "%'.$_POST["search"]["value"].'%"
 ';
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
 $sub_array[] = '';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["ID_RECEITA"].'" data-column="NOME_RECEITA_PACIENTE">' . $row["NOME_RECEITA_PACIENTE"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["ID_RECEITA"].'" data-column="CPF_RECEITA_PACIENTE">' . $row["CPF_RECEITA_PACIENTE"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["ID_RECEITA"].'" data-column="STATUS_RECEITA">' . $row["STATUS_RECEITA"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["ID_RECEITA"].'" data-column="DATA_RECEITA">' . $row["DATA_RECEITA"] . '</div>';
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