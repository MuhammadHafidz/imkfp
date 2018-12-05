<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
  include ('session.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
          //query SQL
          $nrp_upd = $_GET['id'];
          $query = "SELECT * FROM perlengkapan WHERE ID_PERLENGKAPAN = '$nrp_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }  
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
      $oldgambar = $_POST['oldgambar'];
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $deskripsi = $_POST['deskripsi'];
      $harga = $_POST['harga'];
      

      if ($_POST['ubahgambar']){
        $gambar = $nama;
        $file_tmp = $_FILES['gambarbaru']['tmp_name'];	
        
        if (is_file("../img/upload/perkap/".$oldgambar)) {
          unlink("../img/upload/perkap/".$oldgambar);
        }
        move_uploaded_file($file_tmp, '../img/upload/perkap/'.$gambar);
      }else {
        $gambar = $oldgambar;
      }
     
      //query SQL
      $sql = "UPDATE perlengkapan SET NAMA_PERLENGKAPAN='$nama', DESKRIPSI='$deskripsi', HARGA='$harga',  GAMBAR='$gambar' WHERE ID_PERLENGKAPAN='$id'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: perlengkapan.php?status='.$status);
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

  <body style="margin-bottom: 100px;">
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin Klasik</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php 
       include('menu.php');
       ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h2 style="margin: 30px 0 30px 0;">Update Data Perlengkapan</h2>
          <form action="update_perkap.php" method="POST" enctype="multipart/form-data">
            <?php while($data = mysqli_fetch_array($result)): ?>

            <div class="form-group">
              <label>ID PERLENGKAPAN</label>
              <input type="text" class="form-control" placeholder="id" name="id" required="required" value="<?php echo $data['ID_PERLENGKAPAN'];?> " readonly>
            </div>

            <div class="form-group">
              <label>NAMA</label>
              <input type="text" class="form-control" placeholder="Nama Tempat" name="nama" required="required" value="<?php echo $data['NAMA_PERLENGKAPAN'];?>">
            </div>

            <div class="form-group">
              <label>DESKRIPSI</label>
              <textarea name="deskripsi" class="form-control" id="deskripsi" cols="20" rows="5" ><?php echo $data['DESKRIPSI'];?></textarea>
            </div>

            <div class="form-group">
              <label>HARGA</label>
              <input type="number" class="form-control" placeholder="HTM" name="harga" required="required" min=0 step=1000  value=<?php echo $data['HARGA'];?>>
            </div>

           
            <div class="form-group">
              <label>GAMBAR</label> <br>
              <img src="../img/upload/perkap/<?php echo $data['GAMBAR'];?>" alt=" LOOO ILANG" style="width:500px; height:auto" class="img-fluid"><br>
            </div>

            <div class="form-group">
                <label>Ubah Gambar</label>
                <input type="checkbox" value="ubah" name="ubahgambar"> Cek jika ingin merubah Gambar
            </div>

            <div class="form-group">
              <label>GAMBAR BARU</label> 
              <input type="file" class="form-control" name="gambarbaru" id="gambarbaru">
            </div>

            <div class="form-group" style="display:none" >
              <label>GAMBAR OLD</label>
              <input type="text" class="form-control" placeholder="gambar" name="oldgambar" required="required"  value="<?php echo $data['GAMBAR'];?>">
            </div>
            
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>