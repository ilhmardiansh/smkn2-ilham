<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $kode_id = mysqli_real_escape_string($conn, $_POST['kode_id']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $role = $_POST['role'];

   $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(kode_id ,name, username, password, role) VALUES('$kode_id','$name','$username','$pass','$role')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Daftar Akun</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('slashio-photography-GKcoau1ESxg-unsplash.jpg'); background-size: cover; background-attachment: fixed;">  
   
<div class="form-container">

   <form action="" method="post">
      <h3>Daftar</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="number" name="kode_id" required placeholder="Tulis kode anda">
      <input type="text" name="name" required placeholder="Tulis nama anda">
      <input type="text" name="username" required placeholder="Tulis username anda">
      <input type="password" name="password" required placeholder="Masukkan password">
      <input type="password" name="cpassword" required placeholder="Masukkan konfirmasi password">
      <select name="role">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="Daftar" class="form-btn">
      <p>Sudah punya akun? <a href="login_form.php">login</a></p>
   </form>

</div>

</body>
</html>