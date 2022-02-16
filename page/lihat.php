<?php 

$koneksi =new mysqli("localhost","root","","db_spk");
$ambil = $koneksi->query("SELECT * FROM atlit join prestasi ON atlit.id=prestasi.id_atlit where atlit.id='$_GET[id]'");
$r = $ambil->fetch_assoc();
$jenis = $r['jk'];

?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <form method="POST" enctype="multipart/form-data">

                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Profile <?=$r['nama']?></h4>
                    <p class="card-category">Lihat data profil atlit</p>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">NIK</label>
                          <input type="text" name="nik" required maxlength="16" class="form-control" value="<?=$r['nik']?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" name="nama" required class="form-control" value="<?=$r['nama']?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tempat Lahir</label>
                          <input type="" name="tmpt_lhr"  class="form-control" value="<?=$r['tmpt_lhr']?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Lahir</label>
                          <input type="" name="tgl_lhr"  class="form-control" value="<?=$r['tgl_lhr']?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating">Alamat Lengkap</label>
                            <input type="text" class="form-control" name="alamat" rows="6" value="<?=$r['alamat']?>" readonly></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Daftar</label>
                          <input type="text" name="nik" required maxlength="16" class="form-control" value="<?=$r['timestamp']?>" readonly>
                        </div>
                      </div>
                  </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jenis Kelamin </label><br/>
                          <input type="text" name="nik" required maxlength="16" class="form-control" value="<?=$r['jk']?>"  readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Foto</label><p>
                          <?php echo "<img src='../assets/foto/$r[foto]' width='300' height='250' />";?>
                        </div>
                      </div>
                    
                      <div class="col md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">File Prestasi </label><br/>
                         <?php echo "<img src='../assets/prestasi/$r[file]' width='300' height='250' />";?>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
</form></div></div></div>