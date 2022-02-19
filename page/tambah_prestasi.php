<?php require_once('./../config/data.php');
$atlit = $atlits->atlit_field(array('id', 'nama'));
$total_atlit = $atlit->num_rows;
?>


<div>
    <form method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="nama_atlit" style="color: #4caf50; font-size:1.2rem">Pilih Atlit</label>
                    <select class="form-control selectpicker" data-style="btn btn-link" id="nama_atlit" name="id">
                        <option>...</option>
                        <?php
                        if ($total_atlit > 0) {
                            while ($r = $atlit->fetch_assoc()) { ?>
                                <option value="<?= $r['id'] ?>"><?= $r['nama'] ?></option>
                        <?php
                            }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="tahun_penilaian" style="color: #4caf50; font-size:1.2rem">Tahun Prestasi</label>
                    <input type="text" class="form-control" id="tahun_penilaian" name="tahun_penilaian">
                </div>
            </div>
        </div>
        <div class="card">
            <div class=" mt-2 card-header card-header-info">
                <h4 class="card-title">Prestasi</h4>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Jenis Prestasi</label><br />
                            <input type="radio" name="jp" value="3" class="mr-1"><label>Nasional</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="jp" value="1" class="mr-1"><label>Daerah</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-groups">
                            <label class="bmd-label-floating">File Prestasi</label>
                            <input type="file" name="file_prestasi" class="form-control-file">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Keterangan Prestasi</label>
                            <input type="text" name="keterangan_p" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <button type="submit" name="tambah_prestasi_atlit" class="btn btn-success btn-block pull-right">SIMPAN DATA</button>
            </div>
        </div>
    </form>
</div>



<?php
if (isset($_POST['tambah_prestasi_atlit'])) {

    $id = $_POST['id'];
    $tahun_penilaian = $_POST['tahun_penilaian'];
    $jp = $_POST['jp'];
    $keterangan_p = $_POST['keterangan_p'];
    echo "tambah prestasi";
    var_dump($_POST);
    var_dump($_FILES);

    if ($_FILES['file_prestasi']['error'] != 4 || $_POST['jp'] != '') {
        $nama_prestasi = $_FILES['file_prestasi']['name'];
        $x_prestasi = explode('.', $nama_prestasi);
        $ekstensi_prestasi = strtolower(end($x_prestasi));
        $file_tmp_prestasi = $_FILES['file_prestasi']['tmp_name'];
        $filebaru_prestasi = $id . '_prestasi.' . $ekstensi_prestasi;
        move_uploaded_file($file_tmp_prestasi, './../assets/prestasi/' . $filebaru_prestasi);

        $tambah_prestasi = $atlits->atlit_create_prestasi(
            $jp,
            $keterangan_p,
            $filebaru_prestasi,
            $timestamp,
            $id,
            $tahun_penilaian
        );

        if ($tambah_prestasi) {
            echo "<script>alert('tambah prestasi berhasil')</script>";
        } else {
            echo "<script>alert('tambah prestasi gagal')</script>";
        }
    }
}
?>