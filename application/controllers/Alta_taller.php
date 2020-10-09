<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alta_taller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		if ($this->session->userdata('user_nivel') == 1) {
	   	$data['expositores'] = $this->datos_model->GetItemsOrder('expositores',array(),'nombre');
			$data['modulo'] = "iniciar_taller";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre')); 
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('talleres/alta_taller',$data);
			$this->load->view('talleres/funciones', $data);

		} else {
			redirect('login/index');
		}
	}

	public function agregar_taller(){
		if ($this->session->userdata('user_nivel') == 1) {
			$coleccion ='talleres';

			$nombre = strtoupper($this->input->post('nombre'));
			$descripcion = strtoupper($this->input->post('descripcion'));
			$lugar = strtoupper($this->input->post('lugar'));
			$fecha = $this->input->post('fecha');
			$hora = $this->input->post('hora');
			$expositor = strtoupper($this->input->post('expositor'));
			$cupo = $this->input->post('cupo');

	     //insertar
	     $data = array('nombre' => $nombre,
	     					'descripcion'=> $descripcion,
	     					'lugar' => $lugar,
	     					'fecha' => $fecha,
	     					'hora' => $hora,
	     					'expositor' => $expositor,
	     					'cupo' => $cupo);
	     $resultado = $this->datos_model->InsertarItem($coleccion,$data);
	     echo json_encode($resultado);
	   } else {
			redirect('login/index');
		}

	}

	public function listado(){
		if ($this->session->userdata('user_nivel') == 1) {

			$data['modulo'] = "iniciar_listado_talleres";
			$data['expositores'] = $this->datos_model->GetItemsOrder('expositores',array(),'nombre');
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre')); 
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('talleres/listado', $data);
			$this->load->view('talleres/funciones', $data);

		} else {
			redirect('login/index');
		}
	}

	public function listar_talleres(){
		if ($this->session->userdata('user_nivel') == 1) {
			$coleccion ='talleres';

			//Listar
			$where = array();
		   $order = 'nombre';
		   $resultado = $this->datos_model->GetItemsOrder($coleccion,$where,$order);

		   $data = array();
		   $i = 0;

		   foreach ($resultado as $entry) {
		   	$data[$i]['_id'] = (string)$entry['_id'];
		   	$data[$i]['nombre'] = $entry['nombre'];
				$data[$i]['descripcion'] = $entry['descripcion'];
				$data[$i]['lugar'] = $entry['lugar'];
				$data[$i]['fecha'] = $entry['fecha'];

				$where = array('_id'=> new MongoDB\BSON\ObjectId($entry['expositor']));
		      $resultado = $this->datos_model->GetItems('expositores',$where);
	      	foreach ($resultado as $expositor) {
	      		$data[$i]['expositor'] = $expositor['nombre'] . ' ' . $expositor['paterno'] . ' ' . $expositor['materno'];
	      	} 

				$data[$i]['hora'] = $entry['hora'];
				$data[$i]['cupo'] = $entry['cupo'];
				$i++;
		   }

	   	echo json_encode($data);

	   } else {
			redirect('login/index');
		}

	}

	public function ver_taller(){
		if ($this->session->userdata('user_nivel') == 1) {

			$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
	      $resultado = $this->datos_model->GetItems('talleres',$where);
	   	foreach ($resultado as $taller) {
	   		$data = array('nombre' => $taller->nombre,
	   							'descripcion' => $taller->descripcion,
	   							'lugar' => $taller->lugar,
	   							'fecha' => $taller->fecha,
	   							'expositor' => $taller->expositor,
	   							'hora' => $taller->hora,
	   							'cupo' => $taller->cupo);
	   	}

	   	echo json_encode($data);

   	} else {
			redirect('login/index');
		}
	}

	public function editar_taller() {
		if ($this->session->userdata('user_nivel') == 1) {

			$coleccion ='talleres';

			$data = array('nombre' => strtoupper($this->input->post('nombre')),
								'descripcion' => strtoupper($this->input->post('descripcion')),
								'lugar' => strtoupper($this->input->post('lugar')),
								'fecha' => $this->input->post('fecha'),
								'expositor' => strtoupper($this->input->post('expositor')),
								'hora' => $this->input->post('hora'),
								'cupo' => $this->input->post('cupo'));

	      $where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
	      $actualizar = $this->datos_model->ActualizarItem($coleccion,$data,$where);
	      echo $actualizar;

      } else {
			redirect('login/index');
		}

	}

	public function eliminar_taller(){
		if ($this->session->userdata('user_nivel') == 1) {

			//eliminar
			$coleccion ='talleres';
	   	$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
	   	$resultado = $this->datos_model->EliminarItem($coleccion,$where);
	   	echo $resultado;

   	} else {
			redirect('login/index');
		}
	}
}