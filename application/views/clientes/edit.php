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
             <p class="text-right mt-3 text-danger"><strong> <i class="fas fa-clock"></i>&nbsp;&nbsp; Última alteração:</strong> <?php echo formata_data_banco_com_hora($clientes->cliente_data_alteracao);?></p>
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
                    <legend class="font-small"><i class="fas fa-user-tie"></i>&nbsp;Dados pessoais</legend>


               <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <label>Nome</label>
                    <input type="text" name="cliente_nome" class="form-control form-control-user" value="<?php echo $clientes->cliente_nome ?>"placeholder="Razão Social">
                    <?php echo form_error('cliente_nome','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-4">
                    <label>Sobrenome </label>
                    <input type="text" name="cliente_sobrenome" class="form-control form-control-user" value="<?php echo $clientes->cliente_sobrenome ?>"
                    placeholder="Sobrenome">
                    <?php echo form_error('cliente_sobrenome','<small class="form-text text-danger">','</small>'); ?>
                </div>

                <?php if($clientes->cliente_tipo == 1):?>
                <div class="col-sm-4">
                    <label>CPF</label>
                    <input type="text" name="cliente_cpf" class="form-control form-control-user cpf" value="<?php echo $clientes->cliente_cpf_cnpj ?>"
                    placeholder="CPF do cliente" >
                    <?php echo form_error('cliente_cpf','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <?php else: ?>
                     <div class="col-sm-4">
                    <label>CNPJ</label>
                    <input type="text" name="cliente_cnpj" class="form-control form-control-user cnpj" value="<?php echo $clientes->cliente_cpf_cnpj ?>"
                    placeholder="CNPJ do cliente" >
                    <?php echo form_error('cliente_cnpj','<small class="form-text text-danger">','</small>'); ?>
                </div>
            <?php endif; ?>

            </div>

            <div class="form-group row">
                <div class="col-sm-3 mb-3 mb-sm-0">
                    <?php if($clientes->cliente_tipo == 1):?>
                    <label>RG:</label>
                    <?php else: ?>
                    <label>Inscrição Estadual:</label>
                    <?php endif; ?>
                    <input type="text" name="cliente_rg_ie" class="form-control form-control-user " value="<?php echo $clientes->cliente_rg_ie ?>"placeholder="<?php echo ($clientes->cliente_tipo == 1 ? 'RG do cliente' : 'Inscrição Estadual do cliente'); ?>">
                    <?php echo form_error('cliente_rg_ie','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-2">
                    <label>Celular</label>
                    <input type="text" name="cliente_celular" class="form-control form-control-user phone_with_ddd" value="<?php echo $clientes->cliente_celular ?>"
                    placeholder="Celular" >
                    <?php echo form_error('cliente_celular','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-3 mb-3 mb-sm-0">
                    <label>Email</label>
                    <input type="email" name="cliente_email" class="form-control form-control-user" value="<?php echo $clientes->cliente_email ?>"placeholder="Email">
                    <?php echo form_error('cliente_email','<small class="form-text text-danger">','</small>'); ?>
                </div>

               
                 <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Telefone Res:</label>
                    <input type="text" name="cliente_telefone" class="form-control form-control-user phone_with_ddd" value="<?php echo $clientes->cliente_telefone ?>"placeholder="Telefone Residencial">
                    <?php echo form_error('cliente_telefone','<small class="form-text text-danger">','</small>'); ?>
                </div>
               <div class="col-sm-2 mb-3 mb-sm-0">
                  <label>Data Nascimento</label>
                    <input type="date" name="cliente_data_nascimento" class="form-control form-control-date" value="<?php echo $clientes->cliente_data_nascimento ?>"placeholder="Nascimento">
                    <?php echo form_error('cliente_data_nascimento','<small class="form-text text-danger">','</small>'); ?>
                </div>

            </div>
                 </fieldset>

<fieldset class="mt-3 border p-2">
                    <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;Endereço é histórico</legend>

                 <div class="form-group row">
                      <div class="col-sm-4">
                    <label>Endereço</label>
                    <input type="text" name="cliente_endereco" class="form-control form-control-user" value="<?php echo $clientes->cliente_endereco ?>"
                    placeholder="Endereço" >
                    <?php echo form_error('cliente_endereco','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-2">
                    <label>CEP</label>
                    <input type="text" name="cliente_cep" class="form-control form-control-user cep" value="<?php echo $clientes->cliente_cep ?>"
                    placeholder="CEP" >
                    <?php echo form_error('cliente_cep','<small class="form-text text-danger">','</small>'); ?>
                </div>
                 <div class="col-sm-2 ">
                    <label>Compremento</label>
                    <input type="text" name="cliente_complemento" class="form-control form-control-user" value="<?php echo $clientes->cliente_complemento ?>"placeholder="Compremento">
                    <?php echo form_error('cliente_complemento','<small class="form-text text-danger">','</small>'); ?>
                </div>
                 
                <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Bairro</label>
                    <input type="text" name="cliente_bairro" class="form-control form-control-user " value="<?php echo $clientes->cliente_bairro ?>"placeholder="Bairro">
                    <?php echo form_error('cliente_bairro','<small class="form-text text-danger">','</small>'); ?>
                </div>

                <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Número</label>
                    <input type="text" name="cliente_numero_endereco" class="form-control form-control-user" value="<?php echo $clientes->cliente_numero_endereco ?>"placeholder="Número">
                    <?php echo form_error('cliente_numero_endereco','<small class="form-text text-danger">','</small>'); ?>
                </div>
                
               
                <div class="col-sm-3 mb-3 mt-2 mb-sm-0">
                    <label>Cidade</label>
                    <input type="text" name="cliente_cidade" class="form-control form-control-user" value="<?php echo $clientes->cliente_cidade ?>"
                    placeholder="Cidade" >
                    <?php echo form_error('cliente_cidade','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-3 mt-2">
                    <label>Estado</label>
                    <input type="text" name="cliente_estado" class="form-control form-control-user uf" value="<?php echo $clientes->cliente_estado ?>"placeholder="Ex: SP">
                    <?php echo form_error('cliente_estado','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-6 mt-2">
                    <label>Ativo</label>
                    <select class="form-control form-control-ativo" name="cliente_ativo">
                  <option value="1"<?php echo($clientes->cliente_id == 1) ? 'selected':'' ?>>Sim</option>
                  <option value="2"<?php echo($clientes->cliente_id == 2) ? 'selected':'' ?>>Não</option>
              </select>
                    
                </div>
                <div class="col-sm-12 mt-2">
                    <label>Histórico do cliente</label>
                    <textarea name="cliente_obs" class="form-control form-control-user"><?php echo $clientes->cliente_obs ?></textarea>
                    <?php echo form_error('cliente_obs','<small class="form-text text-danger">','</small>'); ?>
                </div>
                
           
               </div>
           
               <input type="hidden" name="cliente_tipo" value="<?php echo $clientes->cliente_tipo?>">
                <input type="hidden" name="cliente_id" value="<?php echo $clientes->cliente_id?>">
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

