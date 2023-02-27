<?php 
session_start();
require 'flt1p2.php';

if (isset($_POST["submit"]) ) {

	if(tambah($_POST) > 0 ) {
		echo "
		<script>
			alert('Terimakasih Atas Masukan Anda');
		</script>;";
	} else {
		echo "
		<script>
			alert('Maaf Masukan Anda Gagal Di Upload Mohon Coba Sekali Lagi');
		</script>";
	}
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulir Masukan</title>
	<link rel="stylesheet" href="input.css">
  <link rel="shortcut icon" href="logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<div class="wrapper">
<div class="header">
           <h1></h1>
           <p></p>
       </div>
       <br>
    <div class="form">
      <b> 
      <h4>Masukan Agar Fasilitas Kami Lebih Baik</h4>
      <u><p>Area Toilet Pria Lantai 1 Zona 2</p></u></b>
      <br>
        <div class="inputfield">
          <label>Nama lengkap</label>
          <input type="text" class="input" name="nama">
       </div>  
       <div class="inputfield">
          <label>Nomor Hp</label>
          <input type="number" class="input" name="no">
       </div>   
        <div class="inputfield">
          <label>Umur</label>
          <input type="number" class="input" name="umur">
       </div> 
       <div class="inputfield">
          <label>Masukan</label>
          <input type="text" class="input" name="masukan">
       </div>
      <div class="inputfield">
          <label>Foto</label>
          <input type="File" class="input" name="file">
       </div>
       <div class="inputfield">
          <label>Rating</label>
          <div class="rateyo" id= "rating"
          data-rateyo-full-star="true">
         </div>
         <input type="hidden" name="rating">
       </div><br>
      <div class="inputfield">
        <input type="submit" value="Submit" class="btn" name="submit">
      </div>
    </div>
</div>	
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 
<script>
 
 
    $(function () {
      
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>
</body>
</html>