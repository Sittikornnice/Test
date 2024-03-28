<?php
session_start();    // เขียนทุกครั้งที่มีการใช้ตัวแปร session
include('connection.php');  // นำเข้าไฟล์ database

// ทำการเช็คว่ามีการ submit form หรือไม่ isset() จะเช็คว่ามี data หรือไม่
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // ถ้าไม่มีการกรอกข้อมูลเข้ามาให้ทำการส่งข้อความกลับไปยังหน้า register.php
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $_SESSION['err_fill'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
        header('location: register.php');
    } 

    // กรณีที่มีการกรอกข้อมูลเข้ามาครบถ้วน จะทำการตรวจสอบว่ารหัสผ่านกับยืนยันรหัสผ่านตรงกันหรือไม่
    else {
        // ถ้ารหัสผ่านกับยืนยันรหัสผ่านไม่ตรงกัน ให้ทำการส่งข้อความกลับไปยังหน้า register.php
        if ($password !== $confirm_password) {
            $_SESSION['err_pw'] = "กรุณากรอกรหัสผ่านให้ตรงกัน";
            header('location: register.php');
        } 

        // ถ้ารหัสผ่านกับยืนยันรหัสผ่านตรงกันจะทำการ query ข้อมูล เพื่อเช็คว่ามี username นี้อยู่ในระบบหรือไม่
        else {
            // query ข้อมูล เพื่อเช็คว่ามี username นี้อยู่ในระบบหรือไม่
            $select_stmt = $db->prepare("SELECT COUNT(username) AS count_uname FROM users WHERE username = :username");
            $select_stmt->bindParam(':username', $username);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

            // ถ้ามี username ในระบบให้ทำการส่งข้อความกลับไปยังหน้า register.php
            if ($row['count_uname'] != 0) {
                $_SESSION['exist_uname'] = "มี username นี้ในระบบ";
                header('location: register.php');
            } 

            // ถ้าไม่มี username จะทำการเข้ารหัสโดย password_hash()
            else {
                // ทำการเข้ารหัสโดย password_hash()
                $password = password_hash($password, PASSWORD_DEFAULT);
                $insert_stmt = $db->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, 'นักเรียน/นักศึกษา')");
                // $insert_stmt = $db->prepare("INSERT INTO users (username, password, role1) VALUES (:username, :password, 'คณะอาจารย์ผู้สอน')");
                $insert_stmt->bindParam(':username', $username);
                $insert_stmt->bindParam(':password', $password);
                $insert_stmt->execute();

                // ถ้าสมัครสมาชิกสำเร็จ จะเก็บ username และ สถานะ login และไปยังหน้า index.php
                if ($insert_stmt) {
                    $_SESSION['username'] = $username;
                    $_SESSION['is_logged_in'] = true;
                    header('location: index.php');
                } 

                // ถ้าสมัครสมาชิกไม่สำเร็จจะกลับไปยังหน้า register.php
                else {
                    $_SESSION['err_insert'] = "ไม่สามารถนำเข้าข้อมูลได้";
                    header('location: register.php');
                }
            }
        }
    }
}
