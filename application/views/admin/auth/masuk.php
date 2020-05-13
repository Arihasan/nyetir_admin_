<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= site_url() ?>aset/admin/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= site_url() ?>aset/admin/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $this->config->item('title') ?> Administrator - <?= $judul ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?= site_url() ?>aset/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= site_url() ?>aset/admin/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    
    <style type="text/css">
      .konten{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
      }
    </style>
  </head>

  <body>

    <div class="konten">

      <div class="container">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            
            <div class="card" style="border: 2px solid #00d2d3;">
              <div class="card-body">
                <h4 class="card-title">Masuk Administrator</h4>
                <form action="<?= site_url('masuk') ?>" method="POST" autocomplete="off">

                  <?= $this->session->flashdata('pesan'); ?>

                  <div class="form-group">
                    <label for="username">Username <small>Administrator</small></label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= $this->session->flashdata('username'); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="sandi">Kata Sandi <small>Administrator</small></label>
                    <input type="password" class="form-control" name="sandi" id="sandi" required>
                  </div>
                  <button type="submit" class="btn btn-lg btn-block btn-success">Masuk</button>
                </form>
              </div>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <center>
              <span class="copyright">
                © <?= date('Y') ?> | <?= $this->config->item('title') ?>
              </span>
            </center>
          </div>
        </div>
      </div>

    </div> <!-- penutup content -->
    
    <!--   Core JS Files   -->
    <script src="<?= site_url() ?>aset/admin/js/core/jquery.min.js"></script>
    <script src="<?= site_url() ?>aset/admin/js/core/popper.min.js"></script>
    <script src="<?= site_url() ?>aset/admin/js/core/bootstrap.min.js"></script>
    <script src="<?= site_url() ?>aset/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?= site_url() ?>aset/admin/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= site_url() ?>aset/admin/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    
  </body>

</html>