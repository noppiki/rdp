<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorylist extends CI_Controller {
	public function index()
	{
		$this->load->database();
		$query = $this->db->get('category');

		foreach ($query->result() as $row)
		{
			$cat_id = $row->ID;
			$cat_name = $row->name;
			echo('<input type="checkbox" name="cat_'.$cat_id.'" id="'.$cat_id.'">');
			echo('<label for="'.$cat_id.'">'.$cat_name.'</label>');
		}
	}
	
	public function getcategory(){
		$this->load->database();
		$query = $this->db->get('category');
		
		$data['query'] = $query->result_array();		
		$titles['title'] = 'カテゴリー編集';		
		$this->load->view('header',$titles);
		$this->load->view('editcategory',$data);

	}
	
	public function editcategory($cat_id){
		$this->load->helper('form');
		$this->load->database();
		$this->db->where('ID',$cat_id);
		$query = $this->db->get('category');
		$data['query'] = $query->result_array();		
		$this->load->view('updatecategory',$data);
		
	}
	
	public function updatecategory(){
		$this->load->database();
		$ID = $this->input->post('ID');
		$name = $this->input->post('name');
		$data = array(
               'ID' => $ID,
               'name' => $name
            );

		$this->db->where('ID', $ID);
		$this->db->update('category', $data); 
		
		header("Location: http://www4152up.sakura.ne.jp/rdp/php/index.php/categorylist/getcategory");
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */