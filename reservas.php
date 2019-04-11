<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 02/11/2016
 * Time: 15:55
 */

//TODO adicionar botões para adicionar, alterar e excluir reserva
//TODO excluir reservas antigas do banco

include "connect.php";

$link = mysqli_connect($host, $user, $password, $database);
mysqli_query($link, "SET NAMES utf8");
?>

<?php
if($_SESSION["perf"] > 1){ ?>
<div class="col-lg-2 smaller-margin-bottom">
    <form action="?page=reservas&lesmiennes=true" method="post">
        <button class="btn btn-default form-control">Minhas Reservas</button>
    </form>
</div>

    <?php }
if(isset($_GET["lesmiennes"]) && $_GET["lesmiennes"] == true){
    $querymie = "SELECT Usuario, Login, laboratorios.Nome AS lNome, usuarios.Nome AS uNome, Laboratorio, DtHrInicio, DtHrFim FROM reservas, usuarios, laboratorios WHERE '".$_SESSION["login"]."' = reservas.Usuario AND CodLab = Laboratorio AND Login = reservas.Usuario AND DATEDIFF(TIMESTAMP(DATE(DtHrInicio)),TIMESTAMP(DATE(NOW()))) >= 0 ORDER BY lNome, DtHrInicio";

    $resultmie = mysqli_query($link, $querymie); //armazena na variável result o retorno da consulta sql

    if(mysqli_num_rows($resultmie) <= 0){ //esta estrutura condicional verifica o retorno da consulta sql
        echo "<div class=\"alert alert-warning col-lg-12 text-center\">Não há reservas".($_SESSION["perf"] < 1 ? " para hoje" : "")."</div>";
    }
    else {
        ?>

        <div class="col-lg-12">

            <table class="table" title="Minhas Reservas">
                <thead>
                <th>Laboratório</th>
                <th>Usuário</th>
                <th>Início</th>
                <th>Fim</th>
                </thead>

                <tbody>

                <?php
                while ($rowmie = mysqli_fetch_array($resultmie)) {
                    //$reslogin = $row["Login"];
                    ?>

                    <tr>
                        <td><?php echo $rowmie["lNome"]; ?></td>
                        <td><?php echo $rowmie["uNome"]; ?></td>
                        <td><?php echo date("d\/m\/Y - H\hi", strtotime($rowmie["DtHrInicio"])); ?></td>
                        <td><?php echo date("d\/m\/Y - H\hi", strtotime($rowmie["DtHrFim"])); ?></td>
                        <?php }
                        ?>
                    </tr>

        <?php
        }
        ?>
                </tbody>
            </table>


        </div>
        <?php
    }


if((!isset($_GET["lesmiennes"])) || $_GET["lesmiennes"] != true){
    $query = "SELECT Usuario, Login, laboratorios.Nome AS lNome, usuarios.Nome AS uNome, Laboratorio, DtHrInicio, DtHrFim, AulaFixa FROM reservas, usuarios, laboratorios WHERE usuarios.Login = reservas.Usuario AND CodLab = Laboratorio ".(($_SESSION["perf"] < 1) ? "AND DtHrInicio BETWEEN TIMESTAMP(DATE(NOW())) AND (DATE_ADD(TIMESTAMP(DATE(NOW())), INTERVAL 1 DAY) - INTERVAL 1 SECOND)" : "AND DATEDIFF(TIMESTAMP(DATE(DtHrInicio)),TIMESTAMP(DATE(NOW()))) >= 0")." ORDER BY lNome, DtHrInicio";

    $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

    if(mysqli_num_rows($result) <= 0){ //esta estrutura condicional verifica o retorno da consulta sql
        echo "<div class=\"alert alert-warning col-lg-12 text-center\">Não há reservas cadastradas ".($_SESSION["perf"] < 1 ? " para hoje" : "")."</div>";
    }
    else {
        ?>

        <div class="col-lg-12">

            <table class="table" title="Minhas Reservas">
                <thead>
                <th>Laboratório</th>
                <th>Usuário</th>
                <th>Início</th>
                <th>Fim</th>

                <?php if($_SESSION["perf"] > 1){ ?>
                <!--<th>Aula Fixa</th> -->
                <?php }?>
                </thead>
                <tbody>

                <?php
                while ($row = mysqli_fetch_array($result)) {
                    //$reslogin = $row["Login"];
                    ?>

                    <tr>
                        <?php if($_SESSION["perf"] == 1){?>
                            <?php if ($_SESSION["login"] == $row["Login"]){ ?>
                            <td><?php echo $row["lNome"]; ?></td>
                            <td><?php echo $row["uNome"]; ?></td>
                            <td><?php echo date("d\/m\/Y - H\hi", strtotime($row["DtHrInicio"])); ?></td>
                            <td><?php echo date("d\/m\/Y - H\hi", strtotime($row["DtHrFim"])); ?></td>
                        <?php }}
                        else{ ?>
                            <td><?php echo $row["lNome"]; ?></td>
                            <td><?php echo $row["uNome"]; ?></td>
                            <td><?php echo date("d\/m\/Y - H\hi", strtotime($row["DtHrInicio"])); ?></td>
                            <td><?php echo date("d\/m\/Y - H\hi", strtotime($row["DtHrFim"])); ?></td>
                        <?php }
                        ?>

                        <?php if ($_SESSION["perf"] > 1){ ?>
                        <!-- <td><?php echo($row["AulaFixa"] == 0 ? "Não": "Sim");
                        } ?></td> -->

                    </tr>

                    <?php
                }

                ?>

                </tbody>
            </table>


        </div>
        <?php
    }}
    ?>