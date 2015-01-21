<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->database();
		ini_set( 'display_errors', 1 );
		$query = $this->db->get('category');

		$cat_str = "";

		$cat_no = 0;

		$cat_no = $query->num_rows();

		foreach ($query->result() as $row)
		{
			$cat_id = $row->ID;
			$cat_name = $row->name;
			$cat_str = $cat_str.'<input type="checkbox" name="cat_'.$cat_id.'" id="'.$cat_id.'">';
			$cat_str = $cat_str.'<label for="'.$cat_id.'">'.$cat_name.'</label>';
		}
		$data = array(
			'cat_no' => $cat_no,
			'cat_str' => $cat_str
		);
		
		$titles = array(
			'title' => '商品追加'
		);
		
		$this->load->view('header', $titles);

		$this->load->view('additem', $data);
	}

	function do_upload()
	{
		$cat_no = $this->input->post('cat_no');
		$itemname = $this->input->post('itemname');
		$description = $this->input->post('description');

		for ($i = 1; $i <= $cat_no; $i++) {
			$category[$i] = $this->input->post('cat_'.$i) ;
		}


		$this->load->database();

		$data = array(
			'name' => $itemname ,
			'description' => $description
		);

		$this->db->insert('itemlist', $data);

		$this->db->flush_cache();

		$this->db->where('name',$itemname);
		$this->db->where('description',$description);
		$query = $this->db->get('itemlist');

		$itemno = 0;

		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			$itemno = $row->ID;
		}

		foreach ($category as $key => $value) {
			if($value!=false){
				$this->db->flush_cache();

				$data = array(
					'item_id' => $itemno ,
					'category_id' => $key
				);

				$this->db->insert('relation_category', $data);
			}
		}

		$updir = "/var/www/html/wp/wordpress/rdp/images/";
		$tmp_file = @$_FILES['upfile']['tmp_name'];
		@list($file_name,$file_type) = explode(".",@$_FILES['upfile']['name']);
		$copy_file = $itemno . "." . $file_type;
		if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
			if (move_uploaded_file($tmp_file,"$updir/$copy_file")) {
			    //chmod("upload_files/" . $_FILES["upfile"]["name"], 0644);

				$config['image_library'] = 'gd2';
				$config['source_image']	= $updir.'/'.$copy_file;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
//				$config['width']	 = 75;
				$config['height']	= 120;

				$this->load->library('image_lib', $config); 

				$this->image_lib->resize();

				$this->db->flush_cache();

				$data = array(
					'item_id' => $itemno ,
					'filename' => $copy_file
				);

				$this->db->insert('relation_filename', $data);

				$query = $this->db->get('category');

				$cat_str = "";

				$cat_no = 0;

				$cat_no = $query->num_rows();

				foreach ($query->result() as $row)
				{
					$cat_id = $row->ID;
					$cat_name = $row->name;
					$cat_str = $cat_str.'<input type="checkbox" name="cat_'.$cat_id.'" id="'.$cat_id.'">';
					$cat_str = $cat_str.'<label for="'.$cat_id.'">'.$cat_name.'</label>';
				}
				$data = array(
					'cat_no' => $cat_no,
					'cat_str' => $cat_str
				);

				$this->load->view('additem', $data);

			} else {
				echo "ファイルをアップロード出来ませんでした。";
			}
		} else {
			echo "ファイルが選択されていません。";
		}



	}
}
?>