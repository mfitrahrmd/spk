<?php
require_once('conn.php');
class Atlits extends Databases
{
    //crud
    public function cek_create($nik)
    {
        $sql        = " SELECT nik 
                        FROM atlit
                        WHERE nik = '$nik' ";
        $query      = mysqli_query($this->db, $sql);
        return $query;
    }
    public function atlit_create($id, $nik, $nama, $tmpt_lhr, $tgl_lhr, $jk, $alamat, $foto, $timestamp, $kf1, $kf2, $kf3, $kf4, $kf5, $kf6, $kf7, $kf8, $kt1, $kt2, $kt3, $kt4)
    {
        $sql         = " INSERT INTO atlit VALUES ('$id', '$nik', '$nama', '$tmpt_lhr', '$tgl_lhr', '$jk', '$alamat', '$foto', '$timestamp');";
        $sql        .= " INSERT INTO kf VALUES (null,'$kf1', '$kf2', '$kf3', '$kf4', '$kf5', '$kf6', '$kf7', '$kf8', '$timestamp', '$id');";
        $sql        .= " INSERT INTO kt VALUES (null,'$kt1', '$kt2', '$kt3', '$kt4', '$timestamp', '$id');";
        $query      = mysqli_multi_query($this->db, $sql);
        return $query;
    }
    public function atlit_edit($id, $nik, $nama, $tmpt_lhr, $tgl_lhr, $jk, $alamat)
    {
        $sql         = "UPDATE atlit SET nik='$nik',  nama='$nama', tmpt_lhr='$tmpt_lhr', tgl_lhr='$tgl_lhr', jk='$jk', alamat='$alamat' WHERE id='$id'";

        $query      = mysqli_multi_query($this->db, $sql);
        return $query;
    }
    public function atlit_add_penilaian($id, $timestamp, $kf1, $kf2, $kf3, $kf4, $kf5, $kf6, $kf7, $kf8, $kt1, $kt2, $kt3, $kt4, $tahun_penilaian)
    {
        $sql        = " INSERT INTO kf VALUES (null,'$kf1', '$kf2', '$kf3', '$kf4', '$kf5', '$kf6', '$kf7', '$kf8', '$timestamp', '$id', '$tahun_penilaian');";
        $sql        .= " INSERT INTO kt VALUES (null,'$kt1', '$kt2', '$kt3', '$kt4', '$timestamp', '$id', '$tahun_penilaian');";

        $query      = mysqli_multi_query($this->db, $sql);
        return $query;
    }
    public function atlit_create_prestasi($jenis, $keterangan, $file, $timestamp, $id, $tahun)
    {
        $sql        = " INSERT INTO `prestasi` (`id`, `jenis`, `keterangan`, `file`, `timestamp`, `id_atlit`, `tahun_penilaian`) VALUES (NULL, '$jenis', '$keterangan', '$file', '$timestamp', '$id', '$tahun');";
        $query      = mysqli_query($this->db, $sql);
        return $query;
    }

    public function atlit_read()
    {
        $sql        = " SELECT * 
                        FROM atlit
                        ORDER BY id DESC";
        $query      = mysqli_query($this->db, $sql);
        return $query;
    }
    public function atlit_field($field)
    {
        $fields = implode(', ', $field);
        $sql        = " SELECT $fields
                        FROM atlit";
        $query      = mysqli_query($this->db, $sql);
        return $query;
    }
    public function atlit_delete($id)
    {
        $sql        = " DELETE 
                        FROM atlit
                        WHERE id = '$id' ";
        $query      = mysqli_query($this->db, $sql);
        return $query;
    }

    //beranda
    public function atlit_read_beranda()
    {
        $sql        = " SELECT * 
                        FROM atlit
                        ORDER BY id DESC LIMIT 5";
        $query      = mysqli_query($this->db, $sql);
        return $query;
    }

    //penilaian
    public function atlit_read_nilai()
    {
        $sql        = " SELECT atlit.id, atlit.nik, atlit.nama, kf.kf1, kf.kf2, kf.kf3, kf.kf4, kf.kf5, kf.kf6, kf.kf7, kf.kf8, kt.kt1, kt.kt2, kt.kt3, kt.kt4
                        FROM atlit
                        JOIN kf ON atlit.id = kf.id_atlit
                        JOIN kt ON atlit.id = kt.id_atlit
                        ORDER BY atlit.id DESC";
        $query      = mysqli_query($this->db, $sql);
        return $query;
    }
    public function atlit_read_nilai_hasil()
    {
        $sql        = " SELECT atlit.id, atlit.nik, atlit.nama,kf.tahun_penilaian, kf.kf1, kf.kf2, kf.kf3, kf.kf4, kf.kf5, kf.kf6, kf.kf7, kf.kf8,kt.tahun_penilaian, kt.kt1, kt.kt2, kt.kt3, kt.kt4, 
                        round(pow(kf.kf1+kf.kf2+kf.kf3+kf.kf4+kf.kf5+kf.kf6+kf.kf7+kf.kf8,0.4), 4)AS c1,  
                        round(pow(kt.kt1+kt.kt2+kt.kt3+kt.kt4,0.4), 4) AS c2, 
                        round(pow((SELECT prestasi.jenis FROM prestasi WHERE prestasi.id_atlit = atlit.id LIMIT 1), 0.2), 4) AS c3,
                        round(pow(kf.kf1+kf.kf2+kf.kf3+kf.kf4+kf.kf5+kf.kf6+kf.kf7+kf.kf8, 0.4), 4) * round(pow(kt.kt1+kt.kt2+kt.kt3+kt.kt4,0.4), 4) * round(pow((SELECT prestasi.jenis FROM prestasi WHERE prestasi.id_atlit = atlit.id LIMIT 1), 0.2), 4) AS vs
                        FROM atlit
                        JOIN kf ON atlit.id = kf.id_atlit
                        JOIN kt ON atlit.id = kt.id_atlit
                        ORDER BY vs DESC";
        $query      = mysqli_query($this->db, $sql);
        return $query;
    }
    public function atlit_read_total_prestasi($id)
    {
        $sql        = " SELECT jenis
                        FROM prestasi
                        WHERE id_atlit = '$id' LIMIT 1";
        $query      = mysqli_query($this->db, $sql);
        return $query;
    }
}

$atlits = new Atlits();
