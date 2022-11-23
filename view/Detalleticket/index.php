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
					
        <article class="activity-line-item box-typical">
					<div class="activity-line-date">
						Lunes<br/>
						sep 8
					</div>
					<header class="activity-line-item-header">
						<div class="activity-line-item-user">
							<div class="activity-line-item-user-photo">
								<a href="#">
									<img src="../../public/img/photo-64-2.jpg" alt="">
								</a>
							</div>
							<div class="activity-line-item-user-name">Yanez Marco</div>
							<div class="activity-line-item-user-status">Developer, La Serena</div>
						</div>
					</header>
					<div class="activity-line-action-list">
						<section class="activity-line-action">
							<div class="time">10:40 AM</div>
							<div class="cont">
								<div class="cont-in">
									<p>Started nes UI migration</p>
									<ul class="meta">
										<li><a href="#">5 Comments</a></li>
										<li><a href="#">5 Likes</a></li>
									</ul>
								</div>
							</div>
						</section><!--.activity-line-action-->
						<section class="activity-line-action">
							<div class="dot"></div>
							<div class="time">10:40 AM</div>
							<div class="cont">
								<div class="cont-in">
									<p>Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller, Mark Taylor</p>
									<ul class="meta">
										<li><a href="#">5 Comments</a></li>
										<li><a href="#">5 Likes</a></li>
									</ul>
								</div>
							</div>
						</section><!--.activity-line-action-->
						<section class="activity-line-action">
							<div class="time">10:40 AM</div>
							<div class="cont">
								<div class="cont-in">
									<p>Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller, Mark Taylor</p>
									<ul class="meta">
										<li><a href="#">5 Comments</a></li>
										<li><a href="#">1 Likes</a></li>
									</ul>
								</div>
							</div>
						</section><!--.activity-line-action-->
					</div><!--.activity-line-action-list-->
				</article><!--.activity-line-item-->
					
		

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