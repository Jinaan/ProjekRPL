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
    <link rel="stylesheet" href="../vendor/spinner-animate/three-quarters.css?v=1684252247">
    <link rel="stylesheet" href="../vendor/spinner-animate/custom.css?v=1684252247">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../source/tour/css/hopscotch.css?v=1684252247">
    <script src="../source/js/raphael-min.js?v=1684252247"></script>
    <script src="../dashboard/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="../dashboard/js/jquery-1.10.2.js?v=1684252247" type="text/javascript"></script>
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

























            <script src="../source/js/select2.min.js?v=1685207735"></script>
            <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0-rc.4/dist/js.cookie.min.js"
                integrity="sha256-srkrqNQxQ5PTxynPlMErZaHbKkH7Z2slLwYPjq/dLv0=" crossorigin="anonymous"></script>
            <div class="padd-main" id="get_checkbox">
                <span class="font-18 semi-bold font-black">Kategori</span><br>
                <span class="font-14 medium font-gray-bold">Database / Kategori</span>
                <div class="card padd-card margin-top-20">
                    <div class="row">
                        <div class="col-md-9">
                            <a class="btn button-primer" data-toggle="modal" data-target="#tambahBaru">
                                Tambah Kategori</a>&nbsp;&nbsp;
                            <a class="btn button-merah" id="btnHapus" data-toggle="modal" data-target="#hapusBarang"
                                style="display: none;">
                                Hapus Semua Kategori </a>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="search" id="myInputTextField" placeholder="Cari Kategori"
                                    class="form-control wt-100" onkeyup="searchKategori()">
                                <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="center_panel panel-dataTable" id="dtable">
                        <table class="table datatable mdl-data-table dataTable" cellspacing="0" nwidth="100%"
                            role="grid" style="width: 100%; float: left;">
                            <thead class="tb-border">
                                <tr>
                                    <!-- <td class="tb-head" data-sortable="false"><input type="checkbox" id="allBarang"
                                            class="margin-10-l"></td> -->
                                    <td class="tb-head select-checkbox sorting_disabled" data-sortable="false"
                                        rowspan="1" colspan="1" style="width: 30px;" aria-label="">
                                        <!-- <input type="checkbox" id="allBarang" class="margin-10-l"> -->
                                    </td>
                                    <td class="tb-head" data-sortable="true">Kategori</td>
                                    <td class="tb-head" data-sortable="false">Aksi</td>
                                </tr>
                            </thead>
                            <tbody class="font-14">
                                <?php
                                    include '../assets/util/koneksi.php';
                                    $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                                    $cur = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        if ($cur % 2 == 0) {
                                            echo '<tr class="even">';
                                        } else {
                                            echo '<tr class="odd">';
                                        }
                                        echo '<td class="CheckBoxKategori1 select-checkbox" ></td>';
                                        echo '<td>' . $row['namaKategori'] . '</td>';
                                        // content aksi td
                                        echo "<td>
                                            <a  idKategori=".$row["idKategori"]." namaKategori=".$row["namaKategori"]." class='btn EditBtn button-edit-detail-delete font-black' style='text-transform: capitalize;' >Edit</a> 
                                            <a  class='btn button-edit-detail-delete font-red' onclick='confirm_delete(" . $row['idKategori'] . ")'>Hapus</a>  
                                            <a  class='btn button-edit-detail-delete font-red' onclick='confirm_delete_product()'>Hapus Beserta Barang</a>
                                        </td>";
                                        
                                        echo '</tr>';
                                        $cur++;
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="right_panel" style="background: white">
                        <div onclick="closeRighSide()">
                            <img src="../assets/img/close.png" style="width: 12px;">
                        </div>
                        <div class="right_side">
                        </div>
                    </div>
                </div>
            </div>
            <!-- small modal -->
            <div class="modal fade" id="hapusBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-small ">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="card-title">Apakah Anda yakin akan menghapus kategori?</h4>
                        </div>
                        <div class="modal-body text-center">
                            <div class="card-content">
                                <p>Data Kategori yang telah dihapus tidak dapat dikembalikan lagi!</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="hapus_barang" class="btn btn-primary pull-right"
                                data-dismiss="modal">ya</button>
                            <button type="button" class="btn btn-simple pull-right" data-dismiss="modal">batal</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
            .error {
                color: red;
            }
        </style>





        <!-- small modal -->
        <div class="modal fade" id="tambahBaru" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-small ">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="card-title">Tambah Kategori</h4>
                    </div>
                    <form method="POST" action="../assets/util/addKategori.php"
                        enctype="multipart/form-data">
                        <div class="modal-body text-center">
                            <div class="card-content">


                                <input hidden name="mode" value="baru">
                                <div id="form-soal" class="form-group label-floating">

                                    <div class="form-group float-label-control">
                                        <p for="" class="p-reg">Nama Kategori</p>
                                        <input name="NamaKategoriNew" type="text"
                                            maxlength="80" class="form-control" placeholder="Masukkan Nama Kategori"
                                            required>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn button-bdr-hj" data-dismiss="modal">batal</button>
                            <button type="button" id="TambahKategoriNew" class="btn button-hijau pull-right" onclick="checkDouble2()">tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




    </div>



<script>
        $(".CheckBoxKategori1").click(function(){
            if($(this).parent().hasClass("selected")){
                $(this).parent().removeClass("selected");
            } else {
                $(this).parent().addClass("selected");
            }
        });

        $(document).on("click", ".CheckBoxKategori1", function(){
            var selected = $(".selected").length;
            if(selected > 0){
                $("#btnHapus").css("display", "inline-block");
            } else {
                $("#btnHapus").css("display", "none");
            }
        });

        $("#hapus_barang").click(function(){
            // $("tr.selected").remove();
            // get all id kategori from selected row
            var idKategori = [];
            $(".selected").each(function(){
                idKategori.push($(this).find("a").attr("idKategori"));
            });
            // console.log(idKategori);
            $.ajax({
                url : "../assets/util/deleteKategori.php",
                type : "POST",
                data : {idKategori : idKategori}
            }).done(function(res){
                // console.log(res);
                window.location.reload();
            });
        });
    </script>


    <script type="text/javascript">
        // get col kategori value at row clicked
        function confirm_delete(idKategori) {
            alert("masuk")
            // confirm('Apakah Anda yakin akan menghapus kategori?');

            if (confirm('Apakah Anda yakin akan menghapus kategori?')) {
                var idKategori = idKategori;
                $.ajax({
                    url : "../assets/util/deleteKategori.php",
                    type : "POST",
                    data : {idKategori : idKategori},
                    success : function(data){
                        if(data == "success"){
                            window.location.reload();
                        }
                    }
                });
                return true;
            } else {
                return false;
            }
        }
        function confirm_delete_product() {
            confirm('Apakah Anda yakin akan menghapus kategori? beserta barang yang terhubung?');
        }
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>



</body>
<!--   Core JS Files   -->
<script src="../dashboard/js/bootstrap.min.js?v=1685207735" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="../dashboard/js/bootstrap-checkbox-radio-switch.js?v=1685207735"></script>

<!--  Notifications Plugin    -->
<script src="../dashboard/js/bootstrap-notify.js?v=1685207735"></script>

<!--  Select Plugin    -->
<script src="../dashboard/js/bootstrap-selectpicker.js?v=1685207735"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../dashboard/js/light-bootstrap-dashboard.js?v=1685207735"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../dashboard/js/demo.js?v=1685207735"></script>
<script src="../js/sorttable.js?v=1685207735" type="text/javascript"></script>
<script src="../vendor/toastr/toastr.min.js?v=1685207735"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        const boxes = document.querySelectorAll('#dtable');

        const myObserver = new ResizeObserver(entries => {
            for (let entry of entries) {
                const infoEl = entry.target.querySelector('.right_side');
                const width = Math.floor(entry.contentRect.width);
                const height = Math.floor(entry.contentRect.height);
                document.querySelector(".right_side").style.height = height - 40;
            }
        });

        boxes.forEach(box => {
            myObserver.observe(box);
        });

        function makeHttpObject() {
            try {
                console.log("try");
                return new XMLHttpRequest();
            } catch (error) {}
            try {
                return new ActiveXObject("Msxml2.XMLHTTP");
            } catch (error) {}
            try {
                return new ActiveXObject("Microsoft.XMLHTTP");
            } catch (error) {}

            throw new Error("Could not create HTTP request object.");
        }

        function openRighSide() {
            if (document.querySelector(".right_panel").offsetWidth == 0) {
                if (window.innerWidth <= 990) {
                    document.querySelector(".right_panel").style.width = "100%";
                    document.querySelector(".center_panel").style.display = "none";
                } else {
                    document.querySelector(".right_panel").style.width = "50%";
                    document.querySelector(".center_panel").style.width = "50%";
                }
                document.querySelector(".right_panel").style.display = 'block';
            }
        }

        function closeRighSide() {
            if (document.querySelector(".right_panel").offsetWidth > 0) {
                document.querySelector(".center_panel").style.display = "block";
                document.querySelector(".right_panel").style.display = 'none';
                document.querySelector(".right_panel").style.width = "0%";
                document.querySelector(".center_panel").style.width = "100%";
            }
        }

        // function getUrl(url) {
        //     document.querySelector(".right_side").innerHTML = "";
        //     openRighSide();
        //     var request = makeHttpObject();
        //     request.open("GET", url, true);
        //     request.send(null);
        //     request.onreadystatechange = function() {
        //         if (request.responseURL == window.location.origin + '/login') {
        //             window.location.href = "/login";
        //             document.querySelector(".right_side").innerHTML = '';
        //         } else {
        //             if (request.readyState == 4)
        //                 document.querySelector(".right_side").innerHTML = request.responseText;
        //         }
        //     };
        //     hopscotch.nextStep();
        // }

        $(".editBtn").click(function() {
                idKategori = $(this).attr('idKategori');
                console.log(idKategori);
                var currentUrl = window.location.href;
                var url = 'Action/editkategoribyid.php?id=' + idKategori;
                // replace kategori.php frim currentUrl
                var newUrl = currentUrl.replace('kategori.php', url);
                url = newUrl;
                console.log(url);
                var httpRequest = new XMLHttpRequest();
                httpRequest
                httpRequest.open("GET", url, true);
                httpRequest.send();
                httpRequest.onreadystatechange = function() {
                    if (httpRequest.readyState === XMLHttpRequest.DONE) {
                        if (httpRequest.status === 200) {
                            // console.log("Successfully loaded page: " + url);
                            openRighSide();
                            document.querySelector(".right_side").innerHTML = httpRequest.responseText;
                        } 
                    }
                };
                // httpRequest.open("GET", url, true);
                // httpRequest.send();
            });

</script>
<script>
    try {
        document.querySelector("textarea").addEventListener("paste", function (e) {
            e.preventDefault();
            var text = e.clipboardData.getData("text/plain");
            document.execCommand("insertHTML", false, text.replace(/[^\x00-\x7F]/g, ""));
        });
    } catch (error) { }
</script>
<script>
    function checkDouble() {
        var url = window.location.href;
        var nama = document.getElementsByName('EditTextField')[0].value;
        var id = document.getElementsByName('id')[0].value;
        $.ajax({
            url: 'Action/check_double_kategori.php',
            type: 'POST',
            data: {
                nama: nama
            }}).done(function (response) {
                // console.log(response);
                if (response == "double"){
                    alert("Nama Kategori Sudah Ada");
                }
                else{
                    // document.getElementById("UbahKategoriBtn") type = "submit";
                    document.getElementById("UbahKategoriBtn").type = "submit";
                    document.getElementById("UbahKategoriBtn").click();
                    
                }
            });
    }
    function checkDouble2() {
        var url = window.location.href;
        var nama = document.getElementsByName('NamaKategoriNew')[0].value;
        var ButtonType = document.getElementById("TambahKategoriNew").type;
        $.ajax({
            url: 'Action/check_double_kategori.php',
            type: 'POST',
            data: {
                nama: nama
            }}).done(function (response) {
                console.log(response);
                if (response == "double" && ButtonType == "button"){
                    alert("Nama Kategori Sudah Ada");
                    // console.log("double");
                    nama = "";
                }
                else{
                    // document.getElementById("UbahKategoriBtn") type = "submit";
                    document.getElementById("TambahKategoriNew").type = "submit";
                    document.getElementById("TambahKategoriNew").click();
                    
                }
            });
    }
</script>
<script>
    // myInputTextField
    function searchKategori(){
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInputTextField");
        filter = input.value.toUpperCase();
        table = document.getElementById("dtable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            // console.log(tr[i]);
            td = tr[i].getElementsByTagName("td")[1];
            // console.log(td);
            if (td) {
                txtValue = td.textContent || td.innerText;
                // console.log(txtValue);
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    // console.log("masuk");
                } else {
                    tr[i].style.display = "none";
                    // console.log("ga masuk");
                }
            }
        }
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







</html>