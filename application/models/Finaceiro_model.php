<?php  defined('BASEPATH') OR exit('Acesso não e permitido');

/**
 * 
 */
class Finaceiro_model extends CI_Model {

	public function get_all_pagar(){


		$this->db->select([

							'contas_pagar.*',
							'fornecedor_id',
							'fornecedor_nome_fantasia as fornecedor',

		]);

							$this->db->join('fornecedores', 'fornecedor_id = conta_pagar_fornecedor_id','LEFT');
							return $this->db->get('contas_pagar')->result();


	}

	public function get_all_receber(){


		$this->db->select([

							'contas_receber.*',
							'cliente_id',
							'cliente_nome',

		]);

							$this->db->join('clientes', 'cliente_id = conta_receber_cliente_id','LEFT');
							return $this->db->get('contas_receber')->result();


	}

//Aqui começa a utilização para relatórios 

	public function get_contas_receber_relatorios($conta_receber_status = NULL, $data_vencimento = NULL){

		$this->db->select([

							'contas_receber.*',
							'cliente_id',
							'cliente_nome',
							'CONCAT (clientes.cliente_nome, " ", clientes.cliente_sobrenome) as cliente_nome_completo',

		]);

			$this->db->where('conta_receber_status', $conta_receber_status);
			$this->db->join('clientes', 'cliente_id = conta_receber_cliente_id','LEFT');


		if($data_vencimento){
			date_default_timezone_set('America/Fortaleza');

			$this->db->where('conta_receber_data_vencimento <', date('Y-m-d'));

		}
		return $this->db->get('contas_receber')->result();

			

	}

	public function get_sum_contas_receber_relatorios($conta_receber_status = NULL, $data_vencimento = NULL){

			$this->db->select([

					'FORMAT(SUM(REPLACE(conta_receber_valor, ",", "")), 2) as conta_receber_valor_total',

 				]);
			$this->db->where('conta_receber_status', $conta_receber_status);
			
		if($data_vencimento){
			date_default_timezone_set('America/Fortaleza');

			$this->db->where('conta_receber_data_vencimento <', date('Y-m-d'));

		}
		return $this->db->get('contas_receber')->row();

			

	}

}