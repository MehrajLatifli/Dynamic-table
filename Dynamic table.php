<?php

$rowcount = $columncount = array("1", "2", "3", "4", "5", "6", "7", "8");

$colorarray = array("red", "black", "gray", "orange", "deepskyblue", "green", "darkcyan", "purple");

$row = isset($_POST["row"]) ? $_POST["row"] : '';
$column = isset($_POST["column"]) ? $_POST["column"] : '';
$color = isset($_POST["color"]) ? $_POST["color"] : '';
$checkedlist = isset($_POST["checkedlist"]) ? $_POST["checkedlist"] : '';


$r = "";
$c = "";
$cr = "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic table</title>

    <style type="text/css">
        td {
            width: 50px;
            height: 50px;
            text-align: center;
            background-color: transparent;
            border: 2px solid wheat;
        }
    </style>

</head>

<body>


    <form action="" method="POST">

        <div>

            <h2>Select row:</h2>

            <select name="row" id="row">

                <?php
                foreach ($rowcount as $value) {

                    $r = $value;

                    if (isset($_POST['row']) && $_POST['row'] == $r) {

                        echo "<option selected>$r</option>";
                    } else {
                        echo "<option >$r</option>";
                    }
                }
                ?>

            </select>

        </div>

        <div>

            <h2>Select column:</h2>

            <select name="column" id="column">

                <?php
                foreach ($columncount as $value) {

                    $c = $value;

                    if (isset($_POST['column']) && $_POST['column'] == $c) {

                        echo "<option selected>$c</option>";
                    } else {
                        echo "<option >$c</option>";
                    }
                }
                ?>

            </select>

        </div>

        <div>

            <h2>Select color:</h2>

            <select name="color" id="color">

                <?php
                foreach ($colorarray as $value) {

                    $cr = $value;

                    if (isset($_POST['color']) && $_POST['color'] == $cr) {

                        echo "<option selected>$cr</option>";
                    } else {
                        echo "<option style='color:$cr' >$cr</option>";
                    }
                }
                ?>

            </select>

        </div>

        <br>

        <table>

            <tbody>

                <?php

                if (isset($_POST["row"]) &&  isset($_POST["column"])) {

                    $c = $_POST['column'];

                    $checkedcellcolor =  $_POST['color'];

                    for ($row = 1; $row <= $_POST["row"]; $row++) {
                         
                        echo ("<tr>");
                        for ($column = 1; $column <= $_POST["column"]; $column++) {

                            if (isset($_POST['column']) && $_POST['column'] == $c) {

                                $v = "col" . $column . "row" . $row;

                                if (isset($_POST['checkedlist']) && in_array($v, $_POST['checkedlist'])) {

                                    echo ("<td id='$v' > <input type='checkbox' checked='checked' name='checkedlist[]' value='$v' ></td>");
                               
                                } 
                                else {

                                    echo ("<td id='$v'> <input type='checkbox' name='checkedlist[]' value='$v' ></td>");

                                }
                            }
                        }
                        echo ("</tr>");
                    }
                }

            
                ?>

            </tbody>

        </table>

        <br>

        <div>

            <input type="submit" value="Create table" />

        </div>

    </form>


    <br>

    <table class="table">

        <tbody>

            <?php

            if (isset($_POST["row"]) &&  isset($_POST["column"])) {

                $c = $_POST['column'];

                $checkedcellcolor =  $_POST['color'];

                for ($row = 1; $row <= $_POST["row"]; $row++) {

                    echo ("<tr>");
                    for ($column = 1; $column <= $_POST["column"]; $column++) {

                        if (isset($_POST['column']) && $_POST['column'] == $c) {

                            $v = "col" . $column . "row" . $row;

                            if (isset($_POST['checkedlist']) && in_array($v, $_POST['checkedlist'])) {

                                echo ("<td id='$v' style='background-color: $checkedcellcolor'></td>");

                            } 
                            else {

                                echo ("<td id='$v' style='background-color: transparent'></td>");

                            }
                        }
                    }
                    echo ("</tr>");
                }
            }
      
            ?>

        </tbody>

    </table>

</body>

</html>