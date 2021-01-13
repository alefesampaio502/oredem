<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Categorias extends CI_Controller {
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

			'titulo' => 'Listagem de Categorias',

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
			'categorias' => $this->core_model->get_all('categorias'),
		);
//erro na validação 
		$this->load->view('layout/header', $data);
		$this->load->view('categorias/index');
		$this->load->view('layout/footer');
		
	}


	public function edit($categoria_id = NULL){
	//verifica no banco se existe algum vendedor //
		if(!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))){
			$this->session->set_flashdata('error','Serviços não encontrado');
			redirect('categorias');
		}else{

			$this->form_validation->set_rules('categoria_nome','','trim|required|min_length[1]|max_length[145]|callback_check_nome_marca');
			
			$this->form_validation->set_rules('categoria_ativa','','trim|required|max_length[1]');
			

			if($this->form_validation->run()){

				$categoria_ativa = $this->input->post('categoria_ativa');

				if($this->db->table_exists('produtos')){

			if($categoria_ativa == 2 && $this->core_model->get_by_id('produtos', array('produto_categoria_id' => $categoria_id, 'produto_ativo' => 1))){
						$this->session->set_flashdata('info','Essa categoria não poder ser desativada, pois está sendo utilizada em produtos');
						redirect('categorias');

					}

				}

				//exit('validado');

				$data = elements(
					array(
						'categoria_nome',
						'categoria_ativa',
						
					), $this->input->post()

				);

				$data = $this->security->xss_clean($data);
				$data = html_escape($data);


				$this->core_model->update('categorias', $data, array('categoria_id' => $categoria_id));
				redirect('categorias');


			}else{

				$data =  array(

					'titulo' => 'Atualizar Categorias',

					'scripts' => array(

						'vendor/datatables/jquery.dataTables.min.js',
						'vendor/datatables/app.js',
						'js/jquery.mask.min.js',
						'js/app.js',
						'vendor/datatables/dataTables.bootstrap4.min.js',
						'js/demo/datatables-demo.js'
					),
					'categorias' => $this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id)),

				);

//erro na validação 
				$this->load->view('layout/header', $data);
				$this->load->view('categorias/edit');
				$this->load->view('layout/footer');

			}

		}

	}







	public function add(){
	//verifica no banco se existe algum vendedor //


		$this->form_validation->set_rules('categoria_nome','','trim|required|max_length[145]|is_unique[categorias.categoria_nome]');
		
		$this->form_validation->set_rules('categoria_ativa','','trim|required|max_length[1]');

		if($this->form_validation->run()){

				//exit('validado');

			$data = elements(
				array(
					
					
					'categoria_nome',

					'categoria_ativa',



				), $this->input->post()

			);

			$data = $this->security->xss_clean($data);
			$data = html_escape($data);


			$this->core_model->insert('categorias', $data);
			redirect('categorias');




		}else{

			$data =  array(

				'titulo' => 'Cadastrar Categoria',

				'scripts' => array(

					
					'js/jquery.mask.min.js',
					'js/app.js',
					
					
				),

				

			);

			//erro na validação 
			$this->load->view('layout/header', $data);
			$this->load->view('categorias/add');
			$this->load->view('layout/footer');

		}
	}


	public function del($categoria_id = NULL){

		if(!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))){
			$this->session->set_flashdata('error','Serviço não encontrado');
			redirect('categorias');
		}else{
			$this->core_model->delete('categorias', array('categoria_id' => $categoria_id));
			redirect('categorias');

		}
	}


///reglas de atualização usando o callback_check  do 'form_validation' do editar //

	public function check_nome_marca($categoria_nome){

		$categoria_id = $this->input->post('categoria_id');

		if($this->core_model->get_by_id('categorias', array('categoria_nome' => $categoria_nome, 'categoria_id !=' => $categoria_id))){
			$this->form_validation->set_message('check_nome_marca','Essa Categoria já existe!');
			return FALSE;
		}else{
			return TRUE;
		}
	}


}

