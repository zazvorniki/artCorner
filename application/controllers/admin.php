<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		//this loads the user model which takes over the login functionality 
		$this->load->model('users_model');
	}
	
	function index()
	{	
		//this destroys any sessions that may be lingering 
		$this->session->sess_destroy();
		//and then this loads the login view
		$this->load->view('login_view');
	}
	
	function viewPortal(){
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//if the current user is absent of any information then it will redirect you to the login page
		if (empty($user['currentUser'])) {
			redirect('admin/');
		} 
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
	}
	
	function writeBlog(){
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		//this loads the view where you can post a blog entrie
		$this->load->view('write_view');
		
	}
	
	function logout()
	{
		//this destroys the sessions
		$this->session->sess_destroy();
		//and then this redirects the user to the login page
		redirect('admin/');
	}
}