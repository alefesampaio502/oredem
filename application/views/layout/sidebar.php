

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('home') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                   
                </div>
                <div class="sidebar-brand-text mx-3">Optimus loja</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Módulo
            </div>

                    <!-- Nav Item - Vendas Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTv"
                    aria-expanded="true" aria-controls="collapseTwo">
                   <i class="fas fa-shopping-cart mr-1"></i>
                    <span>Vendas</span>
                </a>
                <div id="collapseTv" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Escolha uma opção</h6>
                       
                         <a class="collapse-item" title="Gerenciar Vendas" href="<?php echo base_url('vendas');?>"> <i class="fas fa-shopping-cart mr-1"></i>Gerenciar vendas</a><a class="collapse-item" title="Gerenciar clientes" href="<?php echo base_url('os');?>"> <i class="fas fa-shopping-basket mr-2 text-gray-900"></i>Ordem Serviços</a>
                            
                    </div>
                </div>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user-tie mr-1"></i>
                    <span>Cadastros</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Escolha uma opção</h6>
                       
                         <a class="collapse-item" title="Gerenciar clientes" href="<?php echo base_url('clientes');?>"> <i class="fas fa-user-tie mr-2"></i>Clientes</a>
                         
                        <a class="collapse-item" title="Gerenciar fornecedores" href="<?php echo base_url('fornecedores');?>"><i class="fas fa-truck mr-2"></i></i>Fornecedores</a>  
                            

                          <a class="collapse-item" title="Gerenciar usuários" href="<?php echo base_url('usuarios');?>"><i class="fas fa-users mr-2"></i></i>Usuários</a>
                           

                          <a class="collapse-item" title="Gerenciar vendedores" href="<?php echo base_url('vendedores');?>"> <i class="fas fa-user-tie mr-2"></i>Vendedores</a>
                          

                           <a class="collapse-item" title="Gerenciar serviços" href="<?php echo base_url('servicos');?>"> <i class="fas fa-laptop mr-2"></i>Serviços</a>
                            
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                  <i class="fas fa-database"></i>
                    <span>Estoque</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Escolha uma opção</h6>
                        <a class="collapse-item" href="<?php echo base_url('marcas');?>"><i class="fas fa-boxes mr-2"></i>Marcas</a>
                         <a class="collapse-item" href="<?php echo base_url('produtos');?>"><i class="fab fa-artstation mr-2"></i>Produtos</a>
                        <a class="collapse-item" href="<?php echo base_url('categorias');?>"><i class="fas fa-align-center mr-2"></i>Categorias</a>
                       
                    </div>
                </div>
            </li>

           
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuatro"
                    aria-expanded="true" aria-controls="collapseUtilities">
                  <i class="fas fa-comments-dollar"></i>
                    <span>Finaceiro</span>
                </a>
                <div id="collapseQuatro" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Escolha uma opção</h6>
                        <a class="collapse-item" title="Gerenciar contas a pagar" href="<?php echo base_url('pagar');?>"><i class="fas fa-dollar-sign mr-2"></i>Contas a receber</a>
                        <a class="collapse-item" title="Gerenciar contas a receber" href="<?php echo base_url('receber');?>"><i class="fas fa-hand-holding-usd mr-2"></i>Contas a receber</a>
                        <a class="collapse-item" title="Gerenciar formas de pagamentos" href="<?php echo base_url('pagamentos');?>"><i class="fas fa-comment-dollar mr-2"></i>Formas de pagamentos</a>
                       
                    </div>
                </div>
            </li>
          
            <hr class="sidebar-divider">
             <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCinco"
                    aria-expanded="true" aria-controls="collapseUtilities">
                  <i class="fas fa-print"></i>
                    <span>Relatórios</span>
                </a>
                <div id="collapseCinco" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Escolha uma opção</h6>
                        <a class="collapse-item" title="Gerar relatórios de vendas" href="<?php echo base_url('relatorios/vendas');?>"> <i class="fas fa-shopping-cart mr-1"></i>Vendas</a>
                        <a class="collapse-item" title="Gerar relatórios de vendas" href="<?php echo base_url('relatorios/os');?>"> <i class="fas fa-shopping-basket mr-1"></i>Ordem de serviços</a>
                        <a class="collapse-item" title="Gerar relatórios de vendas" href="<?php echo base_url('relatorios/receber');?>"> <i class="fas fa-hand-holding-usd mr-1"></i>Contas a receber</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Configurações
            </div>

           
            <!-- Nav Item - usuários -->
            <li class="nav-item">
                <a class="nav-link"  title="Gerenciar Usuários" href="<?php echo base_url('usuarios')?>">
                    <i class="fas fa-users"></i>
                    <span>Usuários</span></a>
            </li>

            <!-- Nav Item - usuários -->
            <li class="nav-item">
                <a class="nav-link"  title="Gerenciar dados do sistema"  href="<?php echo base_url('sistema')?>">
                    <i class="fas fa-cogs"></i>
                    <span>Sistena</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
                <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
