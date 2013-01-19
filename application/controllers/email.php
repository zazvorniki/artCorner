<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		$this->load->model('blog_model');
	}
	
	function index()
	{	
		//this sets the configurations for the email. I am using a gmail account to send this email instead of the default because of how it shows up in the inbox.
		$config = Array(
			"protocol" => "smtp",
			"smtp_host" => "ssl://smtp.googlemail.com",
			"smtp_port" => "465",
			"smtp_user" => "swampgliders@gmail.com",
			"smtp_pass" => "tanfnntt"
		);
		
		//this loads the email library. I would set this up in the autoload class except I am only sending one email so it does not make sense to load the class in every controller
		$this->load->library('email', $config);
		
		//this makes sure that the html tags that are processed correctly in the email and style the email instead of printing the tags out.
		$this->email->initialize(array('mailtype' => 'html')); 
		
		//from the research I've done, no one really knows why you have to put this, but if you don't then it throws an error
		$this->email->set_newline("\r\n");
		
		//this sets the from field, the to field and he cc field. These will change once the site is in full production. At the moment the email is sending to my own personal email account and the cc is commented out
		$this->email->from($this->input->post('email'), $this->input->post('name'));
		$this->email->to('swampgliders@gmail.com'); 
//		$this->email->cc('swampgliders@gmail.com');
		$this->email->reply_to($this->input->post('email'), $this->input->post('name')); 
		
		//the is the email subject and message that will be sent 
		$this->email->subject('plantationkeyartcorner.com contact form');
		$this->email->message($this->input->post('message'));	
		
		//this says if the send function does not work than it will throw an error, if it does work than it will send you to sent mail function
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