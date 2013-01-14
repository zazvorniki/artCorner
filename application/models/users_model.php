<?php class users_model extends CI_Model{

	
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function getUser($currentId)
	{
		//this gets the users data where the id's match and then loads the data into the headerview
		$data['query']=$this->db->get_where('users', array('id' => $currentId));
		$this->load->view('adminHeader_view', $data);
	}
		
	public function checkUser($loginObject)
	{
		//This sets the email and the password from the loginObject and then gets the user
		$this->db->where('email', $loginObject['email']);
		$this->db->where('password', $loginObject['password']);
		$query = $this->db->get('users');
		if($query->num_rows() > 0){
			return $query->row();	
		}else{
			return false;
		}
	}	
}