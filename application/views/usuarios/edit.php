<?php $this->load->view('layout/sidebar'); ?>
<!-- Main Content -->
<div id="content">
    <?php $this->load->view('layout/navbar'); ?>            
    <!-- Begin Page Content -->
    <div class="container-fluid">
       <!-- Page Heading -->
       <!-- DataTales Example -->
       <div class="card shadow mb-2 ">
        <div class="card-header py-0"style="background-color:#f5f5f5; border-bottom: 1px solid #9e9e9e;">
            <h6 class="m-0 font-weight-bold text-primary float-left mt-2"><?php echo $titulo ?></h6>
            <p class="text-right mt-3 text-danger"><strong><i class="fas fa-clock"></i>&nbsp;&nbsp; Servidor:</strong> <?php echo $usuario->ip_address ?></p>
        </div>
        <div class="card-body">
            <form method="post" name="form_edit" class="user">

                <fieldset class="mt-4 border p-2">
                    <legend class="font-small"><i class="fas fa-users-cog xl-2"></i>&nbsp;Dados do usuário</legend>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Nome</label>
                            <input type="text" name="first_name" class="form-control form-control-user" value="<?php echo $usuario->first_name ?>" placeholder="Nome">
                            <?php echo form_error('first_name','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <label>Sobrenome</label>
                            <input type="text" name="last_name" class="form-control form-control-user" value="<?php echo $usuario->last_name ?>" 
                            placeholder="Last Name">
                            <?php echo form_error('last_name','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Login</label>
                            <input type="text" name="username" class="form-control form-control-user" value="<?php echo $usuario->username ?>" placeholder="Login">
                            <?php echo form_error('username','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control form-control-user" value="<?php echo $usuario->email ?>" 
                            placeholder="Email">
                            <?php echo form_error('email','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                     <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Perfil</label>
                        <select class="form-control form-control-ativo" name="perfil_usuario">
                            <option value="1"<?php echo(@$perfil_usuario->id == 1) ? 'selected':'' ?>>Administrador</option>
                            <option value="2"<?php echo(@$perfil_usuario->id == 2) ? 'selected':'' ?>>Vendedor</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Ativo</label>
                        <select class="form-control form-control-ativo" name="active">
                          <option value="1"<?php echo($usuario->active == 1) ? 'selected':'' ?>>Sim</option>
                          <option value="2"<?php echo($usuario->active == 2) ? 'selected':'' ?>>Não</option>
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
                    <?php echo form_error('confirmar','<small class="form-text text-danger">','</small>'); ?>
                </div>
                <input type="hidden" name="usuario_id" value="<?php echo $usuario->id ?>">
            </div>
            
            <button class="btn btn-primary mr-2 float-right" style="border-radius: 0;">Salvar</button>
            <a href="<?php echo base_url($this->router->fetch_class()); ?>"style="border-radius: 0;" title="Voltar" class="btn btn-dark mr-2 float-right" style="border-radius: 0;><i class="fas fa-arrow-left mr-1"></i>Voltar</a>
        </fieldset>  
    </form>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

