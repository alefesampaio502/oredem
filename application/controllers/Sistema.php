<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Sistema extends CI_Controller {
	public function __construct() {

		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			$this->session->set_flashdata('info','Sua sessão expirou!');
			redirect('login');
		}

	}

	public function index(){

		$data =  array(

			'titulo' => 'Configuração do sistema',
			'sistema' => $this->core_model->get_by_id('sistema', array('sistema_id' => 1)),

		
		
			'scripts' => array(
				
				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/app.js',
				'js/app.js',
				'js/jquery.mask.min.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'js/demo/datatables-demo.js'
			),
);


//validação dos campos form//
			$this->form_validation->set_rules('sistema_razao_social','','trim|required|min_length[5]|max_length[145]');
			$this->form_validation->set_rules('sistema_nome_fantasia','','trim|required|min_length[5]|max_length[145]');
			$this->form_validation->set_rules('sistema_cnpj','','trim|required|exact_length[18]');
			$this->form_validation->set_rules('sistema_ie','','trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('sistema_telefone_fixo','','trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('sistema_telefone_movel','','trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('sistema_email','','trim|required|valid_email|max_length[100]');
			$this->form_validation->set_rules('sistema_site_url','','trim|required|min_length[5]|max_length[100]');
			$this->form_validation->set_rules('sistema_cep','','trim|required|max_length[25]');
			$this->form_validation->set_rules('sistema_endereco','','trim|required|max_length[145]');
			$this->form_validation->set_rules('sistema_numero','','trim|required|max_length[25]');
			$this->form_validation->set_rules('sistema_cidade','','trim|required|min_length[5]|max_length[45]');
			$this->form_validation->set_rules('sistema_estado','','trim|required|max_length[2]');
			$this->form_validation->set_rules('sistema_txt_ordem_servico','','trim|required|min_length[5]|max_length[500]');

		


// Array
// (
//     [sistema_razao_social] => teste1
//     [sistema_nome_fantasia] => teste2
//     [sistema_cnpj] => 123456789123456123
//     [sistema_ie] => 55855555
//     [sistema_telefone_fixo] => 8989998989
//     [sistema_telefone_movel] => 5545545545
//     [sistema_email] => sistema@sistema.com
//     [sistema_site_url] => wwww.teste3
//     [sistema_endereco] => teste4
//     [sistema_cep] => 65900963
//     [sistema_numero] => 2
//     [sistema_cidade] => imperatriz
//     [sistema_estado] => ma
//     [sistema_txt_ordem_servico] => For changing text color, you can apply the color simply by extending the classes like the example below.
// )




			if($this->form_validation->run()){
						$data = elements(
								array(
									'sistema_razao_social',
									'sistema_nome_fantasia',
									'sistema_cnpj',
									'sistema_ie',
									'sistema_telefone_fixo',
									'sistema_telefone_movel',
									'sistema_email',
									'sistema_site_url',
									'sistema_endereco',
									'sistema_cep',
									'sistema_numero',
									'sistema_cidade',
									'sistema_estado',
									'sistema_txt_ordem_servico'


								), $this->input->post()

							);
 				//xss forma global 
 				$data = html_escape($data);


 				$this->core_model->update('sistema', $data, array('sistema_id' => 1));
 				redirect('sistema');


		
	}else{

		
		//erro na validação 
		$this->load->view('layout/header', $data);
		$this->load->view('sistema/index');
		$this->load->view('layout/footer');

	}


}
}