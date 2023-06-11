<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#00796b">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="gambar/logokasir.webp">
    <link rel="icon" type="image/png" href="gambar/logokasir.webp">
    <link rel="icon" sizes="512x512" href="gambar/logokasir.webp">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" media="all">
    <link rel="stylesheet" href="design_v2/bootstrap-5.0.0-beta3/css/bootstrap.min.css"
        media="all">
    <link rel="stylesheet" href="landing_page/carousel/dist/assets/owl.carousel.min.css"
        media="all">
    <link rel="stylesheet" href="landing_page/carousel/dist/assets/owl.theme.default.min.css"
        media="all">
    <link rel="stylesheet" href="design_v2/fontawesome-free-5.15.3-web/css/all.css"
        media="all">
    <link href="css/select2.min.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="design_v2/css/style.css?v=1686222967" media="all">
    <link rel="stylesheet" href="design_v2/slick/slick.css" media="all">
    <link rel="stylesheet" href="design_v2/slick/slick-theme.css" media="all">
    <link rel="stylesheet" href="design_v2/simplelightbox/dist/simple-lightbox.min.css"
        media="all" />
    <link rel="stylesheet" href="css/intlTelInput.css" media="all">
    <link rel="stylesheet" href="vendor/spinner-animate/three-quarters.css" media="all">
    <link rel="stylesheet" href="vendor/spinner-animate/custom.css" media="all">

    <!-- anti-flicker snippet (recommended)  -->
    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
    <script src="design_v2/bootstrap-5.0.0-beta3/js/bootstrap.bundle.min.js"></script>
    <script src="design_v2/js/jquery-3.6.0.min.js"></script>
    <script src="design_v2/js/lazysizes.min.js"></script>
    <script src="design_v2/slick/slick.js"></script>
    <script src="design_v2/simplelightbox/dist/simple-lightbox.min.js"></script>
    <script src="design_v2/simplelightbox/dist/simple-lightbox.jquery.min.js"></script>
    <script src="landing_page/carousel/dist/owl.carousel.min.js"></script>

    <script src="https://www.googleoptimize.com/optimize.js?id=GTM-KMWGZ7R"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-822066346"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-93483723-1"></script>
   
</head>

<body>
    <nav class="navbar navbar-expand-xl fixed-top navbar-light shadow-sm" id="navbar-main">
        <div class="container">
            <a class="navbar-brand" href="login.php"><img class="lazyload h-44"
                    data-src="design_v2/images/home_v2/kasirpintar.png"
                    height="44px" alt="logo kasir pintar">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mbt-10">
                        <a class=" m-log  font-14-sbb btn button-green-daftar text-uppercase font-white mrd-10"
                            id="btn_reg_navbar"
                            href="register.php">Daftar</a>&nbsp;
                        <a class=" m-log  font-14-sbb btn button-yellow-masuk text-uppercase font-white mrd-10"
                            href="login.php" id="btn_login_page">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>





    <style>
        .abcRioButtonLightBlue {
            border-radius: 32px;
        }

        iframe {
            margin: auto !important;
        }

        #credential_picker_container {
            z-index: -1 !important;
        }
    </style>

    <input type="hidden" name="token_google" value="-" />
    <input type="hidden" name="_token" value="V5eaFaE7NtlmpNGeNUrJwxt5ZzkWykQeIQwuR7Sk" />
    <section class="pt-120-2 pb-64 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <input type="hidden" name="utm_source" value="web"> <input type="hidden" name="utm_medium"
                        value="top_navbar"> <input type="hidden" name="utm_campaign" value="button1">
                    <p class="font-32-sb font-black" align="center">Daftar Akun</p>
                    <p class="font-16-r font black" align="center">Sudah punya akun? <a
                            href="login.php" class="font-green">Login di sini</a></p>
                    <div class="row mt-30">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <p class="font-14-r font-gray">Nama Lengkap</p>
                                <input type="text" name="nama" id="nama" maxlength="80" value=""
                                    placeholder="Nama Lengkap" class="form-control mt-5-2 radius-8 font-14-r" autofocus onfocusout="checkNama()">
                            </div>
                        </div>
                        <div class="col-lg-6 mbt-20">
                            <div class="form-group">
                                <p class="font-14-r font-gray">E-Mail</p>
                                <input type="email" id="mail" name="email" maxlength="255" value=""
                                    placeholder="E-Mail Valid" class="form-control mt-5-2 radius-8 font-14-r" onfocusout="checkEmail()">
                                <p style="display: none;" id="email_error" class="font-12-m font-red mt-5-2">Email is
                                    already registered</p>
                                <p style="display: none;" id="email_error1" class="font-12-m font-red mt-5-2">
                                    Please enter a valid email address</p>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-20">
                            <div class="form-group">
                                <p class="font-14-r font-gray">Password</p>
                                <input id="password" type="password" class="form-control mt-5-2 radius-8 font-14-r"
                                    placeholder="Password" name="password" required onkeydown="checkPass()" onfocusout="checkPass()">
                                <span onclick="showPassword()" class="fa fa-fw fa-eye pass-icon form-eye show-password"
                                    id="showPass"></span>
                                <p class="font-12-m font-red mt-5-2" style="display: none" id="error">Password minimal 6
                                    karakter, kombinasi huruf dan angka</p>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-20">
                            <div class="form-group">
                                <p class="font-14-r font-gray">Konfirmasi Password</p>
                                <input id="password_confirmation" type="password"
                                    class="form-control mt-5-2 radius-8 font-14-r" placeholder="Konfirmasi Password"
                                    name="password_confirmation" required onkeyup="checkKonPass()">
                                <span onclick="showConfPassword()"
                                    class="fa fa-fw fa-eye pass-icon form-eye show-password" id="showConfPass"></span>
                                <p style="display: none;" id="kon_pass" class="font-12-m font-red mt-5-2">
                                    Password tidak sama</p>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-20">
                            <div class="form-group">
                                <p class="font-14-r font-gray mb-5-2">No. HP Aktif</p>
                                <input type="tel" id="phone" class="form-control radius-8 font-14-r"
                                    placeholder="No HP" name="no_hp" value="+62" required onfocusout="checkhp()">
                                <p style="display: none;" id="hp_error" class="font-12-m font-red mt-5-2">No. HP Aktif
                                    is already</p>
                                <p class="font-12-m font-red mt-5-2">

                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-20">
                            <div class="form-group">
                                <p class="font-14-r font-gray mb-5-2">Kode Registrasi</p>
                                <input type="text" id="regist" class="form-control radius-8 font-14-r"
                                    placeholder="Kode registrasi" name="Kode_regist" value="" required onfocusout="checkKodeRegist()">
                                <p style="display: none;" id="regist_error" class="font-12-m font-red mt-5-2">Kode Registrasi is not valid</p>
                                <p class="font-12-m font-red mt-5-2">

                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-20">
                        </div>
                        <div class="col-lg-6 mt-20">
                        </div>
                        <div class="col-lg-6 mt-20">
                            <button type="button" class="button-green-rounded w-100 font-14-m" disabled
                                id="saveProfile" onclick="daftar()" >Daftar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        function daftar(){
            var nama = document.getElementById('nama').value;
            var email = document.getElementById('mail').value;
            var password = document.getElementById('password').value;
            var kodeRegist = document.getElementById('regist').value;
            var hp = document.getElementById('phone').value;
            console.log(hp);
            hp = hp.replace("+62", "0");
            console.log(hp);
            var current_url = window.location.href;
            var url = "assets/regist/addAkun.php";
            var data = {
                nama: nama,
                email: email,
                password: password,
                hp: hp,
                kodeRegist: kodeRegist,
            };
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/json');
            xhr.onload = function () {
                var users = this.responseText;
                if (users == 'success') {
                    window.location.href = "login.php";
                } else {
                    alert("Gagal mendaftar");
                }
            };
            xhr.send(JSON.stringify(data));
        }

    </script>


    <script>
        var namaLock = true; //true jika nama kurang dari 3 karakter
        var mailLock = true; //true jika email sudah terdaftar
        var hpLock = true;
        var passLock = true; //true jika password kurang dari 6 karakter
        var konPassLock = true; //true jika konfirmasi password tidak sama
        var KodeRegistLock = true; //true jika no regist tidak valid
        function checkNama() {
            var nama = document.getElementById('nama').value;
            if (nama.length < 3) {
                namaLock = true;
            } else {
                namaLock = false;
                checkStatusLock();
            }
        }

        function checkhp() {
            var hp = document.getElementById('phone').value;
            // remove +62
            hp = hp.substring(3);
            if (hp.length < 10) {
                hpLock = true;
            } else {
                hpLock = false;
                checkStatusLock();
            }
        }

        function checkKodeRegist() {
            var KodeRegist = document.getElementById('regist').value;
            var error = document.getElementById('regist_error');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'assets/regist/cekKodeRegist.php', true);
            xhr.onload = function () {
                var users = this.responseText;
                console.log(users);
                if (users == 'true') {
                    error.style.display = 'none';
                    KodeRegistLock = false;
                    checkStatusLock();
                } else {
                    error.style.display = 'block';
                    KodeRegistLock = true;
                }
            };
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('KodeRegist=' + KodeRegist);
        
        }

        function checkPass() {
            var pass = document.getElementById('password').value;
            var error = document.getElementById('error');
            if (pass.length < 6) {
                error.style.display = 'block';
                passLock = true;
            } else {
                // cek harus ada angka dan huruf
                if (pass.match(/[a-z]/g) && pass.match(/[0-9]/g)) {
                    error.style.display = 'none';
                    passLock = false;
                    checkStatusLock();
                } else {
                    error.style.display = 'block';
                    passLock = true;
                }
            }
        }
        
        function checkKonPass() {
            var pass = document.getElementById('password').value;
            var konPass = document.getElementById('password_confirmation').value;
            var kon_pass = document.getElementById('kon_pass');
            if (pass != konPass) {
                kon_pass.style.display = 'block';
                konPassLock = true;
            } else {
                kon_pass.style.display = 'none';
                konPassLock = false;
                checkStatusLock();
            }
        }

        function checkEmail(){
            var mail = document.getElementById('mail').value;
            var email_error = document.getElementById('email_error');
            var email_error1 = document.getElementById('email_error1');
            
            // check format email
            if (mail.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                email_error.style.display = 'none';
                email_error1.style.display = 'none';
                mailLock = false;

                var xhr = new XMLHttpRequest();
                var curUrl = window.location.href;
                var url = "assets/regist/cekEmailUsed.php?email=" + mail;
                xhr.open('GET', url, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        // console.log(response);
                        if (response == 1 || response == "double") {
                            email_error.style.display = 'block';
                            email_error1.style.display = 'none';
                            mailLock = true;
                        } else {
                            email_error.style.display = 'none';
                            email_error1.style.display = 'none';
                            mailLock = false;
                            checkStatusLock();
                        }
                    }
                }
                xhr.send();

            } else {
                email_error.style.display = 'none';
                email_error1.style.display = 'block';
                mailLock = true;
            }
        }

        function checkStatusLock() {
            var saveProfile = document.getElementById('saveProfile');
            if (mailLock == false && hpLock == false && passLock == false && konPassLock == false && namaLock == false && KodeRegistLock == false) {
                saveProfile.disabled = false;
            } else {
                saveProfile.disabled = true;
            }
        }

    </script>


    <script type="text/javascript" src="js/main.js"></script>


</body>

</html>