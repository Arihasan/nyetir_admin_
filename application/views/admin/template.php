<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= site_url() ?>aset/svg/sedan.svg">
    <link rel="icon" type="image/png" href="<?= site_url() ?>aset/svg/sedan.svg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $this->config->item('title') ?> Administrator - <?= $judul ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?= site_url() ?>aset/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= site_url() ?>aset/admin/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />

    <link href="<?= site_url() ?>aset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <link href="<?= site_url() ?>aset/vendor/summernote/summernote-bs4.css" rel="stylesheet" />

    <script src="<?= site_url() ?>aset/admin/js/core/jquery.min.js"></script>
  </head>

  <body class="">
    <div class="wrapper ">
      <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
          <a href="<?= site_url('admin') ?>" class="simple-text logo-mini">
            <div class="logo-image-small">
              <img src="<?= site_url() ?>aset/svg/sedan.svg">
            </div>
          </a>
          <a href="<?= site_url('admin') ?>" class="simple-text logo-normal"><?= $this->config->item('title') ?></a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">

            <?php 
            $menu = $this->config->item('menu_admin');
            for ($i=0; $i < count($menu); $i++) { ?>
              <li class="<?= $menu[$i]['kode'] == $kode_menu ? "active" : "" ?>">
                <a href="<?= site_url( $menu[$i]['url'] ) ?>">
                  <i class="nc-icon <?= $menu[$i]['icon'] ?>"></i>
                  <p><?= $menu[$i]['nama'] ?></p>
                </a>
              </li>
            <?php } ?>
            
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <a class="navbar-brand" href="javascript:;"><?= $judul ?></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <ul class="navbar-nav">
                <li class="nav-item btn-rotate dropdown">
                  <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="nc-icon nc-single-02"></i>
                    <p>
                      <span class="d-lg-none d-md-block">Akun</span>
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?= site_url('admin/profil') ?>">Profil</a>
                    <a class="dropdown-item" href="<?= site_url('admin/keluar') ?>">Keluar Sesi</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->

        <div class="content">

          <?php for ($i=0; $i < count($konten); $i++) { 
            $this->load->view($konten[$i]);
          } ?>

        </div> <!-- penutup content -->

        <footer class="footer footer-black  footer-white ">
          <div class="container-fluid">
            <div class="row">
              <!-- <nav class="footer-nav">
                <ul>
                  <li>
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
                  </li>
                  <li>
                    <a href="http://blog.creative-tim.com/" target="_blank">Blog</a>
                  </li>
                  <li>
                    <a href="https://www.creative-tim.com/license" target="_blank">Licenses</a>
                  </li>
                </ul>
              </nav> -->
              <div class="credits ml-auto">
                <span class="copyright">
                  © <?= date('Y') ?> | <?= $this->config->item('title') ?>
                </span>
              </div>
            </div>
          </div>
        </footer>
        
      </div>
    </div>

    <!--   Core JS Files   -->
    <script src="<?= site_url() ?>aset/admin/js/core/popper.min.js"></script>
    <script src="<?= site_url() ?>aset/admin/js/core/bootstrap.min.js"></script>
    <script src="<?= site_url() ?>aset/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?= site_url() ?>aset/admin/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= site_url() ?>aset/admin/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>

    <script src="<?= site_url() ?>aset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= site_url() ?>aset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="<?= site_url() ?>aset/vendor/summernote/summernote-bs4.js"></script>

    <script src="<?= site_url() ?>aset/js/notifikasi.js" type="text/javascript"></script>
    <script src="<?= site_url() ?>aset/js/konversi.js" type="text/javascript"></script>

    <script>
      $(document).ready(function() {

        <?php if ($this->session->flashdata('notif')) { ?>
        Notif.notif({
          teks: "<?= $this->session->flashdata('notif')['teks'] ?>",
          color: "<?= $this->session->flashdata('notif')['color'] ?>",
        });
        <?php } ?>

      });
    </script>
    
  </body>

</html>