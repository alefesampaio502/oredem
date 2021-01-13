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
       <legend class="font-small"><i class="fas fa-dollar-sign mr-2"></i></i>Cadastro de contas</legend>

       <div class="form-group row">
         <div class="col-sm-6 mb-3 ">
           <label>Fornecedor</label>
           <select class="custom-select contas_pagar" name="conta_pagar_fornecedor_id">
             <?php foreach ($fornecedores as $fornecedor) :?>
               <option value="<?php echo $fornecedor->fornecedor_id ?>">
                
                <?php echo $fornecedor->fornecedor_nome_fantasia ?></option>
              <?php endforeach; ?>
            </select>
            <?php echo form_error('conta_pagar_fornecedor_id','<small class="form-text text-danger">','</small>'); ?>
          </div>

          <div class="col-sm-2 mb-3">
            <label>Data de vencimento</label>
            <input type="date" name="conta_pagar_data_vencimento" class="form-control form-control-user-date" value="<?php set_value('conta_pagar_data_vencimento')?>">
            <?php echo form_error('conta_pagar_data_vencimento','<small class="form-text text-danger">','</small>'); ?>
          </div>

          <div class="col-sm-2 mb-3">
            <label>Valor da conta</label>
            <input type="text" name="conta_pagar_valor" class="form-control form-control-user-date money2" value="<?php set_value('conta_pagar_valor')?>">
            <?php echo form_error('conta_pagar_valor','<small class="form-text text-danger">','</small>'); ?>
          </div>
          <div class="col-sm-2 mb-3">
           <label>Situação</label>
           <select class="custom-select" name="conta_pagar_status">
             <option value="1">Paga</option>
             <option value="2">Pendente</option>
           </select>
         </div>
       </div>
       <div class="form-group row  mb-3">
        <div class="col-sm-12 mb-3">
          <label>Histórico da conta</label>
          <textarea class="form-control" name="conta_pagar_obs" placeholder="Histórico da conta"><?php set_value('conta_pagar_obs')?></textarea>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="mb-3 mt-3">
    
<button class="btn btn-primary mr-2 float-right" style="border-radius: 0;">Salvar</button>
    <a href="<?php echo base_url($this->router->fetch_class()); ?>" title="Voltar" class="btn btn-dark mr-2 float-right" style="border-radius: 0;><i class="fas fa-arrow-left mr-1"></i>Voltar</a></div>

  </form>
</div>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

