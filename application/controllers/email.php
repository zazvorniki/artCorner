<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		$this->load->library('email');
		
	}
	
	function index()
	{	
		
	}
	
	function sendEmail()
	{
		
		$this->email->from($this->input->post('email'), $this->input->post('name'));
		$this->email->to('swampgliders@gmail.com'); 
//		$this->email->cc('swampgliders@gmail.com');
		$this->email->reply_to('marcia.sears@keysschools.com', 'Marcia Sears'); 
		
    		$this->email->subject('plantationkeyartcorner.com contact form');
		$this->email->message($this->input->post('message'));	
		
		$this->email->send();
		
		if ( ! $this->email->send())
		{
		    echo 'nope!';
		}
		
	}
}