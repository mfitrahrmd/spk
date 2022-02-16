<?php require_once('./../config/data.php'); $no=1;
  $atlit = $atlits->atlit_read_nilai();
  $total_atlit = $atlit->num_rows;
?>
          
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Penilaian</h4>
                  <p class="card-category">KF1 = Jogging, KF2 = Sprint 30 M, KF3 = Shuffle Run, KF4 = Standing Long Jump, KF5 = Push Up, KF6 = Shit Up, KF7 = Pull Up, KF8 = Tes Denyut Nadi </p>
                  <p class="card-category">KT1 = Tendangan, KT2 = Pukulan, KT3 = Kecepatan, KT4 = Ketepatan </p>
                  <p class="card-category">1. Sangat Baik</p>
                  <p class="card-category">2. Baik</p>
                  <p class="card-category">3. Sedang</p>
                  <p class="card-category">4. Kurang</p>
                  <p class="card-category">5. Sangat Kurang</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>NIK</th>
                      <th>Nama</th>
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
                      <th>Prestasi</th>
                      <th>Vektor S</th>
                    </thead>
                    <tbody> <?php
                      if ($total_atlit > 0) {$bagiV = 0; $hitung_s = 0;
                        while ($r = $atlit->fetch_assoc()) {
													//C1,C2,C3
													$c1 = $r['kf1']+$r['kf2']+$r['kf3']+$r['kf4']+$r['kf5']+$r['kf6']+$r['kf7']+$r['kf8'];
													$c2 = $r['kt1']+$r['kt2']+$r['kt3']+$r['kt4'];
													$prestasi = $atlits->atlit_read_total_prestasi($r['id']);
													if ($prestasi->num_rows > 0) {
														while ($r_prestasi = $prestasi->fetch_assoc()) {
															$c3 = $r_prestasi['jenis'];
														}
													} else { $c3 = 0;} 
													//S
													$cs1 = round(pow($c1,0.4), 4);
													$cs2 = round(pow($c2,0.4), 4);
													$cs3 = round(pow($c3,0.2), 4);
													$hitung_s = round( $cs1*$cs2*$cs3 , 4);
													$bagiV += $hitung_s;
												}

												//V
												if ($hitung_s == 0) {
													$hitungV = 0;
												}
												else {
													$hitungV = round($hitung_s/$bagiV, 4);
												}
												
												$atlit_h = $atlits->atlit_read_nilai_hasil();
												while ($r2 = $atlit_h->fetch_assoc()) { ?>
                          <tr>
                            <td><?=$r2['nik']?></td>
                            <td><?=$r2['nama']?></td>
                            <td><?=$r2['kf1']?></td>
                            <td><?=$r2['kf2']?></td>
                            <td><?=$r2['kf3']?></td>
                            <td><?=$r2['kf4']?></td>
                            <td><?=$r2['kf5']?></td>
                            <td><?=$r2['kf6']?></td>
                            <td><?=$r2['kf7']?></td>
                            <td><?=$r2['kf8']?></td>
                            <td><?=$r2['kt1']?></td>
                            <td><?=$r2['kt2']?></td>
                            <td><?=$r2['kt3']?></td>
                            <td><?=$r2['kt4']?></td>
                            <td><?=$c3?></td>
                            <td><?=$hitung_s?></td>
                            <td><?=$hitungV?></td>
                          </tr> <?php 
                        }
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>