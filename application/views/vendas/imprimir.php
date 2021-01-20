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
            <h6 class="m-0 font-weight-bold text-primary float-left mt-3 mb-3"><?php echo $titulo ?></h6>
       
        </div>

        <div class="card-body">
            <div class="">
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
                   </div>
<div class="row">
    <div class="col-md-4">
         <a href="<?php echo base_url('vendas/pdf/' .$venda->venda_id);?>" class="btn btn-lg btn-dark"> <i class="fas fa-print mr-2"></i>Imprimir venda</a>
    </div>
    <div class="col-md-4">
         <a href="<?php echo base_url('vendas/add');?>" class="btn btn-lg btn-success"><i class="fas fa-shopping-basket mr-2"></i>Nova venda</a>
    </div>
    <div class="col-md-4">
         <a href="<?php echo base_url('vendas');?>" class="btn btn-lg btn-dark"> <i class="fas fa-list-ol mr-2"></i>Listagen de venda</a>
    </div>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

