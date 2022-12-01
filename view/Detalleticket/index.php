<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>


    <!DOCTYPE html>
    <html>
    <?php require_once("../MainHead/head.php"); ?>
    <title>MAYTech | Consultar Ticket</title>
    </head>

    <body class="with-side-menu">
        <?php require_once("../MainHeader/header.php"); ?>


        <div class="mobile-menu-left-overlay"></div>

        <?php require_once("../MainNav/nav.php"); ?>

        <!-- Contenido -->
        <div class="page-content">
            <div class="container"><!-- 1er Container -->
                

                <!--  TODO:INICIO DEL HEADER ETIQUETAS PRINCIPALES -->
                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Detalles del Ticket - N° 1</h3>
                                <span class="label label-pill label-danger">Cerrado</span>
                                <span class="label label-pill label-success">Usuario</span>
                                <span class="label label-pill label-primary">Fecha</span>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">detalles del ticket</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- FINAL DEL HEADER PRINCIPAL -->


                <!-- TODO:INICIO DETALLES DEL TICKET DE APERTURA -->
                
                    <div class="box-typical box-typical-padding">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="cat_nom" class="form-label semibold">Categoria</label>
                                    <input type="text" readonly class="form-control" id="cat_nom" name="cat_nom">
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tick_titulo" class="form-label semibold">Titulo del Ticket</label>
                                    <input type="text" readonly class="form-control" id="tick_titulo" name="tick_titulo">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <label for="" class="form-label semibold">Descripcion Detallada</label>
                                    <input type="text" readonly class="form-control" id="tick_titulo" name="tick_titulo">
                                </div>
                            </div>
                        </div><!-- row -->
                    </div>
                

                <hr>



                <section class="activity-line" id="lbldetalle">
                </section>

                <div class="box-typical box-typical-padding">
                    <p>Ingresar Nuevo Mensaje para el Tikeck</p>
                    <div class="row">

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
                                <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Agregar</button>
                                <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-warning">Cerrar Ticket</button>
                            </div>
                        </div>

                    </div>
                    <!--.row-->
                </div>
        
            </div> <!-- End Container -->





        </div>
        <!-- Contenido -->



        <?php require_once("../MainJs/js.php"); ?>
        <script type="text/javascript" src="detalleticket.js"></script>
    </body>

    </html>

<?php
} else {
    header("location:" . Conectar::ruta() . "index.php");
}
?>