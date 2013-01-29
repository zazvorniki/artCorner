<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_Controller extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
	}
}

class	Auth extends User_Controller{
	
	public function __construct();
	{
		parent::__construct();
		$this->load->model('users_model');	
	}
}


class AdminAuth extends Auth {

    public function __construct() {
        parent::__construct();
        $user['currentUser']=$this->session->userdata('currentUser');
        
        if (empty($user['currentUser'])) {
        	redirect('admin/');
        }
    }
}

class AdminViews extends Auth {

    public function __construct() {
        parent::__construct();
        $user['currentUser']=$this->session->userdata('currentUser');
    }
}
