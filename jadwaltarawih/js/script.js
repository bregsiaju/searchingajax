// get element yang dibutuhkan
var keyword = document.getElementById('keyword');
var searchButton = document.getElementById('search-button');
var container = document.getElementById('container');

// add event ketika keyword ditulis
keyword.addEventListener('keyup', function() {
   // buat objek ajax
   var ajax = new XMLHttpRequest();

   // cek kesiapan ajax
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 4 && ajax.status == 200) {
         container.innerHTML = ajax.responseText;
      }
   }

   // eksekusi ajax
   ajax.open('GET', 'ajax/jadwaltrw.php?keyword=' + keyword.value, true);
   ajax.send();
});