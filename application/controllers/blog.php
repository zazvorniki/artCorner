<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		//this loads the blog model that connects this application to the database 
		$this->load->model('blog_model');
		//this loads the users model that connects this verifies the user
		$this->load->model('users_model');
	}
	
	function index()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this if statement says if there are user sessions then the user will be given the admin controls, but if they do not have the right sessions than they are given the views without the controls.
		if (empty($user['currentUser'])) {
			//This grabs the information from the model and then pushes the data into the default body view
			$this->load->view('defaultHeader_view');
			$data['query'] = $this->blog_model->loadAll();
			$this->load->view('defaultBlog_view', $data);
			//This takes the information from the model and then pushes it into the default side bar
			$d['query'] = $this->blog_model->loadResource();
			$this->load->view('defaultSidebar_view', $d);
			$this->load->view('footer_view');
		}else {
			//this takes the currentUser and then passes it to a function inside the user model
			$user = $this->users_model->getUser($user['currentUser']->id);
			//This takes the model and pushes the information into the admin blog view
			$data['query'] = $this->blog_model->loadAll();
			$this->load->view('adminBlog_view', $data);
			//This takes the information from the model and pushes it into the admins side bar
			$d['query'] = $this->blog_model->loadResource();
			$this->load->view('adminSidebar_view', $d);
			$this->load->view('footer_view');
		} 
	}
	
	function projects()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		
		//this if statement says if there are user sessions then the user will be given the admin controls, but if they do not have the right sessions than they are given the views without the controls.
		if (empty($user['currentUser'])) {
			//this loads the default projects, then the body and the footer 
			$this->load->view('defaultHeader_view');
			//This takes the information for the projects and pushes it into the project default blog view
			$data['query'] = $this->blog_model->loadProjects();
			$this->load->view('defaultBlog_view', $data);
			//This takes the information for the projects and pushes it into the project default sidebar		
			$d['query'] = $this->blog_model->loadReProject();
			$this->load->view('defaultSidebar_view', $d);
			$this->load->view('footer_view');
						
		}else {
			//this takes the currentUser and then passes it to a function inside the user model
			$user = $this->users_model->getUser($user['currentUser']->id);
			//This takes the information for the projects and pushes it into the project admin blog view
			$data['query'] = $this->blog_model->loadProjects();
			$this->load->view('adminBlog_view', $data);
			
			//This takes the information for the projects and pushes it into the project admin sidebar			
			$d['query'] = $this->blog_model->loadReProject();	
			$this->load->view('adminSidebar_view', $d);
			$this->load->view('footer_view');
		}
	}
	
	function events()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this if statement says if there are user sessions then the user will be given the admin controls, but if they do not have the right sessions than they are given the views without the controls.
		if (empty($user['currentUser'])) {
			//This takes the information from the model and pushes it into the event default blog view
			$this->load->view('defaultHeader_view');
			$data['query'] = $this->blog_model->loadEvents();
			$this->load->view('defaultBlog_view', $data);
			//This takes the information from the model and pushes it into the event default sidebar
			$d['query'] = $this->blog_model->loadReEvent();
			$this->load->view('defaultSidebar_view', $d);
			$this->load->view('footer_view');
		}else{
			//this takes the currentUser and then passes it to a function inside the user model
			$user = $this->users_model->getUser($user['currentUser']->id);
			//This takes the information from the model and pushes it into the event admin blog view
			$query = $this->blog_model->loadEvents();
			$data['query'] = $query;
			$this->load->view('adminBlog_view', $data);
			//This takes the information from the model and pushes it into the event sidebar admin view
			$d['query'] = $this->blog_model->loadReEvent();
			$this->load->view('adminSidebar_view', $d);
			$this->load->view('footer_view');
		}		
	}
	
	function vocab()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this if statement says if there are user sessions then the user will be given the admin controls, but if they do not have the right sessions than they are given the views without the controls.
		if (empty($user['currentUser'])) {

			//This takes the information from the model and pushes it into the default vocab view
			$this->load->view('defaultHeader_view');
			$data['query'] = $this->blog_model->loadVocab();
			$this->load->view('defaultVocab_view', $data);
			$this->load->view('footer_view');
		}else{
			//this takes the currentUser and then passes it to a function inside the user model
			$user = $this->users_model->getUser($user['currentUser']->id);
			//This takes the information from the model and pushes it into the admin vocab view
			$data['query'] = $this->blog_model->loadVocab();
			$this->load->view('adminVocab_view', $data);
			$this->load->view('footer_view');		
		}
	}			
	
	function comments()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this if statement says if there are user sessions then the user will be given the admin controls, but if they do not have the right sessions than they are given the views without the controls.
		if (empty($user['currentUser'])) {
			//This takes the information from the model and pushes it into the default one blog post view
			$this->load->view('defaultHeader_view');
			$data['query'] = $this->blog_model->loadOneEntry();
			$this->load->view('innerBlog_view', $data);
			//This takes the information from the model and pushes it into the default comment view
			$d['query'] = $this->blog_model->loadComments();
			$this->load->view('comment_view', $d);
			$this->load->view('footer_view');
		}else {
			//this takes the currentUser and then passes it to a function inside the user model
			$user = $this->users_model->getUser($user['currentUser']->id);
			//This takes the information from the model and pushes it into the admin one blog post view
			$data['query'] = $this->blog_model->loadOneEntry();
			$this->load->view('adminInner_view', $data);
			//This takes the information from the model and pushes it into the admin comment view
			$d['query'] = $this->blog_model->loadComments();
			$this->load->view('comment_view', $d);
			$this->load->view('footer_view');
		}		
	}
	
	function writeComment()
	{	
		//this makes sure that the data-key is filled in. If the user tries to access this function with just the url they will be sent to the error page
		if($this->input->post('data-key') == 'newComment')
		{
			//this publishes the comment and then redirects the user back to the comment page they were on with their comment posted

			if (empty($_POST['author']) || empty($_POST['email']) || empty($_POST['body']))
			{
				
				 if (empty($user['currentUser'])) {
				 	//This takes the information from the model and pushes it into the default one blog post view
				 	$this->load->view('defaultHeader_view');
				 	$this->load->view('error_view');
				 	$this->load->view('footer_view');
				 }else {
				 	//this takes the currentUser and then passes it to a function inside the user model
				 	$user = $this->users_model->getUser($user['currentUser']->id);
				 	$this->load->view('error_view');
				 	$this->load->view('footer_view');
				 }	
			}else{
				$this->blog_model->publishComment();
				redirect('blog/comments/'.$this->input->post('entry_id'));
			}			
		}else{
			redirect('error/');
		}
	}
	
	function contactForm()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this if statement says if there are user sessions then the user will be given the admin controls, but if they do not have the right sessions than they are given the views without the controls.
		if (empty($user['currentUser'])) {
			//This loads the default views. The header, body and footer
			$this->load->view('defaultHeader_view');
			$this->load->view('contact_view');
			$this->load->view('footer_view');
		}else {
			//this takes the currentUser and then passes it to a function inside the user model
			$user = $this->users_model->getUser($user['currentUser']->id);
			//This loads the default views. The header, body and footer
			$this->load->view('contact_view');
			$this->load->view('footer_view');
		}		
	}	
}