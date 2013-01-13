<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
	}
	
	function index()
	{
		//This loads the default views. The header, body and footer
		$this->load->view('defaultHeader_view');
		$this->load->view('defaultBlog_view');
		$this->load->view('footer_view');
	}

}