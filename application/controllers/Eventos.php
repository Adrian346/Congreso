<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index(){
		if ($this->session->userdata('user_nivel')==1) {
			$data['modulo'] = "iniciar_eventos";
			$data['expositores'] = $this->datos_model->GetItemsOrder('expositores',array(),'nombre');
			$data['usuarios'] = $this->datos_model->GetItemsOrder('usuarios',array(),'nombre');
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('eventos/alta_eventos',$data);
			$this->load->view('eventos/funciones',$data);
		}else{
			redirect('login/index');
		}
		
	}
	public function agregar_evento(){
		$data = array('tipo' => strtoupper($this->input->post('tipo')),
			'nombre' => strtoupper($this->input->post('nombre')),
			'descripcion' => $this->input->post('descripcion'),
			'lugar' => strtoupper($this->input->post('lugar')),
			'fecha' => $this->input->post('fecha'),
			'expositor' => strtoupper($this->input->post('expositor')),
			'encargado' => strtoupper($this->input->post('encargado')),
			'cupo' => $this->input->post('cupo'));
		$resultado = $this->datos_model->InsertarItem('eventos', $data);
		echo $resultado;
	}

	public function listado(){
		if ($this->session->userdata('user_nivel') == 1) {
			$data['modulo'] = "iniciar_listado_eventos";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('eventos/listado');
			$this->load->view('eventos/funciones', $data);

		}else{
			redirect('login/index');
		}
	}
	public function listar_eventos(){
		if ($this->session->userdata('user_nivel') == 1) {
			$coleccion ='eventos';
			//Listar
			$where = array();
		    $order = 'nombre';
		    $resultado = $this->datos_model->GetItemsOrder($coleccion,$where,$order);
		    $data = array();
		    $i = 0;
		    foreach ($resultado as $entry) {
		   		$data[$i]['_id'] = (string)$entry['_id'];
		   		$data[$i]['tipo'] = $entry['tipo'];
				$data[$i]['nombre'] = $entry['nombre'];
				$data[$i]['descripcion'] = $entry['descripcion'];
				$data[$i]['lugar'] = $entry['lugar'];
				$data[$i]['fecha'] = $this->datos_model->FormatoFecha($entry['fecha']);
				$data[$i]['expositor'] = $entry['expositor'];
				$data[$i]['encargado'] = $entry['encargado'];
				$data[$i]['cupo'] = $entry['cupo'];
				$i++;
		    }
	   		echo json_encode($data);
	    }else{
			redirect('login/index');
		}
	}
	public function ver_evento(){
		if ($this->session->userdata('user_nivel') == 1) {
			$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
	      	$resultado = $this->datos_model->GetItems('eventos',$where);
	   		foreach ($resultado as $evento) {
	   			$data = array('tipo' => $evento->tipo,
							'nombre' => $evento->nombre,
							'descripcion' => $evento->descripcion,
							'lugar' => $evento->lugar,
							'fecha' => $evento->fecha,
							'expositor' => $evento->expositor,
							'encargado' => $evento->encargado,
							'cupo' => $evento->cupo);	   			
	   		}
	   		echo json_encode($data);
	   	}else {
			redirect('login/index');
		}
	}
	public function editar_evento() {
		if ($this->session->userdata('user_nivel') == 1) {
			$coleccion ='eventos';
			$data = array('tipo' => $this->input->post('tipo'),
			'nombre' => strtoupper($this->input->post('nombre')),
			'descripcion' => $this->input->post('descripcion'),
			'lugar' => strtoupper($this->input->post('lugar')),
			'fecha' => $this->input->post('fecha'),
			'expositor' => strtoupper($this->input->post('expositor')),
			'encargado' => strtoupper($this->input->post('encargado')),
			'cupo' => $this->input->post('cupo'));

	        $where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
	        $actualizar = $this->datos_model->ActualizarItem($coleccion,$data,$where);
	        echo $actualizar;
	   	}else{
			redirect('login/index');
		}
	}
	public function eliminar_evento(){
		if ($this->session->userdata('user_nivel') == 1) {
			//eliminar
			$coleccion ='eventos';
		   	$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
		   	$resultado = $this->datos_model->EliminarItem($coleccion,$where);
		   	echo $resultado;

	   	}else{
			redirect('login/index');
		}
	}
}
