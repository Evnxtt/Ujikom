<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $ambilData = mysqli_query($koneksi, "SELECT * FROM akun WHERE id='$id'");
    $data=mysqli_fetch_array($ambilData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Akun</title>
	<link rel="stylesheet" href="input.css">
  <link rel="shortcut icon" href="logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
      <h4>Edit Data Akun</h4>
      <u><p>Silahkan Edit Data Akun</p></u></b>
      <br>
        <div class="inputfield">
          <label>Id</label>
          <input type="text" class="input" name="id" value="<?php echo $data['id'] ?>">
       </div>  
       <div class="inputfield">
          <label>Nama</label>
          <input type="text" class="input" name="nama" value="<?php echo $data['nama'] ?>">
       </div>   
        <div class="inputfield">
          <label>Username</label>
          <input type="text" class="input" name="username" value="<?php echo $data['username'] ?>">
       </div> 
       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" name="password" value="<?php echo $data['password'] ?>">
       </div>
       <div class="inputfield">
          <label>Level</label>
          <div class="select">
          <select name="level" id="level" value="<?php echo $data['level'] ?>">
            <option selected disabled>Silahkan Pilih Level</option>
            <option value="super">Super Admin</option>
            <option value="admin">Admin</option>
            <option value="operator">Operator</option>
          </select>
          </div>
       </div><br>
      <div class="inputfield">
        <input type="submit" value="Edit" class="btn" name="edit"><br>
      </div>
      <div class="inputfield">
        <center>
      <a href="DAkun.php"><button type="button" class="btn btn-warning">Kembali</button></a>
      </center>
      </div>
    </div>
</div>	
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
<?php
        if(isset($_POST['edit']))
        {
            $nama       = $_POST['nama'];
            $username       = $_POST['username'];
            $password     = $_POST['password'];
            $level       = $_POST['level'];

            mysqli_query($koneksi, "UPDATE akun 
            SET nama='$nama', username='$username', password='$password', level='$level'
            WHERE id='$id'") or die(mysqli_error($koneksi));

            echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang DiUpdate.... </h5></div>";
            echo "<meta http-equiv='refresh' content='1;url=http://localhost/23paskal/DAkun.php'>";
        }
?>