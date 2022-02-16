<?php 

$koneksi =new mysqli("localhost","root","","db_spk");
$query = $koneksi->query("DELETE FROM atlit WHERE id='$_GET[id]'");
if ($query){
 echo "<script>alert('Data Berhasil Dihapus!');location='./?p=data'</script>";
        }
        else {
          echo "<script>alert('Error, Data Gagal Dihapus!');location='./?p=data'</script>";
        }
?>