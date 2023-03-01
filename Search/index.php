<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><center>
    <form action="" method="post">
        <p>Search :  <input type="text" name="text"></p>
        <input type="submit" value="Search" name="search">
        <?php
        if (isset($_POST['search'])){
            $title = $_POST['text'];
            $sql = "SELECT * FROM data WHERE title LIKE '%$title%'";
            $exe =  mysqli_query($koneksi,$sql) or die("Gagal");
            if (mysqli_num_rows($exe) > 0){
                $count=0;
                while($row = mysqli_fetch_assoc($exe)){
                    $count++
                
        ?>
    </form>
    <br>
    </center>
    <center>
    <table border="1">
        <thead>
        <tr>
            <th width="200">no</th>
            <th width="200">id</th>
            <th width="200">title</th>
            <th width="200">description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td><?php echo $count;?></td>
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['title'];?></td>
          <td><?php echo $row['description'];?></td>
        </tr>
        </tbody>
    </table>
    </center>
</body>
</html>
<?php
            }}}
?>