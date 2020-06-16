<?php
Include ('./config.php');

$conn = mysqli_connect($host,$user,$pass,$dbname) or die("couldn't connect to database");

$login = mysqli_real_escape_string($conn,$_POST["user"]);
$passW = mysqli_real_escape_string($conn,MD5($_POST["pass"]));

$sql2 = mysqli_query($conn, "SELECT * FROM login WHERE user = '{$login}'");

    #Se o retorno for maior do que zero, diz que já existe um.
    if (mysqli_num_rows($sql2) > 0) {
        header("location: ../reg.php?cadastro=cadastroExistente");
    }

else{
    $sql = mysqli_query($conn,"INSERT INTO login(user, senha, data_cadastro)
        VALUES('" . $login . "','" . $passW . "', NOW())");
    if($sql)
    	header("location: ../reg.php?cadastro=ok");
    else
    	mysqli_error($conn);
}
