<?php

$koneksi = new mysqli("localhost", "root", "", "db_spk");
$ambil = $koneksi->query("SELECT * FROM atlit  where id='$_GET[id]'");
$r = $ambil->fetch_assoc();
$prestas = $koneksi->query("SELECT * FROM prestasi  where id_atlit='$_GET[id]'");
$total_pres = $prestas->num_rows;

function jenis_prestasi($pres)
{
  switch ($pres) {
    case $pres == 1:
      return "Daerah";
      break;
    case $pres == 3:
      return "Nasional";
      break;
  }
}
?>


<div class="row" style="justify-content: center;">
  <div class="col-12 col-md-8">
    <div class="card">
      <img src="<?php echo './../assets/foto/', $r['foto']; ?>" alt="foto_profil" style="height: 400px; object-fit:cover">
      <div class="card-body">
        <h4 class="card-title text-right">NIK : <?= $r['nik']; ?></h4>
        <h4 class="card-title"><?= $r['nama']; ?></h4>
        <p><?= $r['jk']; ?></p>
        <h6 class="card-subtitle mb-2 text-muted"><?= $r['tmpt_lhr']; ?></h6>
        <p class="card-text"><?= $r['alamat']; ?></p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <?php
  if ($total_pres > 0) {
    while ($p = $prestas->fetch_assoc()) { ?>
      <div class="col-12">
        <div class="card">
          <img src="<?php echo './../assets/prestasi/', $p['file']; ?>" alt="foto_profil" style="height: 400px; object-fit:cover">
          <div class="card-body">
            <h4 class="card-title text-right">Jenis Prestasi : <?= jenis_prestasi($p['jenis']) ?></h4>
            <h4 class="card-title">Ketarangan : <?= $p['keterangan']; ?></h4>
          </div>
        </div>
      </div>
  <?php }
  } ?>
</div>