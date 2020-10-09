<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		if ($this->session->userdata('logeado')) {
			$data['modulo'] = "iniciar_pagos";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('pagos/alta_pagos');
			$this->load->view('pagos/funciones', $data);
		}else{
			redirect('login/index');
		}
	}
	public function agregar_pago(){
		if ($this->session->userdata('logeado')) {
			$GetPagos = $this->datos_model->GetItems('pagos', array('id_uaa'=>$this->input->post('id_uaa')));
			$i = 0;
			$suma_pagos = 0;
		    foreach ($GetPagos as $entry) {
		    	$suma_pagos += $entry['monto'];
		    	$i++;
		    }
		    $total_pagos = $suma_pagos + $this->input->post('monto');
		    $GetAlumno = $this->datos_model->GetItems('alumnos', array('id_uaa'=>$this->input->post('id_uaa')));
		    $paquete_alumno = $GetAlumno[0]['paquete'];
		    $GetPaquetes = $this->datos_model->GetItems('paquetes', array('nombre'=>$paquete_alumno));
		    $precio_paquete = $GetPaquetes[0]['precio'];
		    $data['precio_paquete'] = $precio_paquete;
		    if($total_pagos <= $precio_paquete){
		    	$data = array('id_uaa' => $this->input->post('id_uaa'),
				'monto' => $this->input->post('monto'),
				'fecha' => date('Y-m-d'));
				$resultado = $this->datos_model->InsertarItem('pagos', $data);
				$data['estatus'] = "registrado";
		    } else{
		    	$data['estatus'] = "no_registrado";
		    }
		    echo json_encode($data);
		}else{
			redirect('login/index');
		}
	}
	public function listado(){
		if ($this->session->userdata('logeado')) {
			$data['modulo'] = "iniciar_listado_pagos";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('pagos/listado');
			$this->load->view('pagos/funciones', $data);
		}else{
			redirect('login/index');
		}
	}
	public function listar_pagos(){
		if ($this->session->userdata('logeado')) {
			$coleccion ='pagos';
			//Listar
			$where = array('id_uaa'=>$this->input->post('id_uaa'));
		    $order = 'fecha';
		    $resultado = $this->datos_model->GetItemsOrder($coleccion,$where,$order);
		    $data = array();
		    $i = 0;
		    foreach ($resultado as $entry) {
		   		$data[$i]['_id'] = (string)$entry['_id'];
		   		$data[$i]['id_uaa'] = $entry['id_uaa'];
				$data[$i]['monto'] = $entry['monto'];
				$data[$i]['fecha'] = $this->datos_model->FormatoFecha($entry['fecha']);
				$i++;
		    }
	   		echo json_encode($data);
	    }else{
			redirect('login/index');
		}
	}
}