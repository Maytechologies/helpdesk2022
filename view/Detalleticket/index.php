<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])){
?>


<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
    <title>MAYTech | Consultar Ticket</title>
</head>
<body class="with-side-menu">
    <?php require_once("../MainHeader/header.php");?>
	

<div class="mobile-menu-left-overlay"></div>

    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container">
            <section class="activity-line" id="lbldetalle">

               

            </section>
		</div>
	</div>
	<!-- Contenido -->



	<?php require_once("../MainJs/js.php");?>
	<script type="text/javascript" src="detalleticket.js"></script>
</body>
</html>

<?php
}else{
  header("location:".Conectar::ruta()."index.php");
}
?>