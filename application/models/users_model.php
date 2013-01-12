<?php class users_model extends CI_Model{

	
	public function __construct()
	{
		parent::__construct();	
	}
	
	
	public function getUser($currentId)
	{
		$data['query']=$this->db->get_where('users', array('id' => $currentId));
		$this->load->view('defaultHeader_view', $data);
		
	}
		
	public function checkUser($loginObject)
	{
		$this->db->where('email', $loginObject['email']);
		$this->db->where('password', $loginObject['password']);
		$query = $this->db->get('users');
		
		if($query->num_rows() > 0){
			return $query->row();	
		}else{
			return false;
		}
	}
	
	
}?>