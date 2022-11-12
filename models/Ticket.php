<?php
  class Ticket extends Conectar{

    /* TODO:Insertar nuevo ticket */
     public function insert_ticket($usu_id,$cat_id,$tick_titulo,$tick_descrip ){
        $conectar =parent::conexion();
        parent::set_names();
        $Sql="INSERT INTO tm_ticket (tick_id,usu_id,cat_id,tick_titulo,tick_descrip,est)
        VALUES (NULL, ?, ?, ?,?, '1');";
        $Sql=$conectar->prepare($Sql);
        
        $Sql->bindValue(1, $usu_id);
        $Sql->bindValue(2, $cat_id);
        $Sql->bindValue(3, $tick_titulo);
        $Sql->bindValue(4, $tick_descrip);

        $Sql->execute();
        return $resultado=$Sql->fetchAll();
     } 

     /* TODO: Listar ticket segun id de usuario */
     public function listar_ticket_x_usu($usu_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT 
        tm_ticket.tick_id,
        tm_ticket.tick_titulo,
        tm_ticket.usu_id,
        tm_categoria.cat_nom
        
        FROM 
        tm_ticket
        INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
        INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
       
        WHERE
        tm_ticket.est = 1
        AND tm_usuario.usu_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
        /* pdo::FETCH_ASSOC */
    }
  }
?>