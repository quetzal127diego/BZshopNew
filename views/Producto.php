
<?php
use MyApp\Query\Select;
?>
 <!doctype html>
<html lang="en">
  <head>
    <title>BZshop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="cards2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat|Montserrat+Alternates|Poppins&display=swap');
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Montserrat Alternates', sans-serif;
	}
    
	body
    {
		background-image: url('../src/img/diagonal_striped_brick.png');
	}
    
	.cont-menu{
		width: 100%;
		max-width: 250px;
		background: #FFF383;
	}
    .clr-blanco
    {
        color:white;
    }
    .quitar-borde
    {
        border: none !important;
    }
    .borde 
    {
        border:solid;
        border-color: white;
    }
    .opciones
    {
        margin-top: 2px;

    }

    /*Cards*/
    
   
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BZ shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            	<input type="button" class="boton"value="Página anterior" onClick="history.go(-1);">
          </li>
          </ul>
</div>
</div>
  </nav>


    <?php
    if (isset($_SESSION))
        $producto=$_GET["id"];
    ?>
<div class="row">
<?php
require("../vendor/autoload.php");
$query=new Select();
$consulta = "SELECT productos.nombre, productos.precio, productos.exitencia, productos.talla, productos.color, categoria.nom_cat, categoria_prenda.prenda, genero.genero, productos.imagen FROM productos JOIN categoria ON productos.categoria=categoria.cve_cat JOIN categoria_prenda ON productos.categoria_prenda=categoria_prenda.cve_pcat JOIN genero ON 
productos.genero=genero.cve_gen WHERE cve_prod =$producto";
$registros = $query ->seleccionar($consulta);
$imagen = $registros[0]->imagen;
$nombre = $registros[0]->nombre;
$precio = $registros[0]->precio;
$exitencia = $registros[0]->exitencia;
$prenda = $registros[0]->prenda;
$genero = $registros[0]->genero;
$categoria = $registros[0]->nom_cat;

?>
<div class="row">
<div class=" col-lg-6">
<br><br><br><br><br>
        <div class="product-container">
            <?php echo "<img src='scripts/$imagen'>";?>            
        </div>
        </div>
        <div class="col-lg-1"></div>
    <div class=" col-lg-3 container">
        <br><br><br><br><br>
        <br><br><br><br><br>
    <h1><?php echo $nombre?></h1><br>
    <h2><?php echo "$". $precio?></h2><br>
    <table class="table">
        
        <tbody>
            <tr>
                <td scope="row"></td>
                <td><h5><?php echo "Existencia: " . $exitencia?></h5></td>
                <td><h5><?php echo "Categoria: " . $prenda?></h5><br></td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td><h5><?php echo "Genero: " . $genero?></h5></td>
                <td><h5><?php echo "Tipo: " . $categoria?></h5></td>
            </tr>
        </tbody>
    </table>
        <button type="submit" class="btn btn-primary">Solicitar Prenda</button>
</div>
    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>