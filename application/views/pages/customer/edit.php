<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?= $title?></div>
            </div>
          </div>

          <div class="section-body">
          <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                    <form action="<?php echo base_url() ?>Customer/processEdit" method="POST">
                        <div class="modal-body">
                            <label for="customer_name">Nama Pelanggan</label>
                            <input type="hidden" name="customer_id" id="customer_id" class="form-control form-control-sm" value="<?= $data->customer_id ?>" required>
                            <input type="text" name="customer_name" id="customer_name" class="form-control form-control-sm" value="<?= $data->customer_name ?>" required>
                            <label for="customer_address">Alamat</label>
                            <input type="text" name="customer_address" id="customer_address" class="form-control form-control-sm" value="<?= $data->customer_address ?>" required>
                            <label for="customer_phone">Telepon</label>
                            <input type="text" name="customer_phone" id="customer_phone" class="form-control form-control-sm" value="<?= $data->customer_phone ?>" required>
                        </div>
                    </div>
                  </div>
                    <div class="card-footer text-right">
                        <a href="<?php echo base_url() ?>Customer" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>
        </section>
      </div>
