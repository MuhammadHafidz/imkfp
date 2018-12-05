<?php 

  include ('conn.php'); 
  include ('session.php');
  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['nrp'])) {
          //query SQL
          $nrp_upd = $_GET['nrp'];
          $img= $_GET['img'];
          $query = "DELETE FROM destinasi WHERE ID_DESTINASI = '$nrp_upd'"; 
          if (is_file("../img/upload/destinasi/".$img)) {
            unlink("../img/upload/destinasi/".$img);
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
          header('Location: index.php?status='.$status);
      }  
  }