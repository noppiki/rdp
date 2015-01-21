<?php

class Itemdisp extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index($id)
	{
		$this->load->database();

		$this->db->where('ID', $id);
		$query = $this->db->get('itemlist');

		$row;

		if($query->num_rows()>0){
			$row = $query->row();
			$name = $row->name;
		}

				$titles = array(
			'title' => $row->name
		);
		$this->load->view('header', $titles);

	}
}
?>