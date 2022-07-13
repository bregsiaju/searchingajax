<?php
require '../../conn.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM menu_berbuka
             WHERE
             tanggal LIKE '%$keyword%' OR
             menu_takjil LIKE '%$keyword%' OR
             menu_berbuka LIKE '%$keyword%' OR
             tempat LIKE '%$keyword%'
            ";
$result = query($query);
?>

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