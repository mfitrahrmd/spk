<?php
include "koneksi.php";
session_start();
if (($_SESSION['level'] != "admin")) {
  session_destroy();
  header("Location: ../");
  exit;
}
date_default_timezone_set('Asia/Jakarta');
$id             = strtotime("now");
$timestamp      = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sistem Pendukung Keputusan
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="white-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="./" class="simple-text logo-normal">
          SPK
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="?p=data">
              <i class="material-icons">person</i>
              <p>Data Atlit</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="?p=tambah">
              <i class="material-icons">content_paste</i>
              <p>Tambah Data Atlit</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="?p=tambah_penilaian_atlit">
              <i class="material-icons">note_alt</i>
              <p>Tambah Penilaian Atlit</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="?p=tambah_prestasi">
              <i class="material-icons">create</i>
              <p>Tambah Prestasi Atlit</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="?p=penilaian">
              <i class="material-icons">library_books</i>
              <p>Penilaian Atlit</p>
            </a>
          </li>
          <!--li class="nav-item ">
            <a class="nav-link" href="?p=rank">
              <i class="material-icons">notifications</i>
              <p>Ranking</p>
            </a>
          </li-->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Akun
                  </p>
                </a>
                <?php
                $koneksi = new mysqli("localhost", "root", "", "db_spk");
                $ambil = $koneksi->query("SELECT*FROM user"); ?>
                <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="?p=ubahpassword&username=<?php echo $pecah['username']; ?>">Ubah Password</a>
                    <a class="dropdown-item" href="?p=keluar">Keluar</a>
                  </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <?php }
    ?>
    <!-- End Navbar -->

    <div class="content">
      <div class="container-fluid">
        <?php
        if (isset($_GET['p'])) {
          $hal = $_GET['p'];
          switch ($hal) {
            case 'beranda':
              include "beranda.php";
              break;
            case 'tambah':
              include "tambah.php";
              break;
            case 'tambah_penilaian_atlit':
              include "tambah_penilaian_atlit.php";
              break;
            case 'tambah_prestasi':
              include "tambah_prestasi.php";
              break;
            case 'lihat':
              include "lihat.php";
              break;
            case 'edit':
              include "edit.php";
              break;
            case 'data':
              include "data.php";
              break;
            case 'penilaian':
              include "penilaian.php";
              break;
            case 'rank':
              include "ranking.php";
              break;
            case 'ubahpassword':
              include "ubahpassword.php";
              break;
            case 'hapus':
              include "hapus.php";
              break;

            case 'keluar':
              session_destroy();
              echo "<script>location='./../'</script>";
              exit;
              break;

            default:
              include "beranda.php";
              break;
          }
        } else {
          include "beranda.php";
        }
        ?>
      </div>
    </div>

    <footer class="footer">
      <div class="container-fluid">
        <div class="copyright float-center">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, Made With <i class="material-icons">favorite</i> By
          <a href="#">Creative Tim</a> For a Better Web
        </div>
        <!-- your footer here -->
      </div>
    </footer>
    <script>
      const x = new Date().getFullYear();
      let date = document.getElementById('date');
      date.innerHTML = '&copy; ' + x + date.innerHTML;
    </script>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" async></script>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>

</body>

</html>