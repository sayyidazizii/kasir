<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>
        <?= $title ?>
      </h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">
          <?= $title ?>
        </div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body p-0">
          <div class="table-responsive">
            <form action="<?php echo base_url() ?>Item/processEdit" method="POST">
              <div class="modal-body">
                <label for="item_name">Nama Barang</label>
                <input type="hidden" name="item_id" id="item_id" class="form-control form-control-sm"
                  value="<?= $data->item_id ?>" required>
                <input type="text" name="item_name" id="item_name" class="form-control form-control-sm"
                  value="<?= $data->item_name ?>" required>
                <label for="item_code">Kode Barang</label>
                <input type="text" name="item_code" id="item_code" class="form-control form-control-sm"
                  value="<?= $data->item_code ?>" required>
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control form-control-sm"
                  value="<?= $data->quantity ?>" required>
                <label for="item_unit_price">Harga Jual</label>
                <input type="text" name="item_unit_price" id="item_unit_price" class="form-control form-control-sm"
                  value="<?= $data->item_unit_price ?>" required>
              </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <a href="<?php echo base_url() ?>Item" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
  </section>
</div>