<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Data Tolet</title>
      <link rel="stylesheet" href="baru.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="shortcut icon" href="logo.png" type="image/x-icon">
   </head>
   <body>
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            Data Masukan Toilet 
         </div>
         <div class="nav-items">
            <li><a href="Tabel1.php">Lantai 1</a></li>
            <li><a href="Tabel2.php">Lantai 2</a></li>
            <li><a href="Tabel3.php">Lantai 3</a></li>
            <li><a href="Operator.php">Kembali</a></li>
         </div>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
      </nav>
      <br>
      <div class="but">
      <a href="Tlt1p2.php"><button type="button" class="btn btn-primary">Toilet Pria Lantai 1 Zona 2</button></a>
      <a href="Tlt1p4.php"><button type="button" class="btn btn-info">Toilet Pria Lantai 1 Zona 4</button></a>
      <a href="Tlt1w2.php"><button type="button" class="btn btn-info">Toilet Wanita Lantai 1 Zona 2</button></a>
      <a href="Tlt1w4.php"><button type="button" class="btn btn-info">Toilet Wanita Lantai 1 Zona 4</button></a>
      </div>
      <center>
    <br>
    <h1><b>Data Toilet Pria Lantai 1 Zona 2</b></h1>
  </center>
  <br>
  <center>
   <!-- Search By Date -->
  <form action="" class="fom" method="post">
            <input type="date" name="tgl_mulai" class="fom" value="dd/mm/yyyy">
            <span class="fom">-- Sampai --</span>
            <input type="date" name="tgl_selesai" class="fom" value="dd/mm/yyyy">
            <input type="submit" value="Cari" name="cari" class="fom btn btn-success">
         </form>
   <!-- End Search By Date -->
         </center>
         <br>
   <table class="table">
     <thead>
     	<tr>
     	 <th>No</th>
     	 <th>Nama</th>
     	 <th>Nomor</th>
     	 <th>Umur</th>
     	 <th>Masukan</th>
         <th>Gambar</th>
         <th>Rating</th>
         <th>Tanggal & Waktu</th>
     	</tr>
     </thead>
     <tbody>
        <?php
        include "koneksi.php";
        $no=1;
        if (isset($_POST['cari'])){
            $awal = mysqli_real_escape_string($koneksi, $_POST['tgl_mulai']);
            $akhir = mysqli_real_escape_string($koneksi, $_POST['tgl_selesai']);
            $ambil = mysqli_query($koneksi,"select * from lt1p2 WHERE tgl BETWEEN '$awal' AND '$akhir'");
        }else{
        $ambil = mysqli_query($koneksi,"select * from lt1p2");
        }
        while ($tampil = mysqli_fetch_array($ambil)){
            
        ?>
        <tr>
          <td><?php echo $no++;?></td>
          <td><?php echo $tampil['nama'];?></td>
          <td><?php echo $tampil['no'];?></td>
          <td><?php echo $tampil['umur'];?></td>
          <td><?php echo $tampil['masukan'];?></td>
          <td><img Src="file/<?php echo $tampil['file'];?>" width="100px" heigth="100px"></td>
          <td><?php echo $tampil['rating'];?></td>
          <td><?php echo $tampil['tgl'];?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
      <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = ()=>{
           items.classList.remove("active");
           menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   </body>
</html>