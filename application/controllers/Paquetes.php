<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paquetes extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		if ($this->session->userdata('logeado')) {
			$data['modulo'] = "iniciar_registro_paquetes";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');			
			$this->load->view('paquetes/paquetes');
			$this->load->view('paquetes/funciones', $data);
		} else {
			redirect('login/index');
		}
	}

	public function registrar_paquete(){
		if ($this->session->userdata('logeado')) {
			$pack = array('nombre' => strtoupper($this->input->post('nombre')),
				'contenido' => strtoupper($this->input->post('contenido')),
				'precio' => $this->input->post('precio'),
			);
        	$insertar = $this->datos_model->InsertarItem('paquetes',$pack);
        	echo $insertar;
        } else {
			redirect('login/index');
		}
	}

	public function paquetes_listado()
	{
		if ($this->session->userdata('logeado')) {
			$data['modulo'] = "iniciar_listado_paquetes";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/header');
			$this->load->view('constructor/menu', $data);
			$this->load->view('paquetes/listado');
			$this->load->view('paquetes/funciones', $data);
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
        		$datos[$i]['id'] = (string)$entry['_id'];
            	$i++;
        	}
        	echo json_encode($datos);
        } else {
			redirect('login/index');
		}
	}

	public function eliminar_paquete(){
		if ($this->session->userdata('logeado')) {
			$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('id')));
        	$resultado = $this->datos_model->EliminarItem('paquetes',$where);
        	echo $resultado;
        } else {
			redirect('login/index');
		}
	}

	public function ver_paquete(){
		if ($this->session->userdata('logeado')) {
			$where =  array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('id')));
        	$resultado = $this->datos_model->GetItems('paquetes',$where);
        	$datos['nombre'] = $resultado[0]['nombre'];
        	$datos['contenido'] = $resultado[0]['contenido'];
        	$datos['precio'] = $resultado[0]['precio'];
       		echo json_encode($datos);
		} else {
			redirect('login/index');
		}
	}

	public function editar_paquete(){
		if ($this->session->userdata('logeado')) {
			$data = array('nombre'=>strtoupper($this->input->post('nombre')),
				'contenido'=>strtoupper($this->input->post('contenido')),
				'precio'=>$this->input->post('precio')
			);
        	$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('id')));
        	$resultado = $this->datos_model->ActualizarItem('paquetes',$data,$where);
        	echo $resultado;
        } else {
			redirect('login/index');
		}
	}
}
