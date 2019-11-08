var keyword = document.getElementById('search');
var user = document.getElementById('user');

// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function () {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange == function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            user.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'ajax/coba.txt', true);
    xhr.send();
});



<script src="<?= baseurl('assets/js/script.js'); ?>"></script>