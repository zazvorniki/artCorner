<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		//this loads the blog model that connects this application to the database 
		$this->load->model('blog_model');
	}
	
	function index()
	{
		//This loads the default views. The header, body and footer
		$this->load->view('defaultHeader_view');
		$this->blog_model->loadAll();
		$this->blog_model->loadResource();	
		$this->load->view('footer_view');
	}
	
	function projects()
	{
		//this loads the default projects, then the body and the footer 
		$this->load->view('defaultHeader_view');
		$this->blog_model->loadProjects();
		$this->blog_model->loadReProject();
		$this->load->view('footer_view');
	}
	
	function events()
	{
		//this loads the default events, then the body and the footer 
		$this->load->view('defaultHeader_view');
		$this->blog_model->loadEvents();
		$this->blog_model->loadReEvent();
		$this->load->view('footer_view');
	}
	
	function comments()
	{
		//this loads the comments
		$this->load->view('defaultHeader_view');
		$this->blog_model->loadOneEntry();
		$this->blog_model->loadComments();
		$this->load->view('footer_view');
	}
}