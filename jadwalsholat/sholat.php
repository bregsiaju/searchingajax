<?php
   require '../conn.php';
   $result = query("SELECT * FROM jadwal");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style> tr:nth-child(25) { background-color: #fffd90; } </style>

   <link rel="stylesheet" href="../style.css">
   <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="../ramadan.png">

   <title>Jadwal Waktu Sholat</title>
</head>
<body>
   <!-- navbar -->
   <nav>
      <div class="logo">
         <h3>Jadwal Ramadhan</h3>
      </div>
      <ul>
         <li><a href="sholat.php">Waktu Sholat</a></li>
         <li><a href="../jadwaltarawih/tarawih.php">Sholat Tarawih</a></li>
         <li><a href="../jadwalbuka/buka.php">Buka Puasa</a></li>
      </ul>
   </nav>
  <!-- end navbar -->
  
  <!-- main content -->
   <section class="main">
      <h1>Jadwal Waktu Sholat</h1>
      <br>
      <table>
         <thead>
            <tr>
               <th>Tanggal</th>
               <th>Imsyak</th>
               <th>Subuh</th>
               <th>Dzuhur</th>
               <th>Ashar</th>
               <th>Maghrib</th>
               <th>Isya</th>
            </tr>
         </thead>
         <tbody>
            <?php
               // tanggal hari ini
               date_default_timezone_set('Asia/Jakarta');
               $date = date('Y-m-d');
               echo "Tanggal hari ini : ", $date;
            ?>

            <?php foreach($result as $data): ?>
               <tr>
                  <td><?php echo $data['tanggal']; ?></td>
                  <td><?php echo $data['imsyak']; ?></td>
                  <td><?php echo $data['subuh']; ?></td>
                  <td><?php echo $data['dzuhur']; ?></td>
                  <td><?php echo $data['ashar']; ?></td>
                  <td><?php echo $data['maghrib']; ?></td>
                  <td><?php echo $data['isya']; ?></td>
               </tr>

               <?php
               $tanggal = $data['tanggal'];
               $imsyak = $data['imsyak'];
               $subuh = $data['subuh'];
               $dzuhur = $data['dzuhur'];
               $ashar = $data['ashar'];
               $maghrib = $data['maghrib'];
               $isya = $data['isya'];

               // LOOP PENGURANGAN WAKTU
               for($i = 0; $i < 29; $i++) { ?>
               <tr>
                  <td>
                     <?php $newDate = strtotime("+1 day", strtotime($tanggal));
                     echo date("Y-m-d", $newDate); 
                     $tanggal = date("Y-m-d", $newDate); ?>
                  </td>

                  <?php if($i % 2 == 1) { ?>
                  <!-- WAKTU IMSYAK -->
                  <td>
                     <?php
                     $newTime = strtotime("$imsyak -1 minutes");
                     echo date("h:i:s", $newTime);
                     $imsyak = date("h:i:s", $newTime); }
                     else {?>
                  </td>
                  <td>
                     <?php
                     $newTime = strtotime("$imsyak 0 minutes");
                     echo date("h:i:s", $newTime);
                     $imsyak = date("h:i:s", $newTime); }
                  ?></td>

                  <!-- WAKTU SUBUH -->                  
                  <?php
                  if($i % 2 == 1) { ?>
                  <td>
                     <?php
                     $newTime = strtotime("$subuh -1 minutes");
                     echo date("h:i:s", $newTime);
                     $subuh = date("h:i:s", $newTime); }
                     else {?>
                  </td>
                  <td>
                     <?php
                     $newTime = strtotime("$subuh 0 minutes");
                     echo date("h:i:s", $newTime);
                     $subuh = date("h:i:s", $newTime); }
                  ?>
                  </td>

                  <!-- WAKTU DZUHUR -->                  
                  <?php
                  if($i % 2 == 1) { ?>
                  <td>
                     <?php
                     $newTime = strtotime("$dzuhur -1 minutes");
                     echo date("h:i:s", $newTime);
                     $dzuhur = date("h:i:s", $newTime); }
                     else {?>
                  </td>
                  <td>
                     <?php
                     $newTime = strtotime("$dzuhur 0 minutes");
                     echo date("h:i:s", $newTime);
                     $dzuhur = date("h:i:s", $newTime); }
                  ?>
                  </td>

                  <!-- WAKTU ASHAR -->                  
                  <?php
                  if($i % 2 == 1) { ?>
                  <td>
                     <?php
                     $newTime = strtotime("$ashar -1 minutes");
                     echo date("h:i:s", $newTime);
                     $ashar = date("h:i:s", $newTime); }
                     else {?>
                  </td>
                  <td>
                     <?php
                     $newTime = strtotime("$ashar 0 minutes");
                     echo date("h:i:s", $newTime);
                     $ashar = date("h:i:s", $newTime); }
                  ?>
                  </td>

                  <!-- WAKTU MAGHRIB -->                  
                  <?php
                  if($i % 2 == 1) { ?>
                  <td>
                     <?php
                     $newTime = strtotime("$maghrib -1 minutes");
                     echo date("h:i:s", $newTime);
                     $maghrib = date("h:i:s", $newTime); }
                     else {?>
                  </td>
                  <td>
                     <?php
                     $newTime = strtotime("$maghrib 0 minutes");
                     echo date("h:i:s", $newTime);
                     $maghrib = date("h:i:s", $newTime); }
                  ?>
                  </td>

                  <!-- WAKTU ISYA -->                  
                  <?php
                  if($i % 2 == 1) { ?>
                  <td>
                     <?php
                     $newTime = strtotime("$isya -1 minutes");
                     echo date("h:i:s", $newTime);
                     $isya = date("h:i:s", $newTime); }
                     else {?>
                  </td>
                  <td>
                     <?php
                     $newTime = strtotime("$isya 0 minutes");
                     echo date("h:i:s", $newTime);
                     $isya = date("h:i:s", $newTime); }
                  }?>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </section>
   <!-- end main content -->

   <!-- footer -->
   <footer>
      <p>Oleh Bregsi Atingsari Julastri / 20081010211</p>
   </footer>
   <!-- footer -->
</body>
</html>