
<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Kasir</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">K</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class=active>
                  <a class="nav-link" href="<?php echo base_url() ?>Home">Dashboard</a>
                </li>
              </ul>
            </li>
            <li class="menu-header">Menu</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Persediaan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url() ?>Item">Produk</a></li>
                <li><a class="nav-link" href="<?php echo base_url() ?>ItemStock">Stok barang</a></li>
                <li><a class="nav-link" href="<?php echo base_url() ?>ItemStock">Mutasi Stock</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i> <span>Pembelian</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url() ?>Supplier">Supplier</a></li>
              </ul>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url() ?>PurchaseInvoice">Pembelian</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i> <span>Penjualan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url() ?>Customer">Customer</a></li>
              </ul>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url() ?>SalesInvoice">Penjualan</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
              <ul class="dropdown-menu">
                <li><a href="auth-forgot-password.html">Laporan Pembelian</a></li> 
                <li><a href="auth-login.html">Laporan Penjualan</a></li> 
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Utility</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>User">Pengguna</a></li> 
                <li><a href="auth-reset-password.html">Reset Password</a></li> 
              </ul>
            </li>
          </ul>

        </aside>
      </div>