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
                     <legend class="font-small"><i class="fas fa-laptop-house mr-2"></i>Dados do Serviços</legend>


               <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Nome da marca</label>
                    <input type="text" name="marca_nome" class="form-control form-control-user" value="<?php echo set_value('marca_nome') ?>"placeholder="Nome da marca">
                    <?php echo form_error('marca_nome','<small class="form-text text-danger">','</small>'); ?>
                </div>
                
                <div class="col-sm-6 mb-3">
                    <label>Ativo</label>
                    <select class="form-control form-control-ativo" name="marca_ativa">
                  <option value="1">Sim</option>
                  <option value="2">Não</option>
              </select>
                    
                </div>
               
                </div>
           
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

