<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);


   $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['role'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:cover_admin.php');

      }elseif($row['role'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:cover_user.php');

      }
     
   }else{
      $error[] = 'incorrect username or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<body style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('slashio-photography-GKcoau1ESxg-unsplash.jpg'); background-size: cover; background-attachment: fixed;">  
   
<div class="form-container">

   <form action="" method="post">
      <h3>login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="Masukkan nama anda">
      <input type="password" name="password" required placeholder="Masukkan password anda">
      <input type="submit" name="submit" value="login" class="form-btn">
      <p>Anda tidak mempunyai akun? <a href="register_form.php">Daftar</a></p>
   </form>

</div>

</body>
</html>