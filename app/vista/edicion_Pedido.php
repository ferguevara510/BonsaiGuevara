<?php 
require_once "../../configuracion/env.php";
require_once "../modelo/direccion.php";
?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Blooms, For Every Occasion">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Editar Dirección</title>
    <link rel="stylesheet" href="<?php echo URL_CSS?>registrarCliente.css" media="screen">
    <link rel="stylesheet" href="<?php echo URL_CSS?>nicepage.css" media="screen">
    <link rel="stylesheet" href="<?php echo URL_CSS?>Iniciar-Sesión.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS?>style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS?>bootstrap.css">
    <script class="u-script" type="text/javascript" src="<?php echo URL_JS?>nicepage.js" defer=""></script>

    <meta name="generator" content="Nicepage 3.11.0, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <script type="text/javascript" src="<?php echo URL_JS?>jquery.1.11.1.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>jquery.isotope.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>cliente.js"></script>

    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "index.html",
		"logo": "../../publico/imagenes/bonsai_karla.png"
}</script>
    <meta property="og:title" content="Inicio">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
</head>

<body>

<?php 
    if(isset($_POST['btnEdicion'])) {
        switch($_POST['btnEdicion']){
            case 'editar':
?>

<?php 
    $direccion = new Direccion();
    $direccion = $direccion->getDireccion($_POST['id_direccion']);
?>

    <div class="container">
        <h2>Dirección</h2>
        <?php echo $_POST['id_direccion']; ?>
        <form action="<?php echo URL_CONTROLADORES?>edicion_Pedido.php" method="post">

            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="<?php echo $direccion->estado; ?>">
            </div>

            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?php echo $direccion->ciudad; ?>">
            </div>

            <div class="form-group">
                <label for="calle">Calle</label>
                <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="<?php echo $direccion->calle; ?>">
            </div>

            <div class="form-group">
                <label for="colonia">Colonia</label>
                <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" value="<?php echo $direccion->colonia; ?>">
            </div>


            <div class="form-group">
                <label for="nExterior">No. Exterior</label>
                <input type="text" class="form-control" id="numExt" name="numExt" placeholder="#" value="<?php echo $direccion->numExt; ?>">
            </div>


            <div class="form-group">
                <label for="nInterior">No. Interior</label>
                <input type="text" class="form-control" id="numInt" name="numInt" placeholder="#" value="<?php echo $direccion->numInt; ?>">
            </div>


            <div class="form-group">
                <label for="cp">Código Postal</label>
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="#" value="<?php echo $direccion->codigo_postal; ?>">
            </div>

            <div class="form-group">
                <input type='hidden' name='id_direccion' id='id_direccion' value="<?php echo $direccion->id_direccion; ?>">
            </div>
            
            <div>
                <button class="btn btn-success" name="btnConfirmar" value="Aceptar" type="submit">Aceptar</button>
                <button class="btn btn-danger" name="btnConfirmar" value="Cancelar" type="submit">Cancelar</button>
            </div>
        </form>
    </div>

<?php 
    break;

    case 'cancelar':
?>

    <div class="container text-center">
        <form action="<?php echo URL_CONTROLADORES?>cancelar_Pedido.php" method="POST">
            <div class="form-group">
                <label >¿Estas seguro que deseas cancelar el pedido?</label>
                <input type='hidden' name='folio' id='folio' value="<?php echo $_POST['folio']; ?>">
            </div>

            <div>
                <button class="btn btn-success" name="btnConfirmar" value="Si" type="submit">SI</button>
                <button class="btn btn-danger" name="btnConfirmar" value="No" type="submit">NO</button>
            </div>
        </form>
    </div>

<?php
        break;
        }    
    } 
?>    
</body>
</html>