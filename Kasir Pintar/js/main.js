function showPassword() {
  var temp = document.getElementById("password");
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
  var element = document.getElementById('showPass');
  element.classList.toggle("fa-eye-slash");
}

function showPasswordOther(id) {
  var temp = document.getElementById("passwordOther"+id);
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
  var element = document.getElementById('showPasswordOther'+id);
  element.classList.toggle("fa-eye-slash");
}

function showPin(id) {
  var temp = document.getElementById("pinPPOB"+id);
  if (temp.type === "password") {
      temp.type = "text";
  }
  else {
      temp.type = "password";
  }
  var element = document.getElementById('showPinPPOB'+id);
  element.classList.toggle("fa-eye-slash");
}

function showConfPassword() {
  var temp = document.getElementById("password_confirmation");
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
    var element = document.getElementById('showConfPass');
    element.classList.toggle("fa-eye-slash");
}

function showOldPassword() {
  var temp = document.getElementById("password_old");
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
    var element = document.getElementById('showOldPass');
    element.classList.toggle("fa-eye-slash");
}

function showPasswordV2() {
  var temp = document.getElementById("pwd_4uth_kpntr");
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
  var element = document.getElementById('showPass');
  element.classList.toggle("fa-eye-slash");
}