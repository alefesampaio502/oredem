<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Usuarios extends CI_Controller {
	public function __construct() {

		parent::__construct();

           if (!$this->ion_auth->logged_in()){
		    	$this->session->set_flashdata('info','Acesso não permitido!');
		      redirect('login');
		    }

	}



	public function index(){

		$data =  array(

			'titulo' => 'Listagem de Usuários',


			'styles' => array(
				
				'vendor/datatables/dataTables.bootstrap4.min.css',

			),
			'scripts' => array(
				
				'vendor/datatables/jquery.dataTables.min.js',
				'vendor/datatables/app.js',
				'vendor/datatables/dataTables.bootstrap4.min.js',
				'js/demo/datatables-demo.js'
			),


		'usuarios' => $this->ion_auth->users()->result(), // get all users
	);
		$this->load->view('layout/header', $data);
		$this->load->view('usuarios/index');

		$this->load->view('layout/footer');
	}
	public function add(){

	 //validação dos campos form//
		$this->form_validation->set_rules('first_name','','trim|required');
		$this->form_validation->set_rules('last_name','','trim|required');
		$this->form_validation->set_rules('username','','trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Senha', 'required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('confirmar_password', 'Confirma', 'matches[password]');

		if($this->form_validation->run()){

						//Obs security para proteger meu form de código malicioso 

			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'username' => $this->input->post('username'),
				'active' => $this->input->post('active'),
			);
					    $group = array($this->input->post('perfil_usuario')); // Sets user to admin.

					    $additional_data = $this->security->xss_clean($additional_data);
					    $group = $this->security->xss_clean($group);


					    //Altera ion_auth_model para habilitar user de acordo com padrão do cadastro.

					    if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){

					    	$this->session->set_flashdata('sucesso','Dados salvo com sucesso');

					    }else{
					    	$this->session->set_flashdata('error','Dados Não foi salvo');

					    }
					    redirect('usuarios');

					}else{

				       //Erro na validação 

						$data = array(
							'titulo' => 'Cadastrar Usuário',
						);
						$this->load->view('layout/header', $data);
						$this->load->view('usuarios/add');
						$this->load->view('layout/footer');
					}

				}

	public function edit($usuario_id = NULL ){

					if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {

						$this->session->set_flashdata('error','Usuário não encontrado');
						redirect('usuarios');

					}else{

		 //validação dos campos form//
						$this->form_validation->set_rules('first_name','','trim|required');
						$this->form_validation->set_rules('last_name','','trim|required');
						$this->form_validation->set_rules('username','','trim|callback_username_check');
						$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
						$this->form_validation->set_rules('password', 'Senha', 'min_length[5]|max_length[255]');
						$this->form_validation->set_rules('confirmar_password', 'Confirma', 'matches[password]');


						if($this->form_validation->run()){

							$data = elements(
								array(
									'first_name',
									'last_name',
									'email',
									'username',
									'active',
									'password'


								), $this->input->post()

							);

							$data = $this->security->xss_clean($data);

							$password = $this->input->post('password');
							if(!$password){

								unset($data['password']);
							}

							if($this->ion_auth->update($usuario_id, $data)){

								$perfil_usuario_db = $this->ion_auth->get_users_groups($usuario_id)->row();

								$perfil_usuario_post = $this->input->post('perfil_usuario');

								/*Se for diferente atualiza o grupo*/
								if($perfil_usuario_post != $perfil_usuario_db->id){

        							// pass a single ID and user ID
									$this->ion_auth->remove_from_group($perfil_usuario_db->id, $usuario_id);
									$this->ion_auth->add_to_group($perfil_usuario_post, $usuario_id);
								}
								$this->session->set_flashdata('sucesso','Dados salvo com sucesso');


							}else{

								$this->session->set_flashdata('error','Dados Não foi salvo');
							}
							redirect('usuarios');

						}else{
							$data = array(
								'titulo' => 'Editar Usuarios',
								'usuario' => $this->ion_auth->user($usuario_id)->row(),
								'perfil_usuario' =>  $this->ion_auth->get_users_groups($usuario_id)->row(),
							);


							$this->load->view('layout/header', $data);
							$this->load->view('usuarios/edit');
							$this->load->view('layout/footer');

						}

					}
				}


    public function del($usuario_id = NULL){

    	if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {

    			$this->session->set_flashdata('error','Usuário não encontrado');
						redirect('usuarios');

    	}

    	//Cancelando a exlusão do Administrador//
    	if($this->ion_auth->is_admin($usuario_id)) {

    			$this->session->set_flashdata('error','Administrador não poder ser excluido');
						redirect('usuarios');

    }

    if($this->ion_auth->delete_user($usuario_id)){
    	$this->session->set_flashdata('sucesso','Usuário foi excluido com sucesso');
    	redirect('usuarios');
    }else{

    	$this->session->set_flashdata('error','Usuário não foi excluido');
						redirect('usuarios');


    }
}


	public function email_check($email){

					$usuario_id = $this->input->post('usuario_id');

					if($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))){

						$this->form_validation->set_message('email_check','Esse Email já existe');

						return FALSE;

					}else{

						return TRUE;


					}

				}

	public function username_check($username){

					$usuario_id = $this->input->post('usuario_id');

					if($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))){

						$this->form_validation->set_message('username_check','Usuário já existe');

						return FALSE;

					}else{

						return TRUE;


					}

				}
			}