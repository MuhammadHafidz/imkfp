<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Monggo Kemah - Perlengkapan</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo1.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

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
    <section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/bg-10.jpg);">
        <div class="bradcumbContent">
            <h2>Perlengkapan</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Book Now Area Start ##### -->
    
    <!-- ##### Book Now Area End ##### -->

        <!-- ##### Rooms Area Start ##### -->
        <section class="rooms-area section-padding-0-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="section-heading text-center">
                            <div class="line-"></div>
                            <h2>Sewa Perlengkapan</h2>
                            <p>Untuk camping</p>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                <?php 
                    include 'admin/conn.php';
                    $query = "select * from perlengkapan"; 
                    $result = mysqli_query(connection(),$query);
                    while($data = mysqli_fetch_array($result)):
                ?>
                    <!-- Single Rooms Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-rooms-area wow fadeInUp" data-wow-delay="100ms">
                            <!-- Thumbnail -->
                            <div class="bg-thumbnail bg-img" style="background-image: url(img/upload/perkap/<?php echo $data['GAMBAR']; ?>);"></div>
                            <!-- Price -->
                            <p class="price-from">Rp.<?php echo $data['HARGA']; ?>/day</p>
                            <!-- Rooms Text -->
                            <div class="rooms-text">
                                <div class="line"></div>
                                <h4><?php echo $data['NAMA_PERLENGKAPAN']; ?></h4>
                                <p><?php echo $data['DESKRIPSI']; ?></p>
                            </div>
                            <!-- Tanyakan Sekarang -->
                            <a href="#" class="book-room-btn btn palatin-btn">Tanyakan Sekarang</a>
                        </div>
                    </div>
                    <?php endwhile ?>
    
                    <div class="col-12">
                        <!-- Pagination -->
                        <div class=" wow fadeInUp" data-wow-delay="400ms">
                            <nav>
                                <ul class="">
                                    <li class="book-room-btn btn palatin-btn"><a class="" href="#" style="color:white!important">Lainya</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
    
                    
    
                </div>
            </div>
        </section>
        <!-- ##### Rooms Area End ##### -->
    

        <?php include 'footer.php'; ?>

</body>
<?php include 'script.php'; ?>
</html>