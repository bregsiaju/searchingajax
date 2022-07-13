<?php

$conn = mysqli_connect('localhost', 'root', '', 'ramadhan');

function query($query) {
   global $conn;
   $result = mysqli_query($conn, $query);
   return $result;
}

function cariBuka($keyword) {
   $query = "SELECT * FROM menu_berbuka
             WHERE
             tanggal LIKE '%$keyword%' OR
             menu_takjil LIKE '%$keyword%' OR
             menu_berbuka LIKE '%$keyword%' OR
             tempat LIKE '%$keyword%'
            ";
   return query($query);
}

function cariTarawih($keyword) {
   $query = "SELECT * FROM sholat_terawih
             WHERE
             tanggal LIKE '%$keyword%' OR
             imam LIKE '%$keyword%' OR
             masjid LIKE '%$keyword%'
            ";
   return query($query);
}

function cariSholat($keyword) {
   $query = "SELECT * FROM jadwal WHERE tanggal LIKE '%$keyword%'";
   return query($query);
}
?>