    <?php 

$koneksi =new mysqli("localhost","root","","db_spk");

    if (isset($_GET['username'])) {
        $username = $_GET['username'];
    }
    else {
    die ("Error. No ID Selected! ");    
    }
    //proses ganti password
    if (isset($_POST['Ganti'])) {
    $username        = $_POST['username'];
    $password_baru    = md5($_POST['password']);
    $konf_password    = md5($_POST['konfirm']);
    //cek old password
    //validasi data data kosong
    if (empty($_POST['password']) || empty($_POST['konfirm'])) {
            echo "<h3><font color=red>Ganti Password Gagal! Data Tidak Boleh Kosong.</font></h3>";    
    }
    //validasi input konfirm password
    else if (($_POST['password']) != ($_POST['konfirm'])) {
            echo "<h3><font color=red><center>Ganti Password Gagal! Password dan Konfirm Password Harus Sama.</center></font></h3>";    
    }
    else {
    //update data
    $sql = mysqli_query($koneksi,"UPDATE user SET password='$password_baru' WHERE username='$username'");
    //setelah berhasil update
    if ($sql) {
        echo "<h3><font color=#8BB2D9><center>Ganti Password Berhasil!</center></font></h3>";    
    } else {
        echo "<h3><font color=red><center>Ganti Password Gagal!</center></font></h3>";    
    }
    }
    }
?>
        <div class="card col-md-12s">
                <div class="card-header card-header-primary col-md-12s">
            <font size="3" color="FFA800"><b>Form Ubah Password</b></font></div></div>
   <form action="#" method="POST" name="form-ganti-password" enctype="multipart/form-data">
         <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="username" id="username" required maxlength="16" class="form-control" value="
                          <?=$username?>">
                        </div>
                      </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">Password Baru</label>
                              <input type="text" name="password" id="password" required class="form-control">
                            </div>
                          </div>
                        </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm Password</label>
                          <input type="text" name="konfirm" id="konfirm" required  class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                      <div class="form-group">
                    <button type="submit" name="Ganti" class="btn btn-success btn-block pull-right">SIMPAN DATA</button>
                  </div>

     
</div></div></div></form>
