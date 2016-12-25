<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_controller extends CI_Controller {

	
	public function index()
	{       
                $data['title'] = 'any title';
                $css[] = base_url('/assets/bootstrap/css/bootstrap.min.css');
                $js[] = base_url('/assets/bootstrap/js/bootstrap.min.css');
                $data['css'] = $css;
                $data['js'] = $js;
                $this->load->view('static/header', $data);
		$this->load->view('crud_view');
                $this->load->view('static/footer', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */