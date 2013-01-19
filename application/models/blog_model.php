<?php class blog_model extends CI_Model{

	
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function publishPost()
	{
		//this sets the data as the post and the datestamp
		$data = $_POST;
		$data['date'] = time();
		//this inserts the blog post into the database
		$this->db->insert('entries', $data);
	}
	
	public function editPost()
	{		
		//this is the array of the objects that need to be updated		
		$data = array(
		            'title'=>$this->input->post('title'),
		            'body'=>$this->input->post('body')
		            );
		 //this grabs the id from the hidden form field           
		$this->db->where('id', $this->input->post('id'));
		//this updates the blog post into the database
		$this->db->update('entries',$data); 
	}
	
	
	public function deletePost()
	{	
		//where the id's match this will delete that post
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('entries');
	}
	
	public function deleteResource()
	{	
		//where the id's match this will delete that resource
		$this->db->where('id', $this->uri->segment(3));
		$this->db->delete('resources');
	}
	
	public function publishResource()
	{
		$data = $_POST;
		//this inserts the resources into the database
		$this->db->insert('resources', $data);
	}
	
	public function publishComment()
	{	$data = $_POST;
		$data['date'] = time();	
		//this inserts the comments into the comment table in the database
		$this->db->insert('comments', $data);
	}
	
	public function loadAll()
	{	
		//this grabs all the blog posts by the last one inserted
		$this->db->order_by("date", "desc");
		$data['query'] = $this->db->get('entries');
		
		$this->load->view('defaultBlog_view', $data);		
	}
	
	public function loadAdminBlog()
	{
		//this grabs all the blog posts by the last one inserted
		$this->db->order_by("date", "desc");
		$data['query'] = $this->db->get('entries');
		$this->load->view('adminBlog_view', $data);	
	}
	
	public function loadAdminEvents()
	{
		//this grabs all the blog posts by the last one inserted for the events
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'event');
		$data['query'] = $this->db->get('entries');
		$this->load->view('adminBlog_view', $data);	
	}
	
	public function loadAdminProjects()
	{
		//this grabs all the blog posts by the last one inserted for the projects
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'project');
		$data['query'] = $this->db->get('entries');
		$this->load->view('adminBlog_view', $data);	
	}
	
	public function loadResource()
	{
		//this loads the side bar on the main page with all of the links
		$this->db->order_by("date", "desc");
		$data['query'] = $this->db->get('resources');
		$this->load->view('defaultSidebar_view', $data);	
	}
	
	public function loadReEvent()
	{
		//This loads all of the sidebar links with the keyword events
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'event');
		$data['query'] = $this->db->get('resources');
		$this->load->view('defaultSidebar_view', $data);	
	}	
	
	public function loadAdminRe()
	{
		//this loads the side bar on the main page with all of the links
		$this->db->order_by("date", "desc");
		$data['query'] = $this->db->get('resources', 10);
		$this->load->view('adminSidebar_view', $data);	
	}
	
	public function loadAdminEveRe()
	{
		//This loads all of the sidebar links with the keyword events
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'event');
		$data['query'] = $this->db->get('resources');
		$this->load->view('adminSidebar_view', $data);	
	}
	
	public function loadAdminProRe()
	{	
		//this loads all of the sidebar links with the keyword of project
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'project');
		$data['query'] = $this->db->get('resources');
		$this->load->view('adminSidebar_view', $data);	
	}
	
	public function loadEvents()
	{	
		//this grabs all the blog posts by the last one inserted and it must have the events category
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'event');
		$data['query'] = $this->db->get('entries');
		$this->load->view('defaultBlog_view', $data);
	}
	
	public function loadReProject()
	{	
		//this loads all of the sidebar links with the keyword of project
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'project');
		$data['query'] = $this->db->get('resources');
		$this->load->view('defaultSidebar_view', $data);	
	}
	
	public function loadProjects()
	{
		//this grabs all the blog posts by the last one inserted and it must have the projects category
		$this->db->order_by("date", "desc");
		$this->db->where('category', 'project');
		$data['query'] = $this->db->get('entries');
		$this->load->view('defaultBlog_view', $data);
	}
	
	public function loadOneEntry()
	{
		//this grabs the blog entry where the id matches to the one in the url
		$this->db->where('id', $this->uri->segment(3));
		$data['query'] = $this->db->get('entries');
		$this->load->view('innerBlog_view', $data);
	}
	
	public function loadAdminOne()
	{
		//this grabs the blog entry where the id matches to the one in the url
		$this->db->where('id', $this->uri->segment(3));
		$data['query'] = $this->db->get('entries');
		$this->load->view('adminInner_view', $data);
	}
	
	public function editView()
	{
		$this->db->where('id', $this->uri->segment(3));
		$data['query'] = $this->db->get('entries');
		$this->load->view('edit_view', $data);
	}
	
	public function loadComments()
	{
		//queries the database for the comments that are attached to that entry id
		$this->db->order_by("date", "desc");
		$this->db->where('entry_id', $this->uri->segment(3));
		$data['query'] = $this->db->get('comments');
		$this->load->view('comment_view', $data);				
	}
}