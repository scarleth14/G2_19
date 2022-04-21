<?php

    class Factura extends Conectar{

        public function get_facturas(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM g2_19.ma_factura_cliente ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_factura($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM g2_19.ma_factura_cliente WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_factura($numerofactura, $idsocio, $fechafactura, $detalle, $subtotal, $totalisv, $total, $fechavencimiento, $estado){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO g2_19.ma_factura_cliente(numero_factura,id_socio,fecha_factura,detalle,sub_total,total_isv,total,fecha_vencimiento,estado)
            VALUES (?,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numerofactura);
            $sql->bindValue(2, $idsocio);
            $sql->bindValue(3, $fechafactura);
            $sql->bindValue(4, $detalle);
            $sql->bindValue(5, $subtotal);
            $sql->bindValue(6, $totalisv);
            $sql->bindValue(7, $total);
            $sql->bindValue(8, $fechavencimiento);
            $sql->bindValue(9, $estado);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_factura($id, $numerofactura, $idsocio, $fechafactura, $detalle, $subtotal, $totalisv, $total, $fechavencimiento, $estado){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE g2_19.ma_factura_cliente SET numero_factura=?, id_socio=?, fecha_factura=?, detalle=?, sub_total=?, total_isv=?, total=?, fecha_vencimiento=?, estado=? WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numerofactura);
            $sql->bindValue(2, $idsocio);
            $sql->bindValue(3, $fechafactura);
            $sql->bindValue(4, $detalle);
            $sql->bindValue(5, $subtotal);
            $sql->bindValue(6, $totalisv);
            $sql->bindValue(7, $total);
            $sql->bindValue(8, $fechavencimiento);
            $sql->bindValue(9, $estado);
            $sql->bindValue(10, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_factura($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="DELETE FROM g2_19.ma_factura_cliente WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }

?>