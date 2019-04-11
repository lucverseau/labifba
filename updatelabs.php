<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 21/11/2016
 * Time: 20:53
 */

//TODO Evitar que o usuário altere o nome do laboratório para um nome que já existe

include "connect.php";
//session_start();

$link = mysqli_connect($host, $user, $password, $database);
mysqli_query($link, "SET NAMES utf8");

$qtdepc = mysqli_real_escape_string($link, trim($_POST["qtdepc"]));
$nome = mysqli_real_escape_string($link, trim($_POST["nome"]));
$lotacao = mysqli_real_escape_string($link, trim($_POST["lotacao"]));
$codlab = mysqli_real_escape_string($link, trim($_POST["codlab"]));
$hardware = $_POST["hardware"];
$software = $_POST["software"];

if (!$link) {
    echo "Erro: Não foi possível conectar ao MySQL." . PHP_EOL;
    echo "Número do erro: " . mysqli_connect_errno() . PHP_EOL;
    echo "Erro: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    $query = "UPDATE laboratorios SET Nome = '$nome', QtdeComputadores = $qtdepc, Lotacao = $lotacao WHERE CodLab = $codlab";
    $result = mysqli_query($link, $query);

    $query = "DELETE FROM lab_h WHERE laboratorio = $codlab";
    $result = mysqli_query($link, $query);

    $query = "DELETE FROM lab_s WHERE laboratorio = $codlab";
    $result = mysqli_query($link, $query);

    foreach ($hardware as $h){
        $query = "INSERT INTO lab_h(laboratorio, hardware) VALUES ($codlab, $h)";
        $result = mysqli_query($link, $query);
    }
    foreach ($software as $s){
        $query = "INSERT INTO lab_s(laboratorio, software) VALUES ($codlab, $s)";
        $result = mysqli_query($link, $query);
    }

    if(!$result){
        //echo mysqli_error($link);
        header("Location: http://localhost/labifba/?page=labs&updt=false");
    }
    else{
        header("Location: http://localhost/labifba/?page=labs&updt=true");
        //echo mysqli_error($link);
    }
}

mysqli_close($link);