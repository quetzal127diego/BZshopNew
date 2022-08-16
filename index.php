<!doctype html>
<html lang="en">
  <head>
    <title>BZshop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="views\cards.css">
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
		background-color:background: #808080;
        background: -moz-linear-gradient(top, #808080 0%, #B3B3B3 50%, #C5C5C5 100%);
        background: -webkit-linear-gradient(top, #808080 0%, #B3B3B3 50%, #C5C5C5 100%);
        background: linear-gradient(to bottom, #808080 0%, #B3B3B3 50%, #C5C5C5 100%);;
		background-size: 100vw 100vh;
		background-repeat: no-repeat;
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
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        <!-- botones del user-->
        <li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='/views/FormLogin.php'>Login</a>
          </li>
        <?php 
              use MyApp\Query\Select;
              require("vendor/autoload.php");
              $queryS=new Select();
              $cadena="SELECT categoria_prenda.cve_pcat,categoria_prenda.prenda from categoria_prenda";
              $reg=$queryS->seleccionar($cadena);
              
              echo "  
              <select name='categoria_prenda' class='nav-item dropdown bg-dark form-select clr-blanco quitar-borde'>
              <option selected>Categorias</option>";

              foreach($reg as $value)
              {
                echo "<option class='dropdown-item' value='".$value->cve_pcat."'>".$value->prenda."</option> ";
                $like = $value->prenda;
              }
              echo "</select>";
            ?>

            <!-- botones del admin-->
            <li class='nav-item dropdown'> 
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Administrar
                    </a> 
                    <ul class="dropdown-menu bg-dark " aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item clr-blanco" href="views/AdminProd.php">Administrar Productos</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item clr-blanco" href="views/Ventas.php">Registros de Venta</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item clr-blanco" href="views/Clientes.php">Clientes Registrados</a></li>
                    </ul>
                  </li>
            
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

<?php
$query = new Select();

$cadena = "SELECT imagen,nombre,precio,exitencia,prenda FROM productos JOIN categoria_prenda on 
productos.categoria_prenda= categoria_prenda.cve_pcat where exitencia>0";

$card = $query->seleccionar($cadena);
?>

<div class="title-cards">
<h2 class="titulo">Algunos de Nuestros Productos</h2>
</div>

<div class="row">
<?php
foreach ($card as $registros){
?>
<div class="container-card col-lg-4">
<div class="card card_t">
<figure class='sizeimg'>
<?php echo "<img src='views/scripts/$registros->imagen'>";?>
</figure>
<div class="contenido-card">
<h3><?php echo $registros->nombre?></h3>
<p><?php echo $registros->precio?></p>
<p><?php echo $registros->exitencia?></p>
<p><?php echo $registros->prenda?></p>
<a href="#">Ver Producto</a>
<a href="#">Agregar al carrito</a>
</div>
</div>
</div>
<?php
}
?>

<!-- inicio del usuario-->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>