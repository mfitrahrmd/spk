<?php require_once('./../config/data.php');
$no = 1;
$atlit = $atlits->atlit_read_beranda();
$total_atlit = $atlit->num_rows;
?>
<div class="row">
  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons">content_paste</i>
        </div>
        <p class="card-category">Form Tambah Data Atlit</p>
        <h3 class="card-title"></h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-success">person</i>
          <a href="?p=tambah" class="success-link">Tambah Data Atlit</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          <i class="material-icons">person</i>
        </div>
        <p class="card-category">Data Atlit</p>
        <h3 class="card-title"><?= $total_atlit ?></h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-info">update</i>
          <a href="?p=data" class="info-link">Cek Data Atlit...</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
    <div class="card card-stats">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          <i class="material-icons">notifications</i>
        </div>
        <p class="card-category">Jumlah Ranking</p>
        <h3 class="card-title">Rank 1 - Rank 5</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-warning">update</i>
          <a href="?p=penilaian" class="warning-link">Cek Ranking Atlit...</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Atlit Terbaru</h4>
        <p class="card-category">Data Atlit yang Baru Mendaftar</p>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead class="text-warning">
            <th>No.</th>
            <th>NIK</th>
            <th>NAMA</th>
            <th>TTL</th>
            <th>JK</th>
            <th>ALAMAT</th>
          </thead>
          <tbody> <?php
                  if ($total_atlit > 0) {
                    while ($r = $atlit->fetch_assoc()) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $r['nik'] ?></td>
                  <td><?= $r['nama'] ?></td>
                  <td><?= $r['tmpt_lhr'] ?>, <?= date("d-m-Y", strtotime($r['tgl_lhr'])) ?></td>
                  <td><?= $r['jk'] ?></td>
                  <td><?= $r['alamat'] ?></td>
                </tr> <?php
                    }
                  } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>