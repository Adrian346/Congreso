<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_panel extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		$this->load->view('panel_admin/Adminpanel');
	}
}
