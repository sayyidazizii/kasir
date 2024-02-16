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
            <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>
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
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Quantity</th>
                            <th>Harga Beli</th>
                            <th>harga Jual</th>
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
                            <td><?=$value->item_name ?></td>
                            <td><?=$value->item_code ?></td>
                            <td><?=$value->quantity ?></td>
                            <td><?=$value->item_unit_cost ?></td>
                            <td><?=$value->item_unit_price ?></td>
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
