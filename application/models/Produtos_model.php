<?php  defined('BASEPATH') OR exit('Acesso não e permitido');


class Produtos_model extends CI_Model {

public function get_all(){

//metodo join e mesmo que associação de varias tabelas 
	$this->db->select([


									'produtos.*',
									'categorias.categoria_id',
									'categorias.categoria_nome as produto_categoria',
									'marcas.marca_id',
									'marcas.marca_nome as produto_marca',
									'fornecedores.fornecedor_id',
									'fornecedores.fornecedor_nome_fantasia as produto_fornecedor',

												]);	

							$this->db->join('categorias','categoria_id = produto_categoria_id','LEFT');
							$this->db->join('marcas','marca_id = produto_marca_id','LEFT');
							$this->db->join('fornecedores','fornecedor_id = fornecedor_id','LEFT');

							return $this->db->get('produtos')->result();


}


}
