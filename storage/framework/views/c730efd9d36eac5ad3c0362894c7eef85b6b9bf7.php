<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Website POS</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/iconfonts/ionicons/css/ionicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/iconfonts/typicons/src/font/typicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.addons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/shared/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demo_1/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/main/style.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('icons/favicon.png')); ?>"/>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
    <!-- End-CSS -->

  </head>
  <body>
    <div class="container-scroller">
      <!-- TopNav -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="<?php echo e(url('/dashboard')); ?>">
            <img src="<?php echo e(asset('icons/logo.png')); ?>" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="<?php echo e(url('/dashboard')); ?>">
            <img src="<?php echo e(asset('icons/logo-mini.png')); ?>" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <form class="search-form d-none d-md-block" action="#">
            <div class="form-group">
              <input type="search" class="form-control" name="search_page" placeholder="Cari Halaman">
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <?php
              $cek_supply_system = \App\Supply_system::first();
              $jumlah_notif = \App\Product::where('stok', '<', 10)
              ->count();
              $notifications = \App\Product::where('stok', '<', 10)
              ->get();
              $notification = \App\Product::where('stok', '<', 10)
              ->take(3)
              ->get();
              ?>
              <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <?php if($cek_supply_system->status == 1): ?>
                  <?php if($jumlah_notif != 0): ?>
                  <span class="count bg-success"><?php echo e($jumlah_notif); ?></span>
                  <?php endif; ?>
                <?php endif; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                <div class="dropdown-item py-3 border-bottom">
                  <?php if($cek_supply_system->status == 1): ?>
                  <p class="mb-0 font-weight-medium float-left">Anda Memiliki <?php echo e($jumlah_notif); ?> Pemberitahuan</p>
                  <?php else: ?>
                  <p class="mb-0 font-weight-medium float-left">Anda Memiliki 0 Pemberitahuan</p>
                  <?php endif; ?>
                  <a href="#" role="button" data-toggle="modal" data-target="#notificationModal"><span class="badge badge-pill badge-primary float-right">Semua</span></a>
                </div>
                <?php if($cek_supply_system->status == 1): ?>
                  <?php $__currentLoopData = $notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($notif->stok != 0): ?>
                  <a class="dropdown-item preview-item py-3">
                    <div class="preview-thumbnail">
                      <i class="mdi mdi-alert m-auto text-warning"></i>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal text-dark mb-1">Barang Hampir Habis</h6>
                      <p class="font-weight-light small-text mb-0"> Stok <?php echo e($notif->nama_barang); ?> tersisa <?php echo e($notif->stok); ?> </p>
                    </div>
                  </a>
                  <?php else: ?>
                  <a class="dropdown-item preview-item py-3">
                    <div class="preview-thumbnail">
                      <i class="mdi mdi-alert m-auto text-danger"></i>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal text-dark mb-1">Barang Telah Habis</h6>
                      <p class="font-weight-light small-text mb-0"> Stok barang <?php echo e($notif->nama_barang); ?> telah habis</p>
                    </div>
                  </a>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="<?php echo e(asset('pictures/' . auth()->user()->foto)); ?>" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="<?php echo e(asset('pictures/' . auth()->user()->foto)); ?>" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold"><?php echo e(auth()->user()->nama); ?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo e(auth()->user()->email); ?></p>
                </div>
                <a href="<?php echo e(url('/profile')); ?>" class="dropdown-item">Profil</a>
                <a href="<?php echo e(url('/logout')); ?>" class="dropdown-item">Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- End-TopNav -->

      <div class="container-fluid page-body-wrapper">
        <!-- SideNav -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="<?php echo e(url('/profile')); ?>" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="<?php echo e(asset('pictures/' . auth()->user()->foto)); ?>" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <?php
                  $user_name = auth()->user()->nama;
                  if(strlen($user_name) > 12){
                    $nama = substr($user_name, 0, 12) . '..';
                  }else{
                    $nama = $user_name;
                  }
                  ?>
                  <p class="profile-name"><?php echo e($nama); ?></p>
                  <p class="designation"><?php echo e(auth()->user()->role); ?></p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Daftar Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/dashboard')); ?>">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <?php
            $access = \App\Acces::where('user', auth()->user()->id)
            ->first();
            ?>
            <?php if($access->kelola_akun == 1): ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#kelola_akun" aria-expanded="false" aria-controls="kelola_akun">
                <span class="menu-title">Kelola Akun</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="kelola_akun">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/account')); ?>">Daftar Akun</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/access')); ?>">Hak Akses</a>
                  </li>
                </ul>
              </div>
            </li>
            <?php endif; ?>
            <?php if($access->kelola_barang == 1): ?>
            <?php if(\App\Supply_system::first()->status == true): ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#kelola_barang" aria-expanded="false" aria-controls="kelola_barang">
                <span class="menu-title">Kelola Barang</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="kelola_barang">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/product')); ?>">Daftar Barang</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/supply')); ?>">Pasok Barang</a>
                  </li>
                </ul>
              </div>
            </li>
            <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/product')); ?>">
                <span class="menu-title">Kelola Barang</span>
              </a>
            </li>
            <?php endif; ?>
            <?php endif; ?>
            <?php if($access->transaksi == 1): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/transaction')); ?>">
                <span class="menu-title">Transaksi</span>
              </a>
            </li>
            <?php endif; ?>
            <?php if($access->kelola_laporan == 1): ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#kelola_laporan" aria-expanded="false" aria-controls="kelola_laporan">
                <span class="menu-title">Kelola Laporan</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="kelola_laporan">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/report/transaction')); ?>">Laporan Transaksi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/report/workers')); ?>">Laporan Pegawai</a>
                  </li>
                </ul>
              </div>
            </li>
            <?php endif; ?>
          </ul>
        </nav>
        <!-- End-SideNav -->

        <div class="main-panel">
          <div class="row">
            <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Daftar Notifikasi</h5>
                    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-12">
                        <?php if($cek_supply_system->status == 1): ?>
                          <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($notif->stok != 0): ?>
                          <div class="d-flex justify-content-start align-items-center mb-3">
                            <div class="icon-notification">
                              <i class="mdi mdi-alert m-auto text-warning"></i>
                            </div>
                            <div class="text-group ml-3">
                              <p class="m-0 title-notification">Barang Hampir Habis</p>
                              <p class="m-0 description-notification">Stok <?php echo e($notif->nama_barang); ?> tersisa <?php echo e($notif->stok); ?></p>
                            </div>
                          </div>
                          <?php else: ?>
                          <div class="d-flex justify-content-start align-items-center mb-3">
                            <div class="icon-notification">
                              <i class="mdi mdi-alert m-auto text-danger"></i>
                            </div>
                            <div class="text-group ml-3">
                              <p class="m-0 title-notification">Barang Telah Habis</p>
                              <p class="m-0 description-notification">Stok barang <?php echo e($notif->nama_barang); ?> telah habis</p>
                            </div>
                          </div>
                          <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content-wrapper" id="content-web-page">
            <?php echo $__env->yieldContent('content'); ?>
          </div>
          <div class="content-wrapper" id="content-web-search" hidden="">
            <div class="row">
              <div class="col-12 text-left">
                <h3 class="d-block">Cari Halaman</h3>
                <h5 class="mt-3 d-block"><span class="result-1"></span> <span class="result-2"></span></h5>
              </div>
              <div class="col-12 mt-3">
                <div class="row" id="page-result-parent">
                </div>
              </div>
            </div>
          </div>
          <footer class="footer" id="footer-content">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
              </span>
            </div>
          </footer>
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
    <script src="<?php echo e(asset('plugins/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/templates/script.js')); ?>"></script>
    <script type="text/javascript">
      $(document).on('input', 'input[name=search_page]', function(){
        if($(this).val() != ''){
          $('#content-web-page').prop('hidden', true);
          $('#content-web-search').prop('hidden', false);
          var search_word = $(this).val();
          $.ajax({
            url: "<?php echo e(url('/search')); ?>/" + search_word,
            method: "GET",
            success:function(response){
              $('.result-1').html(response.length + ' Hasil Pencarian');
              $('.result-2').html('dari "' + search_word + '"');
              var lengthLoop = response.length - 1;
              var searchResultList = '';
              for(var i = 0; i <= lengthLoop; i++){
                var page_url = "<?php echo e(url('/', ':id')); ?>";
                page_url = page_url.replace('%3Aid', response[i].page_url);
                searchResultList += '<a href="'+ page_url +'" class="page-result-child mb-4 w-100"><div class="col-12"><div class="card card-noborder b-radius"><div class="card-body"><div class="row"><div class="col-12"><h5 class="d-block page_url">'+ response[i].page_name +'</h5><p class="align-items-center d-flex justify-content-start"><span class="icon-in-search mr-2"><i class="mdi mdi-chevron-double-right"></i></span> <span class="breadcrumbs-search page_url">'+ response[i].page_title +'</span></p><div class="search-description"><p class="m-0 p-0 page_url">'+ response[i].page_content.substring(0, 500) +'...</p></div></div></div></div></div></div></a>';
              }
              $('#page-result-parent').html(searchResultList);
              $('.page_url:contains("'+search_word+'")').each(function(){
                  var regex = new RegExp(search_word, 'gi');
                  $(this).html($(this).text().replace(regex, '<span style="background-color: #607df3;">'+search_word+'</span>'));
              });
            }
          });
        }else{
          $('#content-web-page').prop('hidden', false);
          $('#content-web-search').prop('hidden', true);
        }
      });
    </script>
    <?php echo $__env->yieldContent('script'); ?>
    <!-- End-Javascript -->
  </body>
</html><?php /**PATH C:\xampp\htdocs\ipos-system-master\resources\views/templates/main.blade.php ENDPATH**/ ?>