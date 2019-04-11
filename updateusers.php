<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 13/11/2016
 * Time: 19:06
 */

include "connect.php";
//session_start();

$link = mysqli_connect($host, $user, $password, $database);

$email = mysqli_real_escape_string($link, trim($_POST["email"]));
$nome = mysqli_real_escape_string($link, trim($_POST["nome"]));
$login = mysqli_real_escape_string($link, trim($_POST["login"]));

if (!$link) {
    echo "Erro: Não foi possível conectar ao MySQL." . PHP_EOL;
    echo "Número do erro: " . mysqli_connect_errno() . PHP_EOL;
    echo "Erro: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    $query = "UPDATE usuarios SET Nome = '$nome', Email = '$email' WHERE Login = '$login'";
    $result = mysqli_query($link, $query);

    if(!$result){
        //echo mysqli_error($link);
        header("Location: http://localhost/labifba/?page=users&updt=false");
    }
    else{
        header("Location: http://localhost/labifba/?page=users&updt=true");
        //echo "Usuário cadastrado com sucesso!";
    }
}

mysqli_close($link);