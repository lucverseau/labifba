<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 07/11/2016
 * Time: 14:37
 */
include "connect.php";

$link = mysqli_connect($host, $user, $password, $database);
mysqli_query($link, "SET NAMES utf8");
?>

<form action="?page=report" method="post">
    <div class="col-lg-12 text-center"><label for="llr">Selecione um intervalo de datas para o relatório:</label></div>
    <div class="col-lg-2 col-lg-offset-4 smaller-margin-bottom"><input type="date" id="llr" class="form-control text-center" name="llr" required></div>
    <div class="col-lg-2 smaller-margin-bottom"><input type="date" id="ulr" class="form-control text-center" name="ulr" required></div>
    <div class="col-lg-2 col-lg-offset-5"><button class="btn btn-primary form-control smaller-margin-bottom" type="submit">Gerar Relatório</button></div>
</form>

<?php
if(isset($_POST["llr"])){
    $llr = $_POST["llr"];
    $ulr = $_POST["ulr"];

    $query = "SELECT Usuario, Login, laboratorios.Nome AS lNome, usuarios.Nome AS uNome, Laboratorio, DtHrInicio, DtHrFim, AulaFixa FROM reservas, usuarios, laboratorios WHERE usuarios.Login = reservas.Usuario AND CodLab = Laboratorio AND DtHrInicio BETWEEN TIMESTAMP('$llr') AND TIMESTAMP('$ulr') ORDER BY lNome, DtHrInicio";

    $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

    if(mysqli_num_rows($result) <= 0){ //esta estrutura condicional verifica o retorno da consulta sql
        echo "<div class=\"alert alert-warning col-lg-12 text-center\">Não há reservas cadastradas no intervalo informado</div>";
    }
    else {
        ?>

        <div class="col-lg-12" id="print">
            <button class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Imprimir</button>
            <h3 class="text-center">Relatório de Utilização dos Laboratórios de Informática</h3>
            <h5 class="text-center">Período: <?php echo $llr." - ".$ulr; ?></h5>
            <table class="table">
                <thead>
                <th>Laboratório</th>
                <th>Usuário</th>
                <th>Início</th>
                <th>Fim</th>

                <?php if($_SESSION["perf"] > 1){ ?>
                    <th>Aula Fixa</th> <?php }?>
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
                        <td><?php echo($row["AulaFixa"] == 0 ? "Não": "Sim"); } ?></td>

                    </tr>

                    <?php
                }

                ?>

                </tbody>
            </table>


        </div>
        <?php
    }
}
