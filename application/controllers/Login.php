<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Login extends CI_Controller {


	public function index()
	{

     $data = array(

		'titulo' => 'Login',

     );


			$this->load->view('layout/header', $data);
			$this->load->view('login/index');
			$this->load->view('layout/footer');
	   }

public function auth(){

		$identity = $this->security->xss_clean($this->input->post('email'));
	    $password = $this->security->xss_clean($this->input->post('password'));
	    $remember = FALSE; // remember the user

		    if($this->ion_auth->login($identity, $password, $remember)){

		   		redirect('home');

		    }else{
		    	
	    	$this->session->set_flashdata('error','Essas credenciais não correspondem aos nossos registros.');

			redirect('login');
	   }

		
		
	}

	public function logout(){
		   $this->ion_auth->logout();
		   redirect('login');

	}
	
}
