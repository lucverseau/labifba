<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 21/11/2016
 * Time: 19:50
 */

include "connect.php";
session_start();

$link = mysqli_connect($host, $user, $password, $database);

mysqli_query($link, "SET NAMES utf8");

$qtdepc = mysqli_real_escape_string($link, trim($_POST["qtdepc"]));
$nome = mysqli_real_escape_string($link, trim($_POST["nome"]));
$lotacao = mysqli_real_escape_string($link, trim($_POST["lotacao"]));
$hardware = $_POST["hardware"];
$software = $_POST["software"];

if (!$link) {
    echo "Erro: Não foi possível conectar ao MySQL." . PHP_EOL;
    echo "Número do erro: " . mysqli_connect_errno() . PHP_EOL;
    echo "Erro: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    $query = "INSERT INTO laboratorios(Nome, QtdeComputadores, Lotacao) VALUES('$nome', $qtdepc, $lotacao)";
    $result = mysqli_query($link, $query);
    $insertid = mysqli_insert_id($link);

    foreach ($hardware as $h){
        $query = "INSERT INTO lab_h(laboratorio, hardware) VALUES ($insertid, $h)";
        $result = mysqli_query($link, $query);
    }
    foreach ($software as $s){
        $query = "INSERT INTO lab_s(laboratorio, software) VALUES ($insertid, $s)";
        $result = mysqli_query($link, $query);
    }


    if(!$result){
        echo mysqli_error($link);
        //header("Location: http://localhost/labifba/?page=labs&add=false");
    }
    else{
        header("Location: http://localhost/labifba/?page=labs&add=true");
    }
}

mysqli_close($link);