<?php
    session_start(); 
    if (!isset($_SESSION['email'])) {
        header("Location: ../login.php");
    }
?>

<?php
    include '../../assets/util/koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE idBarang = '$id'");
    $data = mysqli_fetch_array($query);
    $firstLetter = substr($data['nama'], 0, 1);
    
    $Ketegori = mysqli_query($koneksi, "SELECT * FROM kategori");
?>
<html>

<head>
  <title>Kasir Pintar&reg;</title>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="../../gambar/logokasir.webp">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="theme-color" content="#00796b">

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1990 00:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />


  <!-- Bootstrap core CSS     -->
  <link href="../..//dashboard/css/bootstrap.min.css?v=1685859509" rel="stylesheet" />
  <link href="../..//dashboard/css/fresh-bootstrap-table.css?v=1685859509" rel="stylesheet" />


  <!--  Light Bootstrap Table core CSS    -->
  <link href="../..//dashboard/css/light-bootstrap-dashboard-v4.css?v=1685859509" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" />

  <link href="../..//dashboard/css/kp.css?v=1685859509" rel="stylesheet" />
  <meta name="google-signin-client_id"
    content="433891833837-s9t6ombm4qo456h549qo5uqs1r3p9lsl.apps.googleusercontent.com">

  <!--     Fonts and icons     -->
  <script src="../..//source/js/feather.min.js?v=1685859509"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="../..//source/js/platform.js?v=1685859509" async defer></script>
  <link href="../..//dashboard/css/morris.css?v=1685859509" rel="stylesheet" />
  <link href="../..//dashboard/css/MonthPicker.css?v=1685859509" rel="stylesheet" />
  <!-- <link href="https://fonts.googleapis.com/css?family=Asap|Lato" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../..//css/intlTelInput.css?v=1685859509">
  <link rel="stylesheet" href="../..//css/custom.css?v=1685859509">
  <link rel="stylesheet" href="../..//vendor/toastr/toastr.min.css?v=1685859509">


</head>

<body data-spy="scroll" data-target=".wrapper">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../../vendor/spinner-animate/three-quarters.css?v=1684252247">
    <link rel="stylesheet" href="../../vendor/spinner-animate/custom.css?v=1684252247">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../../source/tour/css/hopscotch.css?v=1684252247">
    <script src="../../source/js/raphael-min.js?v=1684252247"></script>
    <script src="../../dashboard/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="../../dashboard/js/jquery-1.10.2.js?v=1684252247" type="text/javascript"></script>
    <script src="../../source/js/jquery-ui.min.js?v=1684252247"></script>
    <script src="../../dashboard/js/morris.js?v=1684252247" type="text/javascript"></script>
    <script type="text/javascript" src="../../js/vue.min.js"></script>
    <script src="../../js/intlTelInput.js?v=1684252247"></script>
    <script src="../../dashboard/js/MonthPicker.js?v=1684252247" type="text/javascript"></script>
    <script src="../../source/tour/js/hopscotch.js?v=1684252247"></script>
    <div class="overlay" style="display: none">
        <div class="three-quarters-loader loader-custom">Loading…</div>
    </div>
    <link href="../../assets/css/croppie.css" rel="stylesheet" />
    <script src="../../assets/js/croppie.js" type="text/javascript"></script>
    <link href="../../dashboard/css/select_data_table.css" rel="stylesheet" />
    <link href="../../source/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../vendor/spinner-animate/three-quarters.css">
    <link rel="stylesheet" href="../../vendor/spinner-animate/custom.css">
    <link rel="stylesheet" href="../../source/css/bootstrap-select.min.css">

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
            <link href="../../source/css/select2.min.css?v=1684252247" rel="stylesheet" />

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



      





















      <script src="../..//source/js/select2.min.js?v=1685859509"></script>
      <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0-rc.4/dist/js.cookie.min.js"
        integrity="sha256-srkrqNQxQ5PTxynPlMErZaHbKkH7Z2slLwYPjq/dLv0=" crossorigin="anonymous"></script>


      <script src="../..//dashboard/js/kp.js?v=1685859509"></script>
      <link href="../..//assets/css/cropper.min.css" rel="stylesheet" />
      <script src="../..//assets/js/cropper.min.js" type="text/javascript"></script>
      <link href="../..//dashboard/css/select_data_table.css" rel="stylesheet" />
      <script src="../..//source/js/jquery.dataTables.min.js"></script>
      <script src="../..//source/js/dataTables.bootstrap.min.js"></script>
      <script src="../..//source/js/dataTables.select.min.js"></script>
      <script src="../..//source/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>
      <link href="../..//source/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="../..//vendor/spinner-animate/three-quarters.css">
      <link rel="stylesheet" href="../..//vendor/spinner-animate/custom.css">
      <link rel="stylesheet" href="../..//source/css/bootstrap-select.min.css">
      <link rel="stylesheet" href="../..//vendor/progress-bar/progress-bar.css">
      <style>
        .tablinks {
          cursor: pointer;
          color: #606060;
          border: none;
          padding-left: 3.1vw;
          padding-right: 3.1vw;
          border-radius: 0px;
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

        .activex {
          border-bottom: 3px solid rgb(22, 118, 93) !important;
          color: black !important;
          margin-bottom: 0px !important;
        }

        .tablinks:hover {
          color: black !important;
        }

        .tabcontent {
          display: none;
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

        .has-error .form-control,
        .form-control.error,
        .has-error .form-control:focus {
          border-color: #E21D1D !important;
        }

        .input-group-addon {
          opacity: 0.7;
        }

        .btn-group>.btn:first-child {
          border: 1px solid #d1d2d3;
          border-left: none;
        }

        .button-mg {
          margin-right: 0px !important;
        }

        @media screen and (min-width: 1024px) {
          .button-primer {
            margin-right: 90px;
          }
        }

        .color-pick {
          border-radius: 4px;
          height: 35px;
          width: 35px;
        }

        .container .color-pick:after {
          left: -4px;
          top: -4px;
          width: 43px;
          height: 43px;
          border: 1px solid #1EE862;
          border-radius: 4px;
          /* border-width: 0 3px 3px 0; */
          -webkit-transform: none;
          -ms-transform: none;
          /* transform: rotate(45deg); */
        }

        .color-container {
          padding-right: 16px;
          margin-left: 0;
          width: 35px;
          height: 35px;
          margin-right: 0;
        }

        .on-check {
          border-color: #1EE862;
        }

        .tooltip {
          opacity: 1 !important;
        }

        .tooltip>.tooltip-inner {
          text-align: left;
          background-color: white;
        }

        .tooltip.bottom .tooltip-inner:after {
          border-bottom: 11px solid white;
        }
      </style>
      <div class="overlay" style="display: none">
        <div class="three-quarters-loader loader-custom">Loading…</div>
      </div>
      <div class="content">
        <div class="padds">
          <div class="row">
            <div class="col-md-12">
              <p class="font-18 font-black medium">Edit Barang</p>
              <p class="font-14 medium font-gray-bold">Database / <a href="../database.php"
                  class="font-green medium">Barang atau Jasa</a> / <?php echo $data['nama'] ?></p>

            </div>
          </div>

          

          <div id="Barang" class="tabcontent" style="display: block; margin-top: 20px">
            <form id="form_edit" class="margin-top-20" action=""
              method="POST" enctype='multipart/form-data'>
              <input type="hidden" name="_token" value="OG0hmRUc7EFNZB29wjfmkHX6QdK2ydOOaeJfUIfb">
              <div class="row" style="margin: 0">
                <div class="col-md-8">
                  <label for="upload" id="edit_photo">
                    <div class="gambar_barang_besar_r mouse" style="margin-left: 0;">
                      <p align="center" class="tulisan_barang_besar"><?php echo $firstLetter ?></p> 
                    </div>
                  </label>
                </div>
              </div>

              <div class="row">
                <input name="id" type="hidden" value="<?php echo $id ?>">
                <div class="col-md-5"><br>
                  <label class="font-14 medium font-gray-bold">Kode</label>
                  <input type="search" name="kode_barang" onkeypress="return AvoidSpace(event)"
                    onkeypress="return AvoidSpace(event)" maxlength="20" value="<?php echo $data['kode'] ?>" class="form-control"
                    data-rule-required="true" data-msg-required="Masukkan Kode Barang">
                </div>
                <div class="col-md-5 col-md-offset-1"><br>
                  <label class="font-14 medium font-gray-bold">Nama</label>
                  <input type="text" name="nama_barang" value="<?php echo $data['nama'] ?>" maxlength="80" class="form-control"
                    data-msg-required="Masukkan Nama Barang">
                </div>
                <div class="col-md-5"><br>
                  <label class="font-14 medium font-gray-bold">Kategori</label>
                  <select class="form-control" name="kategori" id="add_kategori" style="width: 100%">
                    <?php
                      foreach ($Ketegori as $row) {
                        if ($row['idKategori'] == $data['idKategori']) {
                          echo "<option value='".$row['idKategori']."' selected>".$row['namaKategori']."</option>";
                        }else{
                            echo "<option value='".$row['idKategori']."'>".$row['namaKategori']."</option>";
                        }
                      }
                    ?>
                  </select>
                </div>
                <div class="col-md-5 col-md-offset-1"><br>
                  <label class="font-14 medium font-gray-bold">Harga Beli (<a
                      href="../management_stok.php" class="font-green medium">Lakukan Edit
                      Harga Beli di Manajemen Stok</a>) </label>
                  <div class="input-group">
                    <span class="input-group-addon">Rp </span> <input name="harga_beli" type="text" value="<?php echo $data['hargaBeli'] ?>"
                      onkeypress="return isValid(this, event)" disabled class="form-control decimal"
                      data-rule-required="true" data-msg-required="Masukkan Harga Beli">
                  </div>
                </div>
                
                <div class="col-md-5"><br>
                  <label class="font-14 medium font-gray-bold">Stok (<a
                      href="../management_stok.php" class="font-green medium">Lakukan Edit
                      Stok di Manajemen Stok</a>)</label>
                  <input type="number" value="<?php echo $data['stok'] ?>" 
                    name="stok" step=any class="form-control stok"
                    onkeypress="return isValid(this, event)" disabled>
                </div>

                <div class="col-md-5 col-md-offset-1"><br>
                  <label class="font-14 medium font-gray-bold">Harga Jual</label>
                  <div class="input-group">
                    <span class="input-group-addon">Rp </span> <input name="harga_jual" type="text" value="<?php echo $data['hargaJual'] ?>"
                      onkeypress="return isValid(this, event)" class="form-control decimal" data-rule-required="true"
                      data-msg-required="Masukkan Harga Jual">
                  </div>
                  <!-- <span class="font-gray-bold font-14 medium">Disarankan Harga Jual Di Atas Rp 2</span> -->
                  <?php
                    if ($data['hargaJual'] < $data['hargaBeli']) {
                        
                        echo "<span class='font-gray-bold font-14 medium'>Disarankan Harga Jual Di Atas Rp ".$data['hargaBeli']."</span>";
                    }
                    ?>
                </div>


                <div class="col-md-5"><br>
                  <label class="font-14 medium font-gray-bold">Satuan</label>
                  <input type="text" value="<?php echo $data['satuan'] ?>"
                   name="berat_dan_satuan" maxlength="80" class="form-control">
                </div>


                <div class="col-md-5 col-md-offset-1"><br>
                  <label class="font-14 medium font-gray-bold">Keterangan</label>

                  <textarea name="keterangan" class="form-control" maxlength="255" rows="5"
                    style="resize: none"><?php echo $data['keterangan'] ?></textarea>
                </div>
                <div class="clearfix"></div>
                
              </div>
            </form>
            <div class="row margin-top-20">
              <div class="col-md-2 col-md-offset-9">
                <button id="submit_update" class="btn button-primer wt-100">Simpan</button>
              </div>
            </div>
            <script>
                // submit_update
                var submit_update = document.getElementById('submit_update');
                submit_update.addEventListener('click', function () {
                    var kodeBefore = "<?php echo $data['kode'] ?>";
                    var kode_barang = document.getElementsByName('kode_barang')[0].value;
                    var harga_beli = document.getElementsByName('harga_beli')[0].value;
                    var harga_jual = document.getElementsByName('harga_jual')[0].value;
                    if (kodeBefore != kode_barang) {
                        // id = notif_kode aria model
                        var id = document.getElementById('notif_kode');
                        // <span class="newCode bold">
                        var newCode = document.getElementsByClassName('newCode')[0];
                        // set new code
                        newCode.innerHTML = kode_barang;
                        var oldCode = document.getElementsByClassName('oldCode')[0];
                        // set old code
                        oldCode.innerHTML = kodeBefore;
                        // show aria model
                        $(id).modal('show');
                    }else if (harga_jual < harga_beli) {
                        // id = fixHarga aria model
                        var id = document.getElementById('fixHarga');
                        // show aria model
                        $(id).modal('show');
                    }else{
                        updateData();
                    }

                });
            </script>
          </div>
        </div>
        <div class="modal fade" id="tesBisnisIng" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 align="center" class="modal-title">Konfirmasi</h5>
              </div>
              <div class="modal-body">
                <p class="font-14 font-gray-bold medium">Untuk mengaktifkan tipe barang berikut, Anda perlu menginstal
                  plugin Ingredients</p>
                <img src="../..//plugin/ingredients.png" alt="Food Menu" class="img-responsive"
                  width="15%" style="margin: auto;">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn button-feature" style="margin-top: 5px"
                  data-dismiss="modal">batal</button>
                <a href="../..//account/plugin" class="btn button-primer button-mg">Lanjutkan</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="modal fade" id="myBarang" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel2" align="center">Data Barang</h4>
        </div>
        <div class="modal-body" style="overflow-y: auto; padding-right: 30px; padding-left: 30px;">
          <select class="form-control" name="cari" style="width: 300px" id="myInputTextField"></select><br><br>
          <div class="table-responsive">
            <table class="table" id="tabel_paket" style="display: none">
              <thead style="background: #EFF3F6">
                <tr>
                  <td class="tb-head">Kode</td>
                  <td class="tb-head">Nama</td>
                  <td class="tb-head">Harga Beli</td>
                  <td class="tb-head">Harga Jual</td>
                  <td class="tb-head">Jumlah</td>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn button-bdr-hj" data-dismiss="modal">batal</button>
          <button type="button" id="hapus_barang" class="btn button-primer button-mg pull-right"
            data-dismiss="modal">Lanjutkan</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="fixHarga" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel2" align="center">Fix harga</h4>
        </div>
        <div class="modal-body" style="overflow-y: auto; padding-right: 30px; padding-left: 30px;">
          <p class="font-14 medium font-red">Terdapat Harga Beli yang lebih tinggi daripada Harga Jual</p>
          <p class="font-14 medium font-gray-bold margin-top-10">Disarankan Harga Jual diatas <strong
              class="font-black">Rp <?php echo $data['hargaBeli'] ?>
            </strong>. Apakah Anda yakin ingin melanjutkan penyimpanan?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn button-bdr-hj" data-dismiss="modal">batal</button>
          <button type="button" id="submit_harga" class="btn button-primer button-mg pull-right" onclick="updateData()">Simpan</button>
        </div>
      </div>
    </div>
  </div>
<!-- ////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////// -->




  <div class="modal fade" id="notif_kode" role="dialog" aria-labelledby="myModaNotifKode">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModaNotifKode" align="center">Perubahan Kode Barang</h4>
        </div>
        <div class="modal-body">
          <p class="font-14 medium font-black">Terdapat perubahan kode barang akan berakibat Log Stok barang sebelumnya
            akan terhapus.</p>
          <p class="font-14 medium font-black">Kode Barang Sebelum : <span class="oldCode"></span></p>
          <p class="font-14 medium font-black">Kode Barang Sesudah : <span class="newCode bold"></span></p>
          <p class="font-14 medium font-black bg-default bg-yellow">Apakah Anda yakin untuk menyimpan?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn button-feature" data-dismiss="modal">Tidak</button>
          <button type="button" id="force_submit_code" class="btn button-primer pull-right"
            style="margin-right: 0" onclick="updateData()">Iya</button>
        </div>
      </div>
    </div>
  </div>
<!-- ////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////// -->

  <script type="text/javascript" src="../..//source/js/moment.min.js"></script>
  <script type="text/javascript" src="../..//source/js/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../..//source/css/daterangepicker.css" />
  <style>
    .select2-results__message {
      display: none !important;
    }

    .select2-container .select2-selection--single,
    .select2-container .select2-selection--single .select2-selection__arrow {
      height: 40px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 40px;
    }
  </style>
  <script src="../..//source/js/select2.min.js"></script>

  <script src="../..//vendor/ckeditor/ckeditor.js"></script>



  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>



</body>
<!--   Core JS Files   -->
<script src="../..//dashboard/js/bootstrap.min.js?v=1685859509" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="../..//dashboard/js/bootstrap-checkbox-radio-switch.js?v=1685859509"></script>

<!--  Notifications Plugin    -->
<script src="../..//dashboard/js/bootstrap-notify.js?v=1685859509"></script>

<!--  Select Plugin    -->
<script src="../..//dashboard/js/bootstrap-selectpicker.js?v=1685859509"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../..//dashboard/js/light-bootstrap-dashboard.js?v=1685859509"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../..//dashboard/js/demo.js?v=1685859509"></script>
<script src="../..//js/sorttable.js?v=1685859509" type="text/javascript"></script>
<script src="../..//vendor/toastr/toastr.min.js?v=1685859509"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // function updateData
    // form form_edit
    // get data from form_edit
    // send data to updateData.php

    function updateData() {
        var form = document.getElementById("form_edit");
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "database/updateData.php");
        xhr.onload = function () {
            if (this.status == 200) {
                console.log(this.responseText);
                // reload
                location.reload();
            }
        }
        xhr.send(formData);
        // xhr.onreadystatechange = function () {
        //     if (xhr.readyState == 4 && xhr.status == 200) {
        //         console.log(xhr.responseText);
        //     }
        // }
      
    }
</script>


<script>
  feather.replace()
</script>

























































































<script src="../..//source/js/platform.js?onload=onLoad" async defer></script>

</html>