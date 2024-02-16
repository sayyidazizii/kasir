<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?= $title?></div>
            </div>
          </div>

          <?php if ($this->session->flashdata('alert')): ?>
                  <?php echo $this->session->flashdata('alert'); ?>
          <?php endif; ?>

          <div class="section-body">
            <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>
                       Data Pembelian
                    </h4>
                    <div class="card-header-form">

                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="container-fluid">
                    <label for="purchase_invoice_date">Tanggal</label>
                    <input type="date" name="purchase_invoice_date" id="purchase_invoice_date" class="form-control form-control-sm" required>
                    <label for="supplier_id">Pemasok</label>
                    <select class="form-control js-example-basic-single" name="supplier_id" id="supplier_id">
                            <option value="0">-- Pilih data --</option>
                        <?php foreach($supplier as $item){?> 
                            <option value="<?= $item->supplier_id ?>"><?= $item->supplier_name ?></option>
                        <?php }?>
                    </select>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>
                    Detail Pembelian
                    </h4>
                    <div class="card-header-form">

                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="container-fluid">
                    <label for="item_name">Barang</label>
                    <input type="text" name="item_name" id="item_name" class="form-control form-control-sm" required>
                    <label for="item_code">Quantity</label>
                    <input type="text" name="item_code" id="item_code" class="form-control form-control-sm" required>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button type="button" class="btn btn-primary" id="tambah-barang"><i class="fas fa-plus"></i> Tambah</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

        <script>
          function confirmDelete(Id) {
              if (confirm('Apakah Anda yakin ingin menghapus data ini ?')) {
                  window.location.href = '<?php echo base_url() ?>PurchaseInvoice/hapus/' + Id;
              } else {
                  return false;
              }
              console.log(Id)
          }
        </script>