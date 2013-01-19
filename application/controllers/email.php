<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		$this->load->model('blog_model');
		
	}
	
	function index()
	{	
		$config = Array(
			"protocol" => "smtp",
			"smtp_host" => "ssl://smtp.googlemail.com",
			"smtp_port" => "465",
			"smtp_user" => "swampgliders@gmail.com",
			"smtp_pass" => "tanfnntt"
		);
		
		$this->load->library('email', $config);
		$this->email->initialize(array('mailtype' => 'html')); 
		
		$this->email->set_newline("\r\n");
		$this->email->from($this->input->post('email'), $this->input->post('name'));
		$this->email->to('swampgliders@gmail.com'); 
		//		$this->email->cc('swampgliders@gmail.com');
		$this->email->reply_to($this->input->post('email'), $this->input->post('name')); 
		
		$this->email->subject('plantationkeyartcorner.com contact form');
		$this->email->message($this->input->post('message'));	
			
		if (!$this->email->send())
		{
		show_error($this->email->print_debugger());
		}else{
		redirect('email/sentMail');
		}
	}

	function sentMail()
	{
		//This loads the default views. The header, body and footer
		$this->load->view('defaultHeader_view');
		$this->load->view('emailSuccess_view');
		$this->blog_model->loadAll();
		$this->blog_model->loadResource();	
		$this->load->view('footer_view');
	}
}