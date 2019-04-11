<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 02/11/2016
 * Time: 15:55
 */

//TODO ordenar consulta;
//TODO adicionar botões para adicionar, alterar e excluir reserva

include "connect.php";

$link = mysqli_connect($host, $user, $password, $database);

$query = "SELECT Usuario, Nome, Laboratorio, DtHrInicio, DtHrFim, Disciplina FROM reservas, usuarios WHERE usuarios.Login = reservas.Usuario AND AulaFixa = 1";
$result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

if(mysqli_num_rows($result) <= 0){ //esta estrutura condicional verifica o retorno da consulta sql
    echo "<div class=\"alert alert-warning col-lg-12 text-center\">Não há reservas cadastradas</div>";
}
else {
    ?>

    <div class="col-lg-12">

        <table class="table">
            <thead>
            <th>Usuário</th>
            <th>Laboratório</th>
            <th>Início</th>
            <th>Fim</th>
            <th>Disciplina</th>
            </thead>
            <tbody>

            <?php
            while ($row = mysqli_fetch_array($result)) {
                //$reslogin = $row["Login"];
                ?>

                <tr>
                    <td><?php echo $row["Nome"]; ?></td>
                    <td><?php echo $row["Laboratorio"]; ?></td>
                    <td><?php echo date("d\/m\/Y - H\hi", strtotime($row["DtHrInicio"])); ?></td>
                    <td><?php echo date("d\/m\/Y - H\hi", strtotime($row["DtHrFim"])); ?></td>
                    <td><?php echo $row["Disciplina"]; ?></td>

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