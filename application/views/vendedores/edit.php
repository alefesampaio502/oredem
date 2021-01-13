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
             <p class="text-right mt-3 text-danger"><strong> <i class="fas fa-clock"></i>&nbsp;&nbsp; Última alteração:</strong> <?php echo formata_data_banco_com_hora($vendedores->vendedor_data_alteracao);?></p>
        </div>
        <div class="card-body">

            <form method="post" name="form_edit" class="user">
                 
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
                     <legend class="font-small"><i class="fas fa-user-plus mr-2"></i>Dados do vendedor</legend>


               <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <label>Nome completo</label>
                    <input type="text" name="vendedor_nome_completo" class="form-control form-control-user" value="<?php echo $vendedores->vendedor_nome_completo ?>"placeholder="Razão vendedor">
                    <?php echo form_error('vendedor_nome_completo','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-4">
                    <label>CPF</label>
                    <input type="text" name="vendedor_cpf" class="form-control form-control-user cpf" value="<?php echo $vendedores->vendedor_cpf?>"
                    placeholder="Sobrenome">
                    <?php echo form_error('vendedor_cpf','<small class="form-text text-danger">','</small>'); ?>
                </div>

                     <div class="col-sm-4">
                    <label>RG</label>
                    <input type="text" name="vendedor_rg" class="form-control form-control-user cnpj" value="<?php echo $vendedores->vendedor_rg?>"
                    placeholder="RG" >
                    <?php echo form_error('vendedor_rg','<small class="form-text text-danger">','</small>'); ?>
                </div>
            
            </div>

            <div class="form-group row">
                <div class="col-sm-3 mb-3 mb-sm-0">
                   
                    <label>Telefone</label>
                    
                <input type="text" name="vendedor_telefone" class="form-control form-control-user  phone_with_ddd" value="<?php echo $vendedores->vendedor_telefone ?>" placeholder="Telefone">
                    <?php echo form_error('vendedor_telefone','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-2">
                    <label>Celular</label>
                    <input type="text" name="vendedor_celular" class="form-control form-control-user phone_with_ddd" value="<?php echo $vendedores->vendedor_celular?>"
                    placeholder="Celular">
                    <?php echo form_error('vendedor_celular','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-3 mb-3 mb-sm-0">
                    <label>Email</label>
                    <input type="email" name="vendedor_email" class="form-control form-control-user" value="<?php echo $vendedores->vendedor_email ?>"placeholder="Email">
                    <?php echo form_error('vendedor_email','<small class="form-text text-danger">','</small>'); ?>
                </div>

               
                 <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Telefone Res:</label>
                <input type="text" name="vendedor_telefone" class="form-control form-control-user phone_with_ddd" value="<?php echo $vendedores->vendedor_telefone?>" placeholder="Telefone Residencial">
                    <?php echo form_error('vendedor_telefone','<small class="form-text text-danger">','</small>'); ?>
                </div>
               <div class="col-sm-2 mb-3 mb-sm-0">
                <label>Código do vendedor</label>
                <input type="text" name="vendedor_codigo" class="form-control form-control-user" value="<?php echo $vendedores->vendedor_codigo?>" placeholder="código vendedor">
                    <?php echo form_error('vendedor_contato','<small class="form-text text-danger">','</small>'); ?>
                  
            </div>
                 </fieldset>

<fieldset class="mt-3 border p-2">
                    <legend class="font-small"><i class="fas fa-map-marker-alt mr-2"></i>Endereço é histórico</legend>

                 <div class="form-group row">
                      <div class="col-sm-4">
                    <label>Endereço</label>
                    <input type="text" name="vendedor_endereco" class="form-control form-control-user" value="<?php echo $vendedores->vendedor_endereco ?>"
                    placeholder="Endereço" >
                    <?php echo form_error('vendedor_endereco','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-2">
                    <label>CEP</label>
                    <input type="text" name="vendedor_cep" class="form-control form-control-user cep" value="<?php echo $vendedores->vendedor_cep ?>"
                    placeholder="CEP" >
                    <?php echo form_error('vendedor_cep','<small class="form-text text-danger">','</small>'); ?>
                </div>
                 <div class="col-sm-2 ">
                    <label>Compremento</label>
                    <input type="text" name="vendedor_complemento" class="form-control form-control-user" value="<?php echo $vendedores->vendedor_complemento ?>"placeholder="Compremento">
                    <?php echo form_error('vendedor_complemento','<small class="form-text text-danger">','</small>'); ?>
                </div>
                 
                <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Bairro</label>
                    <input type="text" name="vendedor_bairro" class="form-control form-control-user " value="<?php echo $vendedores->vendedor_bairro ?>"placeholder="Bairro">
                    <?php echo form_error('vendedor_bairro','<small class="form-text text-danger">','</small>'); ?>
                </div>

                <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Número</label>
                    <input type="text" name="vendedor_numero_endereco" class="form-control form-control-user" value="<?php echo $vendedores->vendedor_numero_endereco ?>"placeholder="Número">
                    <?php echo form_error('vendedor_numero_endereco','<small class="form-text text-danger">','</small>'); ?>
                </div>
                
               
                <div class="col-sm-3 mb-3 mt-2 mb-sm-0">
                    <label>Cidade</label>
                    <input type="text" name="vendedor_cidade" class="form-control form-control-user" value="<?php echo $vendedores->vendedor_cidade ?>"
                    placeholder="Cidade" >
                    <?php echo form_error('vendedor_cidade','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-3 mt-2">
                    <label>Estado</label>
                    <input type="text" name="vendedor_estado" class="form-control form-control-user uf" value="<?php echo $vendedores->vendedor_estado ?>"placeholder="Ex: SP">
                    <?php echo form_error('vendedor_estado','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-6 mt-2">
                    <label>Ativo</label>
                    <select class="form-control form-control-ativo" name="vendedor_ativo">
                  <option value="1"<?php echo($vendedores->vendedor_id == 1) ? 'selected':'' ?>>Sim</option>
                  <option value="2"<?php echo($vendedores->vendedor_id == 2) ? 'selected':'' ?>>Não</option>
              </select>
                    
                </div>
                <div class="col-sm-12 mt-2">
                    <label>Histórico do vendedor</label>
                    <textarea name="vendedor_obs" class="form-control form-control-user"><?php echo $vendedores->vendedor_obs ?></textarea>
                    <?php echo form_error('vendedor_obs','<small class="form-text text-danger">','</small>'); ?>
                </div>
                
           
               </div>
           
               
                <input type="hidden" name="vendedor_id" value="<?php echo $vendedores->vendedor_id?>">
               <button class="btn btn-primary mr-2 float-right" style="border-radius: 0;">Salvar</button>
                <a href="<?php echo base_url($this->router->fetch_class()); ?>" title="Voltar" class="btn btn-dark mr-2 float-right" style="border-radius: 0;><i class="fas fa-arrow-left mr-1"></i>Voltar</a>
                </fieldset>
        </form>
    </div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

