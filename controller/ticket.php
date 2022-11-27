<?php
require_once("../config/conexion.php");
require_once("../models/Ticket.php");
$ticket = new Ticket();

require_once("../models/Usuario.php");
$usuario = new Usuario();




switch ($_GET["op"]) {

    case "insert":

        $ticket->insert_ticket($_POST["usu_id"],$_POST["cat_id"],$_POST["tick_titulo"],$_POST["tick_descrip"]);
        
    break;

    case "listar_x_usu":
        $datos=$ticket->listar_ticket_x_usu($_POST["usu_id"]);
        $data= Array();
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["tick_id"];
            $sub_array[] = $row["cat_nom"];
            $sub_array[] = $row["tick_titulo"];

            if ($row["tick_estado"]==='Abierto') {
                $sub_array[]= '<span class="label label-pill label-success">Abierto</span>';
            } else {
                $sub_array[]= '<span class="label label-pill label-danger">Cerrado</span>';
            }

            $sub_array[] = date("d/m/Y  H:i", strtotime($row["fech_crea"]));
            $sub_array[] = '<button type="button" onClick="ver('.$row["tick_id"].');"  id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
            $data[] = $sub_array;
          }
          
          $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
             echo json_encode($results);

    break;


    case "listar":
            $datos=$ticket->listar_ticket();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["tick_id"];
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["tick_titulo"];

                if ($row["tick_estado"]==='Abierto') {
                    $sub_array[]= '<span class="label label-pill label-success">Abierto</span>';
                } else {
                    $sub_array[]= '<span class="label label-pill label-danger">Cerrado</span>';
                }


                $sub_array[] = date("d/m/Y  H:i", strtotime($row["fech_crea"]));
                $sub_array[] = '<button type="button" onClick="ver('.$row["tick_id"].');"  id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
              }
              
              $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                 echo json_encode($results);
    
    break;


    case "listardetalle":

        $datos=$ticket->listar_ticketdetalles_x_ticket($_POST["tick_id"]);
    ?>
            <?php
               foreach($datos as $row){
                ?>

        <article class="activity-line-item box-typical">
					<div class="activity-line-date">
						<?php echo date("d/m/Y", strtotime($row["fech_crea"]));?>
					</div>
					<header class="activity-line-item-header">
						<div class="activity-line-item-user">
							<div class="activity-line-item-user-photo">
								<a href="#">
									<img src="../../public/img/photo-64-2.jpg" alt="">
								</a>
							</div>
							<div class="activity-line-item-user-name"><?php echo $row['usu_nom'].' '.$row['usu_apep'];?></div>
                            <?php 
                            if ($row ['rol_nom'] === 'Usuario' ){

                            ?>
                                  <div class="activity-line-item-user-status text-primary"><?php echo $row ["rol_nom"] ;?></div>
                             <?php
                            } else{
                            ?>
                                  <div class="activity-line-item-user-status text-danger"><?php echo $row ["rol_nom"] ;?></div>
                            
                            <?php
							  }
                              ?>
						</div>
					</header>
					<div class="activity-line-action-list">

						<section class="activity-line-action">
							<div class="time" style="font-weight: bold;"><?php echo date("H:i:s", strtotime($row["fech_crea"]));?></div>
							<div class="cont">
								<div class="cont-in">
									<p><?php echo $row ["tickd_descrip"] ;?></p>
								</div>
							</div>
						</section><!--.activity-line-action-->
					</div><!--.activity-line-action-list-->
		</article><!--.activity-line-item-->
					
               
               <?php
               }
            ?>
    <?php
    break;
}
    ?>