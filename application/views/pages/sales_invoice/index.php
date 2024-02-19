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
                                <a href="<?php echo base_url() ?>SalesInvoice/add/" class="btn btn-primary"><i
                                        class="fas fa-plus"></i> tambah Penjualan</a>
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
                                            <th>No Invoice</th>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Total</th>
                                            <th>Bayar</th>
                                            <th>Kembalian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                        $no = 0;
                                        foreach ($data as $value):
                                            $no++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $no ?>
                                                </td>
                                                <td>
                                                    <?= $value->sales_invoice_no ?>
                                                </td>
                                                <td>
                                                    <?= $value->customer_name ?>
                                                </td>
                                                <td>
                                                    <?= $value->sales_invoice_date ?>
                                                </td>
                                                <td>
                                                    <?= $value->sales_invoice_amount ?>
                                                </td>
                                                <td>
                                                    <?= $value->sales_invoice_payment ?>
                                                </td>
                                                <td>
                                                    <?= $value->sales_invoice_change ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url() ?>salesInvoice/edit/<?= $value->sales_invoice_id ?>"
                                                        class="btn btn-warning"><i class="fas fa-pen"></i> </a>
                                                        <a href="<?php echo base_url() ?>salesInvoice/detail/<?= $value->sales_invoice_id ?>"
                                                        class="btn btn-info"><i class="fas fa-eye"></i> </a>
                                                    <a href="#" class="btn btn-danger"
                                                        onclick="return confirmDelete('<?= $value->sales_invoice_id ?>');"><i
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

<script>
    function confirmDelete(Id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini ?')) {
            window.location.href = '<?php echo base_url() ?>SalesInvoice/hapus/' + Id;
        } else {
            return false;
        }
        console.log(Id)
    }
</script>