<?php
    session_start(); 
    if (!isset($_SESSION['email'])) {
        header("Location: ../login.php");
    }
?>

<html>

<head>
    <title>Kasir Pintar&reg;</title>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../gambar/logokasir.webp">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="theme-color" content="#00796b">

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../dashboard/css/bootstrap.min.css?v=1684252247" rel="stylesheet" />
    <link href="../dashboard/css/fresh-bootstrap-table.css?v=1684252247" rel="stylesheet" />


    <!--  Light Bootstrap Table core CSS    -->
    <link href="../dashboard/css/light-bootstrap-dashboard-v4.css?v=1684252247" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" />

    <link href="../dashboard/css/kp.css?v=1684252247" rel="stylesheet" />
    <meta name="google-signin-client_id"
        content="433891833837-s9t6ombm4qo456h549qo5uqs1r3p9lsl.apps.googleusercontent.com">

    <!--     Fonts and icons     -->
    <script src="../source/js/feather.min.js?v=1684252247"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../source/js/platform.js?v=1684252247" async defer></script>
    <link href="../dashboard/css/morris.css?v=1684252247" rel="stylesheet" />
    <link href="../dashboard/css/MonthPicker.css?v=1684252247" rel="stylesheet" />
    <!-- <link href="https://fonts.googleapis.com/css?family=Asap|Lato" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/intlTelInput.css?v=1684252247">
    <link rel="stylesheet" href="../css/custom.css?v=1684252247">
    <link rel="stylesheet" href="../vendor/toastr/toastr.min.css?v=1684252247">


</head>

<body data-spy="scroll" data-target=".wrapper">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../vendor/spinner-animate/three-quarters.css?v=1684473735">
    <link rel="stylesheet" href="../vendor/spinner-animate/custom.css?v=1684473735">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../source/tour/css/hopscotch.css?v=1684473735">
    <script src="../source/js/raphael-min.js?v=1684473735"></script>
    <script src="../dashboard/js/jquery-1.10.2.js?v=1684473735" type="text/javascript"></script>
    <script src="../source/js/jquery-ui.min.js?v=1684473735"></script>
    <script src="../dashboard/js/morris.js?v=1684473735" type="text/javascript"></script>
    <script type="text/javascript" src="../js/vue.min.js"></script>
    <script src="../js/intlTelInput.js?v=1684473735"></script>
    <script src="../dashboard/js/MonthPicker.js?v=1684473735" type="text/javascript"></script>
    <script src="../source/tour/js/hopscotch.js?v=1684473735"></script>
    <div class="overlay" style="display: none">
        <div class="three-quarters-loader loader-custom">Loading…</div>
    </div>
    <div class="wrapper">
        <div style="background-color: #00AF81" class="sidebar">
            <input type="hidden" name="_token" value="4NyPfyAGe5cgs6K9iP4TwZrClFv6i6M5Yxr5HtUO" />
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a class="simple-text logo-normal"><img
                            src="../images/kasirpintarLogo.webp"
                            style="padding-left: 30px; padding-right: 30px; width: 100%" alt="logo kasir pintar"></a>
                </div>

                <ul class="nav" id="accordion">

                    <?php if ($_SESSION['posisi'] == 'admin' || $_SESSION['posisi'] == 'pemilik') { ?>
                        <li class="">
                            <a href="../account/monitoring.php">
                                <p class="upper-text">Dashboard</p>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION['posisi'] == 'pemilik' || $_SESSION['posisi'] == 'kasir') { ?>
                        <li class="">
                            <a href="../account/Kasir.php">
                                <p class="upper-text">Kasir</p>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION['posisi'] == 'admin' || $_SESSION['posisi'] == 'gudang' || $_SESSION['posisi'] == 'pemilik') { ?>
                        <li class="panel">
                            <a data-toggle="collapse" href="#dataBarang" data-parent="#accordion">
                                <p class="upper-text">Database <span class="caret" style="float: right;"></span></p>
                            </a>
                            <div class="collapse bg-green-dark" id="dataBarang">
                                <ul class="nav" id="accordionSub">
                                    <li class="side-menu">
                                        <a href="../account/database.php">
                                            <p>Barang atau Jasa</p>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="../account/management_stok.php">
                                            <p>Manajemen Stok</p>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="../account/kategori.php">
                                            <p>Kategori</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>

                    <li class="panel">
                        <a data-toggle="collapse" href="#pengaturan" data-parent="#accordion">
                            <p class="upper-text">Pengaturan<span class="caret" style="float: right;"></span></p>
                        </a>
                        <div class="collapse bg-green-dark" id="pengaturan">
                            <ul class="nav" id="accordionSub">
                                <li class="">
                                    <a href="../account/profil.php">
                                        <p>Profil</p>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="../account/changepassword.php">
                                        <p>Ganti Password</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>




                </ul>
            </div>
        </div>
        <div class="main-panel-v2">
            <link href="../source/css/select2.min.css?v=1684252247" rel="stylesheet" />

            <style type="text/css">
                .mobileShow {
                    display: none;
                }

                /* Smartphone Portrait and Landscape */

                @media only screen and (min-device-width: 150px) and (max-device-width: 992px) {
                    .mobileShow {
                        display: inline;
                    }
                }

                .select2-results__message {
                    display: none !important;
                }

                .select2-container .select2-selection--single,
                .select2-container .select2-selection--single .select2-selection__arrow {
                    height: 40px;
                    border: 1px solid #d1d2d3;
                }

                .select2-container--default .select2-selection--single .select2-selection__rendered {
                    line-height: 40px;
                    text-align: left;
                }

                .select2-container--default .select2-results>.select2-results__options {
                    max-height: 100px;
                    overflow-y: auto;
                }
            </style>
















            <nav class="navbar navbar-default drop-shadow" style="background: #fff; border: none; margin-bottom: 0px">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <div class="d-flex flex-row align-items-center" style="margin-right: 60px">
                            <div class="mobileShow">
                                <a style="text-transform: capitalize; font-weight: bold; color: #9A9A9A; display: block; margin-left: 20px;"
                                    href="#" class="dropdown-toggle" data-toggle="dropdown"><br>
                                    <?php
                                        echo $_SESSION['nama'];
                                    ?>
                                    <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                </a>
                                <ul class="dropdown-menu" style="z-index: 1000">
                                    <li class="font-12 medium font-gray-bold"><a href="../account">Masuk
                                            sebagai<br><span class="font-14 font-black">Pusat :
                                                <?php
                                                    echo $_SESSION['nama'];
                                                ?>
                                            </span></a></li>
                                    <li class="medium font-gray-bold"><a href="../account/profil.php">Profil</a></li>

                                    <li class="divider"></li>

                                    <li class="divider"></li>
                                    <li class="medium font-gray-bold"><a href="../account/logout.php"
                                            onclick="signOut();">Keluar</a></li>
                                </ul>
                            </div>
                        </div>

                        <button style="margin-top: -40px;" type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a style="text-transform: capitalize;" href="#" class="font-14 medium font-grey-bold"
                                    class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                        echo $_SESSION['nama'];
                                    ?>
                                    <span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                </a>
                                <ul class="dropdown-menu" style="z-index: 1000">
                                    <li class="medium font-gray-bold"><a href="../account/profil.php">Profil</a></li>
                                    <li class="medium font-gray-bold"><a href="../account/changepassword.php">Ganti
                                            Password</a>
                                    </li>


                                    <li class="divider"></li>
                                    <li class="medium font-gray-bold">
                                        <a onclick="signOut();">Keluar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                        </ul>
                    </div>
                </div>
            </nav>

























            <script src="../source/js/select2.min.js?v=1684473735"></script>
            <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0-rc.4/dist/js.cookie.min.js"
                integrity="sha256-srkrqNQxQ5PTxynPlMErZaHbKkH7Z2slLwYPjq/dLv0=" crossorigin="anonymous"></script>
            <script>
                $('.dropdown-menu').on('click', function (e) {
                    e.stopPropagation();
                });      
            </script>
            <link rel="stylesheet" href="../css/intlTelInput.css">
            <style>
                .iti__flag {
                    background-image: url("../img/flags.png");
                }

                @media (-webkit-min-device-pixel-ratio: 2),
                (min-resolution: 192dpi) {
                    .iti__flag {
                        background-image: url("../img/flags@2x.png");
                    }
                }

                label {
                    font-weight: normal;
                }

                img {
                    object-fit: cover;
                }

                .tooltip>.tooltip-inner {
                    background: #333333;
                }

                .swal2-html-container,
                .swal2-styled.swal2-confirm {
                    font-size: 14px;
                }

                .swal2-styled.swal2-confirm {
                    background-color: #00AF81;
                }

                .modal {
                    background: #eff3f6;
                }

                .popover-content {
                    background: #333333;
                    border-radius: 8px;
                }

                .popover.top>.arrow:after {
                    border-top-color: #333333;
                }

                .popover.bottom>.arrow:after {
                    border-bottom-color: #333333;
                }
            </style>
            <input type="hidden" name="_token" value="vLSHv9gB7d0UmsHosxlFBHlB4lEtUhwkOjCZsuZY" />
            <div class="content bg-main">
                <div class="padd-main">
                    <span class="font-18 semi-bold font-black">Pengaturan Profil</span><br>
                    <div class="row margin-top-20">
                        <div class="col-md-8">
                            <div class="card padd-card">
                                <div class="row margin-top-10" style="margin-bottom: 6px">
                                    <form method="POST" action="../account/editProfil">
                                        <input type="hidden" name="_token"
                                            value="vLSHv9gB7d0UmsHosxlFBHlB4lEtUhwkOjCZsuZY">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <span class="font-12 reguler font-gray-bold">Email</span>
                                                <input disabled value="<?php echo $_SESSION['email']; ?>" type="text" name="email"
                                                    class="form-system" id="p_mail">
                                            </div>
                                            <div class="form-group">
                                                <span class="font-12 reguler font-gray-bold">Nama Lengkap</span>
                                                <input value="<?php echo $_SESSION['nama']; ?>" type="text" name="username" maxlength="80"
                                                    class="form-system" id="p_nama">
                                            </div>
                                            <div class="form-group">
                                                <span class="font-12 reguler font-gray-bold">Nomor Telepon (Harus Aktif)
                                                </span>
                                                <input placeholder="Patern : 08xxxxxxxxxx" value="<?php echo $_SESSION['noHp']; ?>"
                                                    type="tel" minlength="9" maxlength="20" name="no_hp"
                                                    class="form-system" id="hp" readonly>
                                                <!-- <span onclick="changeNumber()"
                                                    class="pass-icon form-eye font-14 font-green medium"
                                                    id="changeNumber" style="cursor: pointer">Ubah Nomor</span>
                                                <span onclick="saveNumber()"
                                                    class="pass-icon form-eye font-14 font-green medium" id="saveNumber"
                                                    style="cursor: pointer; display: none">Verifikasi</span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-md-offset-1">
                                            <a href="../account/changepassword.php" class="btn button-feature wt-100">Ganti
                                                Password</a>
                                            <!-- <button class="btn button-primer wt-100 margin-top-25 upper-text"
                                                id="saveFrom" type="submit">Simpan </button> -->
                                        </div>
                                        <div class="col-md-3 col-md-offset-1"><p></p></div>
                                        <div class="col-md-3 col-md-offset-1" >
                                            <?php
                                                if($_SESSION['posisi'] == 'admin'){
                                                    echo '<a href="../account/CreateKodeRegist.php" class="btn button-feature wt-100" id="adminOnlyKode">
                                                    Create Kode</a>';
                                                }
                                            ?>
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
    <script src="../js/intlTelInput.js"></script>
    <script>
        function signOut() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan keluar dari akun ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../assets/login/endSession.php';
                }
            })
        }
    </script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>

    <footer class="footer fixed-bottom">

        <div class="container-fluid">
        </div>
        </div>
    </footer>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>


</body>
<!--   Core JS Files   -->
<script src="../dashboard/js/bootstrap.min.js?v=1684473735" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="../dashboard/js/bootstrap-checkbox-radio-switch.js?v=1684473735"></script>

<!--  Notifications Plugin    -->
<script src="../dashboard/js/bootstrap-notify.js?v=1684473735"></script>

<!--  Select Plugin    -->
<script src="../dashboard/js/bootstrap-selectpicker.js?v=1684473735"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../dashboard/js/light-bootstrap-dashboard.js?v=1684473735"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../dashboard/js/demo.js?v=1684473735"></script>
<script src="../js/sorttable.js?v=1684473735" type="text/javascript"></script>
<script src="../vendor/toastr/toastr.min.js?v=1684473735"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../source/js/platform.js?onload=onLoad" async defer></script>

</html>