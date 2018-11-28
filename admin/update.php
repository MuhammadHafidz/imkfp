<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
  include ('session.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['nrp'])) {
          //query SQL
          $nrp_upd = $_GET['nrp'];
          $query = "SELECT * FROM destinasi WHERE ID_DESTINASI = '$nrp_upd'"; 

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
      $lokasi = $_POST['lokasi'];
      $alamat = $_POST['alamat'];
      $kota = $_POST['kota'];
      $provinsi = $_POST['provinsi'];
      $rate = $_POST['rate'];

      if (isset($_POST['ubahgambar'])){
        $gambar = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];	
        move_uploaded_file($file_tmp, '../img/upload/'.$gambar);
        if (is_file("../img/upload/".$oldgambar)) {
          unlink("../img/upload/".$oldgambar);
        }
      }else {
        $gambar = $oldgambar;
      }
     
      //query SQL
      $sql = "UPDATE DESTINASI SET NAMA='$nama', DESKRIPSI='$deskripsi', HARGA='$harga', LOKASI='$lokasi', ALAMAT='$alamat', KOTA='$kota', PROVINSI='$provinsi', GAMBAR='$gambar', RATE='$rate' WHERE ID_DESTINASI='$id'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: index.php?status='.$status);
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
          <h2 style="margin: 30px 0 30px 0;">Update Data Mahasiswa</h2>
          <form action="update.php" method="POST" enctype="multipart/form-data">
            <?php while($data = mysqli_fetch_array($result)): ?>

            <div class="form-group">
              <label>ID DESTINASI</label>
              <input type="text" class="form-control" placeholder="id" name="id" required="required" value="<?php echo $data['ID_DESTINASI'];?> " readonly>
            </div>

            <div class="form-group">
              <label>NAMA</label>
              <input type="text" class="form-control" placeholder="Nama Tempat" name="nama" required="required" value="<?php echo $data['NAMA'];?>">
            </div>

            <div class="form-group">
              <label>DESKRIPSI</label>
              <textarea name="deskripsi" class="form-control" id="deskripsi" cols="20" rows="5" ><?php echo $data['DESKRIPSI'];?></textarea>
            </div>

            <div class="form-group">
              <label>HARGA</label>
              <input type="number" class="form-control" placeholder="HTM" name="harga" required="required" min=0 step=1000 value=0 value="<?php echo $data['HARGA'];?>">
            </div>

            <div class="form-group">
              <label>LOKASI</label>
              <select class="form-control" id="lokasi" name="lokasi">
                <option value="Hutan"<?php echo $data['LOKASI']=='Hutan' ? "selected" : "" ?>>Hutan</option>
                <option value="Gunung"<?php echo $data['LOKASI']=='Gunung' ? "selected" : "" ?>>Gunung</option>
                <option value="Pantai"<?php echo $data['LOKASI']=='Pantai' ? "selected" : "" ?>>Pantai</option>
                <option value="Bumi Perkemahan"<?php echo $data['LOKASI']=='Bumi Perkemahan' ? "selected" : "" ?>>Bumi Perkemahan</option>
              </select>
            </div>

            <div class="form-group">
              <label>ALAMAT</label>
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" required="required" value="<?php echo $data['ALAMAT'];?>">
            </div>

            <div class="form-group">
              <label>PROVINSI</label>
              <select class="form-control" id="provinsi" name="provinsi">
                <option value="Jawa Timur" <?php echo $data['PROVINSI']=='Jawa Timur' ? "selected" : "" ?>>JATIM</option>
                <option value="Jawa Tengah" <?php echo $data['PROVINSI']=='Jawa Tengah' ? "selected" : "" ?>>JATENG</option>
                <option value="Jawa Barat" <?php echo $data['PROVINSI']=='Jawa Barat' ? "selected" : "" ?>>JABAR</option>
                <option value="Yogyakarta" <?php echo $data['PROVINSI']=='Yogyakarta' ? "selected" : "" ?>>DIY</option>
              </select>
            </div>

            <div class="form-group">
              <label>KOTA</label>
              <input type="text" class="form-control" placeholder="Kota" name="kota" required="required" value="<?php echo $data['KOTA'];?>">
            </div>

            <div class="form-group">
              <label>GAMBAR</label> <br>
              <img src="../img/upload/<?php echo $data['GAMBAR'];?>" alt=" LOOO ILANG" style="width:500px; height:auto" class="img-fluid"><br>
            </div>

            <div class="form-group">
              <label>GAMBAR BARU</label> 
              <div>
                <label><input type="checkbox" value="" name="ubahgambar"> Cek jika ingin merubah Gambar</label>
              </div>
              <input type="file" class="form-control" placeholder="" name="gambar">
            </div>

            <div class="form-group">
              <label>RATE</label>
              <input type="number" class="form-control" placeholder="Rate" name="rate" required="required" max=5 min=0 step=0.1 value=0 value="<?php echo $data['RATE'];?>">
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