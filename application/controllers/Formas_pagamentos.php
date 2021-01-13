<?php defined('BASEPATH') OR exit('Acesso não e permitido');


class Formas_pagamentos extends CI_Controller {
	public function __construct() {

		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			$this->session->set_flashdata('info','Sua sessão expirou!');
			redirect('login');
		}
		//$this->load->model('finaceiro_model');
	}


	public function index(){
		$data =  array(

			'titulo' => 'Listagem de Formas de pagamentos',

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
			'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos'),
		);
//erro na validação 

		/*echo'<pre>';
		print_r($data['formas_pagamentos']);
		exit();*/

		$this->load->view('layout/header', $data);
		$this->load->view('formas_pagamentos/index');
		$this->load->view('layout/footer');
		
	}

	public function add (){



					//Form_validation
		
		
		$this->form_validation->set_rules('forma_pagamento_nome', '', 'trim|required|min_length[1]|max_length[45]|is_unique[formas_pagamentos.forma_pagamento_nome]');
		$this->form_validation->set_rules('forma_pagamento_aceita_parc', '', 'trim|required');
		$this->form_validation->set_rules('forma_pagamento_ativa', '', 'trim|max_length[250]');

		if ($this->form_validation->run()){


			

			$data = elements(
				array(
					
					'forma_pagamento_nome',
					'forma_pagamento_aceita_parc',
					'forma_pagamento_ativa'
					

				), $this->input->post()

			);

																	//verificar se foi paga		
				// $conta_pagar_status = $this->input->post('conta_pagar_status');
			
				// if($conta_pagar_status == 1){
				// 	$data['conta_pagar_data_vencimento'] = date('Y-m-d h:i:s');

				// }
			$data = html_escape($data);

			/*	echo'<pre>';
				print_r($data);
				exit();
*/
				//$this->core_model->update('contas_pagar');
				$this->core_model->insert('formas_pagamentos', $data);
				redirect('formas_pagamentos');



			}else{
									///erro de validação
				$data =  array(

					'titulo' => 'Cadastro de Formas de pagamentos',

					
//'formas_pagamentos' => $this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id)),
					//'fornecedores' => $this->core_model->get_all('fornecedores'),
				);
//erro na validação 

	/*	echo'<pre>';
		print_r($data['contas_pagar']);
		exit();*/

		$this->load->view('layout/header', $data);
		$this->load->view('formas_pagamentos/add');
		$this->load->view('layout/footer');

	}


}
public function edit ($forma_pagamento_id = NULL){

		//verifica no banco se existe algum cliente //
	if(!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))){
		$this->session->set_flashdata('error','Tipos de pagamentos não encontrada!');
		redirect('pagamentos');
	}else{

					//Form_validation
		
		
		$this->form_validation->set_rules('forma_pagamento_nome', '', 'trim|required|min_length[1]|max_length[45]|callback_check_pagamento_nome');
		$this->form_validation->set_rules('forma_pagamento_aceita_parc', '', 'trim|required');
		$this->form_validation->set_rules('forma_pagamento_ativa', '', 'trim|max_length[250]');

		if ($this->form_validation->run()){


			$forma_pagamento_ativa = $this->input->post('forma_pagamento_ativa');
			
               		//para vendas 
			if($this->db->table_exists('vendas')){

				if($forma_pagamento_ativa == 2 && $this->core_model->get_by_id('vendas', array('venda_forma_pagamento_id' => $forma_pagamento_id, 'venda_status' => 2))){
					$this->session->set_flashdata('info','Essa Forma de pagamentos não poder ser desativado, pois está sendo utilizada em Vendas');
					redirect('pagamentos');

				}

			}
					//para ordem de serviços
			if($this->db->table_exists('ordem_servicos')){

				if($forma_pagamento_ativa == 2 && $this->core_model->get_by_id('ordem_servicos', array('ordem_servico_forma_pagamento_id' => $forma_pagamento_id, 'ordem_servico' => 2))){
					$this->session->set_flashdata('info','Essa Forma de pagamentos não poder ser desativado, pois está sendo utilizada em Ordem de serviços');
					redirect('pagamentos');

				}

			}

			$data = elements(
				array(
					
					'forma_pagamento_nome',
					'forma_pagamento_aceita_parc',
					'forma_pagamento_ativa'
					

				), $this->input->post()

			);

																	//verificar se foi paga		
				// $conta_pagar_status = $this->input->post('conta_pagar_status');
			
				// if($conta_pagar_status == 1){
				// 	$data['conta_pagar_data_vencimento'] = date('Y-m-d h:i:s');

				// }
			$data = html_escape($data);

			/*	echo'<pre>';
				print_r($data);
				exit();
*/
				//$this->core_model->update('contas_pagar');
				$this->core_model->update('formas_pagamentos', $data, array('forma_pagamento_id' => $forma_pagamento_id));
				redirect('formas_pagamentos');



			}else{
									///erro de validação
				$data =  array(

					'titulo' => 'Edição de Formas de pagamentos',

					
					'formas_pagamentos' => $this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id)),
					//'fornecedores' => $this->core_model->get_all('fornecedores'),
				);
//erro na validação 

	/*	echo'<pre>';
		print_r($data['contas_pagar']);
		exit();*/

		$this->load->view('layout/header', $data);
		$this->load->view('formas_pagamentos/edit');
		$this->load->view('layout/footer');

	}

}

}

public function del($forma_pagamento_id = NULL){

 		//verifica no banco se existe algum cliente //
	if(!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))){
		$this->session->set_flashdata('error','Tipos de pagamentos não encontrada!');
		redirect('pagamentos');
	}

		//verifica no banco se existe algum cliente //
	if($this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id, 'forma_pagamento_ativa' => 1))){
		$this->session->set_flashdata('info','Atenção: Não e possível excluir uma forma de pagamentos,  que está ativa!');
		redirect('pagamentos');
	}

	$this->core_model->delete('formas_pagamentos',  array('forma_pagamento_id' => $forma_pagamento_id));
	redirect('pagamentos');
}





public function check_pagamento_nome($forma_pagamento_nome){

	$forma_pagamento_id = $this->input->post('forma_pagamento_id');

	if($this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_nome' => $forma_pagamento_nome, 'forma_pagamento_id !=' => $forma_pagamento_id))){
		$this->form_validation->set_message('check_pagamento_nome','Essa forma de pagamentos já existe!');
		//$this->Form_validation->set_message('check_pagamento_nome','Essa forma de pagamentos já existe!');
		return false;
	}else{
		return true;

	}

}

}
