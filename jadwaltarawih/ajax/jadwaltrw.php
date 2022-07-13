<?php
   require '../../conn.php';
   $keyword = $_GET["keyword"];
   $query = "SELECT * FROM sholat_terawih
               WHERE
               tanggal LIKE '%$keyword%' OR
               imam LIKE '%$keyword%' OR
               masjid LIKE '%$keyword%'
            ";
   $result = query($query);
?>

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