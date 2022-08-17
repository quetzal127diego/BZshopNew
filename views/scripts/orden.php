<?php


use MyApp\Query\Select;
use MyApp\Query\Ejecuta;
use MyApp\data\database;

require("../../vendor/autoload.php");

        extract($_POST);

        $correo=$_POST["correo"];

        $queryS=new Select();
        $cadena="SELECT id_user FROM usuario WHERE correo LIKE '%$correo%' ";
        $reg=$queryS->seleccionar($cadena);
            
        $update = "INSERT orden(fecha_orden, usr) 
        VALUES ('2022-17-08', $reg)";

        $consulta = $queryM->ejecuta($update);
        if ($consulta==1)
        {
            header("Location: ../indice.php");
        }
        else
        {
            echo "<div class='alert alert-danger'> Error en el php puto </div>";   
        }

?>