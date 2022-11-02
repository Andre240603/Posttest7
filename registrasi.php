<?php 
include('koneksi.php');
function register($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username yang dipilih sudah terdaftar!')
              </script>";
        return false;
    }

    if($password !== $password2){
        echo"<script>
                alert('konfirmasi password tidak sesuai!');
             </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);
};
?>
<?php
if(isset($_POST["register"])){
    if(register($_POST)>0){
        echo "<script>
                alert('user baru berhasil ditambahkan!');
              </script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>register</title>
</head>
<body>
    <h1>Halaman Register</h1>
    <div class="container" style="background-color: aqua; border-radius: 10px" >
    <style>
        label{
            display: block;
        }
    </style>
    <form action="" method="post">
    <table class="registrasi">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                 <label for="password2">Konfirmasi Password : </label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Masokk  
                </button>
            </li>
        </ul>
    </table>
    </form>
        
</body>
</html>