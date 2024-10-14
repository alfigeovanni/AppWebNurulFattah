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
    <script src="http://localhost/appnurulfattah/user/assets/js/jquery37.js"></script>
    <script src="http://localhost/appnurulfattah/user/assets/js/jquery37.min.js"></script>
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
                <div class="dropdown">
                    <a class="btn dropdown-toggle" style="background-color:#54BD95" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Materi
                    </a>

                    <ul class="dropdown-menu" style="max-height:130px;overflow-y:scroll" aria-labelledby="dropdownMenuLink">
                        <?php
                        $sql = mysqli_query($kon, "SELECT * FROM tb_materi");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <li><a class="dropdown-item" href="materi.php?sm=<?= $data['nama_materi'] ?>"><?= $data['nama_materi'] ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <?php
                    $sm = $_GET['sm'];

                    ?>
                <?php include('breadcrumb.php'); ?>

                    <label class="form-label h3"><?= $sm ?></label>
                    <div class="data-materi my-3">
                        <?php
                        $batas = 10;
                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                        $previous = $halaman - 1;
                        $next = $halaman + 1;
                        $sql = "SELECT b.id_sub_materi, a.id_materi, b.nama_sub_materi
                        FROM `tb_materi` as a inner join `tb_sub_materi` as b on a.id_materi = b.id_materi
                        where a.nama_materi = '$sm'";
                        $query = mysqli_query($kon, $sql);
                        $jumlah_data = mysqli_num_rows($query);
                        $total_halaman = ceil($jumlah_data / $batas);
                        $sql1 = "SELECT b.id_sub_materi, a.id_materi, b.nama_sub_materi
                        FROM `tb_materi` as a inner join `tb_sub_materi` as b on a.id_materi = b.id_materi
                        where a.nama_materi = '$sm' limit $halaman_awal, $batas";
                        $query1 = mysqli_query($kon, $sql1);
                        $nomor = $halaman_awal + 1;
                        if (!$query1) {
                            die('SQL Error: ' . mysqli_error($kon));
                        }
                        while ($qr = mysqli_fetch_array($query1)) {
                        ?>
                            <div class="my-2">
                                <a href="konten_materi.php?id=<?= $qr['id_sub_materi'] ?>&sm=<?= $sm ?>">
                                    <div class="btn-group dropend d-grip col-md-12 text-start">
                                        <button type="button" style="background-color:#54BD95" class="btn btn-lg text-white col-10">
                                            <?= $qr['nama_sub_materi'] ?>
                                        </button>
                                        <button type="button" style="background-color:#54BD95" class="btn btn text-white dropdown-toggle dropdown-toggle-split col-2" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                    </div>
                                </a>
                            </div>

                            <!-- <div class="row m-1 py-1 px-1" style="background-color:#54BD95">
                                    <div class="col-11 text-white">
                                        
                                    </div>
                                    <div class="col-1">
                                        <a type="button" href="" class="btn" style="color:#54BD91"><i style="color:white" class="bi bi-arrow-right-square-fill"></i></a>
                                    </div>
                                </div> -->
                        <?php
                        }
                        ?>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman > 1) {
                                                            echo "href='?sm=$sm&halaman=$previous'";
                                                        } ?> href="#">Previous</a>
                            </li>
                            <?php
                            for ($x = 1; $x <= $total_halaman; $x++) {
                            ?>
                                <li class="page-item"><a class="page-link" href="?sm=<?= $sm ?>&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                            echo "href='?sm=$sm&halaman=$next'";
                                                        } ?> href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">

    </div>
    <div class="container py-5">

    </div>

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