<?php 
   require '../conn.php';

   $status = '';
   //melakukan pengecekan apakah ada form yang dipost
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $tanggal = $_POST['tanggal'];
      $menu_takjil = $_POST['menu_takjil'];
      $menu_berbuka = $_POST['menu_berbuka'];
      $tempat = $_POST['tempat'];
      //query SQL
      $sql = "INSERT INTO menu_berbuka (tanggal, menu_takjil, menu_berbuka, tempat) VALUES ('$tanggal', '$menu_takjil', '$menu_berbuka', '$tempat');";

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

   <title>Tambah Menu Berbuka</title>
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

   <!-- form create -->
   <section>
      <h2>Tambah Menu Berbuka</h2>
      <form action="addbuka.php" method="POST">
      <div class="form-group">
         <label>Tanggal</label>
         <input type="date" name="tanggal" required="required">
      </div>
      <div class="form-group">
         <label>Menu Takjil</label>
         <input type="text" placeholder="Menu takjil" name="menu_takjil" required="required">
      </div>
      <div class="form-group">
         <label>Menu Berbuka</label>
         <input type="text" placeholder="Menu berbuka" name="menu_berbuka" required="required">
      </div>
      <div class="form-group">
         <label>Tempat</label>
         <input type="text" placeholder="Tempat berbuka" name="tempat" required="required">
      </div>
      <button type="submit">Simpan</button>
      </form>
   </section>
   <!-- end form create -->

   <!-- footer -->
   <footer class="fixed-bottom">
      <p>Oleh Bregsi Atingsari Julastri / 20081010211</p>
   </footer>
   <!-- end footer -->
</body>
</html>