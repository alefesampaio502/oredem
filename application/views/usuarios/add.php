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
               <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Nome</label>
                    <input type="text" name="first_name" class="form-control form-control-user" value="<?php echo set_value('first_name'); ?>" placeholder="Nome">
                    <?php echo form_error('first_name','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-6">
                    <label>Sobrenome</label>
                    <input type="text" name="last_name" class="form-control form-control-user" value="<?php echo set_value('last_name'); ?>" 
                    placeholder="Last Name">
                    <?php echo form_error('last_name','<small class="form-text text-danger">','</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Login</label>
                    <input type="text" name="username" class="form-control form-control-user" value="<?php echo set_value('username'); ?>" placeholder="Login">
                    <?php echo form_error('username','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <div class="col-sm-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control form-control-user" value="<?php echo set_value('email'); ?>" 
                    placeholder="Email" >
                    <?php echo form_error('email','<small class="form-text text-danger">','</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
             <div class="col-sm-6 mb-3 mb-sm-0">
                <label>Perfil</label>
                <select class="form-control form-control-ativo" name="perfil_usuario">
                    <option value="1">Administrador</option>
                    <option value="2">Vendedor</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Ativo</label>
                <select class="form-control form-control-ativo" name="active">
                  <option value="1">Sim</option>
                  <option value="2">Não</option>
              </select>
          </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Senha</label>
            <input type="password" name="password" class="form-control form-control-user"
            placeholder="Senha">
            <?php echo form_error('password','<small class="form-text text-danger">','</small>'); ?>
        </div>
        <div class="col-sm-6">
            <label>Comfirma a senha</label>
            <input type="password" name="confirmar_password" class="form-control form-control-user"
            placeholder="Repita a Senha">
            <?php echo form_error('confirmar_password','<small class="form-text text-danger">','</small>'); ?>
        </div>
        
    </div>
     <button class="btn btn-primary mr-2 float-right" style="border-radius: 0;">Salvar</button>
    <a href="<?php echo base_url($this->router->fetch_class()); ?>" style="border-radius: 0;" title="Voltar" class="btn btn-dark mr-2 float-right" style="border-radius: 0;><i class="fas fa-arrow-left mr-1"></i>Voltar</a>
</form>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

