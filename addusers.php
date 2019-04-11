<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 13/11/2016
 * Time: 16:14
 */

include "connect.php";
session_start();

$link = mysqli_connect($host, $user, $password, $database);

$login = mysqli_real_escape_string($link, trim($_POST["login"]));
$nome = mysqli_real_escape_string($link, trim($_POST["nome"]));
$email = mysqli_real_escape_string($link, trim($_POST["email"]));
$perf = mysqli_real_escape_string($link, trim($_POST["perf"]));

if (!$link) {
    echo "Erro: Não foi possível conectar ao MySQL." . PHP_EOL;
    echo "Número do erro: " . mysqli_connect_errno() . PHP_EOL;
    echo "Erro: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    $query = "INSERT INTO usuarios(Login, Nome, Email, PerfilUsuario, Senha) VALUES('$login', '$nome', '$email', $perf, SHA1('1234'))";
    $result = mysqli_query($link, $query);

    if(!$result){
        echo mysqli_error($link);
        //header("Location: http://localhost/labifba/?page=users&add=false");
    }
    else{
        header("Location: http://localhost/labifba/?page=users&add=true");
        //echo "Usuário cadastrado com sucesso!";
    }
}

mysqli_close($link);