<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>User</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
  <body style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('irina-jKh453Idils-unsplash.jpg'); background-size: cover; background-attachment: fixed;">  
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">User</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link active" aria-current="page" href="register_form.php">Daftar</a>
        <a class="nav-link active" aria-current="page" href="login_form.php">Ganti akun</a>
        <a class="nav-link active" aria-current="page" href="logout.php">log Out</a>
      </nav>
    </div>
  </header>

  <main class="px-3">
  <h1>Selamat datang <span><?php echo $_SESSION['user_name'] ?></span></h1>
    <p class="lead">Kamu berada dihalaman User</p>
    <p class="lead">
      <a href="../crud_user/index.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Masuk halaman user</a>
    </p>
  </main>

  <footer class="mt-auto ">
     </footer>
</div>


    
  </body>
</html>
