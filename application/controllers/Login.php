<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		$this->session->sess_destroy();
		$data['modulo'] = "iniciar_login";
		$this->load->view('constructor/header');
		$this->load->view('login/index');
		$this->load->view('login/funciones', $data);
	}

	public function confirmar_login(){
		$id = $this->input->post('id');
		$password = $this->input->post('password');
        $resultado = $this->datos_model->GetItems('usuarios',array('id' => $id));
        if(count($resultado) > 0){
        	$resultado = $this->datos_model->GetItems('usuarios',array('id' => $id,'clave' => $password));
        	if(count($resultado) > 0){
				$pack = array('user_nombre' => $resultado[0]['nombre'],
					'user_email' => $resultado[0]['email'],
					'user_nivel' => $resultado[0]['nivel'],
					'user_id' => $resultado[0]['id'],
					'logeado' => true);
				$this->session->set_userdata($pack);
				$estatus = "acceso_correcto";
        	} else{
        		$estatus = "error_password";
        	}
        } else{
        	$estatus = "error_id";
        }
		echo json_encode(array('estatus' => $estatus));
	}

	public function nivel_usuario(){
		if ($this->session->userdata('logeado')) {
			if ($this->session->userdata('user_nivel') == 1) {
				//redirect('panel_admin/Adminpanel');
				$this->load->view('panel_admin/Adminpanel');
			} else if ($this->session->userdata('user_nivel') == 2) {
				//redirect('panel_staff/Staffpanel');
				$this->load->view('panel_staff/Staffpanel');
			} 
		} else {
			redirect('login/index');
		}
	}

	public function cerrar_sesion() {
		$this->session->sess_destroy();
		redirect('login/index');
	}
}
