  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

    <!--Editor-->
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script src="js/script.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Sessions', <?php echo $session->count;?>],
          ['Users',     <?php echo User::count_all();?>],
          ['Photos',      <?php echo Photo::count_all();?>],
          ['Comments',  <?php echo Comment::count_all();?>],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'Muzammal Rajpoot Developed',
          pieSliceText: 'label',
          legend : 'none',
          backgroundColor: 'transparent'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</body>

</html>
