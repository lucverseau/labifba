<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 07/11/2016
 * Time: 15:52
 */

include "connect.php";

$link = mysqli_connect($host, $user, $password, $database);
mysqli_query($link, "SET NAMES utf8");

$query = "SELECT Nome, Email FROM usuarios WHERE Login = '".$_SESSION["login"]."'";
$result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

if(mysqli_num_rows($result) <= 0){ //esta estrutura condicional verifica o retorno da consulta sql
    echo "Não há usuários";
}
else{
    while($row = mysqli_fetch_array($result)){;
        ?>

        <form class="form-horizontal" action="resources/php/updatemyself.php" method="post">
            <div class="col-lg-3">
                <input class="form-control" type="text" name="nome" maxlength="80" placeholder="Digite um nome" value="<?php echo $row["Nome"]; ?>">
            </div>
            <div class="col-lg-3">
                <input class="form-control" type="email" name="email" maxlength="80" placeholder="Digite novo email" value="<?php echo $row["Email"]; ?>">
            </div>
            <div class="col-lg-2">
                <input class="form-control" type="password" name="senha" id="senha" placeholder="Digite nova senha">
            </div>
            <div class="col-lg-2">
                <input class="form-control" type="password" name="confsenha" id="confsenha" placeholder="Confirme sua nova senha">
                <p></p>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-primary form-control" type="submit" id="savalt">
                    Salvar alterações
                </button>
            </div>
        </form>
    <?php }}

if(isset($_GET["updt"])){
    if ($_GET["updt"] == "true"){
        ?>
        <div class="col-lg-12 alert alert-success">
            <span class="glyphicon glyphicon-ok"> </span>
            Usuário alterado com sucesso!
        </div>
        <?php
    }
    else{
        ?>
        <div class="col-lg-12 alert alert-danger">
            <span class="glyphicon glyphicon-exclamation-sign"> </span>
            Falha ao alterar usuário!
        </div>
        <?php
    }
}



?>