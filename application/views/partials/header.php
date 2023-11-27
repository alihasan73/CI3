<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Codeigniter 3</title>
</head>
<body>    
<nav class="navbar navbar-expand-lg bg-body-tertiary h-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="<?php echo base_url('category/index'); ?>">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('product/index'); ?>">Produk(All)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('product/viewbj'); ?>">Produk(Bisa Dijual)</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#"><?php $password = "bisacoding-27-11-23";
          $hashedPassword = md5($password);
          echo $hashedPassword;
?></a>
        </li> -->
      </ul>

    </div>
  </div>
</nav>