<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user_fachmi.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php?page=master_buku">
            <i class="fa fa-book"></i> <span>Master Buku</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=penerbit">
            <i class="fa fa-book"></i> <span>Penerbit</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=penulis">
            <i class="fa fa-book"></i> <span>Penulis</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=anggota">
            <i class="fa fa-users"></i> <span>Anggota</span>
          </a>
        </li>
        <li>
          <a href="index.php?page=petugas">
            <i class="fa fa-users"></i> <span>Petugas</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=peminjaman"><i class="fa fa-circle-o"></i>Peminjaman</a></li>
            <li><a href="index.php?page=pengembalian"><i class="fa fa-circle-o"></i>Pengembalian</a></li>
          </ul>
        </li>
        <li>
          <a href="index.php?page=log_activity">
            <i class="fa fa-times"></i> <span>log_activty</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>