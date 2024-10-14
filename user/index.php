<?php include('connection.php') ?>
<!DOCTYPE html>
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
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://localhost/appnurulfattah/user/assets/js/jquery37.js"></script>
    <script src="http://localhost/appnurulfattah/user/assets/js/jquery37.min.js"></script>
    <script src="http://localhost/appnurulfattah/admin/assets/js/plugins/dataTables.min.js"></script>
    <title>Document</title>
    <script>
        new DataTable('#example');
    </script>
    <script>
        $(document).on("click", ".clickLink", function() {
            var fileName = $(this).data('id');
            var judul = $(this).data('');
            path = "http://localhost/Appnurulfattah/admin/pages/file_upload//" + fileName + "#toolbar=0"; // To Hide Toolbar
            var src = $('#myframe').attr('src');;

            $(".modal-body #filename").text(fileName); //sets filename in modal 
            $('.modal-body #myframe').attr('src', path); //sets src value in  in modal iframe
            if (evt.keyCode == 27) {
                // Escape key pressed
                props.onCloseModal();
            }
        });
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>

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
                    <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Materi
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
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
            <div class="col-md-4">
                <?php include('breadcrumb.php'); ?>
                <div class="mb-3">
                    <label class="form-label h3">Start Learning</label>
                    <form action="" method="post">
                        <input type="text" class="form-control" name="search" class="search" placeholder="Cari...">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container py-5">
        <div class="row searchrow">
            <?php
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                                $no = 1;
                                $query = "SELECT * FROM tb_konten_sub_materi 
                            WHERE nama_konten_materi LIKE '$search'";
                                $dt = $kon->prepare($query);
                                $dt->execute();
                                $res1 = $dt->get_result();

                                if ($res1->num_rows > 0) {
            ?>
                <div class="col-md-4"></div>
                <div class="col-md-6 col-sm-12">
                    <div class="table-responsive">
                        <table id="example" class="table table-light table-striped align-items-center text-center myTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary">#</th>
                                    <th class="text-uppercase text-secondary">Nama Konten Materi</th>
                                    <th class="text-uppercase text-secondary"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                    while ($row = $res1->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $row['nama_konten_materi'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                $namepdf = $row['nama_konten_materi'];
                                                ?>
                                                <button type="button" data-bs-toggle="modal" data-id="<?= $row['file_konten_materi'] ?>" data-bs-target="#myModal" class="btn btn-outline-dark clickLink">View</button>
                                                <a type="button" href="../admin/pages/file_upload/<?= $row['file_konten_materi'] ?>" download="<?= $row['file_konten_materi'] ?>">
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
                <?php
                                } else {
                ?>
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger" role="alert">
                        Data tidak ditemukan!
                    </div>
                </div>
                <?php
                                }
                ?>
                </div>
            <?php
            }
            ?>
        </div>
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
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog" style="max-width: 80% !important;" role="document">
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