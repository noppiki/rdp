<?php

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function jstest(){

		ini_set( 'display_errors', 1 );
		$this->load->database();

		$this->db->select('*');
		$this->db->from('itemlist');
		$this->db->join('relation_filename', 'relation_filename.item_id = itemlist.id');

		$query = $this->db->get();

		foreach ($query->result() as $row)
		{
			echo($row->name);

			$file_nm = $row->filename;

			$tmp_ary = explode('.', $file_nm);

			echo('<img src="../../../images/'.$tmp_ary[0].'_thumb.'.$tmp_ary[1].'">');
		}





	}

	function index()
	{
		$this->load->database();
		$titles = array(
			'title' => 'TOP'
		);
		$this->load->view('header', $titles);

		$str = '<script type="text/javascript" src="http://www4152up.sakura.ne.jp/rdp/js/jquery.flicksimple.js"></script>';

		$str = $str.'<style type= "text/css">
		.flickSimple {
	width: 100%;
	position: relative;
	overflow: auto;
	-webkit-tap-highlight-color: rgba(0,0,0,0);
	background-color: #eee;
}

.flickSimple.landscape {
	width: 100%;
}

.flickSimple ul {
	display: block;
	margin: 0;
	padding: 0;
}

.flickSimple ul.landscape {
}

.flickSimple ul li {
	float: left;
	list-style-type: none;
	text-align: center;
}

.flickSimple ul li.landscape {
}
#basic ul,
#basic ul.landscape {
	width: 1200px;
}

#basic ul li,
#basic ul li.landscape {
	width: 120px
}

#basic ul li.newline {
	clear: both;
}

#basic ul li a {
	display: block;
	height: 120px;
	margin: 5px;
	border: solid 1px #ccc;
	background-color: #fff;
	line-height: 120px;
}
</style>';

		$str = $str.'<div id="basic" class="flickSimple"><ul>';
		
		$this->db->select('*');
		$this->db->from('itemlist');
		$this->db->join('relation_filename', 'itemlist.ID = relation_filename.item_id', 'left');
		$this->db->limit(10);
		$query = $this->db->get();
		
		foreach ($query->result() as $row)
		{
			if($row->filename==""){
				$thumbName = "noimage.jpg";
			}else{
				$name = explode(".", $row->filename);
				$thumbName = $name[0].'_thumb.'.$name[1];			
			}
			$str = $str.'<a href="../"><li style="vertical-align: bottom"><img src="http://www4152up.sakura.ne.jp/rdp/images/'.$thumbName.'"><br>'.$row->name.'</li></a>';
		}
		
		$str = $str.'</ul></div>
<script type="text/javascript">
	$(\'#basic\').flickSimple();
</script>';

		$str = $str.'<div class="ui-grid-a">';

		$aorb = true;

		$query = $this->db->get('category');

		foreach ($query->result() as $row)
		{
			$str = $str.'<div class="ui-block-';
			if($aorb){
				$str = $str.'a';
			}else{
				$str = $str.'b';
			}
			$aorb = !$aorb;

			$str = $str.'"><a href="#"><div class="ui-bar ui-bar-a" >';
			$str = $str.$row->name;
			$str = $str.'</div></a></div>';
		}


		$str = $str.'</div>';

		$strs = array(
			'str' => $str
		);

		$this->load->view('main', $strs);
		$this->load->view('main_footer');
	}
}
?>