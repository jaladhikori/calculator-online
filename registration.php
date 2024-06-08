<?php

// koneksi
require_once 'database.php';

// daftar
if (isset($_POST['register'])) {
    // jika tombol register diklik

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; //belum dienkripsi

    //fungsi enkripsi
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //insert ke db
    $insert = mysqli_query($mysqli, "INSERT INTO users (username,email,password) values ('$username','$email','$hashed_password')");

    if ($insert) {
        //jika berhasil
        header('location:index.php'); //redirect ke halaman login
    } else {
        //jika gagal
        echo '
        <script>
            alert("Registrasi Gagal");
            windows.location.href="register.php";
        </script>
        ';
    }
}


//     $checkEmail = "SELECT * FROM users where email='$email'";
//     $result = $mysqli->query($checkEmail);
//     if ($result->num_rows > 0) {
//         echo "Email Address Already Exists !";
//     } else {
//         $sql = "INSERT INTO users (username, email, password) VALUES ( ?, ?, ? )";
//         $stmt = mysqli_stmt_init($mysqli);
//         $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
//         if ($prepareStmt) {
//             mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
//             mysqli_stmt_execute($stmt);
//             echo "<div class='alert alert-success'>You are registered successfully.</div>";
//         } else {
//             die("Something went wrong");
//         }
//     }
// }
