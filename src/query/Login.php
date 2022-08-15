<?php

namespace MyApp\Query;
use PDO;
use PDOException;
use MyApp\Data\database;

class Login
{
    public function verificalogin($usuario, $contra)
    {
        try
        {
            $pase = 0;
            $cc = new database("bzshop","root","");
            $objetoPDO = $cc->getPDO();

            $query = "SELECT * FROM usuarios WHERE usuario ='$usuario'";
            $consulta = $objetoPDO->query($query);

            while($renglon = $consulta->fetch(PDO::FETCH_ASSOC))
            {
                if (password_verify($contra,$renglon['password'])) 
                {
                    $pase =1;  
                }
            }
            if($pase > 0 )
            {
                session_start();
                $_SESSION["usuario"] = $usuario;
                echo "<div class='alert alert-success'>";
                echo"<h2 align='center'>Bienvenido ".$_SESSION["usuario"]."</h2>";
                echo "</div>";
                header("refresh:2 ../../index.php");
            }
            else
            {
                echo "<div class='alert alert-danger'>";
                echo"<h2 align='center'> Usuario o password incorrecto</h2>";
                echo "</div>";
                header("refresh:2 ../../views/altausuario.php");
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function cerrarsesion()
    {
        session_start();
        session_destroy();
        header("Location: ../../index.php");
    }

}