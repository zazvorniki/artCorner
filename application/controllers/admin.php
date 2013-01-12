<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
        	$this->load->helper("url");
		//$this->load->model('blog_model');
	}
	
	function index()
	{
		
		$this->load->view('defaultHeader_view');
		$this->load->view('defaultBlog_view');
	}
	

}