<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
        	$this->load->helper("url");
	}
	
	function index()
	{
		
		$this->load->view('defaultHeader_view');
		$this->load->view('defaultBlog_view');
	}

}