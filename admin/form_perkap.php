<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
  include ('session.php');

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nama = $_POST['nama'];
      $deskripsi = $_POST['deskripsi'];
      $harga = $_POST['harga'];
      $file_tmp = $_FILES['gambar']['tmp_name'];	
      $gambar = $_POST['nama'];
      //ambil gambar
        $ekstensi_diperbolehkan	= array('png','jpg');
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        if (move_uploaded_file($file_tmp, '../img/upload/perkap/'.$gambar)){
          
          //query SQL
          $query = "INSERT INTO perlengkapan (NAMA_PERLENGKAPAN, DESKRIPSI, HARGA, GAMBAR) VALUES('$nama','$deskripsi','$harga','$gambar')"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);
          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }
        }else {
          $status = 'err';
        }
      
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin Klasik</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php 
       include('menu.php');
       ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">New Perlengkapan</h2>
          <form action="form_perkap.php" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
              <label>NAMA PERLENGKAPAN</label>
              <input type="text" class="form-control" placeholder="Perlengkapan" name="nama" required="required">
            </div>

            <div class="form-group">
              <label>DESKRIPSI</label>
              <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label>HARGA</label>
              <input type="number" class="form-control" placeholder="harga" name="harga" required="required" min=0 step=1000 value=0>
            <div class="form-group">
              <label>GAMBAR</label>
              <input type="file" class="form-control" placeholder="" name="gambar" required="required">
            </div>           
            
            <button type="submit" class="btn btn-primary" style="margin-bottom : 20px;">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>