<?php 
    session_start();    // เขียนทุกครั้งที่มีการใช้ตัวแปร session
    include('connection.php');  // นำเข้าไฟล์ database

    // ถ้าไม่มี $_SESSION['is_logged_in'] (เก็บสถานะ login โดยจะเก็บตอนที่สมัครสมาชิกหรือ login แล้วเท่านั้น) ให้กลับไปยังหน้า login.php เพื่อทำการ login ก่อน
    if (!isset($_SESSION['is_logged_in'])) {
        header('location: login.php');
    }

    // ถ้ามี $_SESSION['is_logged_in'] แสดงว่ามีการ login เข้ามาแล้ว
    else {
        // query ข้อมูลของคนที่ login เข้ามา เพื่อแสดงผลใน html
        $select_stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $select_stmt->bindParam(':username', $_SESSION['username']);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);   // ทำบรรทัดนี้ กรณีที่เราต้องการดึงข้อมูลมาแสดง
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
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
                        <a class="nav-link" aria-current="page" href="index.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php"><i class="fas fa-user-circle"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-5">Profile Page</h1>
                <div class="card mt-5">
                    <div class="card-body" style="line-height: 2.5;">
                        <h4>รายละเอียดบัญชี</h4>

                        <!-- ทำการแสดงผลข้อมูลที่ query ขึ้นมา  โดยรูปแบบจะเป็น $row['ชื่อคอลัมน์']-->
                        <span class="mt-5" style="font-weight: 700;">Username</span> : <span><?php echo $row['username']; ?></span><br>
                        <span style="font-weight: 700;">Password</span> : <span><?php echo $row['password']; ?></span><br>
                        <span style="font-weight: 700;">Role</span> : <span><?php echo $row['role']; ?></span>
                        <!-- <span style="font-weight: 700;"></span><span><?php echo $row['role1']; ?></span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>