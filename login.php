<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 22/10/2016
 * Time: 16:24
 */
include "connect.php";

session_start();

$link = mysqli_connect($host, $user, $password, $database);
mysqli_query($link, "SET NAMES utf8");

$login = mysqli_real_escape_string($link, trim($_POST["inputLogin"]));
$senha = mysqli_real_escape_string($link, trim($_POST["inputSenha"]));


if (!$link) {
    echo "Erro: Não foi possível conectar ao MySQL." . PHP_EOL;
    echo "Número do erro: " . mysqli_connect_errno() . PHP_EOL;
    echo "Erro: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else{
    $query = "SELECT Login, Nome, PerfilUsuario FROM usuarios WHERE Login = '$login'"; //faz uma consulta ao banco com o mesmo login informado
    $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

    if(mysqli_num_rows($result) <= 0){ //esta estrutura condicional verifica o retorno da consulta sql
        header("Location: http://localhost/labifba/?u=false");
    }
    else{
        while ($row = mysqli_fetch_array($result)){
            $reslogin = $row["Login"]; //
            $resperf = $row["PerfilUsuario"];
            $resnome = $row["Nome"];
        }


        $query = "SELECT Senha FROM usuarios WHERE Login = '$login' AND Senha = SHA1('$senha')"; //faz uma consulta ao banco com a senha informada
        $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql relativa à senha

        if(mysqli_num_rows($result) <= 0){
            header("Location: http://localhost/labifba/?senha=false");
        }
        else{
            //echo "Usuário logado";
            $_SESSION["login"] = $reslogin; //inicializa a variável apenas em caso de login
            $_SESSION["perf"] = $resperf;
            $_SESSION["Nome"] = $resnome;
            header("Location: http://localhost/labifba/?page=home");
        }
    }
}


mysqli_close($link);