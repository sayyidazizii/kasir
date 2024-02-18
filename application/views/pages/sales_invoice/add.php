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
                  class="form-control form-control-sm" required>
                <label for="customer_name">Pelanggan</label>
                  <input type="text" name="customer_name" id="customer_name"
                  class="form-control form-control-sm" required>
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
                <div class="display-4 text-center" id="total-display">0.00</div>
              </div>
              <div class="text-center">
                    <button class="btn btn-lg btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Cari Barang <i
                    class="fas fa-search"></i></button>
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
                <th colspan='5'></th>
                <td><input type="hidden" class="form-control" id="total_bayar" name="total_bayar" readonly></td>
              </tr>
              <tr>
                <th colspan='5'>Bayar</th>
                <td><input type="number" class="form-control" id="bayar" name="bayar"></td>
              </tr>
              <tr>
                <th colspan='5'>Kembalian</th>
                <td><input type="number" class="form-control" id="kembalian" name="kembalian" readonly></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary" type="submit" id="save">simpan</button>
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
          <input type="text" name="search" id="myInput" class="form-control mb-2" placeholder="Cari Barang...">
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

      var table = document.getElementById("table-barang");
      var newRow = table.insertRow(table.rows.length);
      var cellNumber = newRow.insertCell(0);
      var cellName = newRow.insertCell(1);
      var cellCode = newRow.insertCell(2);
      var cellQuantity = newRow.insertCell(3);
      var cellPrice = newRow.insertCell(4);
      var cellTotal = newRow.insertCell(5); // Tambahkan sel untuk menampilkan total
      var cellDelete = newRow.insertCell(6); // Tambahkan sel untuk tombol hapus

      cellNumber.innerHTML = table.rows.length; // Menggunakan table.rows.length sebagai nomor urut
      cellName.innerHTML = selectedItem.item_name;
      cellCode.innerHTML = selectedItem.item_code;
      
      // Ubah elemen teks menjadi input yang dapat diedit
      var quantityInput = document.createElement('input');
      quantityInput.type = 'number';
      quantityInput.value = 1; // Atur nilai default atau sesuaikan dengan kebutuhan Anda
      quantityInput.className = 'form-control form-control-sm'; // Ganti dengan kelas CSS yang sesuai jika diperlukan
      cellQuantity.appendChild(quantityInput);

      cellPrice.innerHTML = selectedItem.item_unit_price;

      // Tambahkan tombol hapus dengan atribut onclick
      var deleteButton = document.createElement('button');
      deleteButton.innerHTML = 'Hapus';
      deleteButton.className = 'btn btn-sm btn-outline-danger';
      deleteButton.onclick = function() {
        var row = this.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateTotal(); // Panggil fungsi untuk memperbarui total atau melakukan validasi setelah menghapus
      };
      cellDelete.appendChild(deleteButton);

      // Mengupdate total setiap kali input quantity berubah
      quantityInput.oninput = function() {
        updateTotal();
      };

      // Fungsi untuk mengupdate total
      function updateTotal() {
        var price = parseFloat(selectedItem.item_unit_price);
        var quantity = parseInt(quantityInput.value);
        var total = price * quantity;
        cellTotal.innerHTML = total.toFixed(2); // Menampilkan total dengan 2 desimal

        // Update total keseluruhan dengan menambahkan total baru
        totalHargaKeseluruhan = 0; // Reset total keseluruhan
        var rows = table.querySelectorAll('tr');
        rows.forEach(function(row) {
            var cellTotal = row.cells[5]; // Kolom total
            if (!isNaN(parseFloat(cellTotal.innerHTML))) {
                totalHargaKeseluruhan += parseFloat(cellTotal.innerHTML);
            }
        });

        // Tampilkan total keseluruhan di tempat yang sesuai
        document.getElementById('total-display').innerHTML = totalHargaKeseluruhan.toFixed(2);

        // Set nilai total bayar sama dengan total keseluruhan
        document.getElementById('total_bayar').value = totalHargaKeseluruhan.toFixed(2);

      }

        // Menambahkan event listener untuk input bayar
        var inputBayar = document.getElementById('bayar');
        inputBayar.addEventListener('input', function() {
            hitungKembalian();
        });

        // Fungsi untuk menghitung kembalian
        function hitungKembalian() {
            var totalHargaKeseluruhan = parseFloat(document.getElementById('total-display').innerHTML);
            var bayar = parseFloat(inputBayar.value);
            var kembalian = bayar - totalHargaKeseluruhan;

            // Menampilkan kembalian di input kembalian
            var inputKembalian = document.getElementById('kembalian');
            inputKembalian.value = kembalian.toFixed(2); // Menampilkan kembalian dengan 2 desimal
        }

      // Panggil fungsi updateTotal() agar total awal terhitung
      updateTotal();

      return false;
    }
  } 


</script>



