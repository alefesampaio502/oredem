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
<form class="user" action="" id="form"name="form_add"enctype="multipart/form-data" method="post"accept-charset="utf-8">
        <fieldset id="vendas" class="mt-4 border p-2 ">
                   <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;&nbsp;Escolha os serviços</legend>
                        <div class="form-group row">
                            <div class="ui-widget col-lg-12 mb-1 mt-1">
                                <input id="buscar_servicos" class="search form-control form-control-lg col-lg-12" placeholder="Que serviço você está buscando?">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="table_servicos" class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="" style="width: 55%">Serviço</th>
                                        <th class="text-right pr-2" style="width: 12%">Valor unitário</th>
                                        <th class="text-center" style="width: 8%">Qty</th>
                                        <th class="" style="width: 8%">% Desc</th>
                                        <th class="text-right pr-2" style="width: 15%">Total</th>
                                        <th class="" style="width: 25%"></th>
                                        <th class="" style="width: 25%"></th>
                                    </tr>
                                </thead>
                                <tbody id="lista_servicos" class="">

                                </tbody>
                                <tfoot >
                                    <tr class="">
                                        <td colspan="5" class="text-right border-0">
                                            <label class="font-weight-bold pt-1" for="total">Valor de desconto:</label>
                                        </td>
                                        <td class="text-right border-0">
                                            <input type="text" name="ordem_servico_valor_desconto" class="form-control form-control-user text-right pr-1" data-format="$ 0,0.00" data-cell="L1" data-formula="SUM(H1:H5)" readonly="">
                                        </td>
                                        <td class="border-0">&nbsp;</td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="5" class="text-right border-0">
                                            <label class="font-weight-bold pt-1" for="total">Total a pagar:</label>
                                        </td>
                                        <td class="text-right border-0">
                                            <input type="text" name="ordem_servico_valor_total" class="form-control form-control-user text-right pr-1" data-format="$ 0,0.00" data-cell="G2" data-formula="SUM(F1:F5)" readonly="">
                                        </td>
                                        <td class="border-0">&nbsp;</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </fieldset>   
                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="far fa-list-alt"></i>&nbsp;&nbsp;Dados da ordem</legend>

                        <div class="">
                            <div class="form-group row">

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Escolha o cliente <span class="text-danger">*</span></label>
                                    <select class="custom-select contas_receber" name="ordem_servico_cliente_id" required="">
                                        <option value="">Escolha</option>
                                        <?php foreach ($clientes as $cliente): ?>
                                            <option value="<?php echo $cliente->cliente_id; ?>"><?php echo $cliente->cliente_nome . ' ' . $cliente->cliente_sobrenome . ' | CPF ou CNPJ: ' . $cliente->cliente_cpf_cnpj; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('ordem_servico_cliente_id', '<div class="text-danger small">', '</div>') ?>
                                </div>


                                <div class="col-md-6">
                                    <label class="small my-0">Status da ordem <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="ordem_servico_status">
                                        <option value="0" selected="">Aberta</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Equipamento <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo set_value('ordem_servico_equipamento'); ?>" name="ordem_servico_equipamento" required="">
                                    <?php echo form_error('ordem_servico_equipamento', '<div class="text-danger small">', '</div>') ?>
                                </div>

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Marca <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo set_value('ordem_servico_marca_equipamento'); ?>" name="ordem_servico_marca_equipamento" required="">
                                    <?php echo form_error('ordem_servico_marca_equipamento', '<div class="text-danger small">', '</div>') ?>
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Modelo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo set_value('ordem_servico_modelo_equipamento'); ?>" name="ordem_servico_modelo_equipamento" required="">
                                    <?php echo form_error('ordem_servico_modelo_equipamento', '<div class="text-danger small">', '</div>') ?>
                                </div>

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Acessórios <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo set_value('ordem_servico_acessorios'); ?>" name="ordem_servico_acessorios" required="">
                                    <?php echo form_error('ordem_servico_acessorios', '<div class="text-danger small">', '</div>') ?>
                                </div>

                            </div>
                            <div class="form-group row">

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Defeitos <span class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control form-control-user" value="<?php echo set_value('ordem_servico_defeito'); ?>" name="ordem_servico_defeito" required=""></textarea>
                                    <?php echo form_error('ordem_servico_defeito', '<div class="text-danger small">', '</div>') ?>
                                </div>   

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Observações <span class="text-danger"></span></label>
                                    <textarea type="text" class="form-control form-control-user" value="<?php echo set_value('ordem_servico_obs'); ?>" name="ordem_servico_obs"></textarea>
                                </div>     

                            </div>

                        </div>

                    </fieldset>

                    <div class="mt-3 float-right mr-4">
                          <a href="<?php echo base_url('os'); ?>" class="btn btn-secondary btn-sm">Voltar</a>
                        <button class="btn btn-primary btn-sm mr-2" id="btn-cadastrar-venda" form="form">Cadastrar</button>
                      
                    </div>

                </form>


    </div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

