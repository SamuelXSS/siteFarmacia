<?php
	$servidor = "198.50.130.238";
	$usuario = "alek";
	$senha = "Cthulhu2209";
	$dbname = "receita_digital";

	//conexão
	$sql = mysqli_connect($servidor, $usuario, $senha, $dbname);


	$pesquisar = $_POST('pesquisar');
	
	$cpf = "SELECT * FROM receitas WHERE CPF_PACIENTE_RECEITA";
	$result_cpf = mysqli_query($sql, $cpf);

	while($rows = mysqli_fetch_array($result_cpf)){
		echo "Nome: ".$rows['CPF_PACIENTE_RECEITA']."<br>";
	}

?>
?>