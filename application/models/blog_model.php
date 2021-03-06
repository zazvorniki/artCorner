<?php class blog_model extends CI_Model{

	
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function publishPost()
	{
		//this array finds the inputs and strips the html tags from them before inputting them in the database
		$title = strip_tags($this->input->post('title'));
		$posted = strip_tags($this->input->post('posted_by'));
		$cat = $this->input->post('category');
		$body = preg_replace('/[^(\x20-\x7F)]*/','', $this->input->post('body'));
		
		$data = array(
			'title'=> $title,
			'posted_by'=>$posted,
			'category'=>$cat,
			'body'=> $body
		);
		//this sets the data as the post and the datestamp
		$data['date'] = time();
		//this inserts the blog post into the database
		$this->db->insert('entries', $data);
	}
	
	public function publishVocab()
	{
		//this array finds the inputs and strips the html tags from them before inputting them in the database
		$title = strip_tags($this->input->post('title'));
		$body = preg_replace('/[^(\x20-\x7F)]*/','', strip_tags($this->input->post('body'), '<strong>, <em>'));
		
		$data = array(
			'title'=>$title,
			'posted_by'=>'Ms. Sears',
			'category'=>'vocab',
			'body'=>$body
		);
		//this sets the data as the post and the datestamp
		$data['date'] = time();
		//this inserts the blog post into the database
		$this->db->insert('entries', $data);
	}
	
	public function editPost()
	{		
		//this array finds the inputs and strips the html tags from them before inputting them in the database
		$title = strip_tags($this->input->post('title'));
		$body = preg_replace('/[^(\x20-\x7F)]*/','', $this->input->post('body'));
		$id = $this->input->post('id');
		
		$data = array(
			'title'=>$title,
			'body'=>$body
		);
		 //this grabs the id from the hidden form field           
		$this->db->where('id', $id);
		//this updates the blog post into the database
		$this->db->update('entries',$data); 
	}
	
	
	public function deletePost()
	{
		$id = $this->input->post('id');	
		//where the id's match this will delete that post
		$this->db->where('id', $id);
		$this->db->delete('entries');
	}
	
	public function deleteVocabulary()
	{
		$id = $this->uri->segment(3);	
		//where the id's match this will delete that post
		$this->db->where('id', $id);
		$this->db->delete('entries');
	}
	
	public function deleteResource()
	{
		$id = $this->uri->segment(3);	
		//where the id's match this will delete that resource
		$this->db->where('id', $id);
		$this->db->delete('resources');
	}
	
	public function publishResource()
	{
		//this array finds the inputs and strips the html tags from them before inputting them in the database
		$resource = strip_tags($this->input->post('resource'));
		$name = strip_tags($this->input->post('name'));
		$cat =$this->input->post('category');
		$date = time();	
		
		$data = array(
			'resource'=>$resource,
			'name'=>$name,
			'category'=>$cat,
			'date'=>$date
		);
		//this inserts the resources into the database
		$this->db->insert('resources', $data);
	}
	
	public function publishComment()
	{	
		//this array finds the inputs and strips the html tags from them before inputting them in the database
		$entry_id = $this->input->post('entry_id');
		$author = strip_tags($this->input->post('author'));
		$email = strip_tags($this->input->post('email'));
		$showEmail = $this->input->post('showEmail');
		$body = preg_replace('/[^(\x20-\x7F)]*/','', $this->input->post('body'));
		
		$data = array(
			'entry_id'=>$entry_id,
			'author'=>$author,
			'email'=>$email,
			'showEmail'=>$showEmail,
			'body'=>$body,
		);
		$data['date'] = time();	
		//this inserts the comments into the comment table in the database
		$this->db->insert('comments', $data);
	}
	
	public function loadAll()
	{	
		//this grabs all the blog posts by the last one inserted
		$this->db->order_by("date", "desc");
		$this->db->where(array('category !=' => 'vocab'));
		$query = $this->db->get('entries');
		return $query->result();		
	}
	
	public function loadResource()
	{
		//this loads the side bar on the main page with all of the links
		$this->db->order_by("date", "desc");
		$query = $this->db->get('resources');
		return $query->result();		
	}
	
	public function loadReEvent()
	{
		//This loads all of the sidebar links with the keyword events
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'event');
		$query = $this->db->get('resources');
		return $query->result();	
	}	
			
	public function loadEvents()
	{	
		//this grabs all the blog posts by the last one inserted and it must have the events category
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'event');
		$query = $this->db->get('entries');
		return $query->result();	
	}
	
	public function loadReProject()
	{	
		//this loads all of the sidebar links with the keyword of project
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'project');
		$query = $this->db->get('resources');
		return $query->result();	
	}
	
	public function loadProjects()
	{
		//this grabs all the blog posts by the last one inserted and it must have the projects category
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'project');
		$query = $this->db->get('entries');
		return $query->result();	
	}
	
	public function loadLetters()
	{
		//this grabs all the blog posts by the last one inserted and it must have the projects category
		$query = $this->db->query("SELECT DISTINCT left(title, 1) as letter FROM (entries) where category = 'vocab' order by title asc");
		return $query->result();	
	}
	
	public function loadVocab()
	{
		$url = $this->uri->segment(3);
		//this grabs all the blog posts by the last one inserted and it must have the projects category
		$this->db->order_by("title", "asc");
		$this->db->where('category', 'vocab');
		$this->db->like('title', $uri, 'after'); 
		$query = $this->db->get('entries');
		return $query->result();	
	}
	
	public function loadOneEntry()
	{
		$id = $this->uri->segment(3);
		//this grabs the blog entry where the id matches to the one in the url
		$this->db->where('id', $id);
		$query = $this->db->get('entries');
		return $query->result();	
	}
		
	public function editView()
	{
		$id = $this->uri->segment(3);
		
		//this grabs the edit view where the ids match on the blogs
		$this->db->where('id', $id);
		$query = $this->db->get('entries');
		return $query->result();	
	}
	
	public function loadComments()
	{
		$id = $this->uri->segment(3);
		//queries the database for the comments that are attached to that entry id
		$this->db->order_by("date", "desc");
		$this->db->where('entry_id', $id);
		$query = $this->db->get('comments');
		return $query->result();	
	}
}