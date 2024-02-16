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
                    <form action="<?php echo base_url() ?>Supplier/processEdit" method="POST">
                        <div class="modal-body">
                            <label for="supplier_name">Nama Supplier</label>
                            <input type="hidden" name="supplier_id" id="supplier_id" class="form-control form-control-sm" value="<?= $data->supplier_id ?>" required>
                            <input type="text" name="supplier_name" id="supplier_name" class="form-control form-control-sm" value="<?= $data->supplier_name ?>" required>
                            <label for="supplier_address">Alamat</label>
                            <input type="text" name="supplier_address" id="supplier_address" class="form-control form-control-sm" value="<?= $data->supplier_address ?>" required>
                            <label for="supplier_phone">Telepon</label>
                            <input type="text" name="supplier_phone" id="supplier_phone" class="form-control form-control-sm" value="<?= $data->supplier_phone ?>" required>
                        </div>
                    </div>
                  </div>
                    <div class="card-footer text-right">
                        <a href="<?php echo base_url() ?>Supplier" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>
        </section>
      </div>
