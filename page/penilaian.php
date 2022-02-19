<?php require_once('./../config/data.php');
$no = 1;
$atlit = $atlits->atlit_read_nilai();
$total_atlit = $atlit->num_rows;
?>


<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Penilaian</h4>
        <p class="card-category">1. Sangat Baik, 2. Baik, 3. Sedang, 4. Kurang, 5. Sangat Kurang</p>
        <p class="card-category">KF1 = Jogging, KF2 = Sprint 30 M, KF3 = Shuffle Run, KF4 = Standing Long Jump, KF5 = Push Up, KF6 = Shit Up, KF7 = Pull Up, KF8 = Tes Denyut Nadi </p>
        <p class="card-category">KT1 = Tendangan, KT2 = Pukulan, KT3 = Kecepatan, KT4 = Ketepatan </p>
        <p class="card-category">C1 = ((KF1+KF2+KF3+KF4+KF5+KF6+KF7+KF8) ^ 0.4)</p>
        <p class="card-category">C2 = ((KT1+KT2+KT3+KT4) ^ 0.4)</p>
        <p class="card-category">C3 = (Prestasi ^ 0.2)</p>
        <p class="card-category">Vector S = (C1 * C2 * C3)</p>
        <p class="card-category">Vector V = (Vector S / SUM(Vector S))</p> <a href="?p=penilaian" class="btn btn-success btn-sm" onClick="window.print();">Print</button></a>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead class="text-warning">
            <th>No.</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tahun Penilaian</th>
            <th>KF1</th>
            <th>KF2</th>
            <th>KF3</th>
            <th>KF4</th>
            <th>KF5</th>
            <th>KF6</th>
            <th>KF7</th>
            <th>KF8</th>
            <th>KT1</th>
            <th>KT2</th>
            <th>KT3</th>
            <th>KT4</th>
            <th>Vektor S</th>
            <th>Vektor V</th>
          </thead>
          <tbody> <?php
                  if ($total_atlit > 0) {
                    $atlit_hasil = $atlits->atlit_read_nilai_hasil();
                    $pembagianV = 0;
                    while ($r = $atlit_hasil->fetch_assoc()) {
                      //mencari PembagianV
                      while ($rpv = $atlit->fetch_assoc()) {
                        //C1,C2,C3
                        $c1 = $rpv['kf1'] + $rpv['kf2'] + $rpv['kf3'] + $rpv['kf4'] + $rpv['kf5'] + $rpv['kf6'] + $rpv['kf7'] + $rpv['kf8'];
                        $c2 = $rpv['kt1'] + $rpv['kt2'] + $rpv['kt3'] + $rpv['kt4'];
                        $prestasi = $atlits->atlit_read_total_prestasi($rpv['id']);
                        if ($prestasi->num_rows > 0) {
                          while ($rpv_prestasi = $prestasi->fetch_assoc()) {
                            $c3 = $rpv_prestasi['jenis'];
                          }
                        } else {
                          $c3 = 0;
                        }
                        //S
                        $cs1 = round(pow($c1, 0.4), 4);
                        $cs2 = round(pow($c2, 0.4), 4);
                        $cs3 = round(pow($c3, 0.2), 4);
                        $hitung_s = round($cs1 * $cs2 * $cs3, 4);
                        $pembagianV += $hitung_s;
                      }
                      //Tutup mencari PembagianV 
                      if ($r['vs'] == null) {
                        $vs = 0;
                      } else {
                        $vs = $r['vs'];
                      }
                      if ($vs == 0 || $pembagianV == 0) {
                        $vv = 0;
                      } else {
                        $vv = round($vs / $pembagianV, 8);
                      } ?>

                <tr>
                  <td><?= $no++ ?>.</td>
                  <td><?= $r['nik'] ?></td>
                  <td><?= $r['nama'] ?></td>
                  <td><?= $r['tahun_penilaian'] ?></td>
                  <td><?= $r['kf1'] ?></td>
                  <td><?= $r['kf2'] ?></td>
                  <td><?= $r['kf3'] ?></td>
                  <td><?= $r['kf4'] ?></td>
                  <td><?= $r['kf5'] ?></td>
                  <td><?= $r['kf6'] ?></td>
                  <td><?= $r['kf7'] ?></td>
                  <td><?= $r['kf8'] ?></td>
                  <td><?= $r['kt1'] ?></td>
                  <td><?= $r['kt2'] ?></td>
                  <td><?= $r['kt3'] ?></td>
                  <td><?= $r['kt4'] ?></td>
                  <td><?= $vs ?></td>
                  <td><?= $vv ?></td>
                </tr> <?php
                    }
                  } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>