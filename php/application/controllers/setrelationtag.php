<?php

class Setrelationtag extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'array'));
	}

	function index()
	{
		$this->load->database();
		$query = $this->db->get('itemlist');
		$str ="";
		
		foreach ($query->result() as $row)
		{
    		$str = $str.'<tr><th>'.$row->ID.'</th><td><a href="'.site_url('setrelationtag/addtag').'/'.$row->ID.'">'.$row->name.'</a></td><td>'.$row->description.'</td></tr>';
		}
		
		$titles = array(
			'title' => '関連付け設定'
		);

		$strings = array(
			'string' => $str
		);

		$this->load->view('header', $titles);
		$this->load->view('additemrel', $strings);


	}
	
	function addtag($id)
	{
		$this->load->database();
		
		$this->db->where('ID',$id);
		$query = $this->db->get('itemlist');
		
		$row = $query->row(); 
		
		$titles = array(
			'title' => '関連づけ選択 '.$row->name
		);
		
		$this->load->view('header',$titles);

		$this->db->where('item_id',$id);
		$query = $this->db->get('relation_item');
		$array = $query->result_array();

		$this->db->flush_cache();

		$this->db->where('ID !=',$id);
		$query = $this->db->get('itemlist');
				
		foreach ($query->result() as $row)
		{
			$checked = "";
			foreach ($array as $row2)
			{
				if($row2['rel_item_id']==$row->ID)$checked="checked";
			}
    		$str = $str.'<tr><td><input type="checkbox" name="'.$row->ID.'" id="'.$row->ID.'" class="custom" '.$checked.'/>
<label for="'.$row->ID.'">'.$row->name.'</label></td></tr>';
		}
		
		$strings = array(
			'string' => $str,
			'id' => $id
		);

		$this->load->view('additemrel_list', $strings);

	}
	
	function send($id)
	{
		$this->load->database();
		
		$array = $this->input->post();
		
		foreach ($array as $i => $value) {
			echo $i;
			$this->db->where('item_id',$id);
			$this->db->where('rel_item_id',$i);
			$query = $this->db->get('relation_item');
			
			$data = array(
               'item_id' => $id,
               'rel_item_id' => $i
			);
			
			if ($query->num_rows() > 0)
			{

			   $this->db->where('item_id',$id);
			   $this->db->where('rel_item_id',$i);
			   $this->db->update('relation_item', $data); 

			}else{
				$this->db->insert('relation_item', $data); 
			}

		}
	}
}
?>