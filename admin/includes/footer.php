  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  <script src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
  <script src="js/scripts.js"></script>

  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

          var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['Views',     <?php echo $session->count; ?>],
              ['Comments',  <?php echo Comment::count_all(); ?>],
              ['Users',  <?php echo Photo::count_all(); ?>],
              ['Photos', <?php echo User::count_all(); ?>],
          ]);

          var options = {
              legend: 'none',
              backgroundColor: 'transparent',
              pieSliceText: 'label',
              title: 'Photo Gallery'
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
      }
  </script>



</body>

</html>
