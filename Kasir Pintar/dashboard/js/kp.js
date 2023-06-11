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

function getUrl(url) {
    document.querySelector(".right_side").innerHTML = "";
    openRighSide();
    var request = makeHttpObject();
    request.open("GET", url, true);
    request.send(null);
    request.onreadystatechange = function() {
        if (request.responseURL == window.location.origin + '/login') {
            window.location.href = "/login";
            document.querySelector(".right_side").innerHTML = '';
        } else {
            if (request.readyState == 4)
                document.querySelector(".right_side").innerHTML = request.responseText;
        }
    };
    hopscotch.nextStep();
}

function openRighSide2() {
    if (document.querySelector(".right_panel2").offsetWidth == 0) {
        if (window.innerWidth <= 990) {
            document.querySelector(".right_panel2").style.width = "100%";
            document.querySelector(".center_panel2").style.display = "none";
        } else {
            document.querySelector(".right_panel2").style.width = "50%";
            document.querySelector(".center_panel2").style.width = "50%";
        }
        document.querySelector(".right_panel2").style.display = 'block';
    }
}

function closeRighSide2() {
    if (document.querySelector(".right_panel2").offsetWidth > 0) {
        document.querySelector(".center_panel2").style.display = "block";
        document.querySelector(".right_panel2").style.display = 'none';
        document.querySelector(".right_panel2").style.width = "0%";
        document.querySelector(".center_panel2").style.width = "100%";
    }
}

function getUrl2(url) {
    document.querySelector(".right_side2").innerHTML = "";
    openRighSide2();
    var request = makeHttpObject();
    request.open("GET", url, true);
    request.send(null);
    request.onreadystatechange = function() {
        if (request.responseURL == window.location.origin + '/login') {
            window.location.href = "/login";
            document.querySelector(".right_side2").innerHTML = '';
        } else {
            if (request.readyState == 4)
                document.querySelector(".right_side2").innerHTML = request.responseText;
        }
    };
    hopscotch.nextStep();
}

function openRighSide3() {
    if (document.querySelector(".right_panel3").offsetWidth == 0) {
        if (window.innerWidth <= 990) {
            document.querySelector(".right_panel3").style.width = "100%";
            document.querySelector(".center_panel3").style.display = "none";
        } else {
            document.querySelector(".right_panel3").style.width = "50%";
            document.querySelector(".center_panel3").style.width = "50%";
        }
        document.querySelector(".right_panel3").style.display = 'block';
    }
}

function closeRighSide3() {
    if (document.querySelector(".right_panel3").offsetWidth > 0) {
        document.querySelector(".center_panel3").style.display = "block";
        document.querySelector(".right_panel3").style.display = 'none';
        document.querySelector(".right_panel3").style.width = "0%";
        document.querySelector(".center_panel3").style.width = "100%";
    }
}

function getUrl3(url) {
    document.querySelector(".right_side3").innerHTML = "";
    openRighSide3();
    var request = makeHttpObject();
    request.open("GET", url, true);
    request.send(null);
    request.onreadystatechange = function() {
        if (request.responseURL == window.location.origin + '/login') {
            window.location.href = "/login";
            document.querySelector(".right_side3").innerHTML = '';
        } else {
            if (request.readyState == 4)
                document.querySelector(".right_side3").innerHTML = request.responseText;
        }
    };
    hopscotch.nextStep();
}

function getUrlPelanggan(row, url) {
    document.querySelector(".right_side").innerHTML = "";
    openRighSide();
    var request = makeHttpObject();
    request.open("GET", url, true);
    request.send(null);
    request.onreadystatechange = function() {
        if (request.responseURL == window.location.origin + '/login') {
            window.location.href = "/login";
            document.querySelector(".right_side").innerHTML = '';
        } else {
            if (request.readyState == 4)
                document.querySelector(".right_side").innerHTML = request.responseText;
        }
    };
    document.querySelector('.linkBtn').classList.add("active");
    document.querySelector('.linkBtn2').classList.remove("active");
    document.getElementById("modePoint").value = 'tambah';
    document.getElementById("custID").value = row.getAttribute('data-custid');
    document.getElementById("custName").innerHTML = row.getAttribute('data-name');
    document.getElementById("custEmail").innerHTML = row.getAttribute('data-email');
    document.getElementById("custPoint").innerHTML = row.getAttribute('data-point') + ' Poin';
}

function dateRangeReport(start, end, maxRange, is_user_business = true) {
    return {
        maxDate: moment().locale('id').add(maxRange, 'days'),
        startDate: start,
        endDate: end,
        minYear: 2015,
        maxYear: parseInt(moment().locale('id').format('YYYY'), 10),
        ranges: is_user_business ? {
            'Hari Ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
            '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
            'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                'month')]
        } : {
            'Hari Ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
            '30 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
            'Bulan Ini': [moment().subtract(6, 'days'), moment()],
            'Bulan Lalu': [moment().subtract(6, 'days'), moment()]
        },
        maxSpan: {
            'days': maxRange,
        }
    }
}

function dateRangeReportLinkpintar(start, end, maxRange) {
    return {
        maxDate: moment().locale('id').add(maxRange, 'days'),
        startDate: start,
        endDate: end,
        minYear: 2015,
        maxYear: parseInt(moment().locale('id').format('YYYY'), 10),
        ranges: {
            // 'Hari Ini': [moment(), moment()],
            //'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
            //'30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
            'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                'month')]
        },
        maxSpan: {
            'days': maxRange,
        }
    }
}

function dateRangeReport7Days(start, end) {
    return {
        maxDate: moment().locale('id').add(7, 'days'),
        startDate: start,
        endDate: end,
        minYear: 2015,
        maxYear: parseInt(moment().locale('id').format('YYYY'), 10),
        ranges: {
            'Hari Ini': [moment(), moment()],
            '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
        },
        maxSpan: {
            'days': 7,
        }
    }
}