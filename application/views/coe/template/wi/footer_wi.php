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

<!--<script type="text/javascript" src="<?php //echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>-->

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
<script src="<?php echo base_url('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js'); ?>" type="text/javascript"></script>

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

<!-- Bootstrap Toggle -->
<script src="<?php echo base_url('assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js'); ?>" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js'); ?>" type="text/javascript"></script>


<script type='text/javascript'>
    $(document).ready(function () {
        $("#datatable").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });

    //function for show and hide input text alasan revisi
    function onclick_status_judul_identifikasi_isu(value)
    {
        if (value == "3")
        {
            document.getElementById("lampiran_alasan_ra").style.display = "block";
            document.getElementById("lampiran_alasan_ra_file").style.display = "block";
            document.getElementById("lampiran_alasan_ra_notice").style.display = "block";
            document.getElementById("alasan_status_judul_identifikasi").style.display = "block";
            document.getElementById("alasan_status_judul_identifikasi").setAttribute("required", "required");
            document.getElementById("alasan_status_judul_identifikasi").setAttribute("name", "alasan_status");
        } 
        else
        {
            document.getElementById("lampiran_alasan_ra").style.display = "none";
            document.getElementById("lampiran_alasan_ra_file").style.display = "none";
            document.getElementById("lampiran_alasan_ra_notice").style.display = "none";
            document.getElementById("alasan_status_judul_identifikasi").style.display = "none";
            document.getElementById("alasan_status_judul_identifikasi").removeAttribute("required");
            document.getElementById("alasan_status_judul_identifikasi").removeAttribute("name");
        }
    }

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
        // Summernote
        $('.textareaajuan').summernote({
            height: "300px",
        });
    });
    $(function () {
        $("#w2b-StoTop").scrollToTop();
    });
    $(function () {
        $('#judul').change(function () {
            if ($(this).prop('checked'))
                $("#status_judul").val("Diterima");
            else
                $("#status_judul").val("Ditolak");
        })
    });
    $(function () {
        $('#latar_belakang').change(function () {
            if ($(this).prop('checked'))
                $("#status_latar").val("Diterima");
            else
                $("#status_latar").val("Ditolak");
        })
    });
    $(function () {
        $('#manfaat').change(function () {
            if ($(this).prop('checked'))
                $("#status_manfaat").val("Diterima");
            else
                $("#status_manfaat").val("Ditolak");
        })
    });
    $(function () {
        $('#milestone').change(function () {
            if ($(this).prop('checked'))
                $("#status_milestone").val("Diterima");
            else
                $("#status_milestone").val("Ditolak");
        })
    });
</script>
</body>

</html>
