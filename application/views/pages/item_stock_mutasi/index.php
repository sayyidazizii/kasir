<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>
        <?= $title ?>
      </h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url()?>Home">Dashboard</a></div>
        <div class="breadcrumb-item">
          <?= $title ?>
        </div>
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
               
              </h4>
              <div class="card-header-form">
                <form action="<?= base_url() ?>ItemStockMutation" method="get">
                  <div class="input-group">
                    <input type="text" name="search" class="form-control" value="<?php if ($pencarian != null) {
                      echo $pencarian;
                    } ?>" placeholder="Search">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Transaksi</th>
                      <th>Nama Barang</th>
                      <th>Kode Barang</th>
                      <th>Quantity</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    <?php
                    $no = 0;
                    foreach ($item as $value):
                      $no++;
                      ?>
                      <tr>
                        <td>
                          <?= $no ?>
                        </td>
                        <td>
                          <?= $value->transaction_no ?>
                        </td>
                        <td>
                          <?= $value->item_name ?>
                        </td>
                        <td>
                          <?= $value->item_code ?>
                        </td>
                        <td>
                          <?= $value->quantity ?>
                        </td>
                        <td>
                          <?= $value->item_stock_mutation_date ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
                    <div class="pagination-container">
                        <button id="prevPage" class="btn btn-sm btn-primary">Previous</button>
                          <span id="paginationStatus" class="pagination-status"></span>
                        <button id="nextPage" class="btn btn-sm btn-primary">Next</button>
                    </div>
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
      window.location.href = '<?php echo base_url() ?>Item/hapus/' + Id;
    } else {
      return false;
    }
    console.log(Id)
  }
</script>