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
	
}?>