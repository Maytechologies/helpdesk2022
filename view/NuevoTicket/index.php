<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>


    <!DOCTYPE html>
    <html>
    <?php require_once("../MainHead/head.php"); ?>
    <title>MAYTech | Nuevo Ticket</title>
    </head>

    <body class="with-side-menu">
        <?php require_once("../MainHeader/header.php"); ?>


        <div class="mobile-menu-left-overlay"></div>

        <?php require_once("../MainNav/nav.php"); ?>

        <!-- ==== Cuerpo Principal ===== -->
        <div class="page-content">
            <div class="container-fluid">

                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Nuevo Ticket</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="#">Inicio</a></li>
                                    <li class="active">Nuevo Ticket</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="box-typical box-typical-padding">
                    <p>
                        <span style="color: gray;">Modulo donde podras registrar nuevos tickets, asi poder realizarle segimiento oportuno</span>
                    </p>

                    <h5 class="m-t-lg with-border">Ingresar información</h5>

                    <div class="row">
                        <form method="post" id="ticket_form">
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="cat_id">Categoria :</label>
                                    <select class="form-control" id="cat_id" name="cat_id">
                                        
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <input type="hidden" name="usu_id" id="usu_id" value="<?php echo $_SESSION["usu_id"]?>">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="tick_titulo" >Titulo :</label>
                                    <input type="text" class="form-control" id="tick_titulo" name="tick_titulo" placeholder="Ingrese el titulo del Ticket" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="tick_descrip">Descripción :</label>
                                    <div class="summernote-theme-1">
                                        <textarea id="tick_descrip" class="summernote" name="tick_descrip" name="name"></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row text-center">
                            <div class="col-lg-12">
                            <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Registrar</button>
                            </div>
                            </div>
                        </form>
                    </div>
                    <!--.row-->


                </div>
                <!--.container-fluid-->
            </div>
            <!--.page-content-->



            <?php require_once("../MainJs/js.php"); ?>
            <script type="text/javascript" src="nuevoticket.js"></script>
    </body>

    </html>

<?php
} else {
    header("location:" . Conectar::ruta() . "index.php");
}
?>