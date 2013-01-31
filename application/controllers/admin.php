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
	
	public function require_auth($location = 'admin/')
	{
		//this sets the session variable to the currentUser
		$this->user = $this->session->userdata('currentUser');
		//this says if the currentUser is not set then it will redirect them to the admin page
		if (empty($this->user)) {
			redirect($location);
		}
		//this calls the header with the users information
		$user = $this->users_model->getUser($this->user->id);
	}
	
	public function index()
	{	
		//this destroys any sessions that may be lingering 
		$this->session->sess_destroy();
		//and then this loads the login view
		$this->load->view('login_view');
	}
	
	public function writeBlog()
	{
		//this calls the header, write view and the footer
		$this->require_auth();
		$this->load->view('write_view');
		$this->load->view('footer_view');
	}
	
	public function writeResource()
	{
		//this calls the header, resource view and the footer
		$this->require_auth();
		$this->load->view('resource_view');
		$this->load->view('footer_view');
	}
	
	public function writeVocab()
	{
		//this calls the header, vocab view and the footer
		$this->require_auth();
		$this->load->view('vocab_view');
		$this->load->view('footer_view');
	}
	
	public function insertPost()
	{
		//this calls the header
		$this->require_auth();
		//this checks to see if the form has a data-key. If it does not then it is directed to the error page. This secures this function and dissallows access directly from the url bar.
		if($this->input->post('data-key') == 'newPost')
		{			
			//this makes sure that all the fields are filled in. If they are not then it will send you to an error page. This will only be triggered though if the user somehow gets past both the jquery and noscript tags
			if (empty($_POST['posted_by']) || empty($_POST['title']) || empty($_POST['category']) || empty($_POST['body']))
			{				
				$this->load->view('error_view');
				$this->load->view('footer_view');
			}else{
				//this takes the info from the form and pushes it to the publish post function in the model and then redirects to the successPost function
				$this->blog_model->publishPost();
				redirect('admin/successPost');			
			}			
		}else{
			redirect('error/');
		}	
	}
	
	public function insertVocab()
	{
		$this->require_auth();
		
		//this checks to see if the form has a data-key. If it does not then it is directed to the error page. This secures this function and dissallows access directly from the url bar.
		if($this->input->post('data-key') == 'newVocab')
		{			
			//if the fields are not fill in then this will send the user to an error page. This will only trigger if the user somehow manages to get past jquery and my noscript tags
			if (empty($_POST['title']) || empty($_POST['body']))
			{
				$this->load->view('error_view');
				$this->load->view('footer_view');
			}else{
				//this takes the info from the form and pushes it to the publish post function in the model and then redirects to the successPost function
				$this->blog_model->publishVocab();
				redirect('admin/successVocab');			
			}			
		}else{
			redirect('error/');
		}	
	}
	
	public function editBlogpost()
	{
		$this->require_auth();
		
		//if the fields are not fill in then this will send the user to an error page. This will only trigger if the user somehow manages to get past jquery and my noscript tags
		if($this->input->post('data-key') == 'editPost')
		{			
			//this takes the info from the form and pushes it to the publish post function in the model and then redirects to the successPost function
			if (empty($_POST['posted_by']) || empty($_POST['title']) || empty($_POST['category']) || empty($_POST['body']))
			{
				$this->load->view('error_view');
				$this->load->view('footer_view');
			}else{
				$this->blog_model->editPost();
				redirect('blog/');			
			}			
		}else {
			redirect('error/');
		}
		
		
	}
	
	public function insertResource()
	{
		$this->require_auth();
		
		//this checks to see if the form has a data-key. If it does not then it is directed to the error page. This secures this function and disallows access directly from the url bar.
		if($this->input->post('data-key') == 'newRe')
		{			
			//if the user does not fill in the form fields and somehow gets past both the jquery and noscript tags then this will trigger
			if (empty($_POST['resource']) || empty($_POST['name']) || empty($_POST['category']))
			{
				$this->load->view('error_view');
				$this->load->view('footer_view');
			}else{
				//this takes the info from the form and pushes it to the publish resource function in the model and then redirects to the successPost function
				$this->blog_model->publishResource();
				redirect('admin/successResource');			
			}			
		}else{
			redirect('error/');
		}	
	}
	
	public function successPost()
	{
		//this calls the header, thank you view, write view and the footer
		$this->require_auth();		
		$this->load->view('thankYou_view');
		$this->load->view('write_view');
		$this->load->view('footer_view');
	}
	
	public function successResource()
	{
		//this calls the header, thank you view, resource view and the footer
		$this->require_auth();		
		$this->load->view('thankYou_view');
		$this->load->view('resource_view');
		$this->load->view('footer_view');
	}
	
	public function successVocab()
	{
		//this calls the header, thank you view, vocab view and the footer
		$this->require_auth();		
		$this->load->view('thankYou_view');
		$this->load->view('vocab_view');
		$this->load->view('footer_view');
	}

	public function edit()
	{
		//this calls the header, edit view view and the footer
		$this->require_auth();		
		$this->load->view('edit_view', array(
			'query' => $this->blog_model->loadOneEntry(),
		));
		$this->load->view('footer_view');
	}
	
	public function delete()
	{
		//this calls the header, edit view view and the footer
		$this->require_auth();
		//this checks to see if the form has a data-key. If it does not then it is directed to the error page. This secures this function and disallows access directly from the url bar.
		if($this->input->post('data-key') == 'permDelete')
		{
			$this->blog_model->deletePost();
			redirect('blog/');
		}else{
			redirect('error/');
		}	
	}
	
	public function deleteLink()
	{
		//this calls the header, delete resource view and the footer
		$this->require_auth();
		$this->blog_model->deleteResource();
		redirect('blog/');
	}
	
	public function deleteVocab()
	{
		//this calls the header, delete vocab view and the footer
		$this->require_auth();
		$this->blog_model->deleteVocabulary();
		redirect('blog/vocab');
	}
	
	public function deleteWarning()
	{
		//this calls the header, delete warning view and the footer
		$this->require_auth();
		$user = $this->users_model->getUser($this->user->id);
		$this->load->view('deleteWarning_view');
	}	
		
	public function logout()
	{
		//this destroys the sessions and then redirects you to the blog
		$this->session->sess_destroy();
		redirect('blog/');
	}
}