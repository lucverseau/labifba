<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 22/11/2016
 * Time: 14:50
 */

include "connect.php";
session_start();

$link = mysqli_connect($host, $user, $password, $database);

$idhard = mysqli_real_escape_string($link, trim($_POST["removeh"]));


if (!$link) {
    echo "Erro: Não foi possível conectar ao MySQL." . PHP_EOL;
    echo "Número do erro: " . mysqli_connect_errno() . PHP_EOL;
    echo "Erro: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    $query = "DELETE FROM lab_h WHERE hardware = $idhard";
    $result = mysqli_query($link, $query);

    echo ((!$result)? mysqli_error($link) : "");


    $query = "DELETE FROM hardware WHERE idHardware = $idhard";
    $result = mysqli_query($link, $query);

    if(!$result){
        header("Location: http://localhost/labifba/?page=labs&remh=false");
    }
    else{
        header("Location: http://localhost/labifba/?page=labs&remh=true");
    }
}

mysqli_close($link);