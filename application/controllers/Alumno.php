<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alumno extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index(){
		if ($this->session->userdata('logeado')) {
			$data['modulo'] = "iniciar_alumnos";
			$data['paquetes'] = $this->datos_model->GetItemsOrder('paquetes',array(),'nombre');
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('alumno/alumno',$data);
			$this->load->view('alumno/funciones', $data);
		}else{
			redirect('login/index');
		}
	}

	public function agregar_alumno(){
		if ($this->session->userdata('logeado')) {
		$GetPaquete = $this->datos_model->GetItems('paquetes', array('nombre' => $this->input->post('paquete')));
		$precio_paquete = $GetPaquete[0]['precio'];
		if($this->input->post('monto') <= $precio_paquete){
			$data = array('id_uaa' => $this->input->post('id_uaa'),
			'nombre' => strtoupper($this->input->post('nombre')),
			'paterno' => strtoupper($this->input->post('paterno')),
			'materno' => strtoupper($this->input->post('materno')),
			'carrera' => strtoupper($this->input->post('carrera')),
			'semestre' => strtoupper($this->input->post('semestre')),
			'grupo' => strtoupper($this->input->post('grupo')),
			'paquete' => strtoupper($this->input->post('paquete')));
			$resultado = $this->datos_model->InsertarItem('alumnos', $data);

			$data = array('id_uaa' => $this->input->post('id_uaa'),
				'monto' => $this->input->post('monto'),
				'fecha' => date('Y-m-d'));
			$resultado .= $this->datos_model->InsertarItem('pagos', $data);
			echo "registrado";
		} else{
			echo "no_registrado";
		}
		}else{
			redirect('login/index');
		}
	}

	public function buscar_alumno(){
		//pagos	
		if ($this->session->userdata('logeado')) {	
		$where = array('id_uaa' => $this->input->post('id_buscar'));
		$GetPagos = $this->datos_model->GetItems('pagos', $where);
		$total = 0;
		foreach ($GetPagos as $key) {
			$total += $key['monto'];
        } 
        $where = array('id_uaa' => $this->input->post('id_buscar'));
		$resultado = $this->datos_model->GetItems('alumnos', $where);
		$datos = array();		
		foreach ($resultado as $key) {
			$datos['id'] = $key['id_uaa'];
			$datos['nombre'] = $key['nombre'];
			$datos['paterno'] = $key['paterno'];
			$datos['materno'] = $key['materno'];
			$datos['carrera'] = $key['carrera'];
			$datos['semestre'] = $key['semestre'];
			$datos['grupo'] = $key['grupo'];
			$datos['paquete'] = $key['paquete'];
			$datos['pagos'] = $total;
        } 
        echo json_encode($datos); 
        }else{
			redirect('login/index');
		}       
	}
	public function listado(){
		if ($this->session->userdata('logeado')) {
			$data['modulo'] = "iniciar_listado_alumnos";
			$data['usuario'] = strtoupper($this->session->userdata('user_nombre'));
			$this->load->view('constructor/menu', $data);
			$this->load->view('constructor/header');
			$this->load->view('alumno/listado');
			$this->load->view('alumno/funciones', $data);

		}else{
			redirect('login/index');
		}
	}
	public function listar_alumnos(){
		if ($this->session->userdata('logeado')) {
			$coleccion ='alumnos';
			//Listar
			$where = array();
		    $order = 'id_uaa';
		    $resultado = $this->datos_model->GetItemsOrder($coleccion,$where,$order);
		    $data = array();
		    $i = 0;
		    foreach ($resultado as $entry) {
		   		$data[$i]['_id'] = (string)$entry['_id'];
		   		$data[$i]['id_uaa'] = $entry['id_uaa'];
				$data[$i]['nombre'] = $entry['nombre'];
				$data[$i]['paterno'] = $entry['paterno'];
				$data[$i]['materno'] = $entry['materno'];
				$data[$i]['carrera'] = $entry['carrera'];
				$data[$i]['semestre'] = $entry['semestre'];
				$data[$i]['grupo'] = $entry['grupo'];
				$data[$i]['paquete'] = $entry['paquete'];
				$i++;
		    }
	   		echo json_encode($data);
	    }else{
			redirect('login/index');
		}
	}
	public function ver_alumno(){
		if ($this->session->userdata('logeado')) {
			$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
	      	$resultado = $this->datos_model->GetItems('alumnos',$where);
	   		foreach ($resultado as $alumno) {
	   			$data = array('id_uaa' => $alumno->id_uaa,
							'nombre' => $alumno->nombre,
							'paterno' => $alumno->paterno,
							'materno' => $alumno->materno,
							'carrera' => $alumno->carrera,
							'semestre' => $alumno->semestre,
							'grupo' => $alumno->grupo,
							'paquete' => $alumno->paquete);	   			
	   		}
	   		echo json_encode($data);
	   	}else {
			redirect('login/index');
		}
	}
	public function editar_alumno() {
		if ($this->session->userdata('logeado')) {
			$coleccion ='alumnos';
			$data = array('id_uaa' => $this->input->post('id_uaa'),
			'nombre' => strtoupper($this->input->post('nombre')),
			'paterno' => strtoupper($this->input->post('paterno')),
			'materno' => strtoupper($this->input->post('materno')),
			'carrera' => strtoupper($this->input->post('carrera')),
			'semestre' => strtoupper($this->input->post('semestre')),
			'grupo' => strtoupper($this->input->post('grupo')),
			'paquete' => $this->input->post('paquete'));

	        $where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
	        $actualizar = $this->datos_model->ActualizarItem($coleccion,$data,$where);
	        echo $actualizar;
	   	}else{
			redirect('login/index');
		}
	}
	public function eliminar_alumno(){
		if ($this->session->userdata('logeado')) {
			//eliminar
			$coleccion ='alumnos';
		   	$where = array('_id'=> new MongoDB\BSON\ObjectId($this->input->post('_id')));
		   	$resultado = $this->datos_model->EliminarItem($coleccion,$where);
		   	echo $resultado;

	   	}else{
			redirect('login/index');
		}
	}
}
