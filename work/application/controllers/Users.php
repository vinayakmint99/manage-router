<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		
		parent::__construct();

		// load model
		//$this->load->model('UsersModel');
		$this->load->model('User_model', 'user');

		// load base_url
		$this->load->helper('url');

	}

	public function index(){

		// get data
		$data['userlist'] = $this->user->getUsers();		
		$this->load->view('user_view',$data);
	}

	public function updateuser(){
		// POST values
	    $id = $this->input->post('id');
	    $field = $this->input->post('field');
	    $value = $this->input->post('value');

	    // Update records
	    $this->user->updateUser($id,$field,$value);

	    echo 1;
	    exit;
	}
	public function deleteuser(){
		// POST values
		$id = $this->input->post('id');
		$value = $this->input->post('value');
		
		// delte records
		$this->user->deleteUser($id,$value);

		echo 1;
		exit;
	}
	
	public function submitform(){
		//Submit values
		$this->user->saveAll();
		echo 1;
		exit;
	}
}
