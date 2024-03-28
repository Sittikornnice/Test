<?php
    session_start(); // เขียนทุกครั้งที่มีการใช้ตัวแปร session

    // ถ้าไม่มี $_SESSION['is_logged_in'] (เก็บสถานะ login โดยจะเก็บตอนที่สมัครสมาชิกหรือ login แล้วเท่านั้น) ให้กลับไปยังหน้า login.php เพื่อทำการ login ก่อน
    if (!isset($_SESSION['is_logged_in'])) {
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <!-- Css ของ รูปภาพ hedder -->
<style>
  .center {
    text-align: center;
  }
</style>
<body>
<div class="center">
  <img src="hedder.png" class="top" alt="Image" width="1005" height="96" />
</div>
<head>
    <style>
body {
    background: linear-gradient(to bottom, #744e97 5%, #805ca8 15%, #9172b4 25%, #ad96c6 40%, #c9bbd9 60%);
    height: 100vh; /* Set height to 100% of the viewport height */
}

</style>
    <!-- <body style="background-color:powderblue;"> -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดทำแบบฟอรม์อิเล็กทรอนิกส์ สำหรับแบบฟอร์มการขอใช้บริการหน่วยงานต่างๆ</title>
    <!-- <img src="hedder.png" class="top-center" alt="Image" width="500" height="500" /> -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color: #F3F4F7;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">ระบบจัดทำแบบฟอรม์อิเล็กทรอนิกส์ สำหรับแบบฟอร์มการขอใช้บริการหน่วยงานต่างๆ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="profile.php"><i class="fas fa-user-circle"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            
    </nav>
    <div class="container">
        <div class="">
        <div class="card-body">
                        <style>
  .carouselControls{
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
    animation: marquee 15s linear infinite;
  }

  @keyframes marquee {
    0% { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
  }

  .top-right {
    position: absolute;
    top: 0px;
    right: -1px; /* Adjust this value as needed */
  }
</style>


  <!-- Your marquee content here -->
<div id="carouselControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
<img src="หน้า1.jpg" class="top-right" alt="Image" width="650px" height="650px" />
</div>
<div class="carousel-item">
    <img src="หน้า2-3.jpg" class="top-right" alt="Image" width="650px" height="650px" />    
</div>
<div class="carousel-item">
    <img src="หน้า4.jpg" class="top-right" alt="Image" width="650px" height="650px" />    
</div>
<div class="carousel-item">
    <img src="หน้า5.jpg" class="top-right" alt="Image" width="650px" height="650px" />    
</div>

<div class="d-flex flex-column flex-shrink-0 p-2 navbar-dark bg-dark" style="width: 350px;height: 650px;">
    <a href="#">
        <svg class="bi pe-none me-2" width="62" height="32"><use xlink:href="#bootstrap"></use></svg>
    </a>
    <hr>

    <!-- <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> -->
    
    <ul class="nav nav-pills flex-column mb-auto ">
        <li class="nav-item">
            <a href="index.php" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="10" height="10"><use xlink:href="#"></use></svg>
                Home
            </a>
        </li>
        <li>
            <a href="C:\xampp\htdocs\Demo\docs\pdf" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="10" height="10"><use xlink:href="#speedometer2"></use></svg>
                Report PDF
            </a>
        </li>
        <li>
            <a href="mailto:sittikorn-sat@rmutp.ac.th" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="10" height="10"><use xlink:href="#table"></use></svg>
                Send Email
            </a>
        </li>
        <li>
            <a href="index1.php" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="10" height="10"><use xlink:href="#table"></use></svg>
                กรอกข้อมูลขอใช้บริการหน่วยงาน
            </a>
        </li>
    </ul>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>