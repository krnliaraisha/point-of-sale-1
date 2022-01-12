<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/report/report_worker/style.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header d-flex justify-content-between align-items-center">
      <h4 class="page-title">Laporan Pegawai</h4>
      <div class="d-flex justify-content-start">
        <div class="dropdown">
          <button class="btn btn-icons btn-inverse-primary btn-filter shadow-sm" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-filter-variant"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
            <h6 class="dropdown-header">Urut Berdasarkan :</h6>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item filter-btn" data-filter="nama">Nama</a>
            <a href="#" class="dropdown-item filter-btn" data-filter="email">Email</a>
            <a href="#" class="dropdown-item filter-btn" data-filter="role">Posisi</a>
          </div>
        </div>
        <div class="dropdown dropdown-search">
          <button class="btn btn-icons btn-inverse-primary btn-new shadow-sm ml-2" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-magnify"></i>
          </button>
          <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuIconButton1">
            <div class="row">
              <div class="col-11">
                <input type="text" class="form-control" name="search" placeholder="Cari pegawai">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-4">
    <div class="card card-noborder b-radius">
      <div class="card-body">
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-custom">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Posisi</th>
                  <th>Aktivitas Pasok</th>
                  <th>Aktivitas Transaksi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                    <img src="<?php echo e(asset('pictures/' . $user->foto)); ?>">
                    <span class="ml-2"><?php echo e($user->nama); ?></span>
                  </td>
                  <td><?php echo e($user->email); ?></td>
                  <td>
                    <?php if($user->role == 'admin'): ?>
                    <span class="btn admin-span"><?php echo e($user->role); ?></span>
                    <?php else: ?>
                    <span class="btn kasir-span"><?php echo e($user->role); ?></span>
                    <?php endif; ?>
                  </td>
                  <?php
                  $pasok = \App\Supply::where('id_pemasok', $user->id)
                  ->count();
                  ?>
                  <td class="pl-4"><span class="ammount-box bg-secondary"><i class="mdi mdi-import"></i></span><?php echo e($pasok); ?> X</td>
                  <?php
                  $transaksi = \App\Transaction::where('id_kasir', $user->id)
                  ->select('kode_transaksi')
                  ->distinct()
                  ->get();
                  ?>
                  <td class="pl-4"><span class="ammount-box bg-secondary"><i class="mdi mdi-swap-horizontal"></i></span><?php echo e($transaksi->count()); ?> X</td>
                  <td>
                    <a href="<?php echo e(url('/report/workers/detail/' . $user->id)); ?>" class="btn view-btn"><i class="mdi mdi-eye"></i> Lihat</a>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/report/report_worker/script.js')); ?>"></script>
<script type="text/javascript">
  $(document).on('click', '.filter-btn', function(e){
    e.preventDefault();
    var data_filter = $(this).attr('data-filter');
    $.ajax({
      method: "GET",
      url: "<?php echo e(url('/report/workers/filter')); ?>/" + data_filter,
      success:function(data)
      {
        $('tbody').html(data);
      }
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ipos-system-master\resources\views/report/report_worker.blade.php ENDPATH**/ ?>