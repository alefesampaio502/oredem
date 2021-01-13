     <?php if(!$this->router->fetch_class() == 'login'):?>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    <?php endif ;?>
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header badge-danger">
            <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair do sistema?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Para sair do registro clique em <strong>"Sim"</strong><br>
            Para cancelar a saída clique em <strong>"Não"</strong></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Não</button>
                <a class="btn btn-danger" href="<?php echo base_url('login/logout')?>">Sair</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url()?>public/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php if(isset($scripts)) : ?>

    <?php foreach ($scripts as $script) : ?>

        <script src="<?php echo base_url('public/' .$script); ?>"></script>


    <?php endforeach; ?>
<?php endif; ?>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url()?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url()?>public/js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url()?>public/js/util.js"></script>


</body>

</html>