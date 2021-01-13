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
             <p class="text-right mt-3 text-dark"><strong> <i class="fas fa-clock"></i></p>
        </div>
        <div class="card-body">
<div class="row">
    <div class="col-md-4">
         <a href="<?php echo base_url('os/pdf/' .$ordem_servico->ordem_servico_id);?>" class="btn btn-lg btn-dark"> <i class="fas fa-print mr-2"></i>Gerar impressão</a>
    </div>
    <div class="col-md-4">
         <a href="<?php echo base_url('os/add');?>" class="btn btn-lg btn-success"><i class="fas fa-shopping-basket mr-2"></i>Nova orde de serviço</a>
    </div>
    <div class="col-md-4">
         <a href="<?php echo base_url('os');?>" class="btn btn-lg btn-dark"> <i class="fas fa-list-ol mr-2"></i>Listagen de ordem</a>
    </div>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

