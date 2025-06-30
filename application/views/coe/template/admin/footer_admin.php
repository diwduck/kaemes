<footer class="main-footer">
    <span class="progress-description">
        <strong><b>Hubungi Kami : <i class="fab fa-whatsapp"></i> 08112835000</b></strong>
    </span>
    <br>
    <strong>Copyright &copy; 2019 <a href="https://bpsdmd.jatengprov.go.id/v2/web/">BPSDMD Provinsi Jawa Tengah</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
        <b>Versi</b> 1.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<a id='w2b-StoTop' href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
    <i class="fas fa-chevron-up"></i>
</a>

<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>" type="text/javascript"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>" type="text/javascript"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js'); ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins/sparklines/sparkline.js'); ?>" type="text/javascript"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js'); ?>" type="text/javascript"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js'); ?>" type="text/javascript"></script>
<!--<script src="<?php //echo base_url('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js'); ?>" type="text/javascript"></script>-->
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js?ver=b1.0'); ?>" type="text/javascript"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js'); ?>" type="text/javascript"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>" type="text/javascript"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js'); ?>" type="text/javascript"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js'); ?>" type="text/javascript"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminltev3.js'); ?>" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php //echo base_url('assets/dist/js/pages/dashboard.js'); ?>" type="text/javascript"></script>
--><!-- AdminLTE for demo purposes -->
<!--<script src="<?php //echo base_url('assets/dist/js/demo.js'); ?>" type="text/javascript"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->

<script type='text/javascript'>
    function validasiFile()
    {
        var inputFile = document.getElementById('file_proper');
        var pathFile = inputFile.value;
        var file = inputFile.files[0];
        var size_file = file.size;
        var ekstensiOk = /(\.pdf|\.PDF)$/i;

        if (!ekstensiOk.exec(pathFile))
        {
            alert('Format file Proyek Perubahan yang di Upload Harus bertipe PDF');
            inputFile.value = '';
            return false;
        } 
    }

    function validasiFile_dikpim_ra()
    {
        var inputFile = document.getElementById('file_ra');
        var pathFile = inputFile.value;
        var file = inputFile.files[0];
        var size_file = file.size;
        var ekstensiOk = /(\.pdf|\.PDF)$/i;

        if (!ekstensiOk.exec(pathFile))
        {
            alert('Format file Rancangan Akhir yang di Upload Harus bertipe PDF');
            inputFile.value = '';
            return false;
        } 
    }

    $(document).ready(function () {

        // Summernote
        $('.textareaajuan').summernote({
            height: "300px",
        });
    
        $("#datatable").DataTable({
            "scrollY":false,
            "scrollX":true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
        
        // data table server side untuk menampilkan data peserta
        $('#data-peserta').DataTable({
            "processing": true,
            "serverSide": true,
            columnDefs: [
                { orderable: false, targets: 7 },
                { orderable: true, className: 'reorder', targets: '_all' }
            ],
            "ajax": {
                url: "<?= site_url('admin/Peserta/get_data_peserta') ?>", // json datasource
                type: "post", // method  , by default get
                error: function () {  // error handling
                    $(".lookup-error").html("");
                    $("#data-peserta").append('<tbody class="employee-grid-error"><tr><th colspan="9">No data found in the server</th></tr></tbody>');
                    $("#lookup_processing").css("display", "none");

                }
            }

        });

    });
    $(function () {
        $.fn.scrollToTop = function () {
            $(this).hide();
            if ($(window).scrollTop() != "0") {
                $(this).fadeIn("slow")
            }
            var scrollDiv = $(this);
            $(window).scroll(function () {
                if ($(window).scrollTop() == "0") {
                    $(scrollDiv).fadeOut("slow")
                } else {
                    $(scrollDiv).fadeIn("slow")
                }
            });
            $(this).click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow")
            })
        }
    });
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2()
    });
    $(function () {
        $("#w2b-StoTop").scrollToTop();
    });

</script>
</body>

</html>
