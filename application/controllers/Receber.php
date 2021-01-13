<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Receber extends CI_Controller {
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

			'titulo' => 'Listagem de contas a receber',

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
			'contas_receber' => $this->finaceiro_model->get_all_receber(),
		);
//erro na validação 

	/*	echo'<pre>';
		print_r($data['contas_receber']);
		exit();*/

		$this->load->view('layout/header', $data);
		$this->load->view('receber/index');
		$this->load->view('layout/footer');
		
	}




public function edit ($conta_receber_id = NULL){

		//verifica no banco se existe algum cliente //
		if(!$conta_receber_id || !$this->core_model->get_by_id('contas_receber', array('conta_receber_id' => $conta_receber_id))){
			$this->session->set_flashdata('error','Contas não encontrada!');
			redirect('receber');
		}else{

					//Form_validation
			
			$this->form_validation->set_rules('conta_receber_cliente_id', '', 'trim|required');
			$this->form_validation->set_rules('conta_receber_data_vencimento', '', 'trim|required');
			$this->form_validation->set_rules('conta_receber_valor', '', 'trim|required');
			$this->form_validation->set_rules('conta_receber_obs', '', 'trim|max_length[250]');

			if ($this->form_validation->run()){




				$data = elements(
					array(
						'conta_receber_cliente_id',
						'conta_receber_data_vencimento',
						'conta_receber_status',
						'conta_receber_valor',
						'conta_receber_obs'

					), $this->input->post()

				);
													//verificar se foi paga		
				$conta_receber_status = $this->input->post('conta_receber_status');
				if($conta_receber_status == 1){
					$data['conta_receber_data_vencimento'] = date('Y-m-d h:i:s');

				}
				$data = html_escape($data);

			/*	echo'<pre>';
				print_r($data);
				exit();
*/
				//$this->core_model->update('contas_receber');
				$this->core_model->update('contas_receber', $data, array('conta_receber_id' => $conta_receber_id));
				redirect('receber');


			}else{
									///erro de validação
				$data =  array(

					'titulo' => 'Edição de contas a receber',

					'styles' => array(

						'vendor/select2/select2.min.css',

					),

					'scripts' => array(
						'js/jquery.mask.min.js',
						'js/app.js',
						'vendor/select2/select2.min.js',
						'vendor/select2/app.js',
					),
					'conta_receber' => $this->core_model->get_by_id('contas_receber', array('conta_receber_id' => $conta_receber_id)),
					'clientes' => $this->core_model->get_all('clientes', array('cliente_ativo' => 1)),
				);
//erro na validação 

	/*	echo'<pre>';
		print_r($data['contas_receber']);
		exit();*/

		$this->load->view('layout/header', $data);
		$this->load->view('receber/edit');
		$this->load->view('layout/footer');

	}

}

}



public function add(){

		//verifica no banco se existe algum cliente //
				//Form_validation
			
			$this->form_validation->set_rules('conta_receber_cliente_id', '', 'trim|required');
			$this->form_validation->set_rules('conta_receber_data_vencimento', '', 'trim|required');
			$this->form_validation->set_rules('conta_receber_valor', '', 'trim|required');
			$this->form_validation->set_rules('conta_receber_obs', '', 'trim|max_length[250]');

			if ($this->form_validation->run()){




				$data = elements(
					array(
						'conta_receber_cliente_id',
						'conta_receber_data_vencimento',
						'conta_receber_status',
						'conta_receber_valor',
						'conta_receber_obs'

					), $this->input->post()

				);
													//verificar se foi paga		
				$conta_receber_status = $this->input->post('conta_receber_status');
				if($conta_receber_status == 1){
					$data['conta_receber_data_vencimento'] = date('Y-m-d h:i:s');

				}
				$data = html_escape($data);

			/*	echo'<pre>';
				print_r($data);
				exit();
*/
				//$this->core_model->update('contas_receber');
				$this->core_model->insert('contas_receber', $data);
				redirect('receber');


			}else{
		///Erro de validação
				$data =  array(

					'titulo' => 'Cadastrar de contas a receber',

					'styles' => array(

						'vendor/select2/select2.min.css',

					),

					'scripts' => array(
						'js/jquery.mask.min.js',
						'js/app.js',
						'vendor/select2/select2.min.js',
						'vendor/select2/app.js',
					),
					
					'clientes' => $this->core_model->get_all('clientes', array('cliente_ativo' => 1)),
				);
        //Erro na validação 

				/*	echo'<pre>';
					print_r($data['contas_receber']);
					exit();*/

		$this->load->view('layout/header', $data);
		$this->load->view('receber/add');
		$this->load->view('layout/footer');


}

}
    public function del($conta_receber_id = NULL){

		if(!$conta_receber_id || !$this->core_model->get_by_id('contas_receber', array('conta_receber_id' => $conta_receber_id))){
			$this->session->set_flashdata('error','Conta  não foi encontrada');
			        		redirect('receber');

                             }
		//não deixa a conta ser exluida se tiver em abertos/
		if($this->core_model->get_by_id('contas_receber', array('conta_receber_id' => $conta_receber_id, 'conta_receber_status' => 2))){
		$this->session->set_flashdata('info','Atenção:  Essa conta não poder ser excluida, pois ainda estar em aberto!');
			        		redirect('receber');

			                }else{
			        		$this->core_model->delete('contas_receber', array('conta_receber_id' => $conta_receber_id));
			        		redirect('receber');
			        	   }
			        	}

			        


}
