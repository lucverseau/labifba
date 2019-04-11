<?php
/**
 * Created by IntelliJ IDEA.
 * Userh davia
 * Dateh 07/11/2016
 * Timeh 14h37
 */
include "connect.php";

$link = mysqli_connect($host, $user, $password, $database);
mysqli_query($link, "SET NAMES utf8");

if(isset($_GET["dtsched"])) {
    $datesched = $_POST["datesched"];
}
?>

<form class="margin-bottom" action="?page=sched&dtsched=true" method="post">
    <div class="col-lg-12 text-center"><label for="dtsched">Selecione uma data e um laboratório para consultar disponibilidade de horários: </label></div>
    <div class="col-lg-2 col-lg-offset-4 smaller-margin-bottom"><input type="date" id="dtsched" class="form-control text-center" name="datesched" value=<?php echo (isset($_GET["dtsched"])) ? "$datesched" : " "?> required></div>

    <div class="col-lg-2">
      <?php  $query = "SELECT CodLab, Nome FROM laboratorios";

        $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

        if(mysqli_num_rows($result) <= 0){ //esta estrutura condicional verifica o retorno da consulta sql
        echo "<div class=\"alert alert-warning col-lg-12 text-center\">Não há laboratórios</div>";
        }
        else { ?>
            <select class="form-control" name="labs">
                <?php  while ($row = mysqli_fetch_array($result)) { ?>
                   <option value="<?php echo $row["CodLab"]?>"> <?php echo $row["Nome"] ?> </option>
                <?php
                }
        }?>
            </select>
    </div>

    <div class="col-lg-2 col-lg-offset-5"><button class="btn btn-primary form-control smaller-margin-bottom" type="submit">Consultar</button></div>
</form>

<br>
<br>
<br>
<br>


<?php if(isset($_GET["dtsched"])){

    //$datesched = $_POST["datesched"];
    //echo $datesched;
    $sellab = $_POST["labs"];

    $query = "SELECT idReserva, Laboratorio, DtHrInicio, DtHrFim FROM reservas, laboratorios WHERE Laboratorio = $sellab AND DATE(DtHrInicio) = '$datesched'";

    $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

    while ($row = mysqli_fetch_array($result)) {
        $hora[date("H\hi", strtotime($row["DtHrInicio"]))] = true;
        //echo $hora;
    }
    ?>

    <div class="col-lg-3 col-lg-offset-0">
        <h4 class="text-center">Manhã</h4>
        <table class="table">
            <thead>
                <th>Horários</th>
                <th></th>
            </thead>
            <tbody>
                <tr>
                    <td>07h00 - 07h50</td>
                    <td> <?php if(isset($hora["07h00"]) && $hora["07h00"] == true){
                            echo  "Horário Reservado";
                        }
                        else{ ?>
                          <a href="?page=reservas">Reservar</a>
                      <?php  } ?>
                    </td>
                </tr>
                <tr>
                    <td>07h50 - 08h40</td>
                    <td> <?php if(isset($hora["07h50"]) && $hora["07h50"] == true){
                            echo  "Horário Reservado";
                        }
                        else{ ?>
                            <a href="?page=reservas">Reservar</a>
                        <?php  } ?>
                    </td>
                </tr>
                <tr>
                    <td>08h40 - 09h30</td>
                    <td> <?php if(isset($hora["08h40"]) && $hora["08h40"] == true){
                            echo  "Horário Reservado";
                        }
                        else{ ?>
                            <a href="?page=reservas">Reservar</a>
                        <?php  } ?>
                    </td>
                </tr>
                <tr>
                    <td>09h30 - 10h20</td>
                    <td> <?php if(isset($hora["09h30"]) && $hora["09h30"] == true){
                            echo  "Horário Reservado";
                        }
                        else{ ?>
                            <a href="?page=reservas">Reservar</a>
                        <?php  } ?>
                    </td>
                </tr>
                <tr>
                    <td>10h40 - 11h30</td>
                    <td> <?php if(isset($hora["10h40"]) && $hora["10h40"] == true){
                            echo  "Horário Reservado";
                        }
                        else{ ?>
                            <a href="?page=reservas">Reservar</a>
                        <?php  } ?>
                    </td>
                </tr>
                <tr>
                    <td>11h30 - 12h20</td>
                    <td> <?php if(isset($hora["11h30"]) && $hora["11h30"] == true){
                            echo  "Horário Reservado";
                        }
                        else{ ?>
                            <a href="?page=reservas">Reservar</a>
                        <?php  } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="col-lg-3 col-lg-offset-1">
        <h4 class="text-center">Tarde</h4>
        <table class="table">
            <thead>
                <th>Horários</th>
                <th></th>
            </thead>
            <tbody>
            <tr>
                <td>13h00 - 14h00</td>
                <td> <?php if(isset($hora["13h00"]) && $hora["13h00"] == true){
                        echo  "Horário Reservado";
                    }
                    else{ ?>
                        <a href="?page=reservas">Reservar</a>
                    <?php  } ?>
                </td>
            </tr>
            <tr>
                <td>14h00 - 15h00</td>
                <td> <?php if(isset($hora["14h00"]) && $hora["14h00"] == true){
                        echo  "Horário Reservado";
                    }
                    else{ ?>
                        <a href="?page=reservas">Reservar</a>
                    <?php  } ?>
                </td>
            </tr>
            <tr>
                <td>15h00 - 16h00</td>
                <td> <?php if(isset($hora["15h00"]) && $hora["15h00"] == true){
                        echo  "Horário Reservado";
                    }
                    else{ ?>
                        <a href="?page=reservas">Reservar</a>
                    <?php  } ?>
                </td>
            </tr>
            <tr>
                <td>16h00 - 17h00</td>
                <td> <?php if(isset($hora["16h00"]) && $hora["16h00"] == true){
                        echo  "Horário Reservado";
                    }
                    else{ ?>
                        <a href="?page=reservas">Reservar</a>
                    <?php  } ?>
                </td>
            </tr>
            <tr>
                <td>17h00 - 18h00</td>
                <td> <?php if(isset($hora["17h00"]) && $hora["17h00"] == true){
                        echo  "Horário Reservado";
                    }
                    else{ ?>
                        <a href="?page=reservas">Reservar</a>
                    <?php  } ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="col-lg-3 col-lg-offset-1">
        <h4 class="text-center">Noite</h4>
        <table class="table">
            <thead>
                <th>Horários</th>
                <th></th>
            </thead>
            <tbody>
            <tr>
                <td>18h40 - 19h30</td>
                <td> <?php if(isset($hora["18h40"]) && $hora["18h40"] == true){
                        echo  "Horário Reservado";
                    }
                    else{ ?>
                        <a href="?page=reservas">Reservar</a>
                    <?php  } ?>
                </td>
            </tr>
            <tr>
                <td>19h30 - 20h20</td>
                <td> <?php if(isset($hora["19h30"]) && $hora["19h30"] == true){
                        echo  "Horário Reservado";
                    }
                    else{ ?>
                        <a href="?page=reservas">Reservar</a>
                    <?php  } ?>
                </td>
            </tr>
            <tr>
                <td>20h20 - 21h10</td>
                <td> <?php if(isset($hora["20h20"]) && $hora["20h20"] == true){
                        echo  "Horário Reservado";
                    }
                    else{ ?>
                        <a href="?page=reservas">Reservar</a>
                    <?php  } ?>
                </td>
            </tr>
            <tr>
                <td>21h10 - 22h00</td>
                <td> <?php if(isset($hora["21h10"]) && $hora["21h10"] == true){
                        echo  "Horário Reservado";
                    }
                    else{ ?>
                        <a href="?page=reservas">Reservar</a>
                    <?php  } ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

<?php } ?>