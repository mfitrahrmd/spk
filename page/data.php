<?php require_once('./../config/data.php'); $no=1;
  $atlit = $atlits->atlit_read();
  $total_atlit = $atlit->num_rows;
?>
          
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Atlit</h4>
                  <p class="card-category">Data Lengkap Atlit &nbsp;<a href="?p=data" class="btn btn-success btn-sm" onClick="window.print();">Print</button></a>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover" id="dataTables">
                    <thead class="text-warning" >
                    	<tr>
                      <td>Tgl Daftar</td>
                      <td>NIK</td>
                      <td>Nama</td>
                      <td>TTL</td>
                      <td>JK</td>
                      <td>Alamat</td>
                      <td>Aksi</td>
                    </thead>
                    <tbody> <?php
                      if ($total_atlit > 0) {
                        while ($r = $atlit->fetch_assoc()) { ?>
                          <tr>
                            <td><?=date("d/m/Y",strtotime($r['timestamp']))?></td>
                            <td><?=$r['nik']?></td>
                            <td><?=$r['nama']?></td>
                            <td><?=$r['tmpt_lhr']?>, <?=date("d-m-Y",strtotime($r['tgl_lhr']))?></td>
                            <td><?=$r['jk']?></td>
                            <td><?=$r['alamat']?></td>
                            <td>
                            	<a href="?p=lihat&id=<?php echo $r['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                            	<a href="?p=edit&id=<?php echo $r['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
								              <a onclick="return confirm('apakah anda yakin?')" href="?p=hapus&id=<?php echo $r['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                 </tr> <?php 
                        }
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>