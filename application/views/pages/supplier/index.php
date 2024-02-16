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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> tambah data</button>
                    </h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input id="myInput" type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
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
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="myTable">
                          <?php
                          $no = 0;
                          foreach ($data as $value) :
                              $no++;
                          ?>
                          <tr>
                            <td><?=$no?></td>
                            <td><?=$value->supplier_name ?></td>
                            <td><?=$value->supplier_address ?></td>
                            <td><?=$value->supplier_phone ?></td>
                            <td>
                            <a href="<?php echo base_url() ?>Supplier/edit/<?= $value->supplier_id ?>" class="btn btn-warning"><i class="fas fa-pen"></i> </a>
                            <a href="#" class="btn btn-danger" onclick="return confirmDelete('<?= $value->supplier_id ?>');"><i class="fas fa-trash"></i> </a>
                            </td>
                          </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
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
                <h5 class="modal-title">Tambah Data <?=$title?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?php echo base_url() ?>Supplier/processAdd" method="POST">
              <div class="modal-body">
                <label for="supplier_name">Nama Supplier</label>
                <input type="text" name="supplier_name" id="supplier_name" class="form-control form-control-sm" required>
                <label for="supplier_address">Alamat Supplier</label>
                <input type="text" name="supplier_address" id="supplier_address" class="form-control form-control-sm" required>
                <label for="supplier_phone">Telepon</label>
                <input type="text" name="supplier_phone" id="supplier_phone" class="form-control form-control-sm" required>
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
                  window.location.href = '<?php echo base_url() ?>Supplier/hapus/' + Id;
              } else {
                  return false;
              }
              console.log(Id)
          }
        </script>