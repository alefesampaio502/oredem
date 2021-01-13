<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Fornecedores extends CI_Controller {
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

			'titulo' => 'Listagem de Fornecedores',

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
			'fornecedores' => $this->core_model->get_all('fornecedores'),
		);
//erro na validação 
		$this->load->view('layout/header', $data);
		$this->load->view('fornecedores/index');
		$this->load->view('layout/footer');
		
	}

	public function edit($fornecedor_id){
	//verifica no banco se existe algum cliente //
		if(!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))){
			$this->session->set_flashdata('error','Fornecedor não encontrado');
			redirect('fornecedores');
		}else{

			$this->form_validation->set_rules('fornecedor_razao','','trim|required|min_length[5]|max_length[45]');
			$this->form_validation->set_rules('fornecedor_nome_fantasia','','trim|required|min_length[5]|max_length[150]');
			$this->form_validation->set_rules('fornecedor_cnpj','','trim|required|exact_length[18]|callback_valida_cnpj');
			$this->form_validation->set_rules('fornecedor_ie','','trim|required|max_length[20]|callback_valida_ie');
			$this->form_validation->set_rules('fornecedor_email','','trim|required|max_length[20]|callback_valida_email');
			$this->form_validation->set_rules('fornecedor_telefone','','trim|required|max_length[20]|callback_valida_telefone');		
			$this->form_validation->set_rules('fornecedor_celular','','trim|required|max_length[20]|callback_valida_celular');
			$this->form_validation->set_rules('fornecedor_cep','','trim|required|max_length[10]');
			$this->form_validation->set_rules('fornecedor_endereco','','trim|required|max_length[150]');
			$this->form_validation->set_rules('fornecedor_numero_endereco','','trim|required|max_length[20]');
			$this->form_validation->set_rules('fornecedor_bairro','','trim|required|max_length[45]');
			$this->form_validation->set_rules('fornecedor_complemento','','trim|required|max_length[145]');
			$this->form_validation->set_rules('fornecedor_cidade','','trim|required|max_length[105]');
			$this->form_validation->set_rules('fornecedor_estado','','trim|required|max_length[2]');
			$this->form_validation->set_rules('fornecedor_ativo','','trim|required|max_length[1]');
			$this->form_validation->set_rules('fornecedor_obs','','trim|max_length[500]');


			if($this->form_validation->run()){

				$fornecedor_ativo = $this->input->post('fornecedor_ativo');


					if($this->db->table_exists('produtos')){

			if($fornecedor_ativo == 2 && $this->core_model->get_by_id('produtos', array('produto_fornecedor_id' => $fornecedor_id, 'produto_ativo' => 2))){
						$this->session->set_flashdata('info','Este Fornecedor não poder ser desativado, pois está sendo utilizada em produtos');
						redirect('fornecedores');

					}

				}


				$data = elements(
					array(
						'fornecedor_razao',
						'fornecedor_nome_fantasia',
						'fornecedor_cnpj',
						'fornecedor_ie',
						'fornecedor_telefone',
						'fornecedor_celular',
						'fornecedor_email',
						'fornecedor_contato',
						'fornecedor_cep',
						'fornecedor_endereco',
						'fornecedor_numero_endereco',
						'fornecedor_bairro',
						'fornecedor_complemento',
						'fornecedor_cidade',
						'fornecedor_estado',
						'fornecedor_ativo',
						'fornecedor_obs',
						


					), $this->input->post()

				);

				
				$data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));



							//$data = $this->security->xss_clean($data);
				$data = html_escape($data);


				$this->core_model->update('fornecedores', $data, array('fornecedor_id' => $fornecedor_id));
				redirect('fornecedores');


			}else{

				$data =  array(

					'titulo' => 'Atualizar Fornecedores',

					'scripts' => array(

						'vendor/datatables/jquery.dataTables.min.js',
						'vendor/datatables/app.js',
						'js/jquery.mask.min.js',
						'js/app.js',
						'vendor/datatables/dataTables.bootstrap4.min.js',
						'js/demo/datatables-demo.js'
					),
					'fornecedores' => $this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id)),

				);

//erro na validação 
				$this->load->view('layout/header', $data);
				$this->load->view('fornecedores/edit');
				$this->load->view('layout/footer');

			}

		}

	}

	public function add(){
	//verifica no banco se existe algum cliente //

$this->form_validation->set_rules('fornecedor_razao','','trim|required|min_length[1]|max_length[200]|is_unique[fornecedores.fornecedor_razao]');
			$this->form_validation->set_rules('fornecedor_nome_fantasia','','trim|required|min_length[1]|max_length[145]|is_unique[fornecedores.fornecedor_nome_fantasia]');
			$this->form_validation->set_rules('fornecedor_cnpj','','trim|required|exact_length[18]|is_unique[fornecedores.fornecedor_cnpj]');
			/*
			$this->form_validation->set_rules('fornecedor_ie','','trim|required|max_length[20]|is_unique[fornecedores.fornecedor_ie]');
			$this->form_validation->set_rules('fornecedor_email','','trim|required|max_length[20]|is_unique[fornecedores.fornecedor_email]');

		
				$this->form_validation->set_rules('fornecedor_telefone','','trim|required|max_length[20]|is_unique[fornecedores.fornecedor_telefone]');
		
			
				$this->form_validation->set_rules('fornecedor_celular','','trim|required|max_length[20]|is_unique[fornecedores.fornecedor_celular]');
			*/

			$this->form_validation->set_rules('fornecedor_cep','','trim|required|max_length[10]');
			$this->form_validation->set_rules('fornecedor_endereco','','trim|required|max_length[150]');
			$this->form_validation->set_rules('fornecedor_numero_endereco','','trim|required|max_length[20]');
			$this->form_validation->set_rules('fornecedor_bairro','','trim|required|max_length[45]');
			$this->form_validation->set_rules('fornecedor_complemento','','trim|required|max_length[145]');
			$this->form_validation->set_rules('fornecedor_cidade','','trim|required|max_length[105]');
			$this->form_validation->set_rules('fornecedor_estado','','trim|required|max_length[2]');
			$this->form_validation->set_rules('fornecedor_ativo','','trim|required|max_length[1]');
			$this->form_validation->set_rules('fornecedor_obs','','trim|max_length[500]');


		if($this->form_validation->run()){

				//exit('validado');

			$data = elements(
				array(
					'fornecedor_razao',
						'fornecedor_nome_fantasia',
						'fornecedor_cnpj',
						'fornecedor_ie',
						'fornecedor_telefone',
						'fornecedor_celular',
						'fornecedor_email',
						'fornecedor_contato',
						'fornecedor_cep',
						'fornecedor_endereco',
						'fornecedor_numero_endereco',
						'fornecedor_bairro',
						'fornecedor_complemento',
						'fornecedor_cidade',
						'fornecedor_estado',
						'fornecedor_ativo',
						'fornecedor_obs',


				), $this->input->post()

			);

			$data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));



			$data = $this->security->xss_clean($data);
			$data = html_escape($data);


			$this->core_model->insert('fornecedores', $data);
			redirect('fornecedores');


		}else{

			$data =  array(

				'titulo' => 'Cadastrar Fornecedores',

				'scripts' => array(

					'vendor/datatables/jquery.dataTables.min.js',
					'vendor/datatables/app.js',
					'js/jquery.mask.min.js',
					'js/app.js',
					'js/fornecedores.js',
					'vendor/datatables/dataTables.bootstrap4.min.js',
					'js/demo/datatables-demo.js'
				),

			);

			//erro na validação 
			$this->load->view('layout/header', $data);
			$this->load->view('fornecedores/add');
			$this->load->view('layout/footer');

		}
}


public function del($fornecedor_id = NULL){

if(!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))){
		$this->session->set_flashdata('error','Fornecedor não encontrado');
	redirect('fornecedores');
}else{
	$this->core_model->delete('fornecedores', array('fornecedor_id' => $fornecedor_id));
	redirect('fornecedores');

}
}






	public function valida_ie($fornecedor_ie){

		$fornecedor_id = $this->input->post('fornecedor_id');

		if($this->core_model->get_by_id('fornecedores', array('fornecedor_ie' => $fornecedor_ie, 'fornecedor_id !=' => $fornecedor_id))){

			$this->form_validation->set_message('valida_ie','Essa Inscrição já existe');

			return FALSE;

		}else{

			return TRUE;


		}

	}


	public function valida_email($fornecedor_email){

		$fornecedor_id = $this->input->post('fornecedor_id');

		if($this->core_model->get_by_id('fornecedores', array('fornecedor_email' => $fornecedor_email, 'fornecedor_id !=' => $fornecedor_id))){

			$this->form_validation->set_message('valida_email','Esse Email já existe');

			return FALSE;

		}else{

			return TRUE;


		}

	}

	public function valida_telefone($fornecedor_telefone){

		$fornecedor_id = $this->input->post('fornecedor_id');

		if($this->core_model->get_by_id('fornecedores', array('fornecedor_telefone' => $fornecedor_telefone, 'fornecedor_id !=' => $fornecedor_id))){

			$this->form_validation->set_message('valida_telefone','Esse Telefone já existe');

			return FALSE;

		}else{

			return TRUE;


		}

	}


	public function valida_celular($fornecedor_celular){

		$fornecedor_id = $this->input->post('fornecedor_id');

		if($this->core_model->get_by_id('fornecedores', array('fornecedor_celular' => $fornecedor_celular, 'fornecedor_id !=' => $fornecedor_id))){

			$this->form_validation->set_message('valida_celular','Esse Telefone já existe');

			return FALSE;

		}else{

			return TRUE;


		}

	}



 // Validar numero de CNPJ
	public function valida_cnpj($cnpj) {

        // Verifica se um número foi informado
		if (empty($cnpj)) {
			$this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
			return false;
		}

		if ($this->input->post('fornecedor_id')) {

			$fornecedor_id = $this->input->post('fornecedor_id');

			if ($this->core_model->get_by_id('fornecedores', array('fornecedor_id !=' => $fornecedor_id, 'fornecedor_cnpj' => $cnpj))) {
				$this->form_validation->set_message('valida_cnpj', 'Esse CNPJ já existe');
				return FALSE;
			}
		}

        // Elimina possivel mascara
		$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
		$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);


        // Verifica se o numero de digitos informados é igual a 11 
		if (strlen($cnpj) != 14) {
			$this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válidos');
			return false;
		}

        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
		else if ($cnpj == '00000000000000' ||
			$cnpj == '11111111111111' ||
			$cnpj == '22222222222222' ||
			$cnpj == '33333333333333' ||
			$cnpj == '44444444444444' ||
			$cnpj == '55555555555555' ||
			$cnpj == '66666666666666' ||
			$cnpj == '77777777777777' ||
			$cnpj == '88888888888888' ||
			$cnpj == '99999999999999') {
			$this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
		return false;

            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
	} else {

		$j = 5;
		$k = 6;
		$soma1 = "";
		$soma2 = "";

		for ($i = 0; $i < 13; $i++) {

			$j = $j == 1 ? 9 : $j;
			$k = $k == 1 ? 9 : $k;

                //$soma2 += ($cnpj{$i} * $k);

                //$soma2 = intval($soma2) + ($cnpj{$i} * $k); //Para PHP com versão < 7.4
                $soma2 = intval($soma2) + ($cnpj[$i] * $k); //Para PHP com versão > 7.4

                if ($i < 12) {
                    //$soma1 = intval($soma1) + ($cnpj{$i} * $j); //Para PHP com versão < 7.4
                    $soma1 = intval($soma1) + ($cnpj[$i] * $j); //Para PHP com versão > 7.4
                }

                $k--;
                $j--;
            }

            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

            if (!($cnpj[12] == $digito1) and ( $cnpj[13] == $digito2)) {
            	$this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            	return false;
            } else {
            	return true;
            }
        }
    }

   

}
