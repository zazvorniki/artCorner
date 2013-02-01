<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller
{

	public function __construct() 
	{ 
		parent::__construct(); 
		//this loads the blog model that connects this application to the database 
		$this->load->model('blog_model');
		//this loads the users model that connects this verifies the user
		$this->load->model('users_model');
		
		$this->user = $this->session->userdata('currentUser');
	}
	
	public function index()
	{
		//if the user variable is empty then this will load the default views, if the user is logged in then it will load the admin views
		if (empty($this->user)) {
			$this->load->view('defaultHeader_view');
			$this->load->view('defaultBlog_view', array(
				'query' => $this->blog_model->loadAll(),
			));
			$this->load->view('defaultSidebar_view', array(
				'query' => $this->blog_model->loadResource(),
			));
			$this->load->view('footer_view');
		}else {
			$user = $this->users_model->getUser($this->user->id);
			$this->load->view('adminBlog_view', array(
				'query' => $this->blog_model->loadAll(),
			));
			$this->load->view('adminSidebar_view', array(
				'query' => $this->blog_model->loadResource(),
			));
			$this->load->view('footer_view');
		} 
	}
	
	public function projects()
	{
		//if the user variable is empty then this will load the default views, if the user is logged in then it will load the admin views
		if (empty($this->user)) {
			$this->load->view('defaultHeader_view');
			$this->load->view('defaultBlog_view', array(
				'query' => $this->blog_model->loadProjects(),
			));
			$this->load->view('defaultSidebar_view', array(
				'query' => $this->blog_model->loadReProject(),
			));
			$this->load->view('footer_view');
		}else {
			$user = $this->users_model->getUser($this->user->id);
			$this->load->view('adminBlog_view', array(
				'query' => $this->blog_model->loadProjects(),
			));
			$this->load->view('adminSidebar_view', array(
				'query' => $this->blog_model->loadReProject(),
			));			
			$this->load->view('footer_view');
		}
	}
	
	public function events()
	{
		//if the user variable is empty then this will load the default views, if the user is logged in then it will load the admin views
		if (empty($this->user)) {
			$this->load->view('defaultHeader_view');
			$this->load->view('defaultBlog_view', array(
				'query' => $this->blog_model->loadEvents(),
			));
			$this->load->view('defaultSidebar_view', array(
				'query' => $this->blog_model->loadReEvent(),
			));
			$this->load->view('footer_view');
		}else{
			$user = $this->users_model->getUser($this->user->id);
			$this->load->view('adminBlog_view', array(
				'query' => $this->blog_model->loadEvents(),
			));
			$this->load->view('adminSidebar_view', array(
				'query' => $this->blog_model->loadReEvent(),
			));			
			$this->load->view('footer_view');		
		}		
	}
	
	public function vocab()
	{
		//if the user variable is empty then this will load the default views, if the user is logged in then it will load the admin views		
		if (empty($this->user)) {
			$this->load->view('defaultHeader_view');
			$this->load->view('defaultLetter_view', array(
				'letter' => $this->blog_model->loadLetters(),
			));
			$this->load->view('defaultVocab_view', array(
				'query' => $this->blog_model->loadVocab(),
			));
			$this->load->view('footer_view');
		}else{
			$user = $this->users_model->getUser($this->user->id);
			$this->load->view('defaultLetter_view', array(
				'letter' => $this->blog_model->loadLetters(),
			));
			$this->load->view('adminVocab_view', array(
				'query' => $this->blog_model->loadVocab(),
			));
			$this->load->view('footer_view');		
		}
	}			
	
	public function comments()
	{
		$blog = $this->blog_model->loadOneEntry();
		
		//if the blog id is not there then it will throw an error page to stop the user from entering a comment on a blog post that does not exist
		if (! isset($blog[0]->id))
		{
			redirect('error/');
		}
		//if the user variable is empty then this will load the default views, if the user is logged in then it will load the admin views	
		if (empty($this->user)) {
			$this->load->view('defaultHeader_view');
			$this->load->view('innerBlog_view', array(
				'query' => $blog,
			));
			$this->load->view('comment_view', array(
				'query' => $this->blog_model->loadComments(),
			));
			$this->load->view('footer_view');
		}else {
			$user = $this->users_model->getUser($this->user->id);
			$this->load->view('adminInner_view', array(
				'query' => $blog,
			));
			$this->load->view('comment_view', array(
				'query' => $this->blog_model->loadComments(),
			));			
			$this->load->view('footer_view');
		}		
	}
	
	public function writeComment()
	{	
		//only if the data-key is newComment then this function will run. This prevents the user from accessing this function by acadent and also prevents honey pots
		if($this->input->post('data-key') == 'newComment')
		{
			//this makes sure that the input fields are not blank. If they are then it will send you to an error page. This should not be accessed unless they have somehow gotten around my jquery and noscript tag.
			if (empty($_POST['author']) || empty($_POST['email']) || empty($_POST['body']))
			{
				//if the user variable is empty then this will load the default views, if the user is logged in then it will load the admin views	
				 if(empty($this->user)) {
				 	$this->load->view('defaultHeader_view');
				 	$this->load->view('error_view');
				 	$this->load->view('footer_view');
				 }else {
					$user = $this->users_model->getUser($this->user->id);
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
	
	public function contactForm()
	{	
		//if the user variable is empty then this will load the default views, if the user is logged in then it will load the admin views	
		if (empty($user['currentUser'])) {
			$this->load->view('defaultHeader_view');
			$this->load->view('contact_view');
			$this->load->view('footer_view');
		}else {
			$user = $this->users_model->getUser($this->user->id);
			$this->load->view('contact_view');
			$this->load->view('footer_view');
		}		
	}	
}