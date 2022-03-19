<?php

    class Socios extends Conectar{

        public function get_socios(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_socio($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM g2_19.ma_socios_negocio WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_socio($nombre, $razonsocial, $direccion, $tiposocio, $contacto, $email, 
                                     $fechacreado, $estado, $telefono){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO g2_19.ma_socios_negocio(nombre , razon_social, direccion, tipo_socio,
                                                      contacto, email, fecha_creado, estado, telefono)
                  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $razonsocial);
            $sql->bindValue(3, $direccion);
            $sql->bindValue(4, $tiposocio);
            $sql->bindValue(5, $contacto);
            $sql->bindValue(6, $email);
            $sql->bindValue(7, $fechacreado);
            $sql->bindValue(8, $estado);
            $sql->bindValue(9, $telefono);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_socio($id, $nombre, $razonsocial, $direccion, $tiposocio, $contacto, $email, 
                                     $fechacreado, $estado, $telefono){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE g2_19.ma_socios_negocio SET nombre = ?, razon_social = ?, direccion = ?, tipo_socio = ?,
            contacto = ?, email = ?, fecha_creado = ?, estado = ?, telefono = ? WHERE id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $razonsocial);
            $sql->bindValue(3, $direccion);
            $sql->bindValue(4, $tiposocio);
            $sql->bindValue(5, $contacto);
            $sql->bindValue(6, $email);
            $sql->bindValue(7, $fechacreado);
            $sql->bindValue(8, $estado);
            $sql->bindValue(9, $telefono);
            $sql->bindValue(10, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_socio($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="DELETE FROM g2_19.ma_socios_negocio WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>