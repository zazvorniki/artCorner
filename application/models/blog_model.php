<?php class blog_model extends CI_Model{

	
	public function __construct()
	{
		parent::__construct();	
	}
	
	
	public function publishPost()
	{
		//this inserts the blog post into the database
		$this->db->insert('entries', $_POST);
	}
	
	public function publishResource()
	{
		//this inserts the resources into the database
		$this->db->insert('resources', $_POST);
	}
	
	
	public function loadAll()
	{	
		//this grabs all the blog posts by the last one inserted
		$this->db->order_by("date", "dec");
		$data['query'] = $this->db->get('entries');
		//$data['query'] = $this->db->query('select * from entries');
		$this->load->view('defaultBlog_view', $data);		
	}
	
	public function loadResource()
	{
		$this->db->order_by("date", "dec");
		$data['query'] = $this->db->get('resources');
		$this->load->view('defaultSidebar_view', $data);	
	}
	
	public function loadReEvent()
	{
		$this->db->order_by("date", "dec");
		$this->db->where('category', 'event');
		$data['query'] = $this->db->get('resources');
		$this->load->view('defaultSidebar_view', $data);	
	}
	
	
	public function loadEvents()
	{	
		//this grabs all the blog posts by the last one inserted and it must have the events category
		
		$this->db->order_by("date", "dec");
		$this->db->where('category', 'event');
		
		$data['query'] = $this->db->get('entries');
		
		$this->load->view('defaultBlog_view', $data);
	}
	
	public function loadReProject()
	{
		$this->db->order_by("date", "dec");
		$this->db->where('category', 'project');
		$data['query'] = $this->db->get('resources');
		$this->load->view('defaultSidebar_view', $data);	
	}
	
	public function loadProjects()
	{
		//this grabs all the blog posts by the last one inserted and it must have the projects category
		
		$this->db->order_by("date", "dec");
		$this->db->where('category', 'project');
		
		$data['query'] = $this->db->get('entries');
		
		$this->load->view('defaultBlog_view', $data);
	}
	
}?>