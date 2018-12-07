<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Title -->
	<title>Monggo Kemah - Destination</title>

	<!-- Favicon -->
	<link rel="icon" href="img/core-img/logo1.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
	 crossorigin="anonymous">

	<!-- Core Stylesheet -->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap-rating.css">
	<?php include 'script.php' ?>



</head>

<body>
	<!-- Preloader -->
	<div class="preloader d-flex align-items-center justify-content-center">
		<div class="cssload-container">
			<div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
		</div>
	</div>

	<?php include 'navbar.php'; ?>


	<!-- ##### Breadcumb Area Start ##### -->
	<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/bg-7.jpg);">
		<div class="bradcumbContent">
			<h2>Destinasi</h2>
		</div>
	</section>

	<!-- ##### Rooms Area Start ##### -->
	<section class="rooms-area section-padding-0-100">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-6">
					<div class="section-heading text-center">
						<div class="line-"></div>
						<h2>Pilih Destinasi</h2>
						<p>Silahkan pilih apa yang anda mau!</p>
					</div>
				</div>
			</div>
			<div class="recomendation">
				<span>Recomendation</span>
			</div>
			<div class="row">

				<?php 
		  	include 'admin/conn.php';
			$query = "select * from destinasi"; 
			$result = mysqli_query(connection(),$query);
			while($data = mysqli_fetch_array($result)):
			?>
				<!-- Single Rooms Area -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="single-rooms-area wow fadeInUp " data-wow-delay="100ms">
						<!-- Thumbnail -->
						<!-- $data['ID'] -->
						<div class="bg-thumbnail bg-img" style="background-image: url(img/upload/destinasi/<?php echo $data['GAMBAR']; ?>);">
						</div>
						<!-- Price -->
						<p class="price-from">Rp.
							<?php echo $data['HARGA']; ?>/malam</p>
						<!-- Rooms Text -->
						<div class="rooms-text">
							<div class="line"></div>
							<h4>
								<?php echo $data['NAMA']; ?>
							</h4>
							<p>
								<?php //echo $data['DESKRIPSI']; ?>
								<br>
								<?php echo $data['KOTA']; ?>-
								<?php echo $data['PROVINSI']; ?>
							</p>
						</div>
						<!-- Tanyakan Sekarang -->
						<button onclick="passIDModal(<?php echo $data['ID_DESTINASI']; ?>)" type="button" class="book-room-btn btn palatin-btn">Cek
							Detail</button>


					</div>
				</div>

				<?php endwhile ?>

				<div class="col-12">
					<!-- Pagination -->
					<div class=" wow fadeInUp" data-wow-delay="400ms">
						<nav>
							<ul class="">
								<li class="book-room-btn btn palatin-btn pull-right"><a class="" href="" style="color:white!important">Lainya</a></li>
							</ul>

						</nav>
					</div>
				</div>



			</div>
		</div>
	</section>
	<!-- ##### Rooms Area End ##### -->

	<!-- Modal Start Here-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header color">
					<h5 class="modal-title" id="exampleModalLabel"></h5>
				</div>
				<div class="modal-body" id="showdata">

					<div class="d_gambar" id="d_gambar"><img></div>
					<input id="rateStar" type="hidden" class="rating" data-filled="fas fa-star yellow" data-empty="far fa-star yellow"
					 data-readonly value="5" /><span id="rateText"></span>
					[<span id="d_alamat"></span> - <span id="d_kota"></span>,<span id="d_provinsi"></span>]
					<hr>
					<span>Lokasi : </span><span id="d_lokasi"></span>
					<div class="d_deskripsi" id="d_deskripsi"></div>
					<hr>
					<h5 id="d_harga"></h5>


				</div>
				<div class="modal-footer">
					<a href="" class="btn btn-warning" id="carigambar" target="_blank">Gambar Lain</a>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal End Here -->


	<?php include 'footer.php'; ?>


</body>
<script type="text/javascript">
	function passIDModal(id) {
		$.ajax({
			type: "GET",
			url: "modal_content.php",
			dataType: "JSON",
			data: {
				id: id
			},
			success: function (data) {
				$.each(data, function (ID_DESTINASI, NAMA, DESKRIPSI, HARGA, LOKASI, ALAMAT, KOTA, PROVINSI, GAMBAR, RATE) {
					$('#exampleModal').modal('show');
					$('#exampleModalLabel').text(data.NAMA);
					$('#d_gambar img').attr("src", "img/upload/destinasi/" + data.GAMBAR);
					$('#d_deskripsi').html(data.DESKRIPSI);
					$('#d_harga').html("Sewa : Rp " + data.HARGA + ",- / Malam");
					$('#d_lokasi').html(data.LOKASI);
					$('#d_alamat').html(data.ALAMAT);
					$('#d_provinsi').html(data.PROVINSI);
					$('#d_kota').html(data.KOTA);
					$('#rateStar').val(data.RATE);
					$('#rateText').text(data.RATE);
					$('#carigambar').attr("href", "https://www.google.com/search?q=Kemah" + data.NAMA + "&source=lnms&tbm=isch",
						"_blank");
				});
			}
		});
	}
</script>

</html>