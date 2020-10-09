<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		if ($this->session->userdata('logeado')) {
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$data['modulo'] = "iniciar_registro_staff";
			$this->load->view('constructor/header');
            $this->load->view('constructor/menu', $data);
			$this->load->view('Staff/staff');
			$this->load->view('Staff/funciones', $data);
		} else {
			redirect('login/index');
		}
	}
	public function registrar_staff(){
		if ($this->session->userdata('logeado')) {
			$pack = array('nombre' => strtoupper($this->input->post('nombre')),
				'id' => $this->input->post('id'),
				'apepat' => strtoupper($this->input->post('apepat')),
				'apemat' => strtoupper($this->input->post('apemat')),
				'cargo' => strtoupper($this->input->post('cargo')),
				'grado' => $this->input->post('grado'),
				'grupo' => strtoupper($this->input->post('grupo')),
				'hora_s' => $this->input->post('hora_s'),
				'tel' => $this->input->post('tel'),
				'email' => $this->input->post('email'),
				'clave' => $this->input->post('clave'),
				'nivel' => 2,
			);
        	$insertar = $this->datos_model->InsertarItem('usuarios',$pack);
        	echo $insertar;
        } else {
			redirect('login/index');
		}
	}

	public function staff_listado()
	{
		if ($this->session->userdata('logeado')) {
			$data['modulo'] = "iniciar_listado_staff";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/header');
			$this->load->view('constructor/menu', $data);
			$this->load->view('Staff/listado');
			$this->load->view('Staff/funciones', $data);
            
		} else {
			redirect('login/index');
		}
	}

	public function listar_staff(){
		if ($this->session->userdata('logeado')) {
			$where = array('nivel'=>2);
        	$order = 'nombre';
        	$resultado = $this->datos_model->GetItemsOrder('usuarios',$where,$order);
        	$datos = array();
        	$i = 0;
        	foreach ($resultado as $entry) {
        		$datos[$i]['nombre'] = $entry['nombre'];
        		$datos[$i]['apemat'] = $entry['apemat'];
        		$datos[$i]['apepat'] = $entry['apepat'];
        		$datos[$i]['id'] = $entry['id'];
        		$datos[$i]['object_id'] = (string)$entry['_id'];
        		$datos[$i]['cargo'] = $entry['cargo'];
        		$datos[$i]['grado'] = $entry['grado'];
        		$datos[$i]['grupo'] = $entry['grupo'];
        		$datos[$i]['hora_s'] = $entry['hora_s'];
        		$datos[$i]['tel'] = $entry['tel'];
        		$datos[$i]['email'] = $entry['email'];
            	$i++;
        	}
        	echo json_encode($datos);
        } else {
			redirect('login/index');
		}
	}

	public function eliminar_staff(){
		if ($this->session->userdata('logeado')) {
			$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('id')));
        	$resultado = $this->datos_model->EliminarItem('usuarios',$where);
        	echo $resultado;
        } else {
			redirect('login/index');
		}
	}

	public function ver_staff(){
		if ($this->session->userdata('logeado')) {
			$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('id')));
        	$resultado = $this->datos_model->GetItems('usuarios',$where);
        	$datos['nombre'] = $resultado[0]['nombre'];
        	$datos['apemat'] = $resultado[0]['apemat'];
        	$datos['apepat'] = $resultado[0]['apepat'];
       		$datos['id'] = $resultado[0]['id'];
       		$datos['cargo'] = $resultado[0]['cargo'];
       		$datos['grado'] = $resultado[0]['grado'];
       		$datos['grupo'] = $resultado[0]['grupo'];
       		$datos['hora_s'] = $resultado[0]['hora_s'];
       		$datos['tel'] = $resultado[0]['tel'];
       		$datos['email'] = $resultado[0]['email'];
       		$datos['clave'] = $resultado[0]['clave'];
       		echo json_encode($datos);
		} else {
			redirect('login/index');
		}
	}

	public function editar_staff(){
		if ($this->session->userdata('logeado')) {
			$data = array('nombre'=>strtoupper($this->input->post('nombre')),
				'apepat'=>strtoupper($this->input->post('apepat')),
				'apemat'=>strtoupper($this->input->post('apemat')),
				'id'=>$this->input->post('id'),
				'grado'=>$this->input->post('grado'),
				'grupo'=>strtoupper($this->input->post('grupo')),
				'hora_s'=>$this->input->post('hora_s'),
				'cargo'=>strtoupper($this->input->post('cargo')),
				'tel'=>$this->input->post('tel'),
				'clave'=>$this->input->post('clave'),
				'email'=>$this->input->post('email'),
			);
        	$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
        	$resultado = $this->datos_model->ActualizarItem('usuarios',$data,$where);
        	echo $resultado;
        } else {
			redirect('login/index');
		}
	}
}
