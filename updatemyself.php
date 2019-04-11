<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 13/11/2016
 * Time: 20:01
 */

include "connect.php";
session_start();

$link = mysqli_connect($host, $user, $password, $database);
mysqli_query($link, "SET NAMES utf8");

$email = mysqli_real_escape_string($link, trim($_POST["email"])); //THESE SHITS COME FROM THE FORM WHICH IT IS RELATED TO
$nome = mysqli_real_escape_string($link, trim($_POST["nome"]));
$senha1 = mysqli_real_escape_string($link, trim($_POST["senha"]));
$senha2 = mysqli_real_escape_string($link, trim($_POST["confsenha"]));

if (!$link) {
    echo "Erro: Não foi possível conectar ao MySQL." . PHP_EOL;
    echo "Número do erro: " . mysqli_connect_errno() . PHP_EOL;
    echo "Erro: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {

    $query = "UPDATE usuarios SET Nome = '$nome', Email = '$email'".( !empty($senha1) ? ", Senha = SHA1('$senha1')" : "")." WHERE Login = '".$_SESSION["login"]."'";
    $result = mysqli_query($link, $query);

    if(!$result){
        //echo mysqli_error($link);
        header("Location: http://localhost/labifba/?page=change&updt=false");
    }
    else{
        $_SESSION["Nome"] = $nome;
        header("Location: http://localhost/labifba/?page=change&updt=true");
        //echo mysqli_error($link);
    }//}
}

mysqli_close($link);