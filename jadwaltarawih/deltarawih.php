<?php 

require '../conn.php';

$status = '';
$result = '';
//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (isset($_GET['tanggal'])) {
      //query SQL
      $tanggal_upd = $_GET['tanggal'];
      $query = "DELETE FROM sholat_terawih WHERE tanggal = '$tanggal_upd'"; 

      //eksekusi query
      $result = query($query);

      if ($result) {
      $status = 'ok';
      }
      else{
      $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: tarawih.php?status='.$status);
   }  
}
?>