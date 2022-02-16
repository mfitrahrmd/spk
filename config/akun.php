<?php 
require_once('conn.php');
class Akuns extends Databases {
    
    public function ubah_password($token, $password, $timestamp){
        $sql        = " INSERT INTO history_pass (id_siswa, password, timestamp) 
                        VALUES ('$token', '$password', '$timestamp') ";
        $query      = mysqli_query($this->db,$sql);
        return $query;
    }

    public function admin_log($username, $password){
        $sql        = " SELECT id, akses
                        FROM user
                        WHERE  username = '$username' AND password = '$password' 
                        LIMIT 1";
        $query      = mysqli_query($this->db,$sql);
        return $query;
    }
    
    
}

$akuns = new Akuns();
?>