<?php
Include ('./config.php');

$conn = mysqli_connect($host,$user,$pass,$dbname) or die("couldn't connect to database");

$login = mysqli_real_escape_string($conn,$_POST["user"]);
$passW = MD5(mysqli_real_escape_string($conn,$_POST["pass"]));

$sql = mysqli_query($conn, "SELECT * FROM farmacia WHERE USUARIO = '{$login}' AND SENHA = '{$passW}' AND NIVEL = '1'");
$result = mysqli_fetch_assoc($sql);

if(mysqli_num_rows($sql)>0){
	if (!strcmp($passW, $result["SENHA"])) session_start();
    
      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $result['ID'];
      $_SESSION['UsuarioNome'] = $result['USUARIO'];
      $_SESSION['farmacia'] = $result['NOME'];
      $_SESSION['cnpj'] = $result['CNPJ'];
      $_SESSION['UsuarioNivel'] = $result['NIVEL'];
    	
      // Redireciona o visitante
      echo "Login feito com sucesso!";
  }
else {
	echo "erro";
}


