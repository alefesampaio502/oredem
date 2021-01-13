<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Vendedores extends CI_Controller {
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

			'titulo' => 'Listagem de Vendedores',

			'styles' => array(
				
				'vendor/datatables/dataTables.bootstrap4.min.css',

			),

			'scripts' => array(
				
				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/app.js',
				'js/app.js',
				'js/jquery.mask.min.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'js/demo/datatables-demo.js'
			),
			'vendedores' => $this->core_model->get_all('vendedores'),
		);
//erro na validação 
		$this->load->view('layout/header', $data);
		$this->load->view('vendedores/index');
		$this->load->view('layout/footer');
		
	}



	public function edit($vendedor_id = NULL){
	//verifica no banco se existe algum vendedor //
		if(!$vendedor_id || !$this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))){
			$this->session->set_flashdata('error','Vendedor não encontrado');
			redirect('vendedores');
		}else{


			$this->form_validation->set_rules('vendedor_codigo','','trim|required|min_length[5]|max_length[45]');
			$this->form_validation->set_rules('vendedor_nome_completo','','trim|required|min_length[5]|max_length[145]');
			$this->form_validation->set_rules('vendedor_cpf','','trim|required|exact_length[14]|callback_valida_cpf');
			$this->form_validation->set_rules('vendedor_rg','','trim|required|max_length[20]');

			$this->form_validation->set_rules('vendedor_email','','trim|required|max_length[20]|callback_valida_email');

			$this->form_validation->set_rules('vendedor_telefone','','trim|required|max_length[20]|callback_valida_telefone');		
			$this->form_validation->set_rules('vendedor_celular','','trim|required|max_length[20]|callback_valida_celular');
			$this->form_validation->set_rules('vendedor_cep','','trim|required|max_length[10]');
			$this->form_validation->set_rules('vendedor_endereco','','trim|required|max_length[150]');
			$this->form_validation->set_rules('vendedor_numero_endereco','','trim|required|max_length[20]');
			$this->form_validation->set_rules('vendedor_bairro','','trim|required|max_length[45]');
			$this->form_validation->set_rules('vendedor_complemento','','trim|max_length[145]');
			$this->form_validation->set_rules('vendedor_cidade','','trim|required|max_length[105]');
			$this->form_validation->set_rules('vendedor_estado','','trim|required|max_length[2]');
			$this->form_validation->set_rules('vendedor_ativo','','trim|required|max_length[1]');
			$this->form_validation->set_rules('vendedor_obs','','trim|max_length[500]');


			if($this->form_validation->run()){

				//exit('validado');

				$data = elements(
					array(
						'vendedor_codigo',
						'vendedor_nome_completo',
						'vendedor_cpf',
						'vendedor_rg',
						'vendedor_telefone',
						'vendedor_celular',
						'vendedor_email',
						'vendedor_cep',
						'vendedor_endereco',
						'vendedor_numero_endereco',
						'vendedor_complemento',
						'vendedor_bairro',
						'vendedor_cidade',
						'vendedor_estado',
						'vendedor_ativo',
						'vendedor_obs'
						


					), $this->input->post()

				);

				
				$data['vendedor_estado'] = strtoupper($this->input->post('vendedor_estado'));



							//$data = $this->security->xss_clean($data);
				$data = html_escape($data);


				$this->core_model->update('vendedores', $data, array('vendedor_id' => $vendedor_id));
				redirect('vendedores');


			}else{

				$data =  array(

					'titulo' => 'Atualizar Vendedores',

					'scripts' => array(

						'vendor/datatables/jquery.dataTables.min.js',
						'vendor/datatables/app.js',
						'js/jquery.mask.min.js',
						'js/app.js',
						'vendor/datatables/dataTables.bootstrap4.min.js',
						'js/demo/datatables-demo.js'
					),
					'vendedores' => $this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id)),

				);

//erro na validação 
				$this->load->view('layout/header', $data);
				$this->load->view('vendedores/edit');
				$this->load->view('layout/footer');

			}

		}

	}





	public function add(){
	//verifica no banco se existe algum vendedor //




		$this->form_validation->set_rules('vendedor_nome_completo','','trim|required|min_length[5]|max_length[145]|is_unique[vendedores.vendedor_nome_completo]');
		/*
		$this->form_validation->set_rules('vendedor_cpf','','trim|required|max_length[25]|is_unique[vendedores.vendedor_cpf]');
		$this->form_validation->set_rules('vendedor_email','','trim|required|max_length[15]|is_unique[vendedores.vendedor_email]');
		$this->form_validation->set_rules('vendedor_rg','','trim|required|max_length[25]|is_unique[vendedores.vendedor_rg]');


		$this->form_validation->set_rules('vendedor_telefone','','trim|max_length[15]');
		
		
		$this->form_validation->set_rules('vendedor_celular','','trim|max_length[15]');
		*/

		$this->form_validation->set_rules('vendedor_cep','','trim|max_length[10]');
		$this->form_validation->set_rules('vendedor_endereco','','trim|required|max_length[150]');
		$this->form_validation->set_rules('vendedor_numero_endereco','','trim|required|max_length[20]');
		$this->form_validation->set_rules('vendedor_bairro','','trim|required|max_length[45]');
		$this->form_validation->set_rules('vendedor_complemento','','trim|max_length[145]');
		$this->form_validation->set_rules('vendedor_cidade','','trim|required|max_length[105]');
		$this->form_validation->set_rules('vendedor_estado','','trim|required|max_length[2]');
		$this->form_validation->set_rules('vendedor_ativo','','trim|required|max_length[1]');
		$this->form_validation->set_rules('vendedor_obs','','trim|max_length[500]');



										
		if($this->form_validation->run()){

				//exit('validado');

			$data = elements(
				array(
					
						'vendedor_nome_completo',
						'vendedor_codigo',
						'vendedor_cpf',
						'vendedor_rg',
						'vendedor_telefone',
						'vendedor_celular',
						'vendedor_email',
						'vendedor_cep',
						'vendedor_endereco',
						'vendedor_numero_endereco',
						'vendedor_complemento',
						'vendedor_bairro',
						'vendedor_cidade',
						'vendedor_estado',
						'vendedor_ativo',
						'vendedor_obs'


				), $this->input->post()

			);

								$data['vendedor_estado'] = strtoupper($this->input->post('vendedor_estado'));



								$data = $this->security->xss_clean($data);
								$data = html_escape($data);


								$this->core_model->insert('vendedores', $data);
								redirect('vendedores');
					      

		
		   
		}else{

			$data =  array(

				'titulo' => 'Cadastrar Vendedores',

				'scripts' => array(

					
					'js/jquery.mask.min.js',
					'js/app.js',
					
					
				),

				'vendedor_codigo' => $this->core_model->generate_unique_code('vendedores','numeric', 8, 'vendedor_codigo'),

			);

			//erro na validação 
			$this->load->view('layout/header', $data);
			$this->load->view('vendedores/add');
			$this->load->view('layout/footer');

		}
}


public function del($vendedor_id = NULL){

if(!$vendedor_id || !$this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))){
		$this->session->set_flashdata('error','Vendedor não encontrado');
	redirect('vendedores');
}else{
	$this->core_model->delete('vendedores', array('vendedor_id' => $vendedor_id));
	redirect('vendedores');

}
}




	public function valida_email($vendedor_email){

		$vendedor_id = $this->input->post('vendedor_id');

		if($this->core_model->get_by_id('vendedores', array('vendedor_email' => $vendedor_email, 'vendedor_id !=' => $vendedor_id))){

			$this->form_validation->set_message('valida_email','Esse Email já existe');

			return FALSE;

		}else{

			return TRUE;


		}

	}

	public function valida_telefone($vendedor_telefone){

		$vendedor_id = $this->input->post('vendedor_id');

		if($this->core_model->get_by_id('vendedores', array('vendedor_telefone' => $vendedor_telefone, 'vendedor_id !=' => $vendedor_id))){

			$this->form_validation->set_message('valida_telefone','Esse Telefone já existe');

			return FALSE;

		}else{

			return TRUE;


		}

	}


	public function valida_celular($vendedor_celular){

		$vendedor_id = $this->input->post('vendedor_id');

		if($this->core_model->get_by_id('vendedores', array('vendedor_celular' => $vendedor_celular, 'vendedor_id !=' => $vendedor_id))){

			$this->form_validation->set_message('valida_celular','Esse Telefone já existe');

			return FALSE;

		}else{

			return TRUE;


		}

	}




      public function valida_cpf($cpf) {

    	if ($this->input->post('vendedor_id')) {

    		$vendedor_id = $this->input->post('vendedor_id');

    		if ($this->core_model->get_by_id('vendedores', array('vendedor_id !=' => $vendedor_id, 'vendedor_cpf' => $cpf))) {
    			$this->form_validation->set_message('valida_cpf', 'Este CPF já existe');
    			return FALSE;
    		}
    	}

    	$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    	if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

    		$this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
    		return FALSE;
    	} else {
            // Calcula os números para verificar se o CPF é verdadeiro
    		for ($t = 9; $t < 11; $t++) {
    			for ($d = 0, $c = 0; $c < $t; $c++) {
                    //$d += $cpf{$c} * (($t + 1) - $c); // Para PHP com versão < 7.4
                    $d += $cpf[$c] * (($t + 1) - $c); //Para PHP com versão < 7.4
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                	$this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
                	return FALSE;
                }
            }
            return TRUE;
        }
    }

}
