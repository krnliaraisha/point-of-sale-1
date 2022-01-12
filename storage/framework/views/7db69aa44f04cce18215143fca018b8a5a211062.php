<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/iconfonts/ionicons/css/ionicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/iconfonts/typicons/src/font/typicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.addons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/shared/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/css/sweetalert.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/login/style.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('icons/favicon.png')); ?>"/>
    <!-- End-CSS -->

  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex justify-content-center align-items-center auth login-page theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <?php if($users != 0): ?>
                <form action="<?php echo e(url('/verify_login')); ?>" method="post" name="login_form">
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="username" placeholder="Username">
                      <div class="input-group-append">
                        <span class="input-group-text check-value" id="username_error"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" name="password" placeholder="*********">
                      <div class="input-group-append">
                        <span class="input-group-text check-value" id="password_error"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block">Masuk</button>
                  </div>
                </form>
                <?php else: ?>
                <form action="<?php echo e(url('/first_account')); ?>" method="post" name="create_form">
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                    <label class="label">Nama</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="nama" placeholder="Nama">
                      <div class="input-group-append">
                        <span class="input-group-text check-value" id="nama_error"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Email</label>
                    <div class="input-group">
                      <input type="email" class="form-control" name="email" placeholder="Email">
                      <div class="input-group-append">
                        <span class="input-group-text check-value" id="email_error"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="username_2" placeholder="Username">
                      <div class="input-group-append">
                        <span class="input-group-text check-value" id="username_2_error"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" name="password_2" placeholder="*********">
                      <div class="input-group-append">
                        <span class="input-group-text check-value" id="password_2_error"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block">Buat Akun</button>
                  </div>
                </form>
                <?php endif; ?>
              </div>
              <p class="mt-3 footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Javascript -->
    <script src="<?php echo e(asset('assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/js/vendor.bundle.addons.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/shared/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/shared/misc.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/js/jquery.form-validator.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/login/script.js')); ?>"></script>
    <script type="text/javascript">
      <?php if($message = Session::get('create_success')): ?>
        swal(
            "Berhasil!",
            "<?php echo e($message); ?>",
            "success"
        );
      <?php endif; ?>

      <?php if($message = Session::get('login_failed')): ?>
        swal(
            "Gagal!",
            "<?php echo e($message); ?>",
            "error"
        );
      <?php endif; ?>
    </script>
    <!-- End-Javascript -->

  </body>
</html><?php /**PATH C:\xampp\htdocs\ipos-system-master\resources\views/login.blade.php ENDPATH**/ ?>