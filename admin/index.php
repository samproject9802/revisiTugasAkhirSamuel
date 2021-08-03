<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INDOSTAT - Dashboard Admin</title>

    <link rel="icon" href="../assets/images/favicon.png" type="">

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/plugin/datepicker/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../assets/plugin/datepicker/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="../assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugin/smartwizard/dist/css/smart_wizard_arrows.min.css">
    <link rel="stylesheet" href="../assets/plugin/datepicker/jquery-datetimepicker/build/jquery.datetimepicker.min.css">

    <l src="../assets/plugin/bs5/dist/js/bootstrap.js"></l>
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../assets/plugin/sweetalert2/dist/sweetalert2.min.css">

    <!-- Kuisioner Library -->
    <link rel="stylesheet" href="https://unpkg.com/survey-core@1.8.53/survey.css" />
    <script src="https://unpkg.com/knockout@3.5.1/build/output/knockout-latest.js"></script>
    <script src="https://unpkg.com/survey-knockout@1.8.53/survey.ko.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.1.0/velocity.min.js"></script>
    <link rel="stylesheet" href="../assets/css/survey.css">
</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once 'tools/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once 'tools/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    if ($page == "dashboard") {
                        require_once 'content/dashboard.php';
                    } elseif ($page == "profile") {
                        require_once 'content/profile.php';
                    } elseif ($page == "input-data") {
                        require_once 'content/inputdata.php';
                    } elseif ($page == "kelola-data") {
                        require_once 'content/keloladata.php';
                    } elseif ($page == "kelola-judul") {
                        require_once 'content/kelolajudul.php';
                    }elseif ($page == "kelola-bagian") {
                        require_once 'content/kelolabagian.php';
                    }elseif ($page == "hasil-survei") {
                        require_once 'content/hasilsurvei.php';
                    }
                } else {
                    require_once 'content/dashboard.php';
                }
                ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once 'tools/footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="php/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Modal-->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Keluarga</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="php/inputdatakeluarga.php">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nomor Induk Kependudukan</label>
                            <input type="identitynumber" class="form-control" id="exampleFormControlInput1" name="identitynumber">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                            <input type="fullname" class="form-control" id="exampleFormControlInput1" name="fullname">
                        </div>
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Gender" id="exampleRadios1" value="Laki-Laki">
                                <label class="form-check-label" for="inlineCheckbox1">Laki - Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Gender" id="exampleRadios1" value="Perempuan">
                                <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                            <input type="borncity" class="form-control" id="exampleFormControlInput1" name="borncity">
                        </div>
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                        <div class="mb-3">
                            <input class="input--style-2 js-datepicker" type="text" placeholder="Tanggal lahir" name="birthday">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar icon"></i>
                        </div>
                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="familystatus">
                                <option selected>Pilih salah satu...</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                                <option value="Saudara">Saudara/Keponakan</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit" name="savedata">Save Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <!-- Main JS-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="../assets/plugin/smartwizard/dist/js/jquery.smartWizard.min.js"></script>
    <script src="../assets/plugin/datepicker/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
    <script src="../assets/plugin/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/smartwizard.js"></script>
    <script src="../assets/js/datepicker.js"></script>
    <script src="../assets/js/datatable.js"></script>
    
    <!-- Survey Generator JS -->
    <script src="../assets/js/surveygenerator/judul.js"></script>
    <script src="../assets/js/surveygenerator/bagian.js"></script>
    <script src="../assets/js/surveygenerator/showkuisioner.js"></script>

</body>

</html>