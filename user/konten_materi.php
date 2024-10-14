<!DOCTYPE html>
<?php include('connection.php') ?>

<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Outfit&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=DM+Sans&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />

    <link href="./assets/css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
  <link rel="icon" type="image/png" href="http://localhost/appnurulfattah/admin/assets/img/logos/logo.png">
  <title>
    Pesantren Nurul Fattah | User
  </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="http://localhost/appnurulfattah/user/assets/js/jquery37.js"></script>
    <script src="http://localhost/appnurulfattah/user/assets/js/jquery37.min.js"></script>
  <script src="http://localhost/appnurulfattah/admin/assets/js/plugins/dataTables.min.js"></script>
  <script>
    $(document).on("click", ".clickLink", function () {
	var fileName = $(this).data('id');
    var judul = $(this).data('');
	path = "http://localhost/Appnurulfattah/admin/pages/file_upload//"+fileName+"#toolbar=0";  // To Hide Toolbar
	var src = $('#myframe').attr('src'); ;

	$(".modal-body #filename").text(fileName);   //sets filename in modal 
	$('.modal-body #myframe').attr('src', path);   //sets src value in  in modal iframe
    if (evt.keyCode == 27) {
        // Escape key pressed
        props.onCloseModal();
    }
	});
    
  </script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 py-5">
                <H3>
                    <a style="text-decoration:none;color:#54BD95" href="index.php">PONDOK PESANTREN NURUL FATTAH</a> 
                </H3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 ">
                <div class="dropdown" >
                    <a class="btn dropdown-toggle" style="background-color:#54BD95" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Materi
                    </a>

                    <ul class="dropdown-menu" style="max-height:130px;overflow-y:scroll" aria-labelledby="dropdownMenuLink">
                    <?php 
                    $sql=mysqli_query($kon,"SELECT * FROM tb_materi");
                    while ($data=mysqli_fetch_array($sql)) {
                ?>
                        <li><a class="dropdown-item" href="materi.php?sm=<?=$data['nama_materi']?>"><?= $data['nama_materi'] ?></a></li>
                <?php
                    }
                ?>
                    </ul>
                </div>
                
            </div>
            <div class="col-md-8">
                <div class="row mb-3">
                <?php include('breadcrumb.php'); ?>
                    <?php
                    $sm=$_GET['sm'];
                    $idsub=$_GET['id'];
                    ?>
                    <label class="form-label h3"><?=$sm?></label>
                    <div class="card col-12">
                    <div class="card-body my-3">
                    <div class="table-responsive">
                    <table id="example" class="table align-items-center text-center">
                        <thead>
                            <tr>
                            <th class="text-uppercase text-secondary">#</th>
                            <th class="text-uppercase text-secondary">Nama Konten Materi</th>
                            <th class="text-uppercase text-secondary"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT b.* FROM `tb_sub_materi` as a inner join `tb_konten_sub_materi` as b
                            on a.id_sub_materi = b.id_sub_materi where b.id_sub_materi = '$idsub'";
                            $query = mysqli_query($kon, $sql);
                            if (!$query) {
                                die('SQL Error: ' . mysqli_error($kon));
                            }
                            $no=1;
                            while ($qr = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td>
                                    <?=$no++?>
                                </td>
                                <td>
                                    <?= $qr['nama_konten_materi'] ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    $namepdf = $qr['nama_konten_materi'];
                                    ?>
                                    <button type="button" data-bs-toggle="modal" data-id="<?=$qr['file_konten_materi']?>" data-bs-target="#myModal" class="btn btn-outline-dark clickLink">View</button>
                                    <a type="button" href="../admin/pages/file_upload/<?= $qr['file_konten_materi'] ?>" download="<?= $qr['file_konten_materi'] ?>">
                                    <button class="btn btn-success">Download</button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">

    </div>
    <div class="container py-5">

    </div>
<!-- The Modal -->
<div class="modal" id="myModal">
<div class="modal-dialog"  style="max-width: 80% !important;" role="document">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title"><?= $namepdf ?></h4>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<!-- Modal body -->
<div class="modal-body">
<iframe src="" width="100%" height="500px" id="myframe"></iframe>  
</div>

<!-- Modal footer -->
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>

</div>
</div>
</div>

</div><!-- Model End   -->
<div class="bg-dark">
        <footer class="sticky-bottom py-5 text-white container">
            <div class="row">
                <div class="col-6 col-md-2 mb-3 text-center">
                    <img class="w-50" src="./assets/img/logo.png" alt="">
                </div>

                <div class="col-6 col-md-4 mb-3">
                    <p style="font-size:13px">
                        Pondok Pesantren Nurul Fattah, sebagai lembaga pendidikan Islam yang berpusat di tengah masyarakat, memiliki peran sentral dalam membentuk karakter dan pengetahuan agama peserta didiknya.
                        Dengan fondasi kuat pada tradisi keilmuan Islam, pondok pesantren ini menjadi pilar penting dalam menjaga dan menyebarkan pengetahuan keagamaan.
                    </p>
                </div>
                <div class="col-md-3 mb-3">
                    <p class="h5">Lokasi</p>
                    <span style="font-size:13px">Gn. Bunder 2, Kec. Pamijahan, Kabupaten Bogor, Jawa Barat 16810</span>
                </div>
                <div class="col-md-3 mb-3">
                    <p class="h5">Kontak</p>
                    <span style="font-size:13px">support@NurulFattah.id</span>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>&copy; 2024 Company, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex ">
                    <li class="ms-3 h5"><a class="link-body-emphasis" href="#"><i class="bi bi-facebook text-white"></i></a></li>
                    <li class="ms-3 h5"><a class="link-body-emphasis" href="#"><i class="bi bi-twitter text-white"></i></a></li>
                    <li class="ms-3 h5"><a class="link-body-emphasis" href="#"><i class="bi bi-instagram text-white"></i></a></li>
                </ul>
            </div>
        </footer>
    </div>
</body>

</html>
<style>
    @media only screen and (min-width: 200px) and (max-width: 700px){
        div.bg-dark{
            position: fixed !important;
            bottom:0;
            right:0;
            left:0;
        }
    }
</style>
<script>
    new DataTable('#example');

    
  </script>