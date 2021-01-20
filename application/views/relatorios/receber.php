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
         <form action="" target="_blank" class="user" name="form_receber" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="fas fa-calendar-alt"></i></i>&nbsp;&nbsp;Escolha uma opção</legend>

                        <div class="form-group row pt-3 pl-3">
                            <div class="custom-control custom-radio col offset-md-1 mb-2">
                                <input type="radio" id="customRadio1" name="contas" value="pagas" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="customRadio1">Contas pagas</label>
                            </div>
                            <div class="custom-control custom-radio ml-auto col mb-2">
                                <input type="radio" id="customRadio2" name="contas" value="receber" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Contas a receber</label>
                            </div>
                            <div class="custom-control custom-radio ml-auto col">
                                <input type="radio" id="customRadio3" name="contas" value="vencidas" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3">Contas vencidas</label>
                            </div>

                        </div>

                    </fieldset>


                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm mr-2">Gerar relatório</button>
                    </div>

                </form>
    </div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

