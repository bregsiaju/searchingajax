<?php
require '../conn.php';
$result = query("SELECT * FROM menu_berbuka");

// jika tombol cari diklik
if (isset($_POST["cari"])) {
   $result = cariBuka($_POST["keyword"]);
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

   <title>Jadwal dan Menu Berbuka</title>
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

   <!-- fitur seacrh -->
   <form action="buka.php" method="POST">
      <input type="text" name="keyword" placeholder="Masukkan keyword pencarian.." autocomplete="off" class="search" id="keyword">
      <button type="submit" name="cari" id="search-button">Cari</button>
   </form>
   <!-- end fitur seacrh -->

   <!-- main content -->
   <section class="main">
      <h1>Jadwal dan Menu Berbuka</h1>
      <br>
      <div id="container">
         <table>
            <thead>
               <tr>
                  <th>TANGGAL</th>
                  <th>MENU TAKJIL</th>
                  <th>MENU BERBUKA</th>
                  <th>TEMPAT</th>
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

               <?php foreach ($result as $data) : ?>
                  <!-- TANGGAL HARI INI -->
                  <?php if ($data['tanggal'] == $date) { ?>
                     <!-- BUKA DI RUMAH -->
                     <?php if ($data['tempat'] == "RUMAH") { ?>
                        <tr style="background-color: #fffd90">
                           <td><?= $data['tanggal']; ?></td>
                           <td><?= $data['menu_takjil']; ?></td>
                           <td><?= $data['menu_berbuka']; ?></td>
                           <td><?= $data['tempat']; ?></td>
                           <td>
                              <a href="<?= "updbuka.php?tanggal=" . $data['tanggal']; ?>" class="update"><i class="fa-solid fa-pen-to-square"></i></a>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="<?= "delbuka.php?tanggal=" . $data['tanggal']; ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                           </td>
                        </tr>
                     <?php } else { ?>
                        <!-- BUKA TIDAK DI RUMAH -->
                        <tr style="color: #4b77f0; font-weight: bold; background-color: #fffd90">
                           <td><?= $data['tanggal']; ?></td>
                           <td><?= $data['menu_takjil']; ?></td>
                           <td><?= $data['menu_berbuka']; ?></td>
                           <td><?= $data['tempat']; ?></td>
                           <td>
                              <a href="<?= "updbuka.php?tanggal=" . $data['tanggal']; ?>" class="update"><i class="fa-solid fa-pen-to-square"></i></a>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="<?= "delbuka.php?tanggal=" . $data['tanggal']; ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                           </td>
                        </tr>
                     <?php } ?>

                     <!-- BUKAN TANGGAL HARI INI -->
                  <?php } else { ?>
                     <!-- BUKA DI RUMAH -->
                     <?php if ($data['tempat'] == "RUMAH") { ?>
                        <tr>
                           <td><?= $data['tanggal']; ?></td>
                           <td><?= $data['menu_takjil']; ?></td>
                           <td><?= $data['menu_berbuka']; ?></td>
                           <td><?= $data['tempat']; ?></td>
                           <td>
                              <a href="<?= "updbuka.php?tanggal=" . $data['tanggal']; ?>" class="update"><i class="fa-solid fa-pen-to-square"></i></a>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="<?= "delbuka.php?tanggal=" . $data['tanggal']; ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                           </td>
                        </tr>
                     <?php } else { ?>
                        <!-- BUKA TIDAK DI RUMAH -->
                        <tr style="color: #4b77f0; font-weight: bold;">
                           <td><?= $data['tanggal']; ?></td>
                           <td><?= $data['menu_takjil']; ?></td>
                           <td><?= $data['menu_berbuka']; ?></td>
                           <td><?= $data['tempat']; ?></td>
                           <td>
                              <a href="<?= "updbuka.php?tanggal=" . $data['tanggal']; ?>" class="update"><i class="fa-solid fa-pen-to-square"></i></a>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="<?= "delbuka.php?tanggal=" . $data['tanggal']; ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                           </td>
                        </tr>
                     <?php } ?>
                  <?php } ?>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>

      <a href="addbuka.php">
         <button class="create message">tambah jadwal (+)</button>
      </a>
   </section>
   <!-- end main content -->

   <footer>
      <p>Oleh Bregsi Atingsari Julastri / 20081010211</p>
   </footer>


   <!-- script js -->
   <script src="js/script.js"></script>
</body>

</html>