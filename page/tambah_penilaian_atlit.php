<?php require_once('./../config/data.php');
$atlit = $atlits->atlit_field(array('id', 'nama'));
$total_atlit = $atlit->num_rows;
?>

<div class="row">
    <div class="col-md-12">
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
                        <label for="tahun_penilaian" style="color: #4caf50; font-size:1.2rem">Tahun Penilaian</label>
                        <input type="text" class="form-control" id="tahun_penilaian" name="tahun_penilaian">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title">Kriteria Fisik</h4>
                    <p class="card-category">Isi semua kriteria fisik atlit</p>
                    <p class="card-category">1. Sangat Baik, 2. Baik, 3. Sedang, 4. Kurang, 5. Sangat Kurang</p>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Jogging</label><br />
                                <input type="radio" name="kf1" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf1" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf1" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf1" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf1" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Sprint 30 M</label><br />
                                <input type="radio" name="kf2" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf2" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf2" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf2" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf2" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Shuftle Run</label><br />
                                <input type="radio" name="kf3" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf3" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf3" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf3" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf3" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Standing Long Jump</label><br />
                                <input type="radio" name="kf4" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf4" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf4" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf4" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf4" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Push Up</label><br />
                                <input type="radio" name="kf5" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf5" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf5" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf5" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf5" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Shit Up</label><br />
                                <input type="radio" name="kf6" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf6" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf6" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf6" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf6" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Pull Up</label><br />
                                <input type="radio" name="kf7" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf7" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf7" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf7" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf7" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tes Denyut Nadi</label><br />
                                <input type="radio" name="kf8" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf8" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf8" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf8" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kf8" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class=" mt-2 card-header card-header-info">
                    <h4 class="card-title">Kriteria Teknik</h4>
                    <p class="card-category">Isi semua kriteria teknik atlit</p>
                    <p class="card-category">1. Sangat Baik, 2. Baik, 3. Sedang, 4. Kurang, 5. Sangat Kurang</p>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tendangan</label><br />
                                <input type="radio" name="kt1" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt1" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt1" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt1" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt1" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Pukulan</label><br />
                                <input type="radio" name="kt2" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt2" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt2" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt2" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt2" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Kecepatan</label><br />
                                <input type="radio" name="kt3" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt3" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt3" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt3" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt3" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Ketepatan</label><br />
                                <input type="radio" name="kt4" value="1" class="mr-1" required><label>1</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt4" value="2" class="mr-1" required><label>2</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt4" value="3" class="mr-1" required><label>3</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt4" value="4" class="mr-1" required><label>4</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="kt4" value="5" class="mr-1" required><label>5</label>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <button type="submit" name="tambah_penilaian_atlit" class="btn btn-success btn-block pull-right">SIMPAN DATA</button>
                </div>

            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['tambah_penilaian_atlit'])) {
    $id = $_POST['id'];
    $tahun_penilaian = $_POST['tahun_penilaian'];
    $kf1 = $_POST['kf1'];
    $kf2 = $_POST['kf1'];
    $kf3 = $_POST['kf3'];
    $kf4 = $_POST['kf4'];
    $kf5 = $_POST['kf5'];
    $kf6 = $_POST['kf6'];
    $kf7 = $_POST['kf7'];
    $kf8 = $_POST['kf8'];
    $kt1 = $_POST['kt1'];
    $kt2 = $_POST['kt2'];
    $kt3 = $_POST['kt3'];
    $kt4 = $_POST['kt4'];
    $tambah_penilaian = $atlits->atlit_add_penilaian($id, $timestamp, $kf1, $kf2, $kf3, $kf4, $kf5, $kf6, $kf7, $kf8, $kt1, $kt2, $kt3, $kt4, $tahun_penilaian);

    // Cek apakah tambah penilaian berhasil
    if ($tambah_penilaian) {
        echo "<script>alert('tambah penilaian atlit berhasil')</script>";
    } else {
        echo "<script>alert('tambah penilaian atlit gagal')</script>";
    }
}
?>

<?php
if (isset($_POST['tambah_kriteria'])) {
    var_dump($_POST);
}
?>