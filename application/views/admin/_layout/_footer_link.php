<script src="<?= base_url() ?>assets/js/lib/jquery.min.js"></script>
<!-- jquery vendor -->
<script src="<?= base_url() ?>assets/js/lib/jquery.nanoscroller.min.js"></script>
<!-- nano scroller -->
<script src="<?= base_url() ?>assets/js/lib/menubar/sidebar.js"></script>
<script src="<?= base_url() ?>assets/js/lib/preloader/pace.min.js"></script>
<!-- sidebar -->
<script src="<?= base_url() ?>assets/js/lib/bootstrap.min.js"></script>
<!-- bootstrap -->
<script src="<?= base_url() ?>assets/js/lib/data-table/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/js/lib/data-table/datatables-init.js"></script>
<script src="<?= base_url() ?>assets/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/js/lib/toastr/toastr.min.js"></script>
<!-- scripit init-->
<script src="<?= base_url() ?>assets/js/lib/toastr/toastr.init.js"></script>
<script src="<?= base_url() ?>assets/js/scripts.js"></script>

<script>
    $(document).ready(function() {
        $('.datatables').DataTable();
        $('.sel-multiple').select2();
        $('.sel').select2();
    });
</script>
<?php if ($this->session->flashdata('success')) : ?>
    <script>
        toastr.success('<?= $this->session->flashdata('success'); ?>', 'Success!', {
            "positionClass": "toast-top-center",
            timeOut: 5000,
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": false

        });
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('error')) : ?>
    <script>
        toastr.error('<?= $this->session->flashdata('error'); ?>', 'Error!', {
            "positionClass": "toast-top-center",
            timeOut: 5000,
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": false

        });
    </script>
<?php endif; ?>