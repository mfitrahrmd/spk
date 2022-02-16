          <?php

          $koneksi = new mysqli("localhost", "root", "", "db_spk");
          $ambil = $koneksi->query("SELECT * FROM atlit  where id='$_GET[id]'");
          $r = $ambil->fetch_assoc();

          ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <form method="POST" enctype="multipart/form-data">

                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit Profile</h4>
                    <p class="card-category">Isi semua data profil atlit</p>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">NIK</label>
                          <input type="text" name="nik" required maxlength="16" class="form-control" value="<?php echo $r['nik']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" name="nama" required class="form-control" value="<?php echo $r['nama']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tempat Lahir</label>
                          <input type="text" name="tmpt_lhr" required class="form-control" value="<?php echo $r['tmpt_lhr']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Lahir</label>
                          <input type="date" name="tgl_lhr" required class="form-control" value="<?php echo $r['tgl_lhr']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat" rows="6" required "><?php echo $r['alamat']; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class=" row mb-2">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jenis Kelamin</label><br/>
                          <input type="radio" name="jk" value="L" <?php if (isset($_POST['jk']) && $_POST['jk'] == "L") echo "checked"; ?> class="mr-1"  required><label>Laki Laki</label>&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="jk" value="P" <?php if (isset($_POST['jk']) && $_POST['jk'] == "P") echo "checked"; ?> class="mr-1" required><label>Perempuan</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-groups">
                          <label class="bmd-label-floating">Foto</label><p>
                          <!-- Foto full cover, tanpa stretching -->
                          <div style="width: 300px; height: 400px;">
                          <img src="<?php echo '../assets/foto/', $r['foto']; ?>" alt="foto_profil" style="width:100%; height:100%; object-fit: cover; object-position: center;">
                          </div>
                          <input type="file" name="foto" class="form-control-file" >
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                <div class="form-group">
                    <button type="submit" name="tambahg" class="btn btn-success btn-block pull-right">SIMPAN DATA</button>
                  </div>

                </form>
              </div>
            </div>
          </div>

          <?php
          require_once('./../config/data.php');
          if (isset($_POST['tambahg'])) {
            // File data
            $file_name  = $_FILES['foto']['name'];
            $file_tmp   = $_FILES['foto']['tmp_name'];
            // Form data
            $id = $_GET['id'];
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $tmpt_lhr = $_POST['tmpt_lhr'];
            $tgl_lhr = $_POST['tgl_lhr'];
            $jk = $_POST['jk'];
            $alamat = $_POST['alamat'];
            if (!empty($file_tmp)) {
              // Pindahkan file upload
              $edit_foto = move_uploaded_file($file_tmp, './../assets/foto/' . $r['foto']);
              if ($edit_foto) {
                echo "<script>alert('foto changed')</script>";
              } else {
                echo "<script>alert('foto not changed')</script>";
              }
              // Edit data atlit
              $edit_atlit = $atlits->atlit_edit($id, $nik, $nama, $tmpt_lhr, $tgl_lhr, $jk, $alamat);
              // cek apakah query berhasil
              if ($edit_atlit) {
                echo "<script>alert('success')</script>";
              } else {
                echo "<script>alert('fail')</script>";
              }
              echo "<script>location='./?p=data'</script>";
            } else {
              // Edit data atlit
              $edit_atlit = $atlits->atlit_edit($id, $nik, $nama, $tmpt_lhr, $tgl_lhr, $jk, $alamat);
              // cek apakah query berhasil
              if ($edit_atlit) {
                echo "<script>alert('success')</script>";
              } else {
                echo "<script>alert('fail')</script>";
              }
              echo "<script>location='./?p=data'</script>";
            }
          }
          ?>