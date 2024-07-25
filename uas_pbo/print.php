<?php 
error_reporting(0);

include "config/koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>LAPORAN TRANSAKSI</title>
  </head>
  <body>
    <a href="javascript:window.print()" target="_blank"><img src="img/print.jpg" alt="print" class="img-thumbnail" height="20" width="40" style="margin-top:5px"></a>

    <?php
    $tanggal = date('Y-m-d');
    echo $tanggal;
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12"><h1 class="text-center text-primary">LAPORAN TRANSAKSI</h1></div>
      </div>
      <?php 
      if(isset($_POST['cek'])){
          $where = "WHERE date BETWEEN '$_POST[dari]' AND '$_POST[sampai]'";
      }
      ?>
      <form method="post">
        <table>
          <tr>
            <td>Dari Tanggal <input type="date" name="dari"></td>
            <td>   Sampai <input type="date" name="sampai"></td>
            <td><input type="submit" name="cek" value="CEK"></td>
          </tr>
        </table>
      </form>
      <br>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>ID Transaksi</th>
                <th>Pesanan</th>
                <th>Jenis Pesanan</th>
                <th>Total</th>
                <th>Tanggal</th>
              </tr>
            </thead>

            <tbody>
              <?php 
              $sql = "SELECT * FROM transaksi $where";
              $query = mysqli_query($con, $sql);
              while($r = mysqli_fetch_array($query)){
              ?>
              <tr>
                <td><?php echo $r['id_transaksi'] ?></td>
                <td><?php echo $r['pesanan'] ?></td>
                <td><?php echo $r['jenis_pesanan'] ?></td>
                <td><?php echo $r['total'] ?></td>
                <td><?php echo $r['tanggal'] ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
