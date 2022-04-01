<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Factura_Cliente.php");
    $factura = new Factura();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

        case "GetFacturas":
            $datos=$factura->get_facturas();
            echo json_encode($datos);
        break;

        case "GetFactura":
            $datos=$factura->get_factura($body["ID"]);
            echo json_encode($datos);
        break;

        case "InsertFactura":
            $datos=$factura->insert_factura($body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"],);
            echo json_encode("Factura del cliente Agregada");
        break;

        case "UpdateFactura":
            $datos=$factura->update_factura($body["ID"],$body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"],);
            echo json_encode("Factura del cliente Actualizado");
        break;

        case "DeleteFactura":
            $datos=$factura->delete_factura($body["ID"]);
            echo json_encode("Factura del cliente Eliminada");
        break;
    }




?>