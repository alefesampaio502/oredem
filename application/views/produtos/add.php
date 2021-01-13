<?php $this->load->view('layout/sidebar'); ?>
<!-- Main Content -->
<div id="content">
  <?php $this->load->view('layout/navbar'); ?>            
  <!-- Begin Page Content -->
  <div class="container-fluid">
   <!-- Page Heading -->
   <!-- DataTales Example -->
   <div class="card shadow mb-2 ">
    <div class="card-header py-0 " style="background-color:#f5f5f5; border-bottom: 1px solid #9e9e9e;">
      <h6 class="m-0 font-weight-bold text-primary float-left mt-3"><?php echo $titulo ?></h6>
      
    </div>
    <div class="card-body">

      <form method="post" name="form_add" class="user">

       <?php if($message = $this->session->flashdata('error')): ?>

        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong class="text-white"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
          </div>                          
        </div>
      <?php endif;?>
      <?php if($message = $this->session->flashdata('sucesso')): ?>

        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong class="text-white"><i class="far fa-smile-beam"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
          </div>                          
        </div>
      <?php endif;?>
      <fieldset class="mt-4 border p-2">
       <legend class="font-small"><i class="fas fa-laptop-house mr-2"></i>Edição do produto</legend>


       <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0 p-2">
          <label>Código interno do produto</label>
          <input type="text" name="produto_codigo" class="form-control form-control-user" value="<?php echo $produto_codigo ?>" readonly="">

        </div>
        <div class="col-sm-8 mb-3 mb-sm-0 p-2">
          <label>Descrição do produto</label>
          <input type="text" name="produto_descricao" class="form-control form-control-user " value="<?php echo set_value('produto_descricao')?>"
          placeholder="Descrição do produto">
          <?php echo form_error('produto_descricao','<small class="form-text text-danger">','</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-3 mb-3 mt-3">
          <label>Marca</label>
          <select class="custom-select" name="produto_marca_id">
            <?php foreach ($marcas as $marca) :?>
              <option  value="<?php echo $marca->marca_id ?>">
                
               <?php echo $marca->marca_nome ?></option>
             <?php endforeach; ?>
           </select>
         </div>

         <div class="col-sm-3 mb-3 mt-3 user">
          <label>Categoria</label>
          <select class="custom-select" name="produto_categoria_id">

            <?php foreach ($categorias as $categoria) :?>
              <option value="<?php echo $categoria->categoria_id ?>">
               
               <?php echo $categoria->categoria_nome ?></option>
             <?php endforeach; ?>

           </select>
         </div>

         <div class="col-sm-3 mb-3 mt-3">
          <label>Fornecedor</label>
          <select class="custom-select" name="produto_fornecedor_id">
           <?php foreach ($fornecedores as $fornecedor) :?>
             <option value="<?php echo $fornecedor->fornecedor_id ?>">
            
             <?php echo $fornecedor->fornecedor_nome_fantasia ?></option>
           <?php endforeach; ?>
         </select>
       </div>

        <div class="col-sm-3 mb-3 mt-3">
          <label>Produto unidade</label>
          <input type="text" name="produto_unidade" class="form-control form-control-user " value="<?php echo set_value('produto_unidade') ?>"
        placeholder="Unidade do produto ">
        <?php echo form_error('produto_unidade','<small class="form-text text-danger">','</small>'); ?>
       </div>
        <div class="col-sm-6 mb-3 mt-3">
          <label>Código de barra</label>
          <input type="text" name="produto_codigo_barras" class="form-control form-control-user " value="<?php echo set_value('produto_codigo_barras')?>"
        placeholder="Código de barra do produto ">
        <?php echo form_error('produto_codigo_barras','<small class="form-text text-danger">','</small>'); ?>
       </div>
        <div class="col-sm-6 mb-3 mt-3">
          <label>Código do Mercosul</label>
          <input type="text" name="produto_ncm" class="form-control form-control-user " value="<?php echo set_value('produto_ncm')?>"
        placeholder="Código de barra Comum do Mercosul ">
        <?php echo form_error('produto_ncm','<small class="form-text text-danger">','</small>'); ?>
       </div>
      </div>
    </fieldset>



      <fieldset class="mt-4 border p-2">
       <legend class="font-small"><i class="fas fa-funnel-dollar mr-2"></i>Precificação e estoque</legend>
      <div class="form-group row">

       <div class="col-sm-3">
        <label>Preço de custo</label>
        <input type="text" name="produto_preco_custo" class="form-control form-control-user money" value="<?php echo set_Value('produto_preco_custo')?>"
        placeholder="Preço de custo do produto">
        <?php echo form_error('produto_preco_custo','<small class="form-text text-danger">','</small>'); ?>
      </div>
     <div class="col-sm-3">
        <label>Preço de venda</label>
        <input type="text" name="produto_preco_venda" class="form-control form-control-user money" value="<?php set_value( 'produto_preco_venda')?>"
        placeholder="Preço de Venda do produto">
        <?php echo form_error('produto_preco_venda','<small class="form-text text-danger">','</small>'); ?>
      </div>

      <div class="col-sm-3">
        <label>Estoque mínimo</label>
        <input type="number" name="produto_estoque_minimo" class="form-control form-control-user money" value="<?php echo set_value('produto_estoque_minimo')?>"
        placeholder="Estoque mínimo do produto">
        <?php echo form_error('produto_estoque_minimo','<small class="form-text text-danger">','</small>'); ?>
      </div>
      <div class="col-sm-3">
        <label>Quantidade em estoque</label>
        <input type="number" name="produto_qtde_estoque" class="form-control form-control-user money" value="<?php echo set_value('produto_qtde_estoque')?>"
        placeholder="Quantidade em estoque">
        <?php echo form_error('produto_qtde_estoque','<small class="form-text text-danger">','</small>'); ?>
      </div>

    <div class="col-sm-4 mt-3">
      <label>Ativo</label>
      <select class="form-control form-control-ativo" name="produto_ativo">
        <option value="1">Sim</option>
        <option value="2">Não</option>
      </select>

    </div>
    <div class="col-sm-8 mt-3">
      <label>Histórico do produto</label>
      <textarea name="produto_obs" class="form-control form-control-user"><?php echo set_value('produto_obs')?></textarea>
      <?php echo form_error('produto_obs','<small class="form-text text-danger">','</small>'); ?>
    </div>
</div>
    <div class="mb-3 mt-3">
      
      <button class="btn btn-primary mr-2 float-right" style="border-radius: 0;">Salvar</button>
      <a href="<?php echo base_url($this->router->fetch_class()); ?>" title="Voltar" class="btn btn-dark mr-2 float-right" style="border-radius: 0;><i class="fas fa-arrow-left mr-1"></i>Voltar</a></div>
    </fieldset>
  </form>
</div>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

