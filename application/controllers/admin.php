<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		//this loads the user model which takes over the login functionality 
		$this->load->model('users_model');
		//this loads the blog model which handles the blog functionality 
		$this->load->model('blog_model');
	}
	
	function index()
	{	
		//this destroys any sessions that may be lingering 
		$this->session->sess_destroy();
		//and then this loads the login view
		$this->load->view('login_view');
	}
	
	function writeBlog()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//if the sessions are empty then this will redirect the user back to the login page
		if (empty($user['currentUser'])) {
			redirect('admin/');
		}
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		//this loads the view where you can post a blog entire
		$this->load->view('write_view');
		$this->load->view('footer_view');
	}
	
	function writeResource()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//if the sessions are empty then this will redirect the user back to the login page
		if (empty($user['currentUser'])) {
			redirect('admin/');
		}
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		//this loads the view where you can post a blog entire
		$this->load->view('resource_view');
		$this->load->view('footer_view');
	}
	
	function insertPost()
	{
		//this checks to see if the form has a data-key. If it does not then it is directed to the error page. This secures this function and dissallows access directly from the url bar.
		if($this->input->post('data-key') == 'newPost')
		{
			//this says that the session user is the current user
			$user['currentUser']=$this->session->userdata('currentUser');
			//if the sessions are empty then this will redirect the user back to the login page		
			if (empty($user['currentUser'])) {
				redirect('admin/');
			}
			//this takes the info from the form and pushes it to the publish post function in the model and then redirects to the successPost function
			$this->blog_model->publishPost();
			redirect('admin/successPost');
		}else{
			redirect('error/');
		}	
	}
	
	function editBlogpost()
	{
		if($this->input->post('data-key') == 'editPost')
		{
			//this says that the session user is the current user
			$user['currentUser']=$this->session->userdata('currentUser');
			//if the sessions are empty then this will redirect the user back to the login page		
			if (empty($user['currentUser'])) {
				redirect('admin/');
			}
			//this takes the info from the form and pushes it to the publish post function in the model and then redirects to the successPost function
			$this->blog_model->editPost();
			redirect('blog/');
		}else {
			redirect('error/');
		}
		
		
	}
	
	function insertResource()
	{
		//this checks to see if the form has a data-key. If it does not then it is directed to the error page. This secures this function and dissallows access directly from the url bar.
		if($this->input->post('data-key') == 'newRe')
		{
			//this says that the session user is the current user
			$user['currentUser']=$this->session->userdata('currentUser');
			//if the sessions are empty then this will redirect the user back to the login page
			if (empty($user['currentUser'])) {
				redirect('admin/');
			}
			//this takes the info from the form and pushes it to the publish resource function in the model and then redirects to the successPost function
			$this->blog_model->publishResource();
			redirect('admin/successResource');
			
		}else{
			redirect('error/');
		}	
	}
	
	function successPost()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//if the sessions are empty then this will redirect the user back to the login page		
		if (empty($user['currentUser'])) {
			redirect('admin/');
		}

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
		//if the sessions are empty then this will redirect the user back to the login page	
		if (empty($user['currentUser'])) {
			redirect('admin/');
		}
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		//these load the views appropriate for this page		
		$this->load->view('thankYou_view');
		$this->load->view('resource_view');
		$this->load->view('footer_view');
	}

	function edit()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//if the sessions are empty then this will redirect the user back to the login page			
		if (empty($user['currentUser'])) {
			redirect('admin/');
		}
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		$this->blog_model->editView();
		$this->load->view('footer_view');
	}
	
	function delete()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//if the sessions are empty then this will redirect the user back to the login page			
		if (empty($user['currentUser'])) {
			redirect('admin/');
		}
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		
		$this->blog_model->deletePost();
		redirect('blog/');
	}
	
	function deleteLink()
	{
		//this says that the session user is the current user
		$user['currentUser']=$this->session->userdata('currentUser');
		//if the sessions are empty then this will redirect the user back to the login page			
		if (empty($user['currentUser'])) {
			redirect('admin/');
		}
		//this takes the currentUser and then passes it to a function inside the user model
		$user = $this->users_model->getUser($user['currentUser']->id);
		
		$this->blog_model->deleteResource();
		redirect('blog/');
	}
	
	function deleteWarning()
	{
		if($this->input->post('data-key') == 'permDelete')
		{
			//this says that the session user is the current user
			$user['currentUser']=$this->session->userdata('currentUser');
			//if the sessions are empty then this will redirect the user back to the login page			
			if (empty($user['currentUser'])) {
				redirect('admin/');
			}
			//this takes the currentUser and then passes it to a function inside the user model
			$user = $this->users_model->getUser($user['currentUser']->id);
			$this->load->view('deleteWarning_view');
		}else{
			redirect('error/');
		}
	}	
		
	function logout()
	{
		//this destroys the sessions
		$this->session->sess_destroy();
		//and then this redirects the user to the login page
		redirect('admin/');
	}
}