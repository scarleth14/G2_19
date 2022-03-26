<?php

    class Materiales extends Conectar{

        public function get_materiales(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM g2_19.ma_materiales ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_material($ID_Materiales){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM g2_19.ma_materiales WHERE ID_Materiales = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID_Materiales);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_material($DESCRIPCION, $UNIDAD, $COSTO, $PRECIO, $APLICA_ISV, $PORCENTAJE_ISV, $ESTADO, $ID_SOCIO){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO g2_19.ma_materiales(DESCRIPCION, UNIDAD, COSTO, PRECIO, APLICA_ISV, PORCENTAJE_ISV, ESTADO, ID_SOCIO)
            VALUES (?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $DESCRIPCION);
            $sql->bindValue(2, $UNIDAD);
            $sql->bindValue(3, $COSTO);
            $sql->bindValue(4, $PRECIO);
            $sql->bindValue(5, $APLICA_ISV);
            $sql->bindValue(6, $PORCENTAJE_ISV);
            $sql->bindValue(7, $ESTADO);
            $sql->bindValue(8, $ID_SOCIO);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_material($ID_Materiales, $DESCRIPCION, $UNIDAD, $COSTO, $PRECIO, $APLICA_ISV, $PORCENTAJE_ISV, $ESTADO, $ID_SOCIO){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE g2_19.ma_materiales SET DESCRIPCION = ?, UNIDAD = ?, COSTO = ?, PRECIO = ?, APLICA_ISV = ?, PORCENTAJE_ISV = ?, ESTADO = ?, ID:SOCIO = ? WHERE ID_Materiales = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $DESCRIPCION);
            $sql->bindValue(2, $UNIDAD);
            $sql->bindValue(3, $COSTO);
            $sql->bindValue(4, $PRECIO);
            $sql->bindValue(5, $APLICA_ISV);
            $sql->bindValue(6, $PORCENTAJE_ISV);
            $sql->bindValue(7, $ESTADO);
            $sql->bindValue(8, $ID_SOCIO);
            $sql->bindValue(9, $ID_Materiales);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_material($ID_Materiales){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="DELETE FROM g2_19.ma_materiales WHERE ID_Materiales = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID_Materiales);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>