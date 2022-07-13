<?php
   require '../conn.php';

   $result = '';
   $status = '';
   //melakukan pengecekan apakah ada variable GET yang dikirim
   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['tanggal'])) {
         //query SQL
         $tanggal_upd = $_GET['tanggal'];
         $query = "SELECT * FROM sholat_terawih WHERE tanggal = '$tanggal_upd'";

         //eksekusi query
         $result = query($query);
      }
   }

   //melakukan pengecekan apakah ada form yang dipost
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $tanggal = $_POST['tanggal'];
      $imam = $_POST['imam'];
      $masjid = $_POST['masjid'];
      //query SQL
      $sql = "UPDATE sholat_terawih SET imam='$imam', masjid='$masjid' WHERE tanggal='$tanggal'";

      //eksekusi query
      $result = query($sql);
      if ($result) {
         $status = 'ok';
      }
      else{
         $status = 'err';
      }
      header('Location: tarawih.php?status='.$status);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../style.css">
   <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="../ramadan.png">

   <title>Update Jadwal Sholat Tarawih</title>
</head>
<body>
   <!-- navbar -->
   <nav>
      <div class="logo">
         <h3>Jadwal Ramadhan</h3>
      </div>
      <ul>
         <li><a href="../jadwalsholat/sholat.php">Waktu Sholat</a></li>
         <li><a href="tarawih.php">Sholat Tarawih</a></li>
         <li><a href="/jadwalbuka/buka.php">Buka Puasa</a></li>
      </ul>
   </nav>
   <!-- end navbar -->

   <!-- form update -->
   <section>
      <h2>Update Jadwal Sholat Tarawih</h2>
      <form action="updtarawih.php" method="POST">
      <?php foreach ( $result as $data ) : ?>
         <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required="required" readonly>
         </div>
         <div class="form-group">
            <label>Imam</label>
            <input type="text" placeholder="Nama Imam" name="imam" value="<?= $data['imam']; ?>" required="required">
         </div>
         <div class="form-group">
            <label>Masjid</label>
            <input type="text" placeholder="Nama Masjid" name="masjid" value="<?= $data['masjid']; ?>" required="required">
         </div>
         <?php endforeach; ?>
         <button type="submit">Simpan</button>
      </form>
   </section>
   <!-- end form update -->

   <!-- footer -->
   <footer class="fixed-bottom">
      <p>Oleh Bregsi Atingsari Julastri / 20081010211</p>
   </footer>
   <!-- end footer -->
</body>
</html>