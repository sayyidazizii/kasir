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
      <form action="<?php echo base_url() ?>SalesInvoice/processAdd" method="POST">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>
                Data Penjualan
              </h4>
              <div class="card-header-form">

              </div>
            </div>
            <div class="card-body p-0">
              <div class="container-fluid">
                <label for="sales_invoice_date">Tanggal</label>
                <input type="date" name="sales_invoice_date" id="sales_invoice_date"
                  class="form-control form-control-sm border-dark" required>
                <label for="customer_name">Pelanggan</label>
                  <input type="text" name="customer_name" id="customer_name"
                  class="form-control form-control-sm border-dark" required>
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
                Detail
              </h4>
              <div class="card-header-form">

              </div>
            </div>
            <div class="card-body p-0 mt-2">
              <div class="container-fluid">
                <div class="display-4  text-center" id="total-display">0.00</div>
              </div>
              <div class="text-center">
                    <div class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">Cari Barang <i
                    class="fas fa-search"></i></div>
                </div>
            </div>
            <div class="card-footer text-right">

            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-md table-hover">
               <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Kode Barang</th>
                      <th>Quantity</th>
                      <th>Harga Jual</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
              <tbody id="table-barang">
                   
              </tbody>
               <tr>
                <th colspan='5'>Total Bayar</th>
                <td><input type="text" class="form-control form-control-sm" id="total_bayar" name="total_bayar" readonly></td>
              </tr>
              <tr>
                <th colspan='5'>Bayar</th>
                <td><input type="number" class="form-control form-control-sm" id="bayar" name="bayar" required></td>
              </tr>
              <tr>
                <th colspan='5'>Kembalian</th>
                <td><input type="number" class="form-control form-control-sm" id="kembalian" name="kembalian" readonly></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="card-footer text-right">
          <a href="<?= base_url()?>SalesInvoice" class="btn btn-secondary">kembali</a>
          <button class="btn btn-primary" type="submit" >simpan</button>
        </div>
      </div>
      </form>
    </div>
  </section>
</div>

<!-- modal add data -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pilih Barang
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <input type="text" name="search" id="myInput" class="form-control form-control-sm mb-2" placeholder="Cari Barang...">
          <div class="table-responsive">
          <table class="table table-striped table-md table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Kode Barang</th>
                      <th>Tersedia</th>
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
                          <a href="#" class="btn btn-outline-success" onclick="return selectItem('<?= $value->item_id ?>');">Pilih</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer text-right">
                <div class="pagination-container">
                  <button id="prevPage" class="btn btn-sm btn-primary">Previous</button>
                  <span id="paginationStatus" class="pagination-status"></span>
                  <button id="nextPage" class="btn btn-sm btn-primary">Next</button>
              </div>
              </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<script>
    function selectItem(itemId) {
      var item = <?= json_encode($item) ?>;
      var selectedItem = item.find(function(item) {
        return item.item_id === itemId;
      });


      if (selectedItem) {
        var table = $("#table-barang");
        var newRow = $("<tr>");
        newRow.append("<td>" + (table.find("tr").length + 1) + "</td>");
        newRow.append("<td>" + selectedItem.item_name + "</td>");
        newRow.append("<td>" + selectedItem.item_code + "</td>");

        var quantityInput = $("<input>", { type: "number", value: 1, class: "form-control form-control-sm border-dark" });
        newRow.append($("<td>").append(quantityInput));
        newRow.append("<td>" + selectedItem.item_unit_price + "</td>");

        var totalCell = $("<td>");
        newRow.append(totalCell);

        //item id yang di hidden
        newRow.append("<td hidden>" + selectedItem.item_id + "</td>");

        var deleteButton = $("<button>", { text: "Hapus", class: "btn btn-sm btn-outline-danger" });
        deleteButton.on("click", function() {
          $(this).closest("tr").remove();
          updateTotal();
        });
        newRow.append($("<td>").append(deleteButton));
        table.append(newRow);

        quantityInput.on("input", function() {
          updateTotal();
          simpanArray();
        });

        updateTotal();
        simpanArray();

        return false;
      }
    }

    function updateTotal() {
      var total = 0;
      $("#table-barang tr").each(function(index, row) {
        var price = parseFloat($(row).find("td:eq(4)").text());
        var quantity = parseInt($(row).find("td:eq(3) input").val());
        var subtotal = price * quantity;
        $(row).find("td:eq(5)").text(subtotal.toFixed(2));
        total += subtotal;
      });

      //id total display
      $("#total-display").text(total.toFixed(2));

      //total bayar
      $("#total_bayar").val(total.toFixed(2));


      var bayar = parseFloat($("#bayar").val());
      var kembalian = bayar - total;
      $("#kembalian").val(kembalian.toFixed(2));
    }

    //dari input id bayar
    $("#bayar").on("input", function() {
      updateTotal();
    });

    function simpanArray() {
        var tableRows = $("#table-barang tr");
        var data = [];

        tableRows.each(function (index, row) {
            var rowData = {
                "no"              : $(row).find("td:eq(0)").text(),
                "item_name"       : $(row).find("td:eq(1)").text(),
                "item_code"       : $(row).find("td:eq(2)").text(),
                "quantity"        : $(row).find("td:eq(3) input").val(),
                "item_unit_price" : $(row).find("td:eq(4)").text(),
                "total"           : $(row).find("td:eq(5)").text(),
                "item_id"         : $(row).find("td:eq(6)").text(), // Mengambil item_id dari input hidden
            };
            data.push(rowData);
        });

        $.ajax({
            url: "<?php echo base_url() ?>SalesInvoice/simpanSesi",
            type: "POST",
            data: {
              data: data
            },
            success: function (response) {
                console.log(data);
                // alert('Data berhasil disimpan ke dalam sesi!');
            },
            error: function (xhr, status, error) {
                console.error(error);
                alert('Terjadi kesalahan saat menyimpan data ke dalam sesi!');
            }
        });
    }


</script>



