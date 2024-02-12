
<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/modules/popper.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/js/page/index.js"></script>
  
  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/js/custom.js"></script>

  <script src="<?php echo base_url() ?>assets/select2-4.0.13/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        
        $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    
  </script>
</body>
</html>