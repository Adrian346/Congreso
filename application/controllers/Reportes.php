<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		if ($this->session->userdata('logeado')) {
			$data['modulo'] = "iniciar_reportes";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/header');
            $this->load->view('constructor/menu', $data);
			$this->load->view('reportes/reportes');
			$this->load->view('reportes/funciones', $data);
		} else {
			redirect('login/index');
		}
	}

	public function listar_eventos(){
		if ($this->session->userdata('logeado')) {
			$where = array();
        	$order = 'nombre';
        	$resultado = $this->datos_model->GetItemsOrder('eventos',$where,$order);
        	$datos = array();
        	$i = 0;
        	foreach ($resultado as $entry) {
        		$datos[$i]['nombre'] = $entry['nombre'];
        		$datos[$i]['descripcion'] = $entry['descripcion'];
        		$datos[$i]['tipo'] = $entry['tipo'];
        		$datos[$i]['lugar'] = $entry['lugar'];
        		$datos[$i]['fecha'] = $this->datos_model->FormatoFecha($entry['fecha']);
        		$datos[$i]['expositor'] = $entry['expositor'];
        		$resultado_asistencias = $this->datos_model->GetItems('asistencias',array('tipo'=>'EVENTO', 'descripcion'=>$entry['nombre'])); 
        		$datos[$i]['asistencias'] = count($resultado_asistencias);
            	$i++;
        	}
        	echo json_encode($datos);
        } else {
			redirect('login/index');
		}
	}

	public function listar_talleres(){
		if ($this->session->userdata('logeado')) {
			$where = array();
        	$order = 'nombre';
        	$resultado = $this->datos_model->GetItemsOrder('talleres',$where,$order);
        	$datos = array();
        	$i = 0;
        	foreach ($resultado as $entry) {
        		$datos[$i]['nombre'] = $entry['nombre'];
        		$datos[$i]['descripcion'] = $entry['descripcion'];
        		$datos[$i]['hora'] = $entry['hora'];
        		$datos[$i]['lugar'] = $entry['lugar'];
        		$datos[$i]['fecha'] = $this->datos_model->FormatoFecha($entry['fecha']);
		      	$expositor = $this->datos_model->GetItems('expositores',array('_id'=> new MongoDB\BSON\ObjectId($entry['expositor'])));
	      		$datos[$i]['expositor'] = $expositor[0]['nombre'] . ' ' . $expositor[0]['paterno'] . ' ' . $expositor[0]['materno'];
        		$resultado_asistencias = $this->datos_model->GetItems('asistencias',array('tipo'=>'TALLER', 'descripcion'=>$entry['nombre'])); 
        		$datos[$i]['asistencias'] = count($resultado_asistencias);
            	$i++;
        	}
        	echo json_encode($datos);
        } else {
			redirect('login/index');
		}
	}

	public function listar_paquetes(){
		if ($this->session->userdata('logeado')) {
			$where = array();
        	$order = 'nombre';
        	$resultado = $this->datos_model->GetItemsOrder('paquetes',$where,$order);
        	$datos = array();
        	$i = 0;
        	foreach ($resultado as $entry) {
        		$datos[$i]['nombre'] = $entry['nombre'];
        		$datos[$i]['contenido'] = $entry['contenido'];
        		$datos[$i]['precio'] = $this->datos_model->FormatoMoneda($entry['precio']);
        		$resultado_ventas = $this->datos_model->GetItems('alumnos',array('paquete'=>$entry['nombre'])); 
        		$datos[$i]['ventas'] = count($resultado_ventas);
            	$i++;
        	}
        	echo json_encode($datos);
        } else {
			redirect('login/index');
		}
	}

	public function listar_asistencias(){
		if ($this->session->userdata('logeado')) {
			$where = array();
        	$order = 'id_uaa';
        	$resultado = $this->datos_model->GetItemsOrder('alumnos',$where,$order);
        	$datos = array();
        	$i = 0;
        	foreach ($resultado as $entry) {
        		$resultado_eventos = $this->datos_model->GetItems('asistencias',array('tipo'=>'EVENTO','id_uaa'=>$entry['id_uaa'])); 
        		$resultado_talleres = $this->datos_model->GetItems('asistencias',array('tipo'=>'TALLER','id_uaa'=>$entry['id_uaa'])); 
        		$datos[$i]['id_uaa'] = $entry['id_uaa'];
        		$datos[$i]['asistencia_eventos'] = count($resultado_eventos);
        		$datos[$i]['asistencia_talleres'] = count($resultado_talleres);
        		if(count($resultado_talleres) == 1 && count($resultado_eventos) == 4){
        			$datos[$i]['congreso_completado'] = 'SI';
        		} else{
        			$datos[$i]['congreso_completado'] = 'NO';
        		}
            	$i++;
        	}
        	echo json_encode($datos);
        } else {
			redirect('login/index');
		}
	}

	public function listar_pagos(){
		if ($this->session->userdata('logeado')) {
			$where = array();
        	$order = 'id_uaa';
        	$resultado = $this->datos_model->GetItemsOrder('alumnos',$where,$order);
        	$datos = array();
        	$i = 0;
        	foreach ($resultado as $entry) {
        		$datos[$i]['id_uaa'] = $entry['id_uaa'];
        		$GetPaquete = $this->datos_model->GetItems('paquetes',array('nombre'=>$entry['paquete']));
        		$costo_paquete =  $GetPaquete[0]['precio'];
        		$datos[$i]['costo_paquete'] = $this->datos_model->FormatoMoneda($costo_paquete);
        		$GetPagos = $this->datos_model->GetItems('pagos',array('id_uaa'=>$entry['id_uaa']));
        		$monto_pagado = 0;
        		foreach ($GetPagos as $key) {
        			$monto_pagado += $key['monto'];
        		}
        		$datos[$i]['monto_pagado'] = $this->datos_model->FormatoMoneda($monto_pagado);
        		$monto_deber = $costo_paquete - $monto_pagado;
        		$datos[$i]['monto_deber'] = $this->datos_model->FormatoMoneda($monto_deber);
        		if($monto_deber == 0){
        			$datos[$i]['congreso_pagado'] = 'SI';
        		} else{
        			$datos[$i]['congreso_pagado'] = 'NO';
        		}
            	$i++;
        	}
        	echo json_encode($datos);
        } else {
			redirect('login/index');
		}
	}
}
