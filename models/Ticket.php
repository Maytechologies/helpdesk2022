<?php
  class Ticket extends Conectar{

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
  }
?>