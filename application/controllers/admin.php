<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct() 
	{ 
		parent::__construct(); 
		//this loads the user model which takes over the login functionality 
		$this->load->model('users_model');
		//this loads the blog model which handles the blog functionality 
		$this->load->model('blog_model');
		
		$this->user = $this->session->userdata('currentUser');
	}
	
	public function require_auth($location = 'admin/')
	{
		if (empty($this->user)) {
			redirect($location);
		}
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
		$this->require_auth();
		$user = $this->users_model->getUser($this->user->id);
		$this->load->view('write_view');
		$this->load->view('footer_view');
	}
	
	public function writeResource()
	{
		$this->require_auth();
		$user = $this->users_model->getUser($this->user->id);
		$this->load->view('resource_view');
		$this->load->view('footer_view');
	}
	
	public function writeVocab()
	{
		$this->require_auth();
		$user = $this->users_model->getUser($this->user->id);
		$this->load->view('vocab_view');
		$this->load->view('footer_view');
	}
	
	public function insertPost()
	{
		$this->require_auth();
		
		//this checks to see if the form has a data-key. If it does not then it is directed to the error page. This secures this function and dissallows access directly from the url bar.
		if($this->input->post('data-key') == 'newPost')
		{
			$user = $this->users_model->getUser($this->user->id);
			
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
			$user = $this->users_model->getUser($this->user->id);
			
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
			$user = $this->users_model->getUser($this->user->id);
			
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
			$user = $this->users_model->getUser($this->user->id);
			
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
		$this->require_auth();
		$user = $this->users_model->getUser($this->user->id);
		
		//these load the views appropriate for this page		
		$this->load->view('thankYou_view');
		$this->load->view('write_view');
		$this->load->view('footer_view');
	}
	
	public function successResource()
	{
		$this->require_auth();
		$user = $this->users_model->getUser($this->user->id);
		
		//these load the views appropriate for this page		
		$this->load->view('thankYou_view');
		$this->load->view('resource_view');
		$this->load->view('footer_view');
	}
	
	public function successVocab()
	{
		$this->require_auth();
		$user = $this->users_model->getUser($this->user->id);
		
		//these load the views appropriate for this page		
		$this->load->view('thankYou_view');
		$this->load->view('vocab_view');
		$this->load->view('footer_view');
	}

	public function edit()
	{
		$this->require_auth();
		$user = $this->users_model->getUser($this->user->id);
		
		//these load the views appropriate for this page		
		$this->load->view('edit_view', array(
			'query' => $this->blog_model->loadOneEntry(),
		));
		$this->load->view('footer_view');
	}
	
	public function delete()
	{
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
		$this->require_auth();
		$this->blog_model->deleteResource();
		redirect('blog/');
	}
	
	public function deleteVocab()
	{
		$this->require_auth();
		$this->blog_model->deleteVocabulary();
		redirect('blog/vocab');
	}
	
	public function deleteWarning()
	{
		$this->require_auth();
		$user = $this->users_model->getUser($this->user->id);
		$this->load->view('deleteWarning_view');
	}	
		
	public function logout()
	{
		//this destroys the sessions
		$this->session->sess_destroy();
		redirect('blog/');
	}
}