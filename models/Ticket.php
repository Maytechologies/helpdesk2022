<?php
  class Ticket extends Conectar{

    /* TODO:Insertar nuevo ticket */
     public function insert_ticket($usu_id,$cat_id,$tick_titulo,$tick_descrip ){
        $conectar =parent::conexion();
        parent::set_names();
        $Sql="INSERT INTO tm_ticket (tick_id, usu_id,cat_id, tick_titulo, tick_descrip, tick_estado, fech_crea, est)
        VALUES (NULL, ?, ?, ?,?,'Abierto', now(),'1');";
        $Sql=$conectar->prepare($Sql);
        
        $Sql->bindValue(1, $usu_id);
        $Sql->bindValue(2, $cat_id);
        $Sql->bindValue(3, $tick_titulo);
        $Sql->bindValue(4, $tick_descrip);

        $Sql->execute();
        return $resultado=$Sql->fetchAll();
     } 

       /* TODO: Mostrar ticket segun id de ticket */
      public function listar_ticket_x_id($tick_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT 
        tm_ticket.tick_id,
        tm_ticket.usu_id,
        tm_ticket.cat_id,
        tm_ticket.tick_titulo,
        tm_ticket.tick_descrip,
        tm_ticket.tick_estado,
        tm_ticket.fech_crea,
        tm_usuario.usu_nom,
        tm_usuario.usu_apep,
        tm_usuario.usu_correo,
        tm_categoria.cat_nom
     
        FROM 
        tm_ticket
        INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
        INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
        WHERE
        tm_ticket.est = 1
        AND tm_ticket.tick_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $tick_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
     }

     /* TODO: Listar ticket segun id de usuario */
     public function listar_ticket_x_usu($usu_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT 
        tm_ticket.tick_id,
        tm_ticket.tick_titulo,
        tm_ticket.usu_id,
        tm_ticket.tick_descrip,
        tm_ticket.tick_estado,
        tm_ticket.fech_crea,
        tm_categoria.cat_nom
        
        FROM 
        tm_ticket
        INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
        INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
       
        WHERE
        tm_ticket.est = 1
        AND tm_usuario.usu_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
        /* pdo::FETCH_ASSOC */
     }

        /* TODO: Listar todos los tickets para soporte*/
      public function listar_ticket(){
          $conectar= parent::conexion();
          parent::set_names();
          $sql="SELECT 
          tm_ticket.tick_id,
          tm_ticket.tick_titulo,
          tm_ticket.cat_id,
          tm_ticket.usu_id,
          tm_ticket.tick_descrip,
          tm_ticket.tick_estado,
          tm_usuario.usu_nom,
          tm_usuario.usu_apep,
          tm_ticket.fech_crea,
          tm_categoria.cat_nom
          
          FROM 
          tm_ticket
          INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
          INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
        
          WHERE
          tm_ticket.est = 1";
          $sql=$conectar->prepare($sql);
          $sql->execute();
          return $resultado=$sql->fetchAll();
          /* pdo::FETCH_ASSOC */
      }

      /* TODO: Listar detallas de ticket segun id del ticket */
     public function listar_ticketdetalles_x_ticket($tick_id){
      $conectar= parent::conexion();
      parent::set_names();

      $sql="SELECT 
      d.tickd_id,
      d.tickd_descrip,
      d.fech_crea,
      u.usu_nom,
      u.usu_apep,
      u.rol_id,
      r.rol_nom
      FROM 
      td_ticketdetalle as d
      INNER JOIN tm_usuario as u ON d.usu_id = u.usu_id
      INNER JOIN tm_rol as r ON u.rol_id = r.rol_id
      WHERE tick_id =?";

      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $tick_id);
      $sql->execute();
      return $resultado=$sql->fetchAll();
      /* pdo::FETCH_ASSOC */
     }

     /* TODO: Insert ticket_cerrado en detalleticket */
     public function insert_ticketdetalle_cerrado($tick_id,$usu_id){

        $conectar= parent::conexion();
        parent::set_names();

        /* TODO:SENTENCIA SQL PARA INSERTAR ULTIMO MENSAJE CON VALOR TICKET CERRADO A TICKETDETALLE */
        $sql="INSERT INTO td_ticketdetalle (tickd_id,tick_id,usu_id,tickd_descrip,fech_crea,est)
               VALUES (NULL,?,?,'<p><b>TICKET CERRADO...!</b></p>',now(),'1');";
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
      $sql="INSERT INTO td_ticketdetalle (tickd_id,tick_id,usu_id,tickd_descrip,fech_crea,est)
      VALUES (NULL,?,?,?,now(),'1');";
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
      $Sql="UPDATE tm_ticket SET tick_estado = 'Cerrado' WHERE tick_id = ?;";

      $Sql=$conectar->prepare($Sql);
      $Sql->bindValue(1, $tick_id);
      $Sql->execute();
      return $resultado=$Sql->fetchAll();
    } 

  
      
  }






  

     

?>