<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 02/11/2016
 * Time: 15:55
 */

//TODO Limitar os campos de texto de acordo com o VARCHAR()

include "connect.php";

$link = mysqli_connect($host, $user, $password, $database);
mysqli_query($link, "SET NAMES utf8");

if($_SESSION["perf"]> 1) {
    ?>

    <form class="form-horizontal smaller-margin-bottom clearfix" action="resources/php/addlabs.php" method="post">
        <div class="row smaller-margin-bottom">
            <div class="col-lg-2"><b>Novo Laboratório:</b></div>
            <div class="col-lg-3">
                <input class="form-control" type="text" size="50" maxlength="50" name="nome" placeholder="Digite um nome" required>
            </div>
            <div class="col-lg-3">
                <input class="form-control" type="number" min="0" max="99999" maxlength="5" name="qtdepc"
                       placeholder="Quantidade de computadores" required>
            </div>
            <div class="col-lg-2">
                <input class="form-control" type="number" min="0" max="99999" size="5" maxlength="5" name="lotacao"
                       placeholder="Lotação do laboratório">
            </div>
            <div class="col-lg-2">
                <button class="btn btn-primary form-control" type="submit">
                    Adicionar
                </button>
            </div>
        </div>
        <div class="col-lg-1"><b>Hardware:</b></div>
        <div class="col-lg-5  lilwindow smaller-margin-bottom">
            <?php
            $query = "SELECT idHardware, `Desc` FROM hardware";
            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) <= 0) { //esta estrutura condicional verifica o retorno da consulta sql
                echo "<div class=\"alert alert-warning text-center\">Não há hardware cadastrado</div>";
            } else {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <label>
                        <input type="checkbox" value="<?php echo $row["idHardware"]; ?>" name="hardware[]">
                        <?php echo $row["Desc"]; ?>&nbsp;&nbsp;&nbsp;
                    </label>

                    <?php
                }
            }
            ?>

        </div>
        <div class="col-lg-1"><b>Software:</b></div>
        <div class="col-lg-5 lilwindow smaller-margin-bottom">
            <?php
            $query = "SELECT idSoftware, Descricao FROM software";
            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) <= 0) { //esta estrutura condicional verifica o retorno da consulta sql
                echo "<div class=\"alert alert-warning text-center\">Não há software cadastrado</div>";
            } else {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <label>
                        <input type="checkbox" value="<?php echo $row["idSoftware"]; ?>" name="software[]">
                        <?php echo $row["Descricao"]; ?>&nbsp;&nbsp;&nbsp;
                    </label>

                    <?php
                }
            }
            ?>

        </div>
    </form>

    <?php
    if (isset($_GET["add"])) {
        if ($_GET["add"] == "true") {
            ?>
            <div class="col-lg-12 alert alert-success text-center">
                <span class="glyphicon glyphicon-ok"> </span>
                Laboratório cadastrado com sucesso!
            </div>
            <?php
        } else {
            ?>
            <div class="col-lg-12 alert alert-danger text-center">
                <span class="glyphicon glyphicon-exclamation-sign"> </span>
                Falha ao cadastrar laboratório!
            </div>
            <?php
        }
    }

    if (isset($_GET["rem"])) {
        if ($_GET["rem"] == "true") {
            ?>
            <div class="col-lg-12 alert alert-success text-center">
                <span class="glyphicon glyphicon-ok"> </span>
                Laboratório removido com sucesso!
            </div>
            <?php
        } else {
            ?>
            <div class="col-lg-12 alert alert-danger text-center">
                <span class="glyphicon glyphicon-exclamation-sign"> </span>
                Falha ao remover laboratório!
            </div>
            <?php
        }
    }

    if (isset($_GET["updt"])) {
        if ($_GET["updt"] == "true") {
            ?>
            <div class="col-lg-12 alert alert-success text-center">
                <span class="glyphicon glyphicon-ok"> </span>
                Laboratório alterado com sucesso!
            </div>
            <?php
        } else {
            ?>
            <div class="col-lg-12 alert alert-danger text-center">
                <span class="glyphicon glyphicon-exclamation-sign"> </span>
                Falha ao alterar laboratório!
            </div>
            <?php
        }
    }

    if (isset($_GET["addh"])) {
        if ($_GET["addh"] == "true") {
            ?>
            <div class="col-lg-12 alert alert-success text-center">
                <span class="glyphicon glyphicon-ok"> </span>
                Hardware cadastrado com sucesso!
            </div>
            <?php
        } else {
            ?>
            <div class="col-lg-12 alert alert-danger text-center">
                <span class="glyphicon glyphicon-exclamation-sign"> </span>
                Falha ao cadastrar hardware!
            </div>
            <?php
        }
    }

    if (isset($_GET["updth"])) {
        if ($_GET["updth"] == "true") {
            ?>
            <div class="col-lg-12 alert alert-success text-center">
                <span class="glyphicon glyphicon-ok"> </span>
                Hardware alterado com sucesso!
            </div>
            <?php
        } else {
            ?>
            <div class="col-lg-12 alert alert-danger text-center">
                <span class="glyphicon glyphicon-exclamation-sign"> </span>
                Falha ao alterar hardware!
            </div>
            <?php
        }
    }

    if (isset($_GET["remh"])) {
        if ($_GET["remh"] == "true") {
            ?>
            <div class="col-lg-12 alert alert-success text-center">
                <span class="glyphicon glyphicon-ok"> </span>
                Hardware removido com sucesso!
            </div>
            <?php
        } else {
            ?>
            <div class="col-lg-12 alert alert-danger text-center">
                <span class="glyphicon glyphicon-exclamation-sign"> </span>
                Falha ao remover hardware!
            </div>
            <?php
        }
    }


    if (isset($_GET["adds"])) {
        if ($_GET["adds"] == "true") {
            ?>
            <div class="col-lg-12 alert alert-success text-center">
                <span class="glyphicon glyphicon-ok"> </span>
                Software cadastrado com sucesso!
            </div>
            <?php
        } else {
            ?>
            <div class="col-lg-12 alert alert-danger text-center">
                <span class="glyphicon glyphicon-exclamation-sign"> </span>
                Falha ao cadastrar software!
            </div>
            <?php
        }
    }

    if (isset($_GET["updts"])) {
        if ($_GET["updts"] == "true") {
            ?>
            <div class="col-lg-12 alert alert-success text-center">
                <span class="glyphicon glyphicon-ok"> </span>
                Software alterado com sucesso!
            </div>
            <?php
        } else {
            ?>
            <div class="col-lg-12 alert alert-danger text-center">
                <span class="glyphicon glyphicon-exclamation-sign"> </span>
                Falha ao alterar software!
            </div>
            <?php
        }
    }

    if (isset($_GET["rems"])) {
        if ($_GET["rems"] == "true") {
            ?>
            <div class="col-lg-12 alert alert-success text-center">
                <span class="glyphicon glyphicon-ok"> </span>
                Software removido com sucesso!
            </div>
            <?php
        } else {
            ?>
            <div class="col-lg-12 alert alert-danger text-center">
                <span class="glyphicon glyphicon-exclamation-sign"> </span>
                Falha ao remover software!
            </div>
            <?php
        }
    }


    if (isset($_POST["alter"])) {
        $codlab = mysqli_real_escape_string($link, trim($_POST["alter"]));

        $query = "SELECT CodLab, Nome, QtdeComputadores, Lotacao FROM laboratorios WHERE CodLab = '$codlab'";
        $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

        if (mysqli_num_rows($result) <= 0) { //esta estrutura condicional verifica o retorno da consulta sql
            echo "Não há laboratórios";
        } else {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <form class="form-horizontal" action="resources/php/updatelabs.php" method="post">
                    <div class="row smaller-margin-bottom">
                        <div class="col-lg-2"><b>Alterar Laboratório:</b></div>
                        <div class="col-lg-2">
                            <input class="form-control" type="text" name="nome" size="50" maxlength="50" value="<?php echo $row["Nome"]; ?>"
                                   placeholder="Digite um nome" required>
                        </div>
                        <div class="col-lg-3">
                            <input class="form-control" type="number" min="0" max="99999" size="5" maxlength="5" name="qtdepc"
                                   value="<?php echo $row["QtdeComputadores"]; ?>"
                                   placeholder="Quantidade de computadores" required>
                        </div>
                        <div class="col-lg-3">
                            <input class="form-control" type="number" min="0" max="99999" size="5" maxlength="5" name="lotacao"
                                   value="<?php echo $row["Lotacao"]; ?>" placeholder="Lotação do laboratório">
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary form-control" type="submit" name="codlab"
                                    value="<?php echo $row["CodLab"]; ?>">
                                Alterar
                            </button>
                        </div>
                    </div>

                    <div class="row smaller-margin-bottom">
                        <div class="col-lg-1"><b>Hardware:</b></div>
                        <div class="col-lg-5  lilwindow">
                            <?php
                            $queryh = "SELECT hardware FROM `lab_h`, hardware WHERE laboratorio = " . $row["CodLab"] . " AND idHardware = hardware";
                            $resulth = mysqli_query($link, $queryh);

                            while ($rowh = mysqli_fetch_array($resulth)) {
                                $hdwch[] = $rowh["hardware"];
                            }

                            $queryh = "SELECT idHardware, `Desc` FROM hardware";
                            $resulth = mysqli_query($link, $queryh);

                            if (mysqli_num_rows($resulth) <= 0) { //esta estrutura condicional verifica o retorno da consulta sql
                                echo "<div class=\"alert alert-warning text-center\">Não há hardware cadastrado</div>";
                            } else {
                                while ($rowh = mysqli_fetch_array($resulth)) {
                                    ?>
                                    <label>
                                        <input type="checkbox" value="<?php echo $rowh["idHardware"]; ?>"
                                               name="hardware[]" <?php echo(in_array($rowh["idHardware"], $hdwch) ? "checked" : ""); ?>>
                                        <?php echo $rowh["Desc"]; ?>&nbsp;&nbsp;&nbsp;
                                    </label>

                                    <?php
                                }
                            }
                            ?>

                        </div>

                        <div class="col-lg-1"><b>Software:</b></div>
                        <div class="col-lg-5  lilwindow">
                            <?php
                            $querys = "SELECT software FROM `lab_s`, software WHERE laboratorio = " . $row["CodLab"] . " AND idSoftware = software";
                            $results = mysqli_query($link, $querys);

                            while ($rows = mysqli_fetch_array($results)) {
                                $sftch[] = $rows["software"];
                            }

                            $querys = "SELECT idSoftware, `Descricao` FROM software";
                            $results = mysqli_query($link, $querys);

                            if (mysqli_num_rows($results) <= 0) { //esta estrutura condicional verifica o retorno da consulta sql

                                echo "<div class=\"alert alert-warning text-center\">Não há software cadastrado</div>";
                            } else {
                                while ($rows = mysqli_fetch_array($results)) {
                                    ?>
                                    <label>
                                        <input type="checkbox" value="<?php echo $rows["idSoftware"]; ?>"
                                               name="software[]" <?php echo(in_array($rows["idSoftware"], $sftch) ? "checked" : ""); ?>>
                                        <?php echo $rows["Descricao"]; ?>&nbsp;&nbsp;&nbsp;
                                    </label>

                                    <?php
                                }
                            }
                            ?>

                        </div>

                    </div>


                </form>


                <?php
            }
        }
    }
}


$query = "SELECT CodLab, Nome, QtdeComputadores, Lotacao FROM laboratorios ORDER BY Nome";
$result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

if(mysqli_num_rows($result) <= 0){ //esta estrutura condicional verifica o retorno da consulta sql
    echo "<div class=\"alert alert-warning col-lg-12 text-center\">Não há laboratórios cadastrados</div>";
}
else {
    ?>

    <div class="col-lg-12">

        <table class="table">
            <thead>
                <th>Nome</th>
                <th title="Quantidade de Computadores">Qtde. PC</th>
                <th>Lotação</th>
                <th>Hardware</th>
                <th>Software</th>
            </thead>
            <tbody>

            <?php
            while ($row = mysqli_fetch_array($result)) {
                //$reslogin = $row["Login"];
                ?>

                <tr>
                    <td><?php echo $row["Nome"]; ?></td>
                    <td><?php echo $row["QtdeComputadores"]; ?></td>
                    <td><?php echo $row["Lotacao"]; ?></td>
                    <td><?php
                        $queryh = "SELECT hardware, `Desc` FROM lab_h, hardware WHERE idHardware = hardware AND laboratorio = ".$row["CodLab"];
                        $resulth = mysqli_query($link, $queryh);

                        while ($rowh = mysqli_fetch_array($resulth)) {
                            $hdw[] = $rowh["Desc"];
                        }

                        if(!empty($hdw)){
                            echo implode(", ", $hdw); //transforma o array num string separado por vírgulas
                            $hdw = array(); //esvazia o array
                        }?></td>
                    <td>
                    <?php
                        $querys = "SELECT software, Descricao FROM lab_s, software WHERE idSoftware = software AND laboratorio = ".$row["CodLab"];
                        $results = mysqli_query($link, $querys);

                        while ($rows = mysqli_fetch_array($results)) {
                            $sft[] = $rows["Descricao"];
                        }

                        if(!empty($sft)) {
                            echo implode(", ", $sft); //transforma o array num string separado por vírgulas
                            $sft = array(); //esvazia o array
                        }?></td>


                    <?php if($_SESSION["perf"]> 1) { ?>

                    <td>
                        <form action="?page=labs" method="post" title="Alterar">
                            <button class="btn btn-default" name="alter" type="submit" value="<?php echo $row["CodLab"]; ?>">
                                <span class="glyphicon glyphicon-pencil"> </span>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="resources/php/removelabs.php" method="post" title="Remover">
                            <button class="btn btn-danger remove" name="remove" type="submit" value="<?php echo $row["CodLab"]; ?>">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </form>
                    </td>
                    <?php } ?>
                </tr>

                <?php
            }

            ?>

            </tbody>
        </table>


    </div>
    <?php
}

if($_SESSION["perf"] > 1) {


    if (isset($_POST["alterh"])) {
        $idHard = mysqli_real_escape_string($link, trim($_POST["alterh"]));

        $query = "SELECT idHardware, `Desc` FROM hardware WHERE idHardware = '$idHard'";
        $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

        if (mysqli_num_rows($result) <= 0) { //esta estrutura condicional verifica o retorno da consulta sql
            echo "<div class=\"alert alert-warning col-lg-12 text-center\">Não há hardware</div>";
        } else {
            while ($row = mysqli_fetch_array($result)) {
                ;
                ?>
                <form class="form-horizontal" action="resources/php/updateh.php" method="post">
                    <div class="row smaller-margin-bottom">
                        <div class="col-lg-4">
                            <input class="form-control" type="text" name="desch" value="<?php echo $row["Desc"]; ?>"
                                   placeholder="Descrição do Hardware" required>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary form-control" type="submit" name="idhard"
                                    value="<?php echo $row["idHardware"]; ?>">
                                Alterar
                            </button>
                        </div>
                    </div>
                </form>
                <?php
            }
        }
    }


    if (isset($_POST["alters"])) {
        $idSoft = mysqli_real_escape_string($link, trim($_POST["alters"]));

        $query = "SELECT idSoftware, `Descricao` FROM software WHERE idSoftware = '$idSoft'";
        $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

        if (mysqli_num_rows($result) <= 0) { //esta estrutura condicional verifica o retorno da consulta sql
            echo "<div class=\"alert alert-warning col-lg-12 text-center\">Não há software</div>";
        } else {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <form class="form-horizontal" action="resources/php/updates.php" method="post">
                    <div class="row smaller-margin-bottom">
                        <div class="col-lg-4 col-lg-offset-6">
                            <input class="form-control" type="text" name="descs"
                                   value="<?php echo $row["Descricao"]; ?>" placeholder="Descrição do Software"
                                   required>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary form-control" type="submit" name="idsoft"
                                    value="<?php echo $row["idSoftware"]; ?>">
                                Alterar
                            </button>
                        </div>
                    </div>
                </form>
                <?php
            }
        }
    }


    ?>

    <div class="row smaller-margin-bottom">
        <form class="form-horizontal" action="resources/php/addhdw.php" method="post">
            <div class="col-lg-1"><b>Novo Hardware:</b></div>
            <div class="col-lg-4"><input class="form-control" type="text" size="300" maxlength="300" name="deschard"
                                         placeholder="Descrição do Hardware"></div>
            <div class="col-lg-1">
                <button class="btn btn-primary form-control" type="submit"> Adicionar</button>
            </div>
        </form>

        <form class="form-horizontal" action="resources/php/addsft.php" method="post">
            <div class="col-lg-1"><b>Novo Software:</b></div>
            <div class="col-lg-4"><input class="form-control" type="text" size="300" maxlength="300" name="descsoft"
                                         placeholder="Descrição do Software"></div>
            <div class="col-lg-1">
                <button class="btn btn-primary form-control" type="submit"> Adicionar</button>
            </div>
        </form>
    </div>

    <?php
    $query = "SELECT idHardware,`Desc` FROM hardware ORDER BY `Desc`";
    $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

    if (mysqli_num_rows($result) <= 0) { //esta estrutura condicional verifica o retorno da consulta sql
        echo "<div class=\"alert alert-warning col-lg-6 text-center\">Não há hardware cadastrados</div>";
    } else {
        ?>

        <div class="col-lg-6">

            <table class="table">
                <thead>
                <th>Hardware - Descrição</th>
                </thead>
                <tbody>

                <?php
                while ($row = mysqli_fetch_array($result)) {
                    //$reslogin = $row["Login"];
                    ?>

                    <tr>
                        <td><?php echo $row["Desc"]; ?></td>
                        <td>
                            <form action="?page=labs" method="post" title="Alterar">
                                <button class="btn btn-default" name="alterh" type="submit"
                                        value="<?php echo $row["idHardware"]; ?>">
                                    <span class="glyphicon glyphicon-pencil"> </span>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="resources/php/removeh.php" method="post" title="Remover">
                                <button class="btn btn-danger remove" name="removeh" type="submit"
                                        value="<?php echo $row["idHardware"]; ?>">
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

    $query = "SELECT idSoftware, Descricao FROM software ORDER BY Descricao";
    $result = mysqli_query($link, $query); //armazena na variável result o retorno da consulta sql

    if (mysqli_num_rows($result) <= 0) { //esta estrutura condicional verifica o retorno da consulta sql
        echo "<div class=\"alert alert-warning col-lg-6 text-center\">Não há software cadastrados</div>";
    } else {
        ?>

        <div class="col-lg-6">

            <table class="table">
                <thead>
                <th>Software - Descrição</th>
                </thead>
                <tbody>

                <?php
                while ($row = mysqli_fetch_array($result)) {
                    //$reslogin = $row["Login"];
                    ?>

                    <tr>
                        <td><?php echo $row["Descricao"]; ?></td>
                        <td>
                            <form action="?page=labs" method="post" title="Alterar">
                                <button class="btn btn-default" name="alters" type="submit"
                                        value="<?php echo $row["idSoftware"]; ?>">
                                    <span class="glyphicon glyphicon-pencil"> </span>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="resources/php/removes.php" method="post" title="Remover">
                                <button class="btn btn-danger remove" name="removes" type="submit"
                                        value="<?php echo $row["idSoftware"]; ?>">
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
}
    ?>

