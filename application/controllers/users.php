<?php class Users extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		$this->load->model('users_model');
	}
	
	function index()
	{
				
		
	}
	
	function checkLogin(){
		$salt = 'chocolate';
					
		$loginObject = array('email' => $this->input->post('email'), 'password' => md5($salt.$_POST['pass']));
	
	
		if($_POST['robot'] == 'yes')
		{
			$login = $this->users_model->checkUser($loginObject);
			
		}else{
			echo 'sorry looks like your a robot';
		}	
	
		if($login == false){
			redirect('admin/');	
			
		}else{
			$currentUser = $login;
			$this->session->set_userdata('currentUser', $currentUser);
			$this->session->set_userdata('loggedin', true);
	
			redirect('admin/viewPortal');	
		}
	}
	
}?>