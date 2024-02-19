<?php
// Mendapatkan segment terakhir dari URL
$current_url_segment = $this->uri->segment($this->uri->total_segments());

// Daftar segment yang sesuai dengan setiap sidebar
$sidebar_segments = array(
    'Home' => 'Dashboard',
    'Item' => 'Persediaan',
    'ItemStock' => 'Persediaan',
    'SalesInvoice' => 'Penjualan',
    'User' => 'Utility',
);
?>
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
      <li class="dropdown <?php echo ($sidebar_segments[$current_url_segment] == 'Dashboard') ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo ($current_url_segment == 'Home') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url() ?>Home">Home</a>
          </li>
        </ul>
      </li>
      <li class="menu-header">Menu</li>
      <li class="dropdown <?php echo ($sidebar_segments[$current_url_segment] == 'Persediaan') ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
          <span>Persediaan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link <?php echo ($current_url_segment == 'Item') ? 'active' : ''; ?>" href="<?php echo base_url() ?>Item">Barang</a></li>
          <li><a class="nav-link <?php echo ($current_url_segment == 'ItemStock') ? 'active' : ''; ?>" href="<?php echo base_url() ?>ItemStock">Mutasi Stock</a></li>
        </ul>
      </li>
      <li class="dropdown <?php echo ($sidebar_segments[$current_url_segment] == 'Penjualan') ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i> <span>Penjualan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link <?php echo ($current_url_segment == 'SalesInvoice') ? 'active' : ''; ?>" href="<?php echo base_url() ?>SalesInvoice">Penjualan</a></li>
        </ul>
      </li>
      <li class="dropdown <?php echo ($sidebar_segments[$current_url_segment] == 'Utility') ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Utility</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link <?php echo ($current_url_segment == 'User') ? 'active' : ''; ?>" href="<?php echo base_url() ?>User">Pengguna</a></li>
          <li><a href="auth-reset-password.html">Reset Password</a></li>
        </ul>
      </li>
    </ul>

  </aside>
</div>
