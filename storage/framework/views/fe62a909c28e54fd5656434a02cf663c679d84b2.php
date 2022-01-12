<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/profile/style.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header d-flex justify-content-between align-items-center">
      <h4 class="page-title">Profile</h4>
    </div>
  </div>
</div>
<div class="row modal-group">
  <div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="activityModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="activityModalLabel">Riwayat Aktivitas</h5>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Cari barang">
              </div>  
            </div>
            <div class="col-12">
              <div class="list-group activity-list">
                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="list-group-item flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 text-uppercase"><?php echo e($act->nama_kegiatan); ?></h5>
                    <small><?php echo e(date('d M, Y', strtotime($act->created_at))); ?></small>
                  </div>
                  <p class="mb-1"><?php echo e(date('H:i', strtotime($act->created_at))); ?> <span class="dot-2"><i class="mdi mdi-checkbox-blank-circle"></i></span> <?php echo e($act->jumlah); ?> Jenis Barang</p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-8 col-md-6 col-sm-6 col-12">
    <div class="card card-noborder b-radius">
      <div class="card-body">
        <div class="row">
          <div class="col-12 d-flex">
            <button class="btn-tab data_diri_tab_btn btn-tab-active">Ubah Data Diri</button>
            <button class="btn-tab password_tab_btn">Ubah Password</button>
            <div class="btn-tab-underline"></div>
          </div>
          <div class="col-12 mt-3">
            <form name="change_profile_form" method="POST" action="<?php echo e(url('/profile/update/data')); ?>">
              <?php echo csrf_field(); ?>
              <div class="form-group row">
                <label class="col-12 font-weight-bold col-form-label">Nama <span class="text-danger">*</span></label>
                <div class="col-12">
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?php echo e(auth()->user()->nama); ?>">
                </div>
                <div class="col-12 error-notice" id="nama_error"></div>
              </div>
              <div class="form-group row">
                <label class="col-12 font-weight-bold col-form-label">Email <span class="text-danger">*</span></label>
                <div class="col-12">
                  <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value="<?php echo e(auth()->user()->email); ?>">
                </div>
                <div class="col-12 error-notice" id="email_error"></div>
              </div>
              <div class="form-group row">
                <label class="col-12 font-weight-bold col-form-label">Username <span class="text-danger">*</span></label>
                <div class="col-12">
                  <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?php echo e(auth()->user()->username); ?>">
                </div>
                <div class="col-12 error-notice" id="username_error"></div>
              </div>
              <div class="row mt-5">
                <div class="col-12 d-flex justify-content-end">
                  <button class="btn update-btn btn-sm" type="submit"><i class="mdi mdi-content-save"></i> Simpan Perubahan</button>
                </div>
              </div>
            </form>
            <form name="change_password_form" method="POST" action="<?php echo e(url('/profile/update/password')); ?>" hidden="">
              <?php echo csrf_field(); ?>
              <div class="form-group row">
                <label class="col-12 font-weight-bold col-form-label">Password Lama <span class="text-danger">*</span></label>
                <div class="col-12">
                  <input type="password" class="form-control" name="old_password" placeholder="Masukkan Password Lama">
                </div>
                <div class="col-12 error-notice" id="old_password_error"></div>
              </div>
              <div class="form-group row">
                <label class="col-12 font-weight-bold col-form-label">Password Baru <span class="text-danger">*</span></label>
                <div class="col-12">
                  <input type="password" class="form-control" name="new_password" placeholder="Masukkan Password Baru">
                </div>
                <div class="col-12 error-notice" id="new_password_error"></div>
              </div>
              <div class="row mt-5">
                <div class="col-12 d-flex justify-content-end">
                  <button class="btn update-btn btn-sm" type="submit"><i class="mdi mdi-content-save"></i> Ubah Password</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 account-detail mb-4 col-12">
    <div class="card card-noborder b-radius">
      <div class="card-body">
        <div class="row">
          <div class="col-12 text-center foto">
            <form name="change_picture_form" action="<?php echo e(url('/profile/update/picture')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <img src="<?php echo e(asset('pictures/' . auth()->user()->foto)); ?>" class="foto-profil">
              <input type="file" name="foto" id="foto" hidden="" accept=".png, .jpg, .jpeg">
              <button class="btn-edit-img" type="button"><i class="mdi mdi-pencil"></i></button>
              <button class="btn-update-img" type="submit" hidden=""><i class="mdi mdi-content-save"></i></button>
            </form>
          </div>
          <div class="col-12 mt-3 text-center">
            <p class="nama-akun"><?php echo e(auth()->user()->nama); ?></p>
            <p class="posisi-akun"><?php echo e(auth()->user()->role); ?></p>
          </div>
          <div class="col-12 mt-3 d-flex justify-content-between align-items-start">
            <div class="d-flex justify-content-start align-items-start">
              <div class="icon mr-3">
                <i class="mdi mdi-email-outline"></i>
              </div>
              <div class="text-group">
                <p class="email-text">Email</p>
                <p class="email-akun"><?php echo e(auth()->user()->email); ?></p>
              </div>
            </div>
            <div class="d-flex justify-content-start align-items-start">
              <div class="icon mr-3">
                <i class="mdi mdi-account-outline"></i>
              </div>
              <div class="text-group">
                <p class="username-text">Username</p>
                <p class="username-akun"><?php echo e(auth()->user()->username); ?></p>
              </div>
            </div>
          </div>
          <div class="col-12 mt-5 d-flex justify-content-between">
            <p class="aktivitas-text">Aktivitas Terbaru</p>
            <div class="history-btn" data-toggle="modal" data-target="#activityModal">
              <i class="mdi mdi-history"></i>
            </div>
          </div>
          <div class="col-12">
            <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="text-group mt-2">
              <div class="d-flex justify-content-between">
                <p class="nama-aktivitas"><?php echo e($act->nama_kegiatan); ?></p>
                <span class="des-aktivitas"><?php echo e(date('d M', strtotime($act->created_at))); ?></span>
              </div>
              <p class="des-aktivitas"><?php echo e(date('H:i', strtotime($act->created_at))); ?> <span class="dot"><i class="mdi mdi-checkbox-blank-circle"></i></span> <?php echo e($act->jumlah); ?> Jenis Barang</p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/profile/script.js')); ?>"></script>
<script type="text/javascript">
  <?php if($message = Session::get('update_success')): ?>
    swal(
      "Berhasil!",
      "<?php echo e($message); ?>",
      "success"
    );
  <?php endif; ?>

  <?php if($message = Session::get('update_error')): ?>
    swal(
      "",
      "<?php echo e($message); ?>",
      "error"
    );
  <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ipos-system-master\resources\views/profile.blade.php ENDPATH**/ ?>