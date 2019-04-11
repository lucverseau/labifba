<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 22/10/2016
 * Time: 15:24
 */

session_start();

if(!isset($_SESSION["login"])){ //Testa se a variável já foi inicializada (só é inicializada quando o usuário é logado c/ sucesso)
    include "resources/php/loginform.php"; //Se não tiver sido inicializada, redireciona para a tela de login
}
else{
    include "resources/php/mainpage.php"; //Se o usuário estiver logado, redireciona para a página principal
}


