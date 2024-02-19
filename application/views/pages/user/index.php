

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
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    <?php
                $no = 0;
                foreach ($data_user as $value) :
                    $no++;
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $value->username ?></td>
                        <td><?= $value->nama ?></td>
                        <?php if ($value->level == 1){
                            echo  '<td>Admin</td>';
                        }else if($value->level == 2){
                            echo '<td>Kasir</td>';
                        }?>
                        <td>
                            <a href="<?php echo base_url() ?>User/edit/<?= $value->id_user ?>" class="btn btn-warning"><i
                              class="fas fa-pen"></i> </a>
                            <a href="#" class="btn btn-danger" onclick="return confirmDelete('<?= $value->id_user ?>');"><i
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
      <form action="<?php echo base_url() ?>User/processAdd" method="POST">
        <div class="modal-body">
          <!-- Isi form tambah user -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-control" name="level" id="level" reqired>
                                <option value="1">Admin</option>
                                <option value="2">Kasir</option>
                            </select>
                        </div>
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
      window.location.href = '<?php echo base_url() ?>User/hapus/' + Id;
    } else {
      return false;
    }
    console.log(Id)
  }
</script>