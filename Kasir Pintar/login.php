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
    </style>
    <section class="pt-120-2 pb-64 bg-white px-120" id="parent">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="px-50">
                    <p class="font-32-sb font-black" align="center">Login</p>
                    <p class="font-16-r font black" align="center" id="regBtn">Belum punya akun? <a
                            href="register.php"
                            id="btn_reg_login" class="font-green">Daftar di sini</a></p>
                    <p class="font-14-r font-black mt-3 bg-yellow-low p-2 radius-8" id="errorSession"
                        style="display: none" align="center"><i class="fas fa-info-circle font-yellow"></i> &nbsp;Sesi
                        telah habis, silahkan login kembali</p>
                    
                    <form action="login" class="mt-20" method="post">
                        <input type="hidden" name="_token" value="V5eaFaE7NtlmpNGeNUrJwxt5ZzkWykQeIQwuR7Sk">
                        <input hidden name="url_cuss" value="account">
                        <div class="form-group">
                            <p class="font-14-r font-gray">E-Mail</p>
                            <input type="email" class="form-control mt-5-2 radius-8 font-14-r"
                                placeholder="E-Mail Owner" name="email" value="" required autofocus>
                        </div>
                        <div class="form-group mt-20">
                            <p class="font-14-r font-gray">Password</p>
                            <input id="password" type="password" class="form-control mt-5-2 radius-8 font-14-r"
                                placeholder="Password" name="password" required>
                            <span onclick="showPassword()" class="fa fa-fw fa-eye pass-icon form-eye show-password"
                                id="showPass"></span>
                        </div>
                        <button type="button" class="button-green-rounded w-100 mt-20 font-14-m" onclick="login()">Masuk</button>
                        <!-- <p class="mt-5-2" align="right"><a href="password/reset"
                                class="font-14-r font-green">Lupa Password?</a></p> -->
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="js/main.js"></script>
<script>
    function login() {
        var email = $("input[name=email]").val();
        var password = $("input[name=password]").val();
        var xhr = new XMLHttpRequest();
        var data = {
            email: email,
            password: password
        };
        xhr.open('POST', 'assets/login/cekLogin.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify(data));
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var res = xhr.responseText;
                if (res == 1 || res == "Success") {


                    var xhr2 = new XMLHttpRequest();
                    var data2 = {
                        email: email,
                        password: password
                    };
                    xhr2.open('POST', 'assets/login/startSession.php', true);
                    xhr2.setRequestHeader('Content-Type', 'application/json');
                    xhr2.send(JSON.stringify(data2));
                    xhr2.onreadystatechange = function () {
                        if (xhr2.readyState == 4 && xhr2.status == 200) {
                            var res2 = xhr2.responseText;
                            console.log(res2);
                            if (res2 == 1 || res2 == "Success") {
                                window.location.href = "account/profil.php";
                            } else {
                                alert("Email atau Password salah");
                            }
                        }
                    }



                } else {
                    alert("Email atau Password salah");
                }
            }
        }
    }


    function showPassword() {
        var x = document.getElementById("password");
        var y = document.getElementById("showPass");
        if (x.type === "password") {
            x.type = "text";
            y.classList.remove("fa-eye");
            y.classList.add("fa-eye-slash");
        } else {
            x.type = "password";
            y.classList.remove("fa-eye-slash");
            y.classList.add("fa-eye");
        }
    }
</script>

</body>

</html>