<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Marcas extends CI_Controller {
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

			'titulo' => 'Listagem de Marcas',

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
			'marcas' => $this->core_model->get_all('marcas'),
		);
//erro na validação 
		$this->load->view('layout/header', $data);
		$this->load->view('marcas/index');
		$this->load->view('layout/footer');
		
	}


	public function edit($marca_id = NULL){
	//verifica no banco se existe algum vendedor //
		if(!$marca_id || !$this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))){
			$this->session->set_flashdata('error','Serviços não encontrado');
			redirect('marcas');
		}else{

$this->form_validation->set_rules('marca_nome','','trim|required|min_length[1]|max_length[145]|callback_check_nome_marca');
			
			$this->form_validation->set_rules('marca_ativa','','trim|required|max_length[1]');
			


			if($this->form_validation->run()){

				$marca_ativa = $this->input->post('marca_ativa');

				if($this->db->table_exists('produtos')){

			if($marca_ativa == 2 && $this->core_model->get_by_id('produtos', array('produto_marca_id' => $marca_id, 'produto_ativo' => 1))){
						$this->session->set_flashdata('info','Essa categoria não poder ser desativada, pois está sendo utilizada em produtos');
						redirect('marcas');

					}

				}


				//exit('validado');

				$data = elements(
					array(
						'marca_nome',
						'marca_ativa',
						
						


					), $this->input->post()

				);

				$data = $this->security->xss_clean($data);
				$data = html_escape($data);


				$this->core_model->update('marcas', $data, array('marca_id' => $marca_id));
				redirect('marcas');


			}else{

				$data =  array(

					'titulo' => 'Atualizar Marcas',

					'scripts' => array(

						'vendor/datatables/jquery.dataTables.min.js',
						'vendor/datatables/app.js',
						'js/jquery.mask.min.js',
						'js/app.js',
						'vendor/datatables/dataTables.bootstrap4.min.js',
						'js/demo/datatables-demo.js'
					),
					'marcas' => $this->core_model->get_by_id('marcas', array('marca_id' => $marca_id)),

				);

//erro na validação 
				$this->load->view('layout/header', $data);
				$this->load->view('marcas/edit');
				$this->load->view('layout/footer');

			}

		}

	}







	public function add(){
	//verifica no banco se existe algum vendedor //
    

		$this->form_validation->set_rules('marca_nome','','trim|required|max_length[145]|is_unique[marcas.marca_nome]');
		
		$this->form_validation->set_rules('marca_ativa','','trim|required|max_length[1]');
												
		if($this->form_validation->run()){

				//exit('validado');

			$data = elements(
				array(
					
					
						'marca_nome',
						
						'marca_ativa',
						


				), $this->input->post()

			);

		$data = $this->security->xss_clean($data);
		$data = html_escape($data);


		$this->core_model->insert('marcas', $data);
		redirect('marcas');
					      

		
		   
		}else{

			$data =  array(

				'titulo' => 'Cadastrar Marca',

				'scripts' => array(

					
					'js/jquery.mask.min.js',
					'js/app.js',
					
					
				),

				

			);

			//erro na validação 
			$this->load->view('layout/header', $data);
			$this->load->view('marcas/add');
			$this->load->view('layout/footer');

		}
}


public function del($marca_id = NULL){

if(!$marca_id || !$this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))){
		$this->session->set_flashdata('error','Serviço não encontrado');
	redirect('marcas');
    }else{
	$this->core_model->delete('marcas', array('marca_id' => $marca_id));
	redirect('marcas');

    }
}


///reglas de atualização usando o callback_check  do 'form_validation' do editar //

public function check_nome_marca($marca_nome){

	$marca_id = $this->input->post('marca_id');

	if($this->core_model->get_by_id('marcas', array('marca_nome' => $marca_nome, 'marca_id !=' => $marca_id))){
              $this->form_validation->set_message('check_nome_marca','Essa marca já existe!');
     return FALSE;
	}else{
		return TRUE;
	}
}


}
 