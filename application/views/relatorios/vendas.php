<?php $this->load->view('layout/sidebar'); ?>
<!-- Main Content -->
<div id="content">
    <?php $this->load->view('layout/navbar'); ?>            
    <!-- Begin Page Content -->
    <div class="container-fluid">
       <!-- Page Heading -->
       <!-- DataTales Example -->
       <div class="card shadow mb-2 ">
        <div class="card-header py-2 " style="background-color:#f5f5f5; border-bottom: 1px solid #9e9e9e;">
            <h6 class="m-0 font-weight-bold text-primary float-left mt-3"><?php echo $titulo ?></h6>
            <p></p>
        </div>
        <div class="card-body">
          
                       <?php if($message = $this->session->flashdata('info')): ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong class="text-dark"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                          <button type="button" class="close " data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-dark">&times;</span>
                          </button>
                        </div>            
                        </div>                          
                        </div>
                       <?php endif;?>
           <form action="" class="user" name="form_vendas" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-calendar-alt"></i></i>&nbsp;&nbsp;Escolhas as datas</legend>

                        <div class="form-group row">

                            <div class="col-sm-6 mb-1 mb-sm-0">
                                <label class="small my-0">Data inicial</label>
                                <input type="date" class="form-control form-control-user-date" name="data_inicial" required="">
                            </div>

                            <div class="col-sm-6 mb-1 mb-sm-0">
                                <label class="small my-0">Data final</label>
                                <input type="date" class="form-control form-control-user-date" name="data_final">
                            </div>

                        </div>

                    </fieldset>

                    <div class="mt-3">
                        <button class="btn btn-primary mr-2 float-right" style="border-radius: 0;">Gerar relatório</button>
                    </div>

                </form>
    </div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

