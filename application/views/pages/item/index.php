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

    <?php if ($this->session->flashdata('alert')): ?>
      <?php echo $this->session->flashdata('alert'); ?>
    <?php endif; ?>

    <div class="section-body">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                    class="fas fa-plus"></i> tambah data</button>
              </h4>
              <div class="card-header-form">
                <form action="<?= base_url() ?>Item" method="get">
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
                      <th>Nama Barang</th>
                      <th>Kode Barang</th>
                      <th>Quantity</th>
                      <th>Harga Jual</th>
                      <th>Action</th>
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
                          <?= $value->item_name ?>
                        </td>
                        <td>
                          <?= $value->item_code ?>
                        </td>
                        <td>
                          <?= $value->quantity ?>
                        </td>
                        <td>
                          <?= $value->item_unit_price ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url() ?>Item/edit/<?= $value->item_id ?>" class="btn btn-warning"><i
                              class="fas fa-pen"></i> </a>
                          <a href="#" class="btn btn-danger" onclick="return confirmDelete('<?= $value->item_id ?>');"><i
                              class="fas fa-trash"></i> </a>
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

<!-- modal add data -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data
          <?= $title ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url() ?>Item/processAdd" method="POST">
        <div class="modal-body">
          <label for="item_name">Nama Barang</label>
          <input type="text" name="item_name" id="item_name" class="form-control form-control-sm" required>
          <label for="item_code">Kode Barang</label>
          <input type="text" name="item_code" id="item_code" class="form-control form-control-sm" required>
          <label for="quantity">Quantity</label>
          <input type="text" name="quantity" id="quantity" class="form-control form-control-sm" required>
          <label for="item_unit_price">Harga Jual</label>
          <input type="text" name="item_unit_price" id="item_unit_price" class="form-control form-control-sm" required>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
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