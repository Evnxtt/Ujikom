<?php
session_start();
include 'koneksi.php';
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
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
      <h4>Form Login</h4>
      <u><p>Silahkan Login</p></u></b>
      <br>
        <div class="inputfield">
          <label>Username</label>
          <input type="text" class="input" name="user">
       </div>  
       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" name="pass">
       </div>
       <div class="inputfield">
        <input type="submit" value="login" class="btn" name="login">
      </div>   
    </div>
</div>
<?php
  if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $data_user = mysqli_query($koneksi, "select * from akun where username = '$user' and password = '$pass' ");
    $r = mysqli_fetch_array($data_user);
    $username = $r['username'];
    $password = $r['password'];
    $level = $r['level'];
    if($user == $username && $pass == $password){
      $_SESSION['level'] = $level;
      if($level == 'super'){
        header('location:Super.php');
      }elseif($level == 'admin'){
        header('location:Admin.php');
      }elseif($level == 'operator'){
        header('location:Operator.php');
        ob_end_flush();
      }	else {
        echo "
        <script>
          alert('Username Atau Password Harus Diisi');
          document.location.href = 'index.php';
        </script>";
      }
  }
}
?>	
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