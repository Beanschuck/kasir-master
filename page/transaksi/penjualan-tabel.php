<!DOCTYPE html>
<?php
  include '../../controller/Barang.php';
  session_start();
  if (empty($_SESSION['username'])) {
    header("location:../login.php");
  }

  if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    deleteBarang($id);
  }

  include '../../controller/Login.php';
  $data = getHakAkses2($_SESSION['username']);
  include '../../config/koneksi.php';
  $select = "SELECT * FROM tb_penjualan";
  $query = mysqli_query($con,$select);
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Master | Barang</title>

    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">
  </head>
  <body>
    <?php
      if (!empty($_SESSION['a'])) {
        unset($_SESSION['a']);
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0rem">
          <strong>Transaksi berhasil ditambah!</strong> Cek tabel dibawah untuk melihat transaksi.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
      }
    ?>
    <!-- kode untuk sidebar (awal) -->
    <div class="sidebar">
      <div class="logo text-center">
        <h2>Toko <b style="color:#00d9ff">Kita</b></h2>
      </div>
      <ul class="list-unstyled">
        <li class="side-link">
          <a href="../../index.php" class="dashboard-link">
          <i class="fas fa-tachometer-alt" style="margin-right: 10px;"></i>
            Dashboard
          </a>
        </li>
        <li class="side-link" style="margin-top:10px">
          Master
        </li>
        <?php
          if ($data[0]) {
            ?>
            <li class="side-link">
              <a href="../master/barang-main.php" class="dashboard-link">
              <i class="fas fa-boxes" style="margin-right: 12px;"></i>
                Barang
              </a>
            </li>
            <?php
          }else{
            ?>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-boxes" style="margin-right: 12px;"></i>
                Barang
              </a>
            </li>
            <?php
          }
          if ($data[1]) {
            ?>
            <li class="side-link">
              <a href="../master/karyawan-main.php" class="dashboard-link">
              <i class="fas fa-user-plus" style="margin-right: 11px;"></i>
                Karyawan
              </a>
            </li>
            <?php
          }else{
            ?>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-user-plus" style="margin-right: 11px;"></i>
                Karyawan
              </a>
            </li>
            <?php
          }
          if ($data[2]) {
            ?>
            <li class="side-link">
              <a href="../master/supplier-main.php" class="dashboard-link">
              <i class="fas fa-truck" style="margin-right: 10px;"></i>
                Supplier
              </a>
            </li>
            <?php
          }else{
            ?>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-truck" style="margin-right: 10px;"></i>
                Supplier
              </a>
            </li>
            <?php
          }
        ?>
        <li class="side-link" style="margin-top:10px">
          Transaksi
        </li>
        <?php
          if ($data[3]) {
            ?>
            <li class="side-link">
              <a href="../transaksi/penjualan-tabel.php" class="dashboard-link" style="color:#fff;">
              <i class="fas fa-cart-arrow-down" style="margin-right: 12px;"></i>
                Penjualan
              </a>
            </li>
            <?php
          }else{
            ?>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-cart-arrow-down" style="margin-right: 12px;"></i>
                Penjualan
              </a>
            </li>
            <?php
          }
          if ($data[4]) {
            ?>
            <li class="side-link">
              <a href="../transaksi/pembelian-tabel.php" class="dashboard-link">
              <i class="fas fa-cash-register" style="margin-right: 15px;"></i>
                Pembelian
              </a>
            </li>
            <?php
          }else{
            ?>  
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-cash-register" style="margin-right: 15px;"></i>
                Pembelian
              </a>
            </li>
            <?php
          }
        ?>
        <li class="side-link" style="margin-top:10px">
          Laporan
        </li>
        <?php
          if ($data[5]) {
            ?>
            <li class="side-link">
              <a href="../laporan/laporan-stok.php" class="dashboard-link">
              <i class="fas fa-file-contract" style="margin-right: 17px;"></i>
                Stok
              </a>
            </li>
            <li class="side-link">
              <a href="../laporan/laporan-pembelian.php" class="dashboard-link">
              <i class="fas fa-file-download" style="margin-right: 15px;"></i>
                Pembelian
              </a>
            </li>
            <li class="side-link">
              <a href="../laporan/laporan-penjualan.php" class="dashboard-link">
              <i class="fas fa-file-upload" style="margin-right: 15px;"></i>
                Penjualan
              </a>
            </li>
            <?php
          }else{
            ?>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-file-contract" style="margin-right: 17px;"></i>
                Stok
              </a>
            </li>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-file-download" style="margin-right: 15px;"></i>
                Pembelian
              </a>
            </li>
            <li class="side-link">
              <a href="#" class="dashboard-link">
              <i class="fas fa-file-upload" style="margin-right: 15px;"></i>
                Penjualan
              </a>
            </li>
            <?php
          }
        ?>
      </ul>
          <a href="../../controller/Logout.php" style="position:absolute; bottom:0; margin-bottom:15px; " class="side-link dashboard-link">
          <i class="fas fa-sign-out-alt" style="margin-right: 15px;"></i>
            Logout
          </a>
    </div>
    <!-- kode untuk sidebar (akhir) -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto"></div>
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="#">Selamat datang  <b><?php echo $_SESSION['nama_kar']; ?></b></a>
        </div>
      </div>
    </nav>

    <div class="container-fluid kontent">
      <div class="row">
        <div class="col-md-12">
          <h2 class="judul">Rekap Penjualan</h2>
          <h6 class="breadcumb-sub">Transaksi / <a href="">Rekap Penjualan</a></h6>
        </div>
        <div class="col-md-9">
          <a href="penjualan-tambah.php">
            <button type="button" class="btn btn-outline-primary">
              <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Transaksi
            </button>
          </a>
        </div>
        <div class="col-md-3">
          <button onclick="print('tbpenjualan')" class="btn btn-outline-info" style="width: 100%;"><i class="fas fa-print"></i> Print Laporan Penjualan</button>
          <!-- <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fas fa-search"></i></div>
            </div>
            <input
              type="text"
              class="form-control"
              placeholder="Tulis untuk mencari barang"
            />
          </div> -->
        </div>
      </div>
      <div class="row" style="margin-top:1%;">
        <div class="col-md-12">
          <table class="table table-hover shadow-sm" id="tbpenjualan">
            <thead>
              <tr class="bg-info" style="color: #fff">
                <th scope="col">Kode</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Alamat</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Total (Rp.)</th>
                <th scope="col">PPN (%)</th>
                <th scope="col">Diskon (%)</th>
                <th scope="col">Grand Total (Rp.)</th>
                <th scope="col"><center>Opsi</center></th>
              </tr>
            </thead>
            <tbody style="color:rgb(102, 102, 102);">
                <?php
                    if (mysqli_num_rows($query) > 0) {
                        while($data = mysqli_fetch_assoc($query)){
                ?>
                    <tr>
                        <td scope="col"><?php echo $data['kode_tr'] ?></td>
                        <td scope="col"><?php echo $data['nama'] ?></td>
                        <td scope="col"><?php echo $data['alamat'] ?></td>
                        <td scope="col"><?php echo $data['keterangan'] ?></td>
                        <td scope="col">Rp <?php echo number_format($data['total']) ?></td>
                        <td scope="col"><?php echo $data['ppn'] ?>%</td>
                        <td scope="col"><?php echo $data['diskon'] ?>%</td>
                        <td scope="col">Rp <?php echo number_format($data['grand_total']) ?></td>
                        <td scope="col"><center> <button class="btn btn-info"><i class="fas fa-print"></i></button> </center></td>
                    </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
          <nav aria-label="Page navigation example" style="float:right">
            <ul class="pagination pagination-sm">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script>
      function print(elem)
      {
          var mywindow = window.open('', 'PRINT', 'height=700,width=700');

          mywindow.document.write('<html><head><title>' + document.title  + '</title>');
          mywindow.document.write('</head><body >');
          mywindow.document.write('<h1>' + document.title  + '</h1>');
          mywindow.document.write(document.getElementById(elem).innerHTML);
          mywindow.document.write('</body></html>');

          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10*/

          mywindow.print();
          mywindow.close();

          return true;
      }
    </script>
  </body>
</html>
