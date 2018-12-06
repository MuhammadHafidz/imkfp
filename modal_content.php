<?php 

include 'admin/conn.php';
  // $selectedID = $_GET['id'];
  $selectedID = $_GET['id'];
  $dataDestinasi = "SELECT * FROM destinasi WHERE ID_DESTINASI=$selectedID";
  $getData = mysqli_query(connection(),$dataDestinasi);

  $data = mysqli_fetch_array($getData);
  // $selectedID ????
  
  
  echo json_encode($data);?>