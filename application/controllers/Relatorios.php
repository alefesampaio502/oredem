<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Relatorios extends CI_Controller {
	public function __construct() {

		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			$this->session->set_flashdata('info','Sua sessão expirou!');
			redirect('login');
		}

	}

	public function vendas(){
			   $data = array(
			 'titulo' => 'Relatorios de vendas',

			);

			   $data_inicial = $this->input->post('data_inicial');
			   $data_final = $this->input->post('data_final');

/*
				echo'<pre>';
				print_r($this->input->post());
				exit();
*/

			   if($data_inicial){

			   	 $this->load->model('vendas_model');

			   	 if($this->vendas_model->gerar_relatorio_vendas($data_inicial, $data_final)){
					
					//monto PDF de Vendas

				$empresa = $this->core_model->get_by_id('sistema', array('sistema_id' => 1));
				// echo'<pre>';
				// print_r($empresa);
				// exit();

				$vendas = $this->vendas_model->gerar_relatorio_vendas($data_inicial, $data_final);
				// echo'<pre>';
				// print_r($venda);
				// exit();
				$file_name = 'Relatórios de vendas &nbsp';
				$html = '<html>';
				$html .= '<head>';
				$html .= '<title>'.$empresa->sistema_nome_fantasia.' | Relatórios de vendas </title>';
				$html .= '</head>';
				$html .= '<body style="font-size: 14px">';

				$html.= '<h4 align="center">
				'.$empresa->sistema_nome_fantasia.'<br/>
				'.$empresa->sistema_razao_social.' 
				'. 'CNPJ: '.$empresa->sistema_cnpj. '<br/>
				'.$empresa->sistema_endereco .', '. $empresa->sistema_numero .'
				'.$empresa->sistema_cep .', ' .$empresa->sistema_cidade . ', '. $empresa->sistema_estado . '<br/>
				'. 'Telefone: '. $empresa->sistema_telefone_movel . '
				'. 'Email: '. $empresa->sistema_email . '<br/>
				</h4>';
				$html .= '<hr>';
			

			
				if($data_inicial && $data_final){
					$html .= '<p align="center" style="font-size: 12px; color:#900"> Relatórios de vendas realizado no período entre  as seguintes datas: &nbsp;</p>';


					$html .= '<p  align="center" style="font-size: 12px;font-weight: bold;">'.formata_data_banco_sem_hora($data_inicial).' - '.formata_data_banco_sem_hora($data_final).'</p>&nbsp;';

				}else{
					$html .= '<p align="center" style="font-size: 12px; color:#900; "> Relatórios de vendas realizado apartir da data: &nbsp;</p>';


					$html .= '<p  align="center" style="font-size: 12px;font-weight: bold;">'.formata_data_banco_sem_hora($data_inicial).'</p>';
				}

				/*$html .= '<p>'
				.'<strong>Cliente: </strong>'.$venda->cliente_nome_completo.'<br/>'
				.'<strong>CPF: </strong>'.$venda->cliente_cpf_cnpj.'<br/>'
				.'<strong>Celular: </strong>'.$venda->cliente_celular.'<br/>'
				.'<strong>Data emissão: </strong>'.formata_data_banco_com_hora($venda->venda_data_emissao).'<br/>'
				. '<strong>Forma de pagamento: </strong>'.$venda->forma_pagamento.'<br/>'
				.'</p>';
*/
				$html .= '<hr>';
				//doados da ordem
				$html .= '<table width="100%" border:solid #ddd 1px >';
				$html .= '<tr>';
				$html .= '<th>Venda</th>';
				$html .= '<th>Data</th>';
				$html .= '<th>Cliente</th>';
				$html .= '<th>Forma de pagamento</th>';
				$html .= '<th>Valor Total</th>';
				$html .= '</tr>';


				$valor_final_vendas = $this->vendas_model->get_valor_final_relatorio($data_inicial, $data_final);
				
				foreach ($vendas as $venda):

					$html .= '<tr>';
					$html .= '<td>'.$venda->venda_id.'</td>';
					$html .= '<td align="left">'.formata_data_banco_com_hora($venda->venda_data_emissao).'</td>';
					$html .= '<td>'.'R$ &nbsp;' .$venda->cliente_nome_completo.'</td>';
					$html .= '<td>'.'R$ &nbsp;' .$venda->forma_pagamento.'</td>';
					$html .= '<td>'.'R$ &nbsp;' .$venda->venda_valor_total.'</td>';
					$html .= '</tr>';
				endforeach;

					$html .= '<th colspan="3">';
					$html .= '<td style="border-top: solid #ddd 1px"><strong>Valor final</strong></td>';
					$html .= '<td style="border-top: solid #ddd 1px">'. $valor_final_vendas->venda_valor_total .'</td>';

					$html .= '</th>';
					$html .= '</table>';
						/*echo'<pre>';
						print_r($venda);
						exit();*/
						$html .= '</body>';
						$html .= '</html>';
						/*echo'<pre>';
						print_r($html);
						exit();*/
						//False abre no navegador o true faz o dowloads
						$this->pdf->createPDF($html, $file_name, false);

			}else{

				if(!empty($data_inicial) && !empty($data_final)){
					$this->session->set_flashdata('info','Não foram encontradas Vendas entre as datas '. formata_data_banco_sem_hora($data_inicial). '&nbsp;e&nbsp'.formata_data_banco_sem_hora($data_final));

				}else{
					$this->session->set_flashdata('info','Não foram encontradas Vendas apartir da datas '. formata_data_banco_sem_hora($data_inicial));

				}
				redirect('relatorios/vendas');
			}
		}

		///chmar  as view 
		$this->load->view('layout/header', $data);
		$this->load->view('relatorios/vendas');
		$this->load->view('layout/footer');

	}




		public function os(){
			   $data = array(
			 'titulo' => 'Relatorios de ordem de serviço',

			);

			   $data_inicial = $this->input->post('data_inicial');
			   $data_final = $this->input->post('data_final');

			   if($data_inicial){

			   	 $this->load->model('ordem_servicos_model');

			   	 if($this->ordem_servicos_model->gerar_relatorio_os($data_inicial, $data_final)){
					
					//monto PDF de Vendas

				$empresa = $this->core_model->get_by_id('sistema', array('sistema_id' => 1));
				// echo'<pre>';
				// print_r($empresa);
				// exit();

				$ordens_servicos = $this->ordem_servicos_model->gerar_relatorio_os($data_inicial, $data_final);
				// echo'<pre>';
				// print_r($venda);
				// exit();
				$file_name = 'Relatórios de ordem de serviço &nbsp';
				$html = '<html>';
				$html .= '<head>';
				$html .= '<title>'.$empresa->sistema_nome_fantasia.' | Relatórios de ordem de serviço </title>';
				$html .= '</head>';
				$html .= '<body style="font-size: 14px">';

				$html.= '<h4 align="center">
				'.$empresa->sistema_nome_fantasia.'<br/>
				'.$empresa->sistema_razao_social.' 
				'. 'CNPJ: '.$empresa->sistema_cnpj. '<br/>
				'.$empresa->sistema_endereco .', '. $empresa->sistema_numero .'
				'.$empresa->sistema_cep .', ' .$empresa->sistema_cidade . ', '. $empresa->sistema_estado . '<br/>
				'. 'Telefone: '. $empresa->sistema_telefone_movel . '
				'. 'Email: '. $empresa->sistema_email . '<br/>
				</h4>';
				$html .= '<hr>';
			

			
				if($data_inicial && $data_final){
					$html .= '<p align="center" style="font-size: 12px; color:#900"> Relatórios de ordem serviço realizado no período entre  as seguintes datas: &nbsp;</p>';


					$html .= '<p  align="center" style="font-size: 12px;font-weight: bold;">'.formata_data_banco_sem_hora($data_inicial).' - '.formata_data_banco_sem_hora($data_final).'</p>&nbsp;';

				}else{
					$html .= '<p align="center" style="font-size: 12px; color:#900; "> Relatórios de ordem serviço realizado apartir da data: &nbsp;</p>';


					$html .= '<p  align="center" style="font-size: 12px;font-weight: bold;">'.formata_data_banco_sem_hora($data_inicial).'</p>';
				}


				$html .= '<hr>';
				//doados da ordem
				$html .= '<table width="100%" border:solid #ddd 1px >';
				$html .= '<tr>';
				$html .= '<th>Código da ordem</th>';
				$html .= '<th>Data</th>';
				$html .= '<th>Cliente</th>';
				$html .= '<th>Forma de pagamento</th>';
				$html .= '<th>Valor total</th>';
				$html .= '</tr>';


				$valor_final_os = $this->ordem_servicos_model->get_valor_final_relatorio_os($data_inicial, $data_final);
				
				foreach ($ordens_servicos as $os):

					$html .= '<tr>';
					$html .= '<td>'.$os->ordem_servico_id.'</td>';
					$html .= '<td align="left">'.formata_data_banco_com_hora($os->ordem_servico_data_emissao).'</td>';
					$html .= '<td>'.'R$ &nbsp;' .$os->cliente_nome_completo.'</td>';
					$html .= '<td>'.'R$ &nbsp;' .$os->forma_pagamento.'</td>';
					$html .= '<td>'.'R$ &nbsp;' .$os->ordem_servico_valor_total.'</td>';
					$html .= '</tr>';
				endforeach;

					$html .= '<th colspan="3">';
					$html .= '<td style="border-top: solid #ddd 1px"><strong>Valor final</strong></td>';
					$html .= '<td style="border-top: solid #ddd 1px">'. $valor_final_os->ordem_servico_valor_total .'</td>';

					$html .= '</th>';
					$html .= '</table>';
						/*echo'<pre>';
						print_r($venda);
						exit();*/
						$html .= '</body>';
						$html .= '</html>';
						/*echo'<pre>';
						print_r($html);
						exit();*/
						//False abre no navegador o true faz o dowloads
						$this->pdf->createPDF($html, $file_name, false);

			}else{

				if(!empty($data_inicial) && !empty($data_final)){
					$this->session->set_flashdata('info','Não foram encontradas ordem de serviços entre as datas '. formata_data_banco_sem_hora($data_inicial). '&nbsp;e&nbsp'.formata_data_banco_sem_hora($data_final));

				}else{
					$this->session->set_flashdata('info','Não foram encontradas ordem de serviços apartir da datas '. formata_data_banco_sem_hora($data_inicial));

				}
				redirect('relatorios/os');
	    	}

		}

		///chmar  as view 
		$this->load->view('layout/header', $data);
		$this->load->view('relatorios/os');
		$this->load->view('layout/footer');


	}

	public function receber(){

     $data = array(

     	'titulo' => 'Relatórios de contas a receber'

     	 );
    		 
    		 $contas = $this->input->post('contas');

    		 if($contas == 'vencidas' || $contas == 'pagas' || $contas == 'receber'){
    		 	$this->load->model('finaceiro_model');

    		 	if($contas == 'vencidas'){

    		 		$conta_receber_status = 0;
    		 		$data_vencimento = TRUE;

    		 		//Forma os Pdf
    		 		$empresa = $this->core_model->get_by_id('sistema', array('sistema_id' => 1));
				

						$contas = $this->finaceiro_model->get_contas_receber_relatorios($conta_receber_status, $data_vencimento);
							/*echo'<pre>';
							print_r($contas);*/
							
						$file_name = 'Relatórios de contas a vencidas &nbsp';
						$html = '<html>';
						$html .= '<head>';
						$html .= '<title>'.$empresa->sistema_nome_fantasia.' | Relatórios de contas a vencidas  </title>';
						$html .= '</head>';
						$html .= '<body style="font-size: 14px">';

						$html.= '<h4 align="center">
						'.$empresa->sistema_nome_fantasia.'<br/>
						'.$empresa->sistema_razao_social.' 
						'. 'CNPJ: '.$empresa->sistema_cnpj. '<br/>
						'.$empresa->sistema_endereco .', '. $empresa->sistema_numero .'
						'.$empresa->sistema_cep .', ' .$empresa->sistema_cidade . ', '. $empresa->sistema_estado . '<br/>
						'. 'Telefone: '. $empresa->sistema_telefone_movel . '
						'. 'Email: '. $empresa->sistema_email . '<br/>
						</h4>';
						$html .= '<hr>';
				        $html .= '<hr>';
						//doados da ordem
						$html .= '<table width="100%" border:solid #ddd 1px >';
						$html .= '<tr>';
						$html .= '<th>Venda ID</th>';
						$html .= '<th>Data vencimento</th>';
						$html .= '<th>Cliente</th>';
						$html .= '<th>Situação</th>';
						$html .= '<th>Valor Total</th>';
						$html .= '</tr>';				
				foreach ($contas as $conta):

						$html .= '<tr>';
						$html .= '<td>'.$conta->conta_receber_id.'</td>';
						$html .= '<td align="left">'.formata_data_banco_com_hora($conta->conta_receber_data_vencimento).'</td>';
						$html .= '<td>'.'R$ &nbsp;' .$conta->cliente_nome_completo.'</td>';
						$html .= '<td>vencida</td>';
						$html .= '<td>'.'R$ &nbsp;' .$conta->conta_receber_valor.'</td>';
						$html .= '</tr>';
				endforeach;
							
	$valor_final_contas = $this->finaceiro_model->get_sum_contas_receber_relatorios($conta_receber_status, $data_vencimento);
							
						$html .= '<th colspan="3">';
						$html .= '<td style="border-top: solid #ddd 1px"><strong>Valor final</strong></td>';
						$html .= '<td style="border-top: solid #ddd 1px">'. $valor_final_contas->conta_receber_valor_total .'</td>';

						$html .= '</th>';
						$html .= '</table>';
							
						$html .= '</body>';
						$html .= '</html>';
							echo'<pre>';
							print_r($conta);
							exit();
							//False abre no navegador o true faz o dowloads
							$this->pdf->createPDF($html, $file_name, false);

    		 	}

    		 	//pagas a receber

    		 }

			$this->load->view('layout/header', $data);
			$this->load->view('relatorios/receber');
			$this->load->view('layout/footer');



	}




}
