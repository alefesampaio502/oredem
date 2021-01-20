
			/*Inicio Atualização de estoque */ 
				foreach ($vendas_produtos as $venda_p) {
					
				if($venda_p->venda_produto_quantidade < $produto_quantidade[$i]){

				$produto_qtde_estoque = 0;

				$produto_qtde_estoque += intval($produto_quantidade[$i]);

				$diferenca = ($produto_qtde_estoque - $venda_p->venda_produto_quantidade);

				$this->produtos_model->update($produto_id[$i], $diferenca);

		      }

	 }
            	/*Fim  Atualização de estoque */