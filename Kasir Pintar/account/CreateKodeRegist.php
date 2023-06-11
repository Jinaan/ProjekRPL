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
    <link href="../dashboard/css/light-bootstrap-dashboard-v4.css?v=1684252247"
        rel="stylesheet" />
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
    <script src="../dashboard/js/jquery-1.10.2.js?v=1684252247" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            console.log('ready');
            setTable();
        });
    </script>
</head>

<body data-spy="scroll" data-target=".wrapper">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../vendor/spinner-animate/three-quarters.css?v=1684252247">
    <link rel="stylesheet" href="../vendor/spinner-animate/custom.css?v=1684252247">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../source/tour/css/hopscotch.css?v=1684252247">
    <script src="../source/js/raphael-min.js?v=1684252247"></script>
    <script src="../source/js/jquery-ui.min.js?v=1684252247"></script>
    <script src="../dashboard/js/morris.js?v=1684252247" type="text/javascript"></script>
    <script type="text/javascript" src="../js/vue.min.js"></script>
    <script src="../js/intlTelInput.js?v=1684252247"></script>
    <script src="../dashboard/js/MonthPicker.js?v=1684252247" type="text/javascript"></script>
    <script src="../source/tour/js/hopscotch.js?v=1684252247"></script>
    <div class="overlay" style="display: none">
        <div class="three-quarters-loader loader-custom">Loading…</div>
    </div>
    <link href="../assets/css/croppie.css" rel="stylesheet" />
    <script src="../assets/js/croppie.js" type="text/javascript"></script>
    <link href="../dashboard/css/select_data_table.css" rel="stylesheet" />
    <link href="../source/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../vendor/spinner-animate/three-quarters.css">
    <link rel="stylesheet" href="../vendor/spinner-animate/custom.css">
    <link rel="stylesheet" href="../source/css/bootstrap-select.min.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>
    <style>
        @media screen and (min-device-width: 768px) {
            .import-detail {
                width: 650px;
            }
        }

        .popover {
            z-index: 1060;
        }

        .sku-mg {
            margin-right: 10px;
        }

        .button-silver {
            border: 1px solid #00AF81 !important;
            background: #D8FFDA !important;
            color: black !important;
            font-weight: 500;
            font-size: 14;
        }

        .button-putih {
            background: #ffffff;
            border: 1px solid #D1D2D3;
            color: black;
            font-weight: 500;
            font-size: 14;
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

        .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: auto;
            height: 0;
        }

        .btn-group.bootstrap-select .dropdown-menu {
            margin-top: 38px;
        }

        .btn-group>.btn:first-child {
            border: 1px solid #d1d2d3;
            opacity: 0.8;
            color: black;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            border-left: none;
            height: 40px;
        }

        .error {
            float: left;
            color: #E21D1D !important;
        }

        .input-group-addon {
            opacity: 0.7;
        }

        .has-error .form-control,
        .form-control.error,
        .has-error .form-control:focus {
            border-color: #E21D1D !important;
        }

        table.dataTable tbody td.select-checkbox:before {
            width: 15px;
            height: 15px;
        }

        table.dataTable tr.selected td.select-checkbox:after {
            margin-top: -7px;
        }

        .swal2-modal .swal2-title,
        .swal2-html-container {
            font-size: 14px !important;
            color: black;
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 1.5rem;
            clear: both;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }

        .dropdown-item:hover {
            color: #00AF81;
        }

        .nav-pills {
            margin-left: 20%;
        }

        .nav-pills>li {
            width: 170px;
            text-align: center;
        }

        .nav-pills>li>a {
            border: 1px solid #d1d2d3;
            color: #606060;
            font-weight: 500;
            cursor: pointer;
        }

        .nav-link.active,
        .nav-link.active:focus,
        .nav-link.active:hover {
            background: #00AF81;
            color: #ffffff !important;
            border: 1px solid #00AF81;
        }

        .nav-link {
            background: #ffffff;
            width: auto;
        }
    </style>
    <div class="overlay" style="display: none">
        <div class="three-quarters-loader loader-custom">Loading…</div>
    </div>
    <div class="wrapper">
        <div style="background-color: #00AF81" class="sidebar">
        <div class="sidebar-wrapper">
                <div class="logo">
                    <a class="simple-text logo-normal"><img
                            src="../images/kasirpintarLogo.webp"
                            style="padding-left: 30px; padding-right: 30px; width: 100%" alt="logo kasir pintar"></a>
                </div>

                <ul class="nav" id="accordion">

                    <?php if ($_SESSION['posisi'] == 'admin' || $_SESSION['posisi'] == 'pemilik' || $_SESSION['posisi'] == 'Admin' || $_SESSION['posisi'] == 'Pemilik') { ?>
                        <li class="">
                            <a href="../account/monitoring.php">
                                <p class="upper-text">Dashboard</p>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION['posisi'] == 'pemilik' || $_SESSION['posisi'] == 'kasir' || $_SESSION['posisi'] == 'Pemilik' || $_SESSION['posisi'] == 'Kasir') { ?>
                        <li class="">
                            <a href="../account/Kasir.php">
                                <p class="upper-text">Kasir</p>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION['posisi'] == 'admin' || $_SESSION['posisi'] == 'gudang' || $_SESSION['posisi'] == 'Pemilik' || $_SESSION['posisi'] == 'Admin' || $_SESSION['posisi'] == 'Gudang' || $_SESSION['posisi'] == 'pemilik') { ?>
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
            <script>
                $(document).ready(function () {
                    $(".alert").fadeTo(5000, 1000).slideUp(1000, function () {
                        $(".alert").slideUp(1000);
                    });
                });
            </script>
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
                                    <li class="medium font-gray-bold"><a 
                                            onclick="signOut();">Keluar</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                        </ul>

                    </div>
                </div>
            </nav>



















            <?php
                include '../assets/util/koneksi.php';
                ?>



            <script src="../source/js/select2.min.js?v=1684252247"></script>
            <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0-rc.4/dist/js.cookie.min.js"
                integrity="sha256-srkrqNQxQ5PTxynPlMErZaHbKkH7Z2slLwYPjq/dLv0=" crossorigin="anonymous"></script>



            <div class="padd-main bg-main">
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
                                            <select name="posisiOption" id="posisiOption" class="form-control">
                                                <option value="" selected="">Pilih Posisi</option>
                                                <option value="Kasir">Kasir</option>
                                                <option value="Gudang">Gudang</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Pemilik">Pemilik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-md-offset-1">
                                        <a class="btn button-feature wt-100" disabled id="saveFrom">Generate Kode</a>
                                        <!-- <button class="btn button-primer wt-100 margin-top-25 upper-text"
                                            id="saveFrom" type="submit">Simpan </button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div>
                    <div class="center_panel panel-table" id="dtable" style="width: 66%;">
                        <table class="table datatable mdl-data-table dataTable" cellspacing="0" nwidth="100%"
                            role="grid" style="width: 100%; float: left;">
                            <thead class="tb-border">
                                <tr>
                                    <!-- <td class="tb-head">
                                        <input type="checkbox" id="allBarang" class="margin-10-l">
                                    </td> -->
                                    <td class="tb-head">Kode</td>
                                    <td class="tb-head">Posisi</td>
                                </tr>
                            </thead>
                            <tbody class="font-14" id="BodyTabel">
                            </tbody>
                        </table>
                    </div>
                </div>
                <footer class="footer fixed-bottom" style="width: 66%;">
                    <div class="container-fluid">
                    </div>
                </footer>
            </div>
        </div>
        <style type="text/css">
            .error {
                color: red;
            }
        </style>

    </div>




    <!--  Bootstrap Table Plugin    -->
    <script src="../source/js/select2.min.js"></script>
    <script src="../dashboard/js/kp.js?v=1684252247"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#posisiOption').select2({
                placeholder: "Pilih Posisi",
                allowClear: true
            });
        });

        $(document).ready(function () {
            $('#posisiOption').on('change', function () {
                var posisi = $(this).val();
                if (posisi == ''){
                    $('#saveFrom').attr('disabled', true);
                } else {
                    $('#saveFrom').attr('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#saveFrom').on('click', function () {
                var posisi = $('#posisiOption').val();
                // submit to 
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "Action/ADMIN/genKode.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        var response = this.responseText;
                        console.log(response);
                        if (response == 'false') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Kode gagal digenerate',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            response = JSON.parse(response);
                            var tBody = document.getElementById('BodyTabel');
                            tBody.innerHTML = '';
                            for (var i = 0; i < response.length; i++) {
                                var row = tBody.insertRow(i);
                                var cell1 = row.insertCell(0);
                                var cell2 = row.insertCell(1);

                                cell1.innerHTML = response[i].kode;
                                cell2.innerHTML = response[i].posisi;
                            }
                        }
                    }
                };
                xhr.send("posisi=" + posisi);
            });
        });


        function setTable(){
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "Action/ADMIN/getTable.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    var response = this.responseText;
                    console.log(response);
                    if (response == 'false') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Kode gagal digenerate',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            location.reload();
                        });

                    } else {
                        response = JSON.parse(response);
                        var tBody = document.getElementById('BodyTabel');
                        tBody.innerHTML = '';
                        for (var i = 0; i < response.length; i++) {
                            var row = tBody.insertRow(i);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);

                            cell1.innerHTML = response[i].kode;
                            cell2.innerHTML = response[i].posisi;
                        }
                    }
                }
            };
            xhr.send();
        }
    </script>


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

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>



</body>
<!--   Core JS Files   -->
<script src="../dashboard/js/bootstrap.min.js?v=1684252247" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="../dashboard/js/bootstrap-checkbox-radio-switch.js?v=1684252247"></script>

<!--  Notifications Plugin    -->
<script src="../dashboard/js/bootstrap-notify.js?v=1684252247"></script>

<!--  Select Plugin    -->
<script src="../dashboard/js/bootstrap-selectpicker.js?v=1684252247"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../dashboard/js/light-bootstrap-dashboard.js?v=1684252247"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../dashboard/js/demo.js?v=1684252247"></script>
<script src="../js/sorttable.js?v=1684252247" type="text/javascript"></script>
<script src="../vendor/toastr/toastr.min.js?v=1684252247"></script>
</html>
