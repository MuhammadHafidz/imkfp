<?php 
  function contentModal(){
    echo "aas";
  $dataDestinasi = "SELECT * FROM destinasi WHERE $selectedID";
  $getData = mysqli_query(connection(),$dataDestinasi);

  $data = mysqli_fetch_array($getData);
  echo $data['ID_DESTINASI'];  
  echo $data['NAMA'];  
  echo $data['DESKRIPSI'];  
  echo $data['HARGA'];  
  echo $data['LOKASI'];  
  echo $data['ALAMAT'].", ". $data['KOTA'].", ". $data['PROVINSI'];  
  echo $data['GAMBAR'];  
  echo $data['TANGGAL'];  
  echo $data['RATE']; 
  }

  // $selectedID ????

   
  
?>
