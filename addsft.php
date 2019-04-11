<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 21/11/2016
 * Time: 20:32
 */

include "connect.php";
session_start();

$link = mysqli_connect($host, $user, $password, $database);

$descsoft = mysqli_real_escape_string($link, trim($_POST["descsoft"]));

if (!$link) {
    echo "Erro: Não foi possível conectar ao MySQL." . PHP_EOL;
    echo "Número do erro: " . mysqli_connect_errno() . PHP_EOL;
    echo "Erro: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    $query = "INSERT INTO software(Descricao) VALUES('$descsoft')";
    $result = mysqli_query($link, $query);

    if(!$result){
        //echo mysqli_error($link);
        header("Location: http://localhost/labifba/?page=labs&adds=false");
    }
    else{
        header("Location: http://localhost/labifba/?page=labs&adds=true");
    }
}

mysqli_close($link);