// ambil elemen-elemen yang dibutuhkan
var keyword = document.getElementById('cari');
var kontener = document.getElementById('kontener');

// tambahkan event ketika search ditulis
keyword.addEventListener('keyup', function () {

  // objek ajax
  var xhr = new XMLHttpRequest();

  // mengecek kesiapan ajax
  xhr.onreadystatechange = function () {

    if (xhr.readyState == 4 && xhr.status == 200) {
      kontener.innerHTML = xhr.responseText;
    }
  }

  // 
  // eksekui ajax
  xhr.open('GET', '../ajax/admin_cari.php?keyword=' + keyword.value, true);
  xhr.send();
});