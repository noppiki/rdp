<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Additem extends CI_Controller {
	public function index()
	{
		echo($this->input->post('itemname'));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */