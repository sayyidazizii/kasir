<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            <?php if ($this->session->flashdata('error_login') == true){
                  ?>
                  <div class="alert alert-danger" role="alert">username atau password salah. silahkan coba lagi.</div>
                  <?php
                }
                ?>
            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="<?php echo base_url() ?>Login/Auth" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
            </div>
          </div>
        </div>
      </div>
    </section>
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

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>assets/stisla-1-2.2.0/dist/assets/js/custom.js"></script>
</body>
</html>