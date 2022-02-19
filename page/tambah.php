          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <form method="POST" enctype="multipart/form-data">

                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Profile</h4>
                    <p class="card-category">Isi semua data profil atlit</p>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">NIK</label>
                          <input type="text" name="nik" required maxlength="16" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" name="nama" required class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tempat Lahir</label>
                          <input type="text" name="tmpt_lhr" required class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Lahir</label>
                          <input type="date" name="tgl_lhr" required class="form-control" value="<?= date("Y-m-d") ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat" rows="6" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jenis Kelamin</label><br />
                          <input type="radio" name="jk" value="L" class="mr-1" required><label>Laki Laki</label>&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="jk" value="P" class="mr-1" required><label>Perempuan</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-groups">
                          <label class="bmd-label-floating">Foto</label>
                          <input type="file" name="foto" class="form-control-file" required>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
              </div>

              <div class="form-group">
                <button type="submit" name="tambah" class="btn btn-success btn-block pull-right">SIMPAN DATA</button>
              </div>

              </form>
            </div>
          </div>
          </div>

          <?php
          if (isset($_POST['tambah'])) {
            require_once('./../config/data.php');
            $cek = $atlits->cek_create(addslashes($_POST['nik']));
            if ($cek->num_rows > 0) {
              echo "<script>alert('Nik telah tersedia!');location='./?p=tambah'</script>";
            } else {
              $allowed_ext  = array('jpg', 'jpeg', 'png');
              $file_name  = $_FILES['foto']['name'];
              $xtmp       = explode('.', $file_name);
              $file_ext   = strtolower(end($xtmp));
              $file_tmp   = $_FILES['foto']['tmp_name'];
              $filebaru   = $id . '_.' . $file_ext;
              if (in_array($file_ext, $allowed_ext) === true) {
                if ($_FILES['prestasi']['error'] == 4 || $_POST['jp'] == '') {
                } else {
                  $nama_prestasi = $_FILES['prestasi']['name'];
                  $x_prestasi = explode('.', $nama_prestasi);
                  $ekstensi_prestasi = strtolower(end($x_prestasi));
                  $file_tmp_prestasi = $_FILES['prestasi']['tmp_name'];
                  $filebaru_prestasi = $id . '_prestasi.' . $ekstensi_prestasi;
                  move_uploaded_file($file_tmp_prestasi, './../assets/prestasi/' . $filebaru_prestasi);
                  $tambah_prestasi = $atlits->atlit_create_prestasi($_POST['jp'], $_POST['keterangan_p'], $filebaru_prestasi, $timestamp, $id, $_POST['tahun_penilaian']);
                }
                move_uploaded_file($file_tmp, './../assets/foto/' . $filebaru);
                $tambah = $atlits->atlit_create($id, addslashes($_POST['nik']), addslashes($_POST['nama']), addslashes($_POST['tmpt_lhr']), addslashes($_POST['tgl_lhr']), addslashes($_POST['jk']), addslashes($_POST['alamat']), $filebaru, $timestamp, $_POST['kf1'], $_POST['kf2'], $_POST['kf3'], $_POST['kf4'], $_POST['kf5'], $_POST['kf6'], $_POST['kf7'], $_POST['kf8'], $_POST['kt1'], $_POST['kt2'], $_POST['kt3'], $_POST['kt4']);
                if ($tambah) {
                  echo "<script>alert('Correct, Atlit Berhasil Ditambahkan!');location='./?p=tambah'</script>";
                } else {
                  echo "<script>alert('Error, Atlit Gagal Ditambahkan!');location='./?p=tambah'</script>";
                }
              } else {
                echo "<script>alert('Ekstensi file tidak diizinkan!');location='./?p=tambah'</script>";
              }
            }
          } else {
          }
          ?>