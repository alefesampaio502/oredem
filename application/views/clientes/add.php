<?php $this->load->view('layout/sidebar'); ?>
<!-- Main Content -->
<div id="content">
    <?php $this->load->view('layout/navbar'); ?>            
    <!-- Begin Page Content -->
    <div class="container-fluid">
       <!-- Page Heading -->
       <!-- DataTales Example -->
       <div class="card shadow mb-4 ">
        <div class="card-header py-3 " style="background-color:#f5f5f5; border-bottom: 1px solid #9e9e9e;">
            <h6 class="m-0 font-weight-bold text-primary float-left mt-2"><?php echo $titulo ?></h6>
        </div>
        <div class="card-body">
            <form method="post" name="form_add" class="user">
             <div class="custom-control custom-radio custom-control-inline  mb-1 mr-2">
                <input type="radio" id="pessoa_fisica" name="cliente_tipo" class="custom-control-input" value="1" <?php echo set_checkbox('cliente_tipo', '1') ?> checked="">
                <label class="custom-control-label pt-1" for="pessoa_fisica">Pessoa física</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline mb-1 mr-5">
                <input type="radio" id="pessoa_juridica" name="cliente_tipo" class="custom-control-input" value="2" <?php echo set_checkbox('cliente_tipo', '2') ?> >
                <label class="custom-control-label pt-1" for="pessoa_juridica">Pessoa jurídica</label>
            </div>
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
        <legend class="font-small"><i class="fas fa-truck mr-2"></i>&nbsp;Dados pessoais</legend>
        <div class="form-group row">
            <div class="col-sm-4 ">
                <label>Nome</label>
                <input type="text" name="cliente_nome" class="form-control form-control-user" value="<?php echo set_value('cliente_nome') ?>" placeholder="Razão Social">
                <?php echo form_error('cliente_nome','<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-sm-4">
                <label>Sobrenome </label>
                <input type="text" name="cliente_sobrenome" class="form-control form-control-user" value="<?php echo set_value('cliente_sobrenome') ?>"
                placeholder="Nome fantasia">
                <?php echo form_error('cliente_sobrenome','<small class="form-text text-danger">','</small>'); ?>
            </div>

            <div class="col-sm-4 mb-3">
                <div class="pessoa_fisica">
                    <label>CPF</label>
                    <input type="text" name="cliente_cpf" class="form-control form-control-user cpf" value="<?php echo set_value('cliente_cpf');?>" placeholder="CPF do cliente">
                </div>

                <div class="pessoa_juridica">
                    <label>CNPJ</label>
                    <input type="text" name="cliente_cnpj" class="form-control form-control-user cnpj" value="<?php echo set_value('cliente_cnpj');?>" placeholder="CNPJ do cliente">
                </div>
            </div>
            
            <div class="col-sm-2">

                <label class="pessoa_fisica">RG:</label>
                <label class="pessoa_juridica">Inscrições Estaduais:</label>
                <input type="text" name="cliente_rg_ie" class="form-control form-control-user" value="<?php echo set_value('cliente_rg_ie'); ?>">
                <?php echo form_error('cliente_rg_ie','<small class="form-text text-danger">','</small>'); ?>
            </div>

            <div class="col-sm-2">
                <label>Celular</label>
                <input type="text" name="cliente_celular" class="form-control form-control-user phone_with_ddd" 
                value="<?php echo set_value('cliente_celular')?>" placeholder="Celular">
                <?php echo form_error('cliente_celular','<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0">
                <label>Email</label>
                <input type="email" name="cliente_email" class="form-control form-control-user" value="<?php echo set_value('cliente_email') ?>" placeholder="Email">
                <?php echo form_error('cliente_email','<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-sm-2">
                <label>Site</label>
                <input type="text" name="sistema_site_url" class="form-control form-control-user" value="<?php echo set_value('sistema_site_url') ?>" placeholder="Site">
                <?php echo form_error('sistema_site_url','<small class="form-text text-danger">','</small>'); ?>
            </div>

            <div class="col-sm-2 mb-3 mb-sm-0">
                <label>Telefone Res:</label>
                <input type="text" name="cliente_telefone" class="form-control form-control-user phone_with_ddd" value="<?php echo set_value('cliente_telefone') ?>" placeholder="Telefone Residencial">
                <?php echo form_error('cliente_telefone','<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-sm-2 ">
                <label>Data Nascimento</label>
                <input type="date" name="cliente_data_nascimento" class="form-control form-control-date" value="<?php echo set_value('cliente_data_nascimento');?>" placeholder="Nascimento">

                <?php echo form_error('cliente_data_nascimento','<small class="form-text text-danger">','</small>'); ?>
            </div>

        </div>
    </fieldset>

    <fieldset class="mt-3 border p-2">
        <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;Endereço é histórico</legend>

        <div class="form-group row">

            <div class="col-sm-4">
                <label>Endereço</label>
                <input type="text" name="cliente_endereco" class="form-control form-control-user" value="<?php echo set_value('cliente_endereco') ?>"
                placeholder="Endereço" >
                <?php echo form_error('cliente_endereco','<small class="form-text text-danger">','</small>'); ?>
            </div>

            <div class="col-sm-2 mb-3">
                <label>CEP</label>
                <input type="text" name="cliente_cep" class="form-control form-control-user cep" value="<?php echo set_value('cliente_cep') ?>"
                placeholder="CEP" >
                <?php echo form_error('cliente_cep','<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-sm-2 mb-3">
                <label>Bairro</label>
                <input type="text" name="cliente_bairro" class="form-control form-control-user " value="<?php echo set_value('cliente_bairro') ?>"
                placeholder="Bairro do cliente" >
                <?php echo form_error('cliente_bairro','<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0">
                <label>Número</label>
                <input type="text" name="cliente_numero_endereco" class="form-control form-control-user cep" value="<?php echo set_value('cliente_numero_endereco') ?>" placeholder="Número">
                <?php echo form_error('cliente_numero_endereco','<small class="form-text text-danger">','</small>'); ?>
            </div>

            <div class="col-sm-2 ">
                <label>Compremento</label>
                <input type="text" name="cliente_complemento" class="form-control form-control-user" value="<?php echo set_value('cliente_complemento') ?>" placeholder="Compremento">
                <?php echo form_error('cliente_complemento','<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0">
                <label>Cidade</label>
                <input type="text" name="cliente_cidade" class="form-control form-control-user" value="<?php echo set_value('cliente_cidade') ?>" 
                placeholder="Cidade" >
                <?php echo form_error('cliente_cidade','<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-sm-3 mb-3">
                <label>Estado</label>
                <input type="text" name="cliente_estado" class="form-control form-control-user uf" value="<?php echo set_value('cliente_estado') ?>" placeholder="Estado">
                <?php echo form_error('cliente_estado','<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-sm-6">
                <label>Ativo</label>
                <select class="form-control form-control-ativo" name="cliente_ativo">
                  <option value="1" class="text-success">Sim</option>
                  <option value="2">Não</option>
              </select>

          </div>
          <div class="col-sm-12">
            <label>Histórico do cliente</label>
            <textarea name="sistema_txt_ordem_servico" class="form-control form-control-user"><?php echo set_value('sistema_txt_ordem_servico')?></textarea>
            <?php echo form_error('sistema_txt_ordem_servico','<small class="form-text text-danger">','</small>'); ?>
        </div>
    </div>
    <button class="btn btn-primary mr-2 float-right" style="border-radius: 0;">Salvar</button>
    <a href="<?php echo base_url($this->router->fetch_class()); ?>" title="Voltar" style="border-radius: 0;" class="btn btn-secondary mr-2 float-right "><i class="fas fa-arrow-left mr-1"></i>Voltar</a>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

