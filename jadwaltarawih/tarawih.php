<?php
   require '../conn.php';
   $result = query("SELECT * FROM sholat_terawih");

   // jika tombol cari diklik
   if (isset($_POST["cari"])) {
      $result = cariTarawih($_POST["keyword"]);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://kit.fontawesome.com/ecde83b210.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../style.css">
   <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="../ramadan.png">

   <title>Jadwal Sholat Tarawih</title>
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
         <li><a href="../jadwalbuka/buka.php">Buka Puasa</a></li>
      </ul>
   </nav>
   <!-- end navbar -->

   <!-- fitur seacrh -->
   <form action="tarawih.php" method="POST">
      <input type="text" name="keyword" placeholder="Masukkan keyword pencarian.." autocomplete="off" class="search" id="keyword">
      <button type="submit" name="cari" id="search-button">Cari</button>
   </form>
   <!-- end fitur seacrh -->
   
   <!-- main table -->
   <section class="main">
      <h1>Jadwal Sholat Tarawih</h1>
      <br>
      <div id="container">
      <table>
         <thead>
            <tr>
               <th>TANGGAL</th>
               <th>IMAM</th>
               <th>MASJID</th>
               <th>EDIT JADWAL</th>
            </tr>
         </thead>
         <tbody>
            <?php
               // tanggal hari ini
               date_default_timezone_set('Asia/Jakarta');
               $date = date('Y-m-d');
               echo "Tanggal hari ini : ", $date;
            ?>

            <?php foreach($result as $data) : ?>
               <!-- TANGGAL HARI INI -->
               <?php if($data['tanggal'] == $date) { ?>
                  <tr style="background-color: #fffd90">
                     <td><?= $data['tanggal']; ?></td>
                     <td><?= $data['imam'];  ?></td>
                     <td><?= $data['masjid'];  ?></td>
                     <td>
                        <!-- update -->
                        <a href="<?= "updtarawih.php?tanggal=".$data['tanggal']; ?>" class="update"><i class="fa-solid fa-pen-to-square"></i></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <!-- delete -->
                        <a href="<?= "deltarawih.php?tanggal=".$data['tanggal']; ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                  </tr>
               <?php } else { ?>
                  <!-- BUKAN TANGGAL HARI INI -->
                  <tr>
                     <td><?= $data['tanggal']; ?></td>
                     <td><?= $data['imam']; ?></td>
                     <td><?= $data['masjid']; ?></td>
                     <td>
                        <a href="<?= "updtarawih.php?tanggal=".$data['tanggal']; ?>" class="update"><i class="fa-solid fa-pen-to-square"></i></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="<?= "deltarawih.php?tanggal=".$data['tanggal']; ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                  </tr>
               <?php }?>
            <?php endforeach; ?>
         </tbody>
      </table>
      </div>
      
      <!-- tambah data (create)-->
      <a href="addtarawih.php">
         <button class="create message">tambah jadwal (+)</button>
      </a>
      <!-- end tambah data -->
   </section>

   <!-- footer -->
   <footer>
      <p>Oleh Bregsi Atingsari Julastri / 20081010211</p>
   </footer>
   <!-- end footer -->

   <!-- script js -->
   <script src="js/script.js"></script>
</body>
</html>