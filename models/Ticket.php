<?php
  class Ticket extends Conectar{

    /* TODO:Insertar nuevo ticket */
     public function insert_ticket($usu_id, $cat_id, $tick_titulo, $tick_descrip ){
        $conectar =parent::conexion();
        parent::set_names();
        $Sql="call SP_I_NEW_TICK (?,?,?,?)";
        $Sql=$conectar->prepare($Sql);
        
        $Sql->bindValue(1, $usu_id);
        $Sql->bindValue(2, $cat_id);
        $Sql->bindValue(3, $tick_titulo);
        $Sql->bindValue(4, $tick_descrip);
        $Sql->execute();

        return $resultado = $Sql->fetchAll(pdo::FETCH_ASSOC);

      }
     

       /* TODO: Mostrar ticket segun id de ticket */
      public function listar_ticket_x_id($tick_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" call SP_L_TICK_X_TICK_ID (?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $tick_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
     }
     

     /* TODO: Listar ticket segun id de usuario */
     public function listar_ticket_x_usu($usu_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="call SP_L_TICK_X_USU_ID(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
        /* pdo::FETCH_ASSOC */
     }



        /* TODO: Listar todos los tickets en DataTable para Soporte*/
      public function listar_ticket(){
          $conectar= parent::conexion();
          parent::set_names();
          $sql="call SP_L_ALLTICKETS_SOPORT";
          $sql=$conectar->prepare($sql);
          $sql->execute();
          return $resultado=$sql->fetchAll();
          /* pdo::FETCH_ASSOC */
      }

      /* TODO: Listar detalles de ticket segun id del ticket */
     public function listar_ticketdetalles_x_ticket($tick_id){
      $conectar= parent::conexion();
      parent::set_names();

      $sql="call SP_L_DET_TICK_X_TICK_ID(?)";

      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $tick_id);
      $sql->execute();
      return $resultado=$sql->fetchAll();
      /* pdo::FETCH_ASSOC */
     }


     /* TODO: Insert ticket_cerrado en td_ticketdetalle */
     public function insert_ticketdetalle_cerrado($tick_id,$usu_id){

        $conectar= parent::conexion();
        parent::set_names();

        /* TODO:SENTENCIA SQL PARA INSERTAR ULTIMO MENSAJE CON VALOR TICKET CERRADO A TICKETDETALLE */
        $sql="call SP_I_TICK_CERRADO_TICKDETALLES(?,?)";
          $sql=$conectar->prepare($sql);
          $sql->bindValue(1, $tick_id);
          $sql->bindValue(2, $usu_id);
          $sql->execute();
          /* UNA VEZ EFECTUADO EL TESNTIG SQL PASAMOS AL CONTROLADOR Este recibe la consulta y la expone a la vista */

          return $resultado=$sql->fetchAll();
    }


    public function insert_ticketdetalle($tick_id,$usu_id,$tickd_descrip){

      $conectar= parent::conexion();
      parent::set_names();

      /* TODO:SENTENCIA SQL PARA INSERTAR NUEVO REGISTRO A TICKETDETALLE */
      $sql="call SP_I_TICKET_DET(?,?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $tick_id);
        $sql->bindValue(2, $usu_id);
        $sql->bindValue(3, $tickd_descrip);
        $sql->execute();
        /* UNA VEZ EFECTUADO EL TESNTIG SQL PASAMOS AL CONTROLADOR Este recibe la consulta y la expone a la vista */

        return $resultado=$sql->fetchAll();
    }

      /* TODO:Funcion Update_ticket que nos permite actualizar el campo tick_estado a "Cerrado" */
    public function update_ticket($tick_id ){
      $conectar =parent::conexion();
      parent::set_names();

      /* TODO:Sentencia SQL para actualizar el campo tck_estado a Cerrado */
      $Sql="call SP_U_EST_TICK_CERRADO(?)";

      $Sql=$conectar->prepare($Sql);
      $Sql->bindValue(1, $tick_id);
      $Sql->execute();
      return $resultado=$Sql->fetchAll();
    } 


    /* TODO:Funcion Update_ticket que nos permite actualizar el campo usu_asig - fech_asig */
    public function update_ticket_asignado($tick_id, $usu_asig ){
      $conectar =parent::conexion();
      parent::set_names();

      /* TODO:Sentencia SQL para actualizar el campo tck_estado a Cerrado */
      $Sql="call SP_U_EST_TICK_ASIGNADO(?,?)";

      $Sql=$conectar->prepare($Sql);
      $Sql->bindValue(1, $tick_id);
      $Sql->bindValue(2, $usu_asig);
      $Sql->execute();
      return $resultado=$Sql->fetchAll();
    } 
 
    /* =========================================================================== */
    /* TODO:CONSULTA DE TOTAL TICKETS, TOTAL ABIERTOS Y TOTAL CERRADO PARA SOPORTE */
    /* =========================================================================== */

    /* TODO:Modelo para Listar Numero de Ticket por Usuario en DB */
    public function get_totalticket(){
            $conectar=parent::conexion();
            parent::set_names();
            $Sql="SP_L_TOTAL_TICKETS";
            $Sql=$conectar->prepare($Sql);
            $Sql->execute();
            return $resultado=$Sql->fetchAll();
            
    }

    

    /* TODO:Modelo para Listar Numero de Ticket Abiertos por Usuario en DB */
    public function get_totalticket_abiertos(){
            $conectar=parent::conexion();
            parent::set_names();
            $Sql=" call SP_L_TICK_ABIERTOS";
            $Sql=$conectar->prepare($Sql);
            $Sql->execute();
            return $resultado=$Sql->fetchAll();
            
    }

    /* TODO:Modelo para Listar Numero de Ticket Cerrados por Usuario en DB */
    public function get_totalticket_cerrados(){
            $conectar=parent::conexion();
            parent::set_names();
            $Sql="call SP_L_TICK_CERRADOS";
            $Sql=$conectar->prepare($Sql);
            $Sql->execute();
            return $resultado=$Sql->fetchAll();
            
    }


    /* TODO:Consulta para graficos estadisticos Cant de ticket x Categoria */
    public function get_ticket_grafico(){
      $conectar=parent::conexion();
      parent::set_names();
      $Sql="call SP_L_CANT_TICK_CAT";
      $Sql=$conectar->prepare($Sql);
      $Sql->execute();
      return $resultado=$Sql->fetchAll();
      
    }





  
      
  }






  

     

?>