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

    <div class="form-group row">
        <div class="col-sm-3 mb-3 mb-sm-0">
            <label>Razão social</label>
            <input type="text" name="sistema_razao_social" class="form-control form-control-user" value="<?php echo $sistema->sistema_razao_social ?>" placeholder="Razão Social">
            <?php echo form_error('sistema_razao_social','<small class="form-text text-danger">','</small>'); ?>
        </div>
        <div class="col-sm-3">
            <label>Nome fantasia </label>
            <input type="text" name="sistema_nome_fantasia" class="form-control form-control-user" value="<?php echo $sistema->sistema_nome_fantasia ?>" 
            placeholder="Nome fantasia">
            <?php echo form_error('sistema_nome_fantasia','<small class="form-text text-danger">','</small>'); ?>
        </div>
        <div class="col-sm-3 mb-3 mb-sm-0">
            <label>CNPJ</label>
            <input type="text" name="sistema_cnpj" class="form-control form-control-user cnpj" value="<?php echo $sistema->sistema_cnpj ?>" placeholder="CNPJ">
            <?php echo form_error('sistema_cnpj','<small class="form-text text-danger">','</small>'); ?>
        </div>
        <div class="col-sm-3">
            <label>Inscrição Estadual</label>
            <input type="text" name="sistema_ie" class="form-control form-control-user" value="<?php echo $sistema->sistema_ie ?>" 
            placeholder="Email" >
            <?php echo form_error('sistema_ie','<small class="form-text text-danger">','</small>'); ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3 mb-3 mb-sm-0">
            <label>Telefone</label>
            <input type="text" name="sistema_telefone_fixo" class="form-control form-control-user phone_with_ddd" value="<?php echo $sistema->sistema_telefone_fixo ?>" placeholder="CNPJ">
            <?php echo form_error('sistema_telefone_fixo','<small class="form-text text-danger">','</small>'); ?>
        </div>
        <div class="col-sm-3">
            <label>Celular</label>
            <input type="text" name="sistema_telefone_movel" class="form-control form-control-user phone_with_ddd" value="<?php echo $sistema->sistema_telefone_movel ?>" 
            placeholder="Celular" >
            <?php echo form_error('sistema_telefone_movel','<small class="form-text text-danger">','</small>'); ?>
        </div>
        <div class="col-sm-3 mb-3 mb-sm-0">
            <label>Email</label>
            <input type="email" name="sistema_email" class="form-control form-control-user" value="<?php echo $sistema->sistema_email ?>" placeholder="Email">
            <?php echo form_error('sistema_email','<small class="form-text text-danger">','</small>'); ?>
        </div>
        <div class="col-sm-3">
            <label>Site</label>
            <input type="text" name="sistema_site_url" class="form-control form-control-user" value="<?php echo $sistema->sistema_site_url ?>" 
            placeholder="Celular" >
            <?php echo form_error('sistema_site_url','<small class="form-text text-danger">','</small>'); ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4">
            <label>Endereço</label>
            <input type="text" name="sistema_endereco" class="form-control form-control-user" value="<?php echo $sistema->sistema_endereco ?>" 
            placeholder="Endereço" >
            <?php echo form_error('sistema_endereco','<small class="form-text text-danger">','</small>'); ?>
        </div>
        <div class="col-sm-2 mb-3 mb-sm-0">
            <label>CEP</label>
            <input type="text" name="sistema_cep" class="form-control form-control-user cep" value="<?php echo $sistema->sistema_cep ?>" placeholder="">
            <?php echo form_error('sistema_cep','<small class="form-text text-danger">','</small>'); ?>
        </div>
        <div class="col-sm-2 ">
            <label>Número</label>
            <input type="text" name="sistema_numero" class="form-control form-control-user" value="<?php echo $sistema->sistema_numero ?>" placeholder="Número">
            <?php echo form_error('sistema_numero','<small class="form-text text-danger">','</small>'); ?>
        </div>
        <div class="col-sm-2 mb-3 mb-sm-0">
            <label>Cidade</label>
            <input type="text" name="sistema_cidade" class="form-control form-control-user" value="<?php echo $sistema->sistema_cidade ?>" 
            placeholder="Cidade" >
            <?php echo form_error('sistema_cidade','<small class="form-text text-danger">','</small>'); ?>
        </div>
        <div class="col-sm-2">
            <label>Estado</label>
            <input type="text" name="sistema_estado" class="form-control form-control-user uf" value="<?php echo $sistema->sistema_estado ?>" placeholder="Estado">
            <?php echo form_error('sistema_estado','<small class="form-text text-danger">','</small>'); ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <label>Descriões da empresa</label>
            <textarea name="sistema_txt_ordem_servico" class="form-control form-control-user"><?php echo $sistema->sistema_txt_ordem_servico ?></textarea>
            <?php echo form_error('sistema_txt_ordem_servico','<small class="form-text text-danger">','</small>'); ?>
        </div>
    </div>
    <button class="btn btn-primary mr-2 float-right" style="border-radius: 0;">Salvar</button>
    <a href="<?php echo base_url($this->router->fetch_class()); ?>" title="Voltar" style="border-radius: 0;" class="btn btn-secondary mr-2 float-right "><i class="fas fa-arrow-left mr-1"></i>Voltar</a>
</form>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

