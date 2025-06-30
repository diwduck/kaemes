
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

<!--===========================================================JAVASCRIPT==========================================================-->

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>" type="text/javascript"></script>

    <!-- DataTables -->
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>

    <script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>

    <!-- ChartJS -->
    <script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>

    <!-- AdminLTE App -->
     <!-- AdminLTE /dist dihapus masih coba coba-->
    <script src="<?php echo base_url('assets/dist/js/adminltev3.js'); ?>" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {

          var jumlah_pkn = <?php echo $pkn; ?>;
          var jumlah_pka = <?php echo $pka; ?>;
          var jumlah_pkp = <?php echo $pkp; ?>;

          //variabel for bar chart penyelenggaran kab/kota
          var bar_chart_label = <?php echo $pemda_json; ?>;
          var bar_chart_data  = <?php echo $jumlah_inovasi_json; ?>;

          //variabel for bar chart asal ASN
          var bar_chart_label_asal_asn = <?php echo $pemda_asn_json; ?>;
          var bar_chart_data_asal_asn  = <?php echo $jumlah_asal_inovasi_json; ?>;

          var donutData = {
            labels: [
                'PKN', 
                'PKP',
                'PKA', 
                'Latsar', 
                'Teknis', 
                'Fungsional', 
            ],
            datasets: [
              {
                data: [jumlah_pkn,jumlah_pkp,jumlah_pka,0,0,0],
                backgroundColor : ['#f56954', '#d2d6de', '#f39c12', '#00c0ef', '#3c8dbc', '#00a65a'],
              }
            ]
          }
          
          //-------------
          //- PIE CHART -
          //-------------
          var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
          var pieData        = donutData;
          var pieOptions     = {
            maintainAspectRatio : false,
            responsive : true,
            plugins : {
                  labels: {
                    render : 'value',
                    fontColor : ['black']
                  }
            }
          }
          //Create pie or douhnut chart
          var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions      
          })

      //========================================================================================================================
          
          //-------------
          //- BAR CHART berdasarkan Kab/Kota-
          //-------------
          var areaChartData = {
                                labels  : bar_chart_label,
                                datasets: [
                                  {
                                    label               : 'Jumlah File Inovasi',
                                    backgroundColor     : 'rgba(255,128,0,0.9)',
                                    borderColor         : 'rgba(60,141,188,0.8)',
                                    pointRadius          : false,
                                    pointColor          : '#3b8bba',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : bar_chart_data
                                  },
                                ]
                              }

          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = jQuery.extend(true, {}, areaChartData)
          
          var temp1 = areaChartData.datasets[0]
          barChartData.datasets[0] = temp1
          

          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            plugins : {
                  labels: {
                    render : 'value',
                    fontColor : ['black']
                  }
            }
          }

          var barChart = new Chart(barChartCanvas, {
            type: 'bar', 
            data: barChartData,
            options: barChartOptions
          })

      //========================================================================================================================
      
          //-------------
          //- BAR CHART berdasarkan Asal ASN
          //-------------
          var areaChartData_asal = {
                                labels  : bar_chart_label_asal_asn,
                                datasets: [
                                  {
                                    label               : 'Jumlah File Inovasi',
                                    backgroundColor     : 'rgba(23,229,0,0.9)',
                                    borderColor         : 'rgba(60,141,188,0.8)',
                                    pointRadius          : false,
                                    pointColor          : '#3b8bba',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : bar_chart_data_asal_asn
                                  },
                                ]
                              }

          var barChartCanvas = $('#barChart_asal').get(0).getContext('2d')
          var barChartData = jQuery.extend(true, {}, areaChartData_asal)
          
          var temp1 = areaChartData_asal.datasets[0]
          barChartData.datasets[0] = temp1
          

          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            plugins : {
                  labels: {
                    render : 'value',
                    fontColor : ['black']
                  }
            }
          }

          var barChart = new Chart(barChartCanvas, {
            type: 'bar', 
            data: barChartData,
            options: barChartOptions
          })   

        })
    </script>
    

</body>
</html>
