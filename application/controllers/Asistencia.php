<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistencia extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		if ($this->session->userdata('logeado')) {
			$data['modulo'] = "iniciar_asistencias";
			$data['eventos'] = $this->datos_model->GetItemsOrder('eventos',array(),'nombre');
			$data['talleres'] = $this->datos_model->GetItemsOrder('talleres',array(),'nombre');
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('asistencia/asistencia',$data);
			$this->load->view('asistencia/funciones',$data);
		}else{
			redirect('login/index');
		}
		
	}
	public function agregar_asistencia(){
		if ($this->session->userdata('logeado')) {
			if($this->datos_model->BuscarCoincidenciaItem('alumnos', array('id_uaa'=>$this->input->post('id_uaa'))) == 'existe'){
				if($this->input->post('descripcion_taller') != ''){
					$descripcion = $this->input->post('descripcion_taller');
				} else if($this->input->post('descripcion_evento') != ''){
					$descripcion = $this->input->post('descripcion_evento');
				}
				$data = array('id_uaa' => $this->input->post('id_uaa'),
				'tipo' => strtoupper($this->input->post('tipo')),
				'descripcion' => strtoupper($descripcion),
				'fecha' => date('Y-m-d'));
				$resultado = $this->datos_model->InsertarItem('asistencias', $data);
				echo "registrado";
			} else{
				echo "no_registrado";
			}
		}else{
			redirect('login/index');
		}
	}
	public function listado(){
		if ($this->session->userdata('logeado')) {
			$data['modulo'] = "iniciar_listado_asistencias";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('asistencia/listado');
			$this->load->view('asistencia/funciones', $data);

		}else{
			redirect('login/index');
		}
	}
	public function listar_asistencias(){
		//if ($this->session->userdata('user_nivel') == 1) {
			$coleccion ='asistencias';
			//Listar
			$where = array('id_uaa'=>$this->input->post('id_uaa'));
		    $order = 'fecha';
		    $resultado = $this->datos_model->GetItemsOrder($coleccion,$where,$order);
		    $data = array();
		    $i = 0;
		    foreach ($resultado as $entry) {
		   		$data[$i]['_id'] = (string)$entry['_id'];
		   		$data[$i]['id_uaa'] = $entry['id_uaa'];
				$data[$i]['tipo'] = $entry['tipo'];
				$data[$i]['descripcion'] = $entry['descripcion'];
				$data[$i]['fecha'] = $this->datos_model->FormatoFecha($entry['fecha']);
				$i++;
		    }
	   		echo json_encode($data);
	    /*}else{
			redirect('login/index');
		}*/
	}
}
