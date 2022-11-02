<?php 
   include('koneksi.php');

   if(isset($_GET['id_beli'])){
      $delete = mysqli_query($conn, "DELETE FROM beli WHERE id= '".$_GET['id_beli']."'");

      if($delete){
         ?>
            <script>
            alert("data berhasil dihapus");
            window.location=('read.php');
            </script>
         <?php
      }
   }
?>