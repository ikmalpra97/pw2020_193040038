// ambil elemen-elemen yang dibutuhkan
var search = document.getElementById('search');
var konte = document.getElementById('konte');

// tambahkan event ketika search ditulis
search.addEventListener('keyup', function () {

  // objek ajax
  var xhr = new XMLHttpRequest();

  // mengecek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      konte.innerHTML = xhr.responseText;
    }
  }


  // eksekui ajax
  xhr.open('GET', 'ajax/ajax_cari.php?search=' + search.value, true);
  xhr.send();
});