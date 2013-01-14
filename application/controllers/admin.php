<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		//this loads the user model which takes over the login functionality 
		$this->load->model('users_model');
		//this loads the blog model which handles the blog funvtionality 
		$this->load->model('blog_model');
	}
	
	function index()
	{	
		//this destroys any sessions that may be lingering 
		$this->session->sess_destroy();
		//and then this loads the login view
		$this->load->view('login_view');
	}
	
	function viewPortal(){
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//if the current user is absent of any information then it will redirect you to the login page
		if (empty($user['currentUser'])) {
			redirect('admin/');
		} 
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		//this loads the blog posts, the side bar and the footer
		$this->blog_model->loadAll();
		$this->blog_model->loadResource();	
		$this->load->view('footer_view');
	}
	
	function writeBlog(){
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		//this loads the view where you can post a blog entire
		$this->load->view('write_view');
		$this->load->view('footer_view');
	}
	
	function writeResource(){
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		//this loads the view where you can post a blog entire
		$this->load->view('resource_view');
		$this->load->view('footer_view');
	}
	
	function insertPost()
	{
		//this takes the info from the form and pushes it to the publish post function in the model and then redirects to the successPost function
		$this->blog_model->publishPost();
		redirect('admin/successPost');
	}
	
	function insertResource()
	{
		//this takes the info from the form and pushes it to the publish resource function in the model and then redirects to the successPost function
		$this->blog_model->publishResource();
		redirect('admin/successResource');
	}
	
	function successPost()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		//these load the views appropriate for this page		
		$this->load->view('thankYou_view');
		$this->load->view('write_view');
		$this->load->view('footer_view');
	}
	
	function successResource()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		//these load the views appropriate for this page		
		$this->load->view('thankYou_view');
		$this->load->view('resource_view');
		$this->load->view('footer_view');
	}
	
	function logout()
	{
		//this destroys the sessions
		$this->session->sess_destroy();
		//and then this redirects the user to the login page
		redirect('admin/');
	}
	
	function projects()
	{
		//this loads the default projects, then the body and the footer 
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		//this loads the project blogs and the sidebar and footer that goes along with it
		$this->blog_model->loadProjects();
		$this->blog_model->loadReProject();
		$this->load->view('footer_view');
	}
	
	
	function events()
	{		
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		//this loads the default events, then the body and the footer 
		$this->blog_model->loadEvents();
		$this->blog_model->loadReEvent();
		$this->load->view('footer_view');
	}
}