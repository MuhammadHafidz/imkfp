<?php 

  include ('conn.php'); 
  include ('session.php');
  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
          //query SQL
          $nrp_upd = $_GET['id'];
          $img= $_GET['img'];
          $query = "DELETE FROM perlengkapan WHERE ID_PERLENGKAPAN= '$nrp_upd'"; 
          if (is_file("../img/upload/perkap/".$img)) {
            unlink("../img/upload/perkap/".$img);
          }
          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          //redirect ke halaman lain
          header('Location: perlengkapan.php?status='.$status);
      }  
  }