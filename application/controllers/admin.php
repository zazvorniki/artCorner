<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
        	$this->load->helper("url");
		$this->load->model('users_model');
	}
	
	function index()
	{
		
		$this->load->view('login_view');
	}
	
	function viewPortal(){
		$user['currentUser']=$this->session->userdata('currentUser');
		
		if (empty($user['currentUser'])) {
			redirect('admin/');
		} 
		
		$user = $this->users_model->getUser($user['currentUser']->id);
	}
	
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/');
	}
	
	

}