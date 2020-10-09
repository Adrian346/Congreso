<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expositores extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		if ($this->session->userdata('user_nivel') == 1) {

			$data['modulo'] = "iniciar_expositor";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre')); 
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('expositores/expositores');
			$this->load->view('expositores/funciones', $data);

		} else {
			redirect('login/index');
		}
	}

	public function agregar_expositor(){
		if ($this->session->userdata('user_nivel') == 1) {

			$coleccion ='expositores';

			$nombre = strtoupper($this->input->post('nombre'));
			$paterno = strtoupper($this->input->post('paterno'));
			$materno = strtoupper($this->input->post('materno'));
			$experiencia = strtoupper($this->input->post('experiencia'));
			$imparte = strtoupper($this->input->post('imparte'));

	   	//insertar
	   	$data = array('nombre' => $nombre,
	     					'paterno'=> $paterno,
	     					'materno' => $materno,
	     					'experiencia' => $experiencia,
	     					'imparte' => $imparte);
	   	$resultado = $this->datos_model->InsertarItem($coleccion,$data);
	   	echo json_encode($resultado);

   	} else {
			redirect('login/index');
		}
	}

	public function listado(){
		if ($this->session->userdata('user_nivel') == 1) {

			$data['modulo'] = "iniciar_listado_expositores";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre')); 
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('expositores/listado');
			$this->load->view('expositores/funciones', $data);

		} else {
			redirect('login/index');
		}
	}

	public function listar_expositores(){
		if ($this->session->userdata('user_nivel') == 1) {

			$coleccion ='expositores';

			//Listar
			$where = array();
		   $order = 'nombre';
		   $resultado = $this->datos_model->GetItemsOrder($coleccion,$where,$order);

		   $data = array();
		   $i = 0;

		   foreach ($resultado as $entry) {
		   	$data[$i]['_id'] = (string)$entry['_id'];
		   	$data[$i]['nombre'] = $entry['nombre'];
				$data[$i]['paterno'] = $entry['paterno'];
				$data[$i]['materno'] = $entry['materno'];
				$data[$i]['experiencia'] = $entry['experiencia'];
				$data[$i]['imparte'] = $entry['imparte'];
				$i++;
		   }

	   	echo json_encode($data);

	   } else {
			redirect('login/index');
		}

	}

	public function ver_expositor(){
		if ($this->session->userdata('user_nivel') == 1) {

			$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
	      $resultado = $this->datos_model->GetItems('expositores',$where);
	   	foreach ($resultado as $expositor) {
	   		$data = array('nombre' => $expositor->nombre,
									'paterno' => $expositor->paterno,
									'materno' => $expositor->materno,
									'experiencia' => $expositor->experiencia,
									'imparte' => $expositor->imparte);
	   	}

	   	echo json_encode($data);

	   } else {
			redirect('login/index');
		}
	}

	public function editar_expositor() {
		if ($this->session->userdata('user_nivel') == 1) {

			$coleccion ='expositores';

			$data = array('nombre' => strtoupper($this->input->post('nombre')),
								'paterno' => strtoupper($this->input->post('paterno')),
								'materno' => strtoupper($this->input->post('materno')),
								'experiencia' => strtoupper($this->input->post('experiencia')),
								'imparte' => strtoupper($this->input->post('imparte')));

	        $where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
	        $actualizar = $this->datos_model->ActualizarItem($coleccion,$data,$where);
	        echo $actualizar;

	   } else {
			redirect('login/index');
		}
	}

	public function eliminar_expositor(){
		if ($this->session->userdata('user_nivel') == 1) {

			//eliminar
			$coleccion ='expositores';
	   	$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
	   	$resultado = $this->datos_model->EliminarItem($coleccion,$where);
	   	echo $resultado;

	   } else {
			redirect('login/index');
		}

	}
}