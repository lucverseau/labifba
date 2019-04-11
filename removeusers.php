<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 13/11/2016
 * Time: 17:20
 */

include "connect.php";
session_start();

$link = mysqli_connect($host, $user, $password, $database);

$login = mysqli_real_escape_string($link, trim($_POST["remove"]));


if (!$link) {
    echo "Erro: Não foi possível conectar ao MySQL." . PHP_EOL;
    echo "Número do erro: " . mysqli_connect_errno() . PHP_EOL;
    echo "Erro: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    $query = "DELETE FROM usuarios WHERE Login = '$login'";
    $result = mysqli_query($link, $query);

    if(!$result){
        //echo mysqli_error($link);
        header("Location: http://localhost/labifba/?page=users&rem=false");
    }
    else{
        header("Location: http://localhost/labifba/?page=users&rem=true");
    }
}

mysqli_close($link);