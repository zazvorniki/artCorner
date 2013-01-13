<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		$this->load->model('blog_model');
	}
	
	function index()
	{
		//This loads the default views. The header, body and footer
		$this->load->view('defaultHeader_view');
		$this->blog_model->loadAll();	
		$this->load->view('footer_view');
	}
	
	function projects()
	{
		$this->load->view('defaultHeader_view');
		$this->blog_model->loadProjects();
		$this->load->view('footer_view');
	}
	
	
	function events()
	{
		$this->load->view('defaultHeader_view');
		$this->blog_model->loadEvents();
		$this->load->view('footer_view');
		
	}

}