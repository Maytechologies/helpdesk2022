<?php
    class Usuario extends Conectar{
        
        /* TODO:Definimos funcion de conexion */
        public function login(){
          $conectar=parent::conexion();
          parent::set_names();
           if(isset($_POST["enviar"])){
            $correo = $_POST["usu_correo"];
            $pass = $_POST["usu_pass"];
            $rol = $_POST["rol_id"];
             if(empty($correo) and empty($pass)){
                header("location:".conectar::ruta()."index.php?m=2");
                exit;

             }else{
                /*  TODO:Consulta SQL a tabra usuario para validar su existencia */
                $Sql="SELECT *FROM tm_usuario WHERE usu_correo=? AND usu_pass=? AND rol_id=? AND est=1";
                $stmt=$conectar->prepare($Sql);
                $stmt->bindValue(1, $correo);
                $stmt->bindValue(2, $pass);
                $stmt->bindValue(3, $rol);
                $stmt->execute();
                $resultado =$stmt->fetch();
                  /* TODO:Verificamos que el resultado de la consulta SQL sea un Array y su valor mayor a 0 */
                 if(is_array($resultado) and count($resultado)>0){

                  /* TODO:Asignamos a variables de sesion los valores recibidos con la consulta SQL */
                   $_SESSION["usu_id"]=$resultado["usu_id"];
                   $_SESSION["usu_nom"]=$resultado["usu_nom"];
                   $_SESSION["usu_apep"]=$resultado["usu_apep"];
                   $_SESSION["rol_id"]=$resultado["rol_id"];
                   $_SESSION["usu_correo"]=$resultado["usu_correo"];
                   $_SESSION["est"]=$resultado["est"];
                   header("location:".Conectar::ruta()."view/Home/");
                   exit();

                 }else{
                   header("location:".Conectar::ruta()."index.php?m=1");
                   exit();
                 }
             }
           }
        }

        /* TODO:Modelo para Insertar Usuario en DB */
        public function insert_usuario($usu_nom, $usu_apep, $usu_correo, $usu_pass, $rol_id){
          $conectar=parent::conexion();
          parent::set_names();
          $Sql="INSERT INTO tm_usuario (usu_id, usu_nom, usu_apep, usu_correo, usu_pass, rol_id, fech_crea, fech_modi, fech_elim)
          VALUES (NULL, ?, ?, ?, ?, ?, now(), NULL, NULL)";
                $Sql=$conectar->prepare($Sql);
                $Sql->bindValue(1, $usu_nom);
                $Sql->bindValue(2, $usu_apep);
                $Sql->bindValue(3, $usu_correo);
                $Sql->bindValue(4, $usu_pass);
                $Sql->bindValue(5, $rol_id);
                $Sql->execute();
              return $resultado=$Sql->fetchAll();

        }

        /* TODO:Modelo para Actualizar Usuario en DB */
        public function update_usuario($usu_id, $usu_nom, $usu_apep, $usu_correo, $usu_pass, $rol_id){
          $conectar=parent::conexion();
          parent::set_names();
          $Sql="UPDATE tm_usuario SET usu_nom =?, usu_apep =?, usu_correo =?, usu_pass =?, rol_id =?
                WHERE usu_id =?";
                $Sql=$conectar->prepare($Sql);
                
                $Sql->bindValue(1, $usu_nom);
                $Sql->bindValue(2, $usu_apep);
                $Sql->bindValue(3, $usu_correo);
                $Sql->bindValue(4, $usu_pass);
                $Sql->bindValue(5, $rol_id);
                $Sql->bindValue(6, $usu_id);
                $Sql->execute();
              return $resultado=$Sql->fetchAll();
          
        }

        /* TODO:Modelo para Eliminar del listado a Usuario camniando de est a 0 */
        public function delete_usuario($usu_id){
          $conectar=parent::conexion();
          parent::set_names();
          $Sql="UPDATE tm_usuario SET est= 0, fech_elim = now() WHERE usu_id =?";
          $Sql=$conectar->prepare($Sql);
          $Sql->bindValue(1, $usu_id);
          $Sql->execute();
          return $resultado=$Sql->fetchAll();
          
        }

        /* TODO:Modelo para listar todos los registros al Recibir Array de tabla usuario de DB */
        public function get_usuario(){
          $conectar=parent::conexion();
          parent::set_names();
          $Sql="SELECT *FROM tm_usuario WHERE est=1";
          $Sql=$conectar->prepare($Sql);
          $Sql->execute();
          return $resultado=$Sql->fetchAll();
          
        }

        /* TODO:Modelo para Listar Usuario por ID de Usuario en DB */
        public function get_usuario_x_id($usu_id){
          $conectar=parent::conexion();
          parent::set_names();
          $Sql="SELECT *FROM tm_usuario WHERE usu_id=?";
          $Sql=$conectar->prepare($Sql);
          $Sql->bindValue(1, $usu_id);
          $Sql->execute();
          return $resultado=$Sql->fetchAll();
          
        }
    }


?>