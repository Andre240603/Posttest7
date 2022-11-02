<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>UPDATE</title>
</head>

<body>
   <a href="read.php">KEMBALI KE READ</a>

   <H1>UPDATE</H1>
   <form action="" method="POST">
      <?php
      $tampil = mysqli_query($conn, "SELECT * FROM beli WHERE id = '" . $_GET['id_beli'] . "'");
      if (mysqli_num_rows($tampil) > 0) {
         while ($row = mysqli_fetch_array($tampil)) {
      ?>
            <table>
               <input type="text" name="id" value="<?php echo $row['id']; ?>">
               <tr>
                  <th>Nama Barang</th>
                  <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>" readonly></td>
               </tr>
               <tr>
                  <th>Harga Barang</th>
                  <th><input type="text" name="harga" value="<?php echo $row['harga']; ?>"></th>
               </tr>
               <tr>
                  <th>Jenis Barang</th>
                  <th><input type="text" name="jenis" value="<?php echo $row['jenis']; ?>"></th>
               </tr>
               <tr>
                  <th>Stock Barang</th>
                  <th><input type="text" name="stock" value="<?php echo $row['stock']; ?>"></th>
               </tr>
            </table>
      <?php
         }
      }
      ?>
      <input type="submit" name="submitUpdate" value="Update">
   </form>
   <?php
   if (isset($_POST['submitUpdate'])) {
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $harga = $_POST['harga'];
      $jenis = $_POST['jenis'];
      $stock = $_POST['stock'];

      $update = mysqli_query($conn, "UPDATE beli SET 
         nama = '$nama',
         harga = '$harga',
         jenis = '$jenis',
         stock = '$stock'
         WHERE id = '$id'"
      );

      if ($update) {
   ?>
         <script>
            alert("data berhasil di update");
            window.location=('read.php');
         </script>
   <?php
      } else {
         echo "gagal" . mysqli_error($conn);
      }
   }
   ?>

</body>

</html>