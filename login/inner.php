<?php
Include ('./config.php');

$conn = mysqli_connect($host,$user,$pass,$dbname) or die("couldn't connect to database");

$login = mysqli_real_escape_string($conn,$_POST["user"]);
$passW = MD5(mysqli_real_escape_string($conn,$_POST["pass"]));

$sql = mysqli_query($conn, "SELECT * FROM login WHERE user = '{$login}' AND senha = '{$passW}' AND nivel = '1'");
$result = mysqli_fetch_assoc($sql);

if(mysqli_num_rows($sql)>0){
	if (!strcmp($passW, $result["senha"])) session_start();
    
      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $result['id_login'];
      $_SESSION['UsuarioNome'] = $result['user'];
      $_SESSION['UsuarioNivel'] = $result['nivel'];
    	
      // Redireciona o visitante
      header("Location: ../pisi");
  }
else {
	header("location: ../index.php?login=erro");
}


