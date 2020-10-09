<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('application/libraries/vendor/autoload.php');

class Mongo_test extends CI_Controller{

    public function index() {
        $coleccion ='alumnos';
        //insertar
        $data = array('nombre'=>'juan','ap_paterno'=>array('perez2','gonzalez2','enriquez2'));
        $resultado = $this->datos_model->InsertarItem($coleccion,$data);
        echo $resultado;     

        //actualizar
        /*$data = array('nombre'=>'pepe','ap_paterno'=>array('gutierrez','suarez'));
        $where = array('nombre'=>'juan');
        $resultado = $this->datos_model->ActualizarItem($coleccion,$data,$where);
        echo $resultado;*/

        //eliminar
        /*$where = array('nombre'=>'juan');
        $resultado = $this->datos_model->EliminarItem($coleccion,$where);
        echo $resultado;*/

        //consultar
        $where = array('nombre' => 'juan');
        $resultado = $this->datos_model->GetItems($coleccion,$where);
        foreach ($resultado as $entry) {
            echo $entry['_id'], ': ', $entry['nombre'], "\n";
        } 

        //consultar en orden ascendente
        /*$where = array();
        $order = 'nombre';
        $resultado = $this->datos_model->GetItemsOrder($coleccion,$where,$order);
        foreach ($resultado as $entry) {
            echo $entry['_id'], ': ', $entry['nombre'], "\n";
        }*/  

        //consultar en orden descendente
        /*$where = array();
        $order = 'nombre';
        $resultado = $this->datos_model->GetItemsOrderDesc($coleccion,$where,$order);
        foreach ($resultado as $entry) {
            echo $entry['_id'], ': ', $entry['nombre'], "\n";
        }*/
    }
}