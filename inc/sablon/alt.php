
    </div>
    <!-- /.container -->

    <!-- Footer 
    <footer class="footer">
      <div class="container">
        <span class="text-muted">Copyright &copy; Otel Rezervasyon</span>
      </div>
    </footer>
    -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/moment-with-locales.js"></script>
    <script src="vendor/jquery/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Include Date Range Picker -->
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/bootstrap-datepicker.tr.min.js"></script>

    <script type="text/javascript">
    $(function() {
        $('#giris').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '0',
            language: 'tr'
        });
        $('#cikis').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '+1d',
            language: 'tr'
        });
    });
    </script>


  </body>

</html>