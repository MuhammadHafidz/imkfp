<?php 

// include 'admin/conn.php';
  $selectedID = 4;
  $dataDestinasi = "SELECT * FROM destinasi WHERE ID_DESTINASI=$selectedID";
  $getData = mysqli_query(connection(),$dataDestinasi);

  while($data = mysqli_fetch_array($getData)){
  $array[]=$data;
  }
  echo json_encode($array);
  // $selectedID ????

   
  
?>
