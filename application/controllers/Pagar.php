<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Pagar extends CI_Controller {
	public function __construct() {

		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			$this->session->set_flashdata('info','Sua sessão expirou!');
			redirect('login');
		}
		$this->load->model('finaceiro_model');
	}


	public function index(){
		$data =  array(

			'titulo' => 'Listagem de contas a pagar',

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
			'contas_pagar' => $this->finaceiro_model->get_all_pagar(),
		);
//erro na validação 

	/*	echo'<pre>';
		print_r($data['contas_pagar']);
		exit();*/

		$this->load->view('layout/header', $data);
		$this->load->view('pagar/index');
		$this->load->view('layout/footer');
		
	}

	public function add(){


					//Form_validation
			
			$this->form_validation->set_rules('conta_pagar_fornecedor_id', '', 'trim|required');
			$this->form_validation->set_rules('conta_pagar_data_vencimento', '', 'trim|required');
			$this->form_validation->set_rules('conta_pagar_valor', '', 'trim|required');
			$this->form_validation->set_rules('conta_pagar_obs', '', 'trim|max_length[250]');

			if ($this->form_validation->run()){




				$data = elements(
					array(
						'conta_pagar_fornecedor_id',
						'conta_pagar_data_vencimento',
						'conta_pagar_status',
						'conta_pagar_valor',
						'conta_pagar_obs'

					), $this->input->post()

				);
													//verificar se foi paga		
				$conta_pagar_status = $this->input->post('conta_pagar_status');
				if($conta_pagar_status == 1){
					$data['conta_pagar_data_vencimento'] = date('Y-m-d h:i:s');

				}
				$data = html_escape($data);

			/*	echo'<pre>';
				print_r($data);
				exit();
*/
				//$this->core_model->update('contas_pagar');
				$this->core_model->insert('contas_pagar', $data);
				redirect('pagar');



			}else{
									///erro de validação
				$data =  array(

					'titulo' => 'Cadastro de contas a pagar',

					'styles' => array(

						'vendor/select2/select2.min.css',

					),

					'scripts' => array(
						'js/jquery.mask.min.js',
						'js/app.js',
						'vendor/select2/select2.min.js',
						'vendor/select2/app.js',
					),
					
					'fornecedores' => $this->core_model->get_all('fornecedores'),
				);
//erro na validação 

	/*	echo'<pre>';
		print_r($data['contas_pagar']);
		exit();*/

		$this->load->view('layout/header', $data);
		$this->load->view('pagar/add');
		$this->load->view('layout/footer');

	}



}


public function edit ($conta_pagar_id = NULL){

		//verifica no banco se existe algum cliente //
		if(!$conta_pagar_id || !$this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id))){
			$this->session->set_flashdata('error','Contas não encontrada!');
			redirect('pagar');
		}else{

					//Form_validation
			
			$this->form_validation->set_rules('conta_pagar_fornecedor_id', '', 'trim|required');
			$this->form_validation->set_rules('conta_pagar_data_vencimento', '', 'trim|required');
			$this->form_validation->set_rules('conta_pagar_valor', '', 'trim|required');
			$this->form_validation->set_rules('conta_pagar_obs', '', 'trim|max_length[250]');

			if ($this->form_validation->run()){




				$data = elements(
					array(
						'conta_pagar_fornecedor_id',
						'conta_pagar_data_vencimento',
						'conta_pagar_status',
						'conta_pagar_valor',
						'conta_pagar_obs'

					), $this->input->post()

				);
													//verificar se foi paga		
				$conta_pagar_status = $this->input->post('conta_pagar_status');
				if($conta_pagar_status == 1){
					$data['conta_pagar_data_vencimento'] = date('Y-m-d h:i:s');

				}
				$data = html_escape($data);

			/*	echo'<pre>';
				print_r($data);
				exit();
*/
				//$this->core_model->update('contas_pagar');
				$this->core_model->update('contas_pagar', $data, array('conta_pagar_id' => $conta_pagar_id));
				redirect('pagar');



			}else{
									///erro de validação
				$data =  array(

					'titulo' => 'Edição de contas a pagar',

					'styles' => array(

						'vendor/select2/select2.min.css',

					),

					'scripts' => array(
						'js/jquery.mask.min.js',
						'js/app.js',
						'vendor/select2/select2.min.js',
						'vendor/select2/app.js',
					),
					'conta_pagar' => $this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id)),
					'fornecedores' => $this->core_model->get_all('fornecedores'),
				);
//erro na validação 

	/*	echo'<pre>';
		print_r($data['contas_pagar']);
		exit();*/

		$this->load->view('layout/header', $data);
		$this->load->view('pagar/edit');
		$this->load->view('layout/footer');

	}

}

}

    public function del($conta_pagar_id = NULL){

		if(!$conta_pagar_id || !$this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id))){
			$this->session->set_flashdata('error','Conta  não foi encontrada');
			        		redirect('pagar');

                             }
		//não deixa a conta ser exluida se tiver em abertos/
		if($this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id, 'conta_pagar_status' => 2))){
		$this->session->set_flashdata('info','Atenção: essa conta não poder ser excluida, pois ainda estar em aberto!');
			        		redirect('pagar');

			                }else{
			        		$this->core_model->delete('contas_pagar', array('conta_pagar_id' => $conta_pagar_id));
			        		redirect('pagar');
			        	   }
			        	}

			        


}
