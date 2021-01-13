<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Welcome extends CI_Controller {



	public function index()
	{
		$this->load->view('welcome_message');
	}
}
