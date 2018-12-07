<?php 

include 'admin/conn.php';
  // $selectedID = $_GET['id'];
  $selectedID = $_GET['id'];
  $dataDestinasi = "SELECT * FROM perlengkapan WHERE ID_PERLENGKAPAN=$selectedID";
  $getData = mysqli_query(connection(),$dataDestinasi);

  $data = mysqli_fetch_array($getData);
  // $selectedID ????
  
  
  echo json_encode($data);?>