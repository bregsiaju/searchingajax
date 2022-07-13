<?php
   require '../conn.php';

   $status = '';
   $result = '';
   //melakukan pengecekan apakah ada variable GET yang dikirim
   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['tanggal'])) {
         //query SQL
         $tanggal_upd = $_GET['tanggal'];
         $query = "SELECT * FROM menu_berbuka WHERE tanggal = '$tanggal_upd'";

         //eksekusi query
         $result = query($query);
      }
   }

   //melakukan pengecekan apakah ada form yang dipost
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $tanggal = $_POST['tanggal'];
      $menu_takjil = $_POST['menu_takjil'];
      $menu_berbuka = $_POST['menu_berbuka'];
      $tempat = $_POST['tempat'];
      //query SQL
      $sql = "UPDATE menu_berbuka SET menu_takjil='$menu_takjil', menu_berbuka='$menu_berbuka', tempat='$tempat' WHERE tanggal='$tanggal'";

      //eksekusi query
      $result = query($sql);
      if ($result) {
         $status = 'ok';
      }
      else{
         $status = 'err';
      }
      header('Location: buka.php?status='.$status);
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

   <title>Update Menu Berbuka</title>
</head>
<body>
   <!-- navbar -->
   <nav>
      <div class="logo">
         <h3>Jadwal Ramadhan</h3>
      </div>
      <ul>
         <li><a href="../jadwalsholat/sholat.php">Waktu Sholat</a></li>
         <li><a href="../jadwaltarawih/tarawih.php">Sholat Tarawih</a></li>
         <li><a href="buka.php">Buka Puasa</a></li>
      </ul>
   </nav>
   <!-- end navbar -->

   <!-- form update -->
   <section>
      <h2>Update Menu Berbuka</h2>
      <form action="updbuka.php" method="POST">
      <?php foreach ( $result as $data ) : ?>
         <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required="required" readonly>
         </div>
         <div class="form-group">
            <label>Menu Takjil</label>
            <input type="text" placeholder="Menu Takjil" name="menu_takjil" value="<?= $data['menu_takjil']; ?>" required="required">
         </div>
         <div class="form-group">
            <label>Menu Berbuka</label>
            <input type="text" placeholder="Menu Berbuka" name="menu_berbuka" value="<?= $data['menu_berbuka']; ?>" required="required">
         </div>
         <div class="form-group">
            <label>Tempat</label>
            <input type="text" placeholder="Tempat" name="tempat" value="<?= $data['tempat']; ?>" required="required">
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