<?php
require_once "../../configuracion/env.php";
include URL_CONTROLADORES . "carrito.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ver Bonsais</title>
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--Inclusion de archivos css-->
	<meta name="page_type" content="np-template-header-footer-from-plugin">
	<link rel="stylesheet" href="../../publico/css/nicepage.css" media="screen">
	<link rel="stylesheet" type="text/css" href="publico/css/bootstrap.css">
	<script class="u-script" type="text/javascript" src="../../publico/js/nicepage.js" defer=""></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="../../publico/js/jquery.1.11.1.js"></script>
	<script type="text/javascript" src="../../publico/js/bootstrap.js"></script>
	<meta property="og:title" content="Inicio">
	<meta property="og:type" content="website">
	<meta name="theme-color" content="#478ac9">
	<link rel="canonical" href="index.html">
	<meta property="og:url" content="index.html">
</head>

<body data-home-page="Iniciar-Sesión.html" data-home-page-title="Iniciar Sesión" class="u-body">
	<!--Nav Bar-->
	<?php include "../../app/vista/plantilla/menuCliente.php"; ?>
	<!--Fin del NavBar-->

	<br>
	<h3>Productos del Carrito</h3>
	<!--Comprobación del tamaño del carrito-->
	<?php if (!empty($_SESSION['Carrito'])) { ?>

		<div class="container">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th class="40% text-center">Descripción</th>
						<th class="15% text-center">Cantidad</th>
						<th class="20% text-center">Precio</th>
						<th class="20% text-center">Total</th>
						<th class="5%"></th>
					</tr>
				</thead>

				<tbody>
					<!--Iniciamos recorrido del carrito-->
					<?php $total = 0 ?>
					<?php foreach ($_SESSION['Carrito'] as $indice => $producto) { ?>
						<?php $total = $total + $producto['cantidad'] * $producto['precio'] ?>

						<tr>
							<th class="40%"><?php echo $producto['nombre'] ?></th>
							<th class="15% text-center"><?php echo $producto['cantidad'] ?></th>
							<th class="20% text-center"><?php echo $producto['precio'] ?></th>
							<th class="20% text-center"><?php echo number_format($producto['cantidad'] * $producto['precio'], 2) ?></th>
							<th class="5%  text-center">
								<form action="" method="post">
									<input type="hidden" name="id" id="id" value="<?php echo $producto['id'] ?>">
									<button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button>
								</form>
							</th>
						</tr>

					<?php } ?>

					<tr>
						<td class="text-right" colspan="3">
							<h3>Total</h3>
						</td>
						<td class="text-right" colspan="2" style="color:green">
							<h3>$<?php echo number_format($total, 2) ?></h3>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="text-center">
			<form method="post" action="pedido.php">
				<button class="btn btn-primary" type="submit">Comprar</button>
			</form>
		</div>
		<!--Fin de Comprobación del carrito-->
	<?php } else { ?>
		<div class="alert alert-success" role="alert">
			¡No Hay productos en el Carrito!
		</div>
	<?php } ?>
	</body>
</html>