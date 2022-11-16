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
    }


?>