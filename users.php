<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 02/11/2016
 * Time: 15:55
 */

include "connect.php";

$link = mysqli_connect($host, $user, $password, $database);

?>
<form class="form-horizontal margin-bottom" action="resources/php/addusers.php" method="post">
    <div class="col-lg-2">
        <input class="form-control" type="text"  size="30" maxlength="30" name="login" placeholder="Digite um login" required>
    </div>
    <div class="col-lg-3">
        <input class="form-control" type="text" name="nome" maxlength="80" placeholder="Digite um nome" required>
    </div>
    <div class="col-lg-3">
        <input class="form-control" type="email" name="email" maxlength="80" placeholder="Digite um email">
    </div>
    <div class="col-lg-2">
        <select class="form-control" name="perf">
            <option value="0"> Protocolo </option>
            <option value="1">Servidor IFBA</option>
            <option value="2">Administrador</option>
        </select>
    </div>
    <div class="col-lg-2">
        <button class="btn btn-primary form-control" type="submit">
            Adicionar
        </button>
    </div>
</form>

<?php
if(isset($_GET["add"])){
    if ($_GET["add"] == "true"){
        ?>
        <div class="col-lg-12 alert alert-success">
            <span class="glyphicon glyphicon-ok"> </span>
            Usuário cadastrado com sucesso!
        </div>
    <?php
    }
    else{
        ?>
        <div class="col-lg-12 alert alert-danger">
            <span class="glyphicon glyphicon-exclamation-sign"> </span>
            Falha ao cadastrar usuário!
        </div>
        <?php
    }
}

if(isset($_GET["rem"])){
    if ($_GET["rem"] == "true"){
        ?>
        <div class="col-lg-12 alert alert-success">
            <span class="glyphicon glyphicon-ok"> </span>
            Usuário removido com sucesso!
        </div>
        <?php
    }
    else{
        ?>
        <div class="col-lg-12 alert alert-danger">
            <span class="glyphicon glyphicon-exclamation-sign"> </span>
            Falha ao remover usuário!
        </div>
        <?php
    }
}

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

if (isset($_POST["alter"])) {
            $login = mysqli_real_escape_string($link, trim($_POST["alter"]));

            $query = "SELECT Login, Nome, Email FROM usuarios WHERE Login = '$login' ORDER BY PerfilUsuario DESC, Nome";
            $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

            if(mysqli_num_rows($result) <= 0){ //esta estrutura condicional verifica o retorno da consulta sql
            echo "<div class=\"alert alert-warning col-lg-12 text-center\">Não há usuários</div>";
            }
            else{
            while($row = mysqli_fetch_array($result)){;
            ?>

            <form class="form-horizontal margin-bottom clearfix" action="resources/php/updateusers.php" method="post">
                <div>
                    <label for="nome"><b>Alterar</b></label>
                </div>
                <div class="col-lg-3">
                    <input class="form-control" type="text" id="nome" name="nome" placeholder="Digite um nome" value="<?php echo $row["Nome"]; ?>">
                </div>
                <div class="col-lg-3">
                    <input class="form-control" type="email" name="email" placeholder="Digite um email" value="<?php echo $row["Email"]; ?>">
                </div>

                <div class="col-lg-2">
                    <button class="btn btn-primary form-control" type="submit" name="login" value="<?php echo $row["Login"];  ?>">
                        Salvar alterações
                    </button>
                </div>
            </form>

        <?php
        }
    }
}

$query = "SELECT Login, Nome, PerfilUsuario, Email FROM usuarios WHERE login != '".$_SESSION["login"]."'";
$result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

if(mysqli_num_rows($result) <= 0){ //esta estrutura condicional verifica o retorno da consulta sql
    echo "<div class=\"alert alert-warning col-lg-12 text-center\">Não há usuários</div>";
}
else {
    ?>

    <div class="col-lg-12">

        <table class="table">
            <thead>
                <th>Login</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Perfil Usuário</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </thead>
            <tbody>

            <?php
            while ($row = mysqli_fetch_array($result)) {
                //$reslogin = $row["Login"];
                ?>

                <tr>
                    <td><?php echo $row["Login"]; ?></td>
                    <td><?php echo $row["Nome"]; ?></td>
                    <td><?php echo $row["Email"]; ?></td>
                    <td><?php switch ($row["PerfilUsuario"]){
                            case 0:
                                echo "Protocolo";
                                break;
                            case 1:
                                echo "Servidor IFBA";
                                break;
                            case 2:
                                echo "Administrador";
                                break;
                        } ?></td>

                    <td>
                        <form action="?page=users" method="post">
                            <button class="btn btn-default" name="alter" type="submit" value="<?php echo $row["Login"]; ?>">
                                <span class="glyphicon glyphicon-pencil"> </span>
                            </button>
                        </form>
                    </td>

                    <td>
                        <form action="resources/php/removeusers.php" method="post">
                            <button class="btn btn-danger remove" name="remove" type="submit" value="<?php echo $row["Login"]; ?>">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </form>
                    </td>

                </tr>

                <?php
            }

            ?>

            </tbody>
        </table>


    </div>
    <?php
}
?>