<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		//this loads the blog model that connects this application to the database 
		$this->load->model('blog_model');
		$this->load->model('users_model');
		
	}
	
	function index()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');

		//this if statement says if there are user sessions then the user will be given the admin controls, but if they do not have the right sessions than they are given the views without the controls.
		if (empty($user['currentUser'])) {
			//This loads the default views. The header, body and footer
			$this->load->view('defaultHeader_view');
			$this->blog_model->loadAll();
			$this->blog_model->loadResource();	
			$this->load->view('footer_view');
		}else {
			//this takes the currentUser and then passes it to a function inside the user model
			$user = $this->users_model->getUser($user['currentUser']->id);
			//this loads the blog posts, the side bar and the footer
			$this->blog_model->loadAdminBlog();
			$this->blog_model->loadAdminRe();	
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
			$this->blog_model->loadProjects();
			$this->blog_model->loadReProject();
			$this->load->view('footer_view');
		}else {
			//this takes the currentUser and then passes it to a function inside the user model
			$user = $this->users_model->getUser($user['currentUser']->id);
			//this loads the project blogs and the sidebar and footer that goes along with it
			$this->blog_model->loadAdminProjects();
			$this->blog_model->loadAdminProRe();
			$this->load->view('footer_view');
		}
	}
	
	function events()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this if statement says if there are user sessions then the user will be given the admin controls, but if they do not have the right sessions than they are given the views without the controls.
		if (empty($user['currentUser'])) {
			//this loads the default events, then the body and the footer 
			$this->load->view('defaultHeader_view');
			$this->blog_model->loadEvents();
			$this->blog_model->loadReEvent();
			$this->load->view('footer_view');
		}else{
			//this takes the currentUser and then passes it to a function inside the user model
			$user = $this->users_model->getUser($user['currentUser']->id);
			//this loads the default events, then the body and the footer 
			$this->blog_model->loadAdminEvents();
			$this->blog_model->loadAdminEveRe();
			$this->load->view('footer_view');		
		}		
	}
	
	function comments()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this if statement says if there are user sessions then the user will be given the admin controls, but if they do not have the right sessions than they are given the views without the controls.
		if (empty($user['currentUser'])) {
			//this loads the comments
			$this->load->view('defaultHeader_view');
			$this->blog_model->loadOneEntry();
			$this->blog_model->loadComments();
			$this->load->view('footer_view');
		}else {
			//this takes the currentUser and then passes it to a function inside the user model
			$user = $this->users_model->getUser($user['currentUser']->id);
			//this loads the comments
			$this->blog_model->loadAdminOne();
			$this->blog_model->loadComments();
			$this->load->view('footer_view');
		}		
	}
	
	function writeComment()
	{
		//this checks if the hidden input field is filled with 'yes'. If it is not then the user is most likely a robot so it will not post what ever they typed in.
		if($_POST['robot'] == 'yes')
		{
			//this publishes the comment and then redirects the user back to the comment page they were on with their comment posted
			$this->blog_model->publishComment();
			redirect('blog/comments/'.$_POST['entry_id']);
		}else{
			echo 'nope';
		}	
	}
	
	function contactForm()
	{
		$this->load->view('defaultHeader_view');
		$this->load->view('contact_view');
		$this->load->view('footer_view');
	}
	
}