<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_controller extends CI_Controller {

	
	public function index()
	{       
                $data['title'] = 'any titlw';
                $data['css'] = baseurl('');
                $this->load->view('static/header');
		$this->load->view('crud_view');
                $this->load->view('static/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */