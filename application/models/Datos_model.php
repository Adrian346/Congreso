<?php
require('application/libraries/vendor/autoload.php');
class Datos_model extends CI_Model {
	public function __construct() {
		parent::__construct();	
	}

	public function InsertarItem($colection, $data) {
		$cliente = new MongoDB\Client("mongodb://localhost:27017"); //si no tienen usuario y contraseña en mongodb
        //$cliente = new MongoDB\Client("mongodb://localhost:27017",array("username" => 'admin', "password" => 'admin')); //si tienen
		$coleccion = $cliente->congreso->$colection;
		$resultado = $coleccion->insertOne($data);
		return $resultado->getInsertedId();
	}
	public function EliminarItem($colection, $where) {
		$cliente = new MongoDB\Client("mongodb://localhost:27017");
		$coleccion = $cliente->congreso->$colection;
		$resultado = $coleccion->deleteOne($where);
		return $resultado->getDeletedCount();
	}
	public function ActualizarItem($colection, $data, $where) {	
		$cliente = new MongoDB\Client("mongodb://localhost:27017");	
		$coleccion = $cliente->congreso->$colection;
		$resultado = $coleccion->updateOne($where,['$set' => $data]);
		return $resultado->getModifiedCount();
	}
	public function GetItems($colection, $where) {
		$cliente = new MongoDB\Client("mongodb://localhost:27017");	
		$coleccion = $cliente->congreso->$colection;
		$resultado = $coleccion->find($where)->toArray();
		return $resultado;
	}
	public function GetItemsOrder($colection, $where, $order) {
		$cliente = new MongoDB\Client("mongodb://localhost:27017");	
		$coleccion = $cliente->congreso->$colection;
		$resultado = $coleccion->find($where,array('sort'=>array($order=>1)))->toArray();
		return $resultado;
	}
	public function GetItemsOrderDesc($colection, $where, $order) {
		$cliente = new MongoDB\Client("mongodb://localhost:27017");	
		$coleccion = $cliente->congreso->$colection;
		$resultado = $coleccion->find($where,array('sort'=>array($order=>-1)))->toArray();
		return $resultado;
	}
	public function FormatoFecha($fecha) {
		$var = explode('-', $fecha);
		return $var[2] . '/' . $var[1] . '/' . $var[0];
	}
	public function FormatoMoneda($valor) {
		$data = "$ " . number_format($valor, 2, '.', ',');
		return $data;
	}

	public function BuscarCoincidenciaItem($colection, $where) {
		$cliente = new MongoDB\Client("mongodb://localhost:27017");	
		$coleccion = $cliente->congreso->$colection;
		$resultado = $coleccion->find($where)->toArray();
		if(count($resultado) > 0){
			return 'existe';
		} else{
			return 'no_existe';
		}
	}
}
?>