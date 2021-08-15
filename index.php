<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="assets/css/body.css">
    <link rel="stylesheet" href="assets/css/checkbox.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/icon/css/all.min.css">

    <link rel="icon" href="assets/images/favicon.png">

    <!-- Sweet Alert CSS -->
    <link rel=" stylesheet" href="assets/plugin/sweetalert2/dist/sweetalert2.min.css">

    <!-- Sweet Alert Javascript -->
    <script src="assets/plugin/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="assets/plugin/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/modal.js"></script>

    <title>Indonesian Statistics || Beranda</title>
</head>

<body>

    <?php
    if (isset($_GET["task"])) {
        $p = $_GET["task"];
        if ($p == "signup-success")
            echo '<script>',
            'successsignup()',
            '</script>';
        else if ($p == "signup-failed") {
            echo '<script>',
            'failedsignup("Periksa kembali isian data anda")',
            '</script>';
        }

        if ($p == "login-success-user") {
            echo '<script>',
            'successloginuser()',
            '</script>';
        } else if ($p == "login-failed-user") {
            echo '<script>',
            'failedloginuser()',
            '</script>';
        } else if ($p == "login-success-admin") {
            echo '<script>',
            'successloginadmin()',
            '</script>';
        } else if ($p == "login-failed-admin") {
            echo '<script>',
            'failedloginadmin()',
            '</script>';
        }
    }
    ?>

    <div class="container-fluid">

        <!-- Form Register -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 bg-vector">
                    <div class="card-body p-0">
                        <div class="row">
                            <!-- cover -->
                            <div class="col-sm d-none d-lg-block">
                                <div class="p-5 position-relative">
                                    <div class="text-center mt-5">
                                        <h1 class="h1 judul text-bold">INDONESIAN STATISTICS</h1>
                                        <p class="desc">
                                            "Aplikasi Pendataan Penduduk dan Kuisioner Online Berbasis
                                            Web dan Mobile"
                                        </p>
                                    </div>
                                    <center>
                                        <img src="assets/images/vector-cover-light.png" width="100%">
                                    </center>
                                </div>

                            </div>

                            <!-- form control -->
                            <div class="col-sm">
                                <div class="card border-0 shadow card-login">
                                    <div class="card-body p-0">
                                        <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button" role="tab" aria-controls="signup" aria-selected="false">SignUp</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                                <form method="POST" name="myForm" action="assets/php/login.php">

                                                    <div class="row justify-content-center mt-5">

                                                        <div class="text-center mt-5">
                                                            <h1 class="h2 judul text-bold">LOGIN</h1>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10 mt-5">
                                                            <div class="input-container mx-2">
                                                                <i class="far fa-user icon"></i>
                                                                <input class="input-field" type="text" placeholder="Username" name="usrnm" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="input-container mx-2" id="show_hide_password">
                                                                <i class="fas fa-lock icon"></i>
                                                                <input class="input-field toggle-container" type="password" id="password" placeholder="Password" name="pwd" required>
                                                                <span>
                                                                    <i class="far fa-eye-slash icon-toggle" aria-hidden="true" id="eye" onclick="toggle();"></i>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="input-container mx-2">
                                                                <i class="fas fa-user-cog icon"></i>
                                                                <select class="input-field form-select" aria-label="Default select example" name="selectlogin" required>
                                                                    <option value="" disabled selected>Login sebagai...</option>
                                                                    <option value="Penduduk">Penduduk</option>
                                                                    <option value="Admin">Admin</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="d-flex justify-content-between mx-3">
                                                                <div class="form-group my-4">
                                                                    <label class="container font-check">Remember Me
                                                                        <input type="checkbox">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                                <a href="#" class="link my-4">Forgot Password?</a>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="d-grid gap-2 mx-2">
                                                                <button type="submit" class="btn btn-red rounded-pill shadow mb-4"><i class="fas fa-lock"></i>
                                                                    MASUK</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                                                <form id="signupForm">

                                                    <div class="row justify-content-center mt-5">

                                                        <div class="text-center mt-5">
                                                            <h1 class="h2 judul text-bold">SIGN UP</h1>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10 mt-5">
                                                            <div class="input-container mx-2">
                                                                <i class="far fa-user icon"></i>
                                                                <input class="input-field" type="text" placeholder="Username" name="usrnm" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="input-container mx-2 pass-valid1" id="show_hide_password">
                                                                <i class="fas fa-lock icon"></i>
                                                                <input class="input-field toggle-container pass-one" type="password" id="password" placeholder="Password" name="pwd" required>
                                                                <span class="icon-tog1">
                                                                    <i class="far fa-eye-slash icon-toggle" aria-hidden="true" id="eye-one" onclick="togglepswsatu();"></i>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="input-container mx-2 pass-valid2" id="show_hide_password">
                                                                <i class="fas fa-lock icon"></i>
                                                                <input class="input-field toggle-container pass-two" type="password" id="password" placeholder="Re-type Password" name="repwd" required>
                                                                <span class="icon-tog2">
                                                                    <i class="far fa-eye-slash icon-toggle" aria-hidden="true" id="eye-two" onclick="togglepswdua();"></i>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="input-container mx-2">
                                                                <i class="fas fa-id-card-alt icon"></i>
                                                                <input class="input-field" type="text" placeholder="No. KK" name="familycardnumber" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="input-container mx-2">
                                                                <i class="fas fa-id-card icon"></i>
                                                                <input class="input-field" type="text" placeholder="No. KTP" name="idnumber" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="input-container mx-2">
                                                                <i class="far fa-id-badge icon"></i>
                                                                <input class="input-field" type="text" placeholder="Nama Lengkap (sesuai KTP)" name="fullname" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="input-container mx-2">
                                                                <i class="fas fa-phone icon"></i>
                                                                <input class="input-field" type="text" placeholder="No.HP" name="phone" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="d-flex mx-2">
                                                                <div class="form-group my-4">
                                                                    <label class="container font-check"> Saya menjamin kebenaran data saya
                                                                        <input type="checkbox" id="myCheck" onclick="checkedbox();">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-10 col-md-10">
                                                            <div class="d-grid gap-2 mx-2">
                                                                <button type="submit" class="btn btn-red rounded-pill shadow mb-4" id="btnsubmit"><i class="fas fa-paper-plane"></i>
                                                                    DAFTAR</button>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="assets/js/javascript.js"></script>
        <script src="assets/js/validation.js"></script>
        <script src="assets/js/registration.js"></script>
</body>

</html>