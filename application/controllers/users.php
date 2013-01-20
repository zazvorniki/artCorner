<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		//this loads the user model that connects to the database
		$this->load->model('users_model');
	}
	
	function index()
	{
		//if the user tries to connect to this controller directly this will redirect you to the admin page that will make you login
		redirect('admin/');		
	}
	
	function checkLogin(){
		//this is the salt that I am using and is needed to decrypt the password from the database. Even though I do not have a register for them to use, I still have a md5 generator with salt that generates a password to store.
		$salt = 'chocolate';
		//This turns the email and password from the user into an object that will be used later on in sessions			
		$loginObject = array('email' => $this->input->post('email'), 'password' => md5($salt.$_POST['pass']));
		//This checks if a hidden input field is filled with 'yes'. This makes sure a robot is not automatically filling the inputs
		if($_POST['robot'] == 'yes')
		{
			$login = $this->users_model->checkUser($loginObject);
		}else{
			echo 'sorry looks like your a robot';
		}	
		//This checks if the login object is true. If it is than it sets the currantUser to the login object and then sets the sessions. If it is false than it will redirect the user to the login
		if($login == true){
			$currentUser = $login;
			$this->session->set_userdata('currentUser', $currentUser);
			$this->session->set_userdata('loggedin', true);
			//redirect('admin/viewPortal');
			redirect('blog/');
				
		}else{			
			redirect('admin/');
		}
	}	
}