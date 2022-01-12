<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/manage_account/account/style.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header d-flex justify-content-between align-items-center">
      <h4 class="page-title">Daftar Akun</h4>
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
          <button class="btn btn-icons btn-inverse-primary btn-filter shadow-sm ml-2" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-magnify"></i>
          </button>
          <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuIconButton1">
            <div class="row">
              <div class="col-11">
                <input type="text" class="form-control" name="search" placeholder="Cari akun">
              </div>
            </div>
          </div>
        </div>
	      <a href="<?php echo e(url('/account/new')); ?>" class="btn btn-icons btn-inverse-primary btn-new ml-2">
	      	<i class="mdi mdi-plus"></i>
	      </a>
      </div>
    </div>
  </div>
</div>
<div class="row modal-group">
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo e(url('/account/update')); ?>" method="post" enctype="multipart/form-data" name="update_form">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Akun</h5>
            <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <?php echo csrf_field(); ?>
              <div class="row">
                <div class="col-12 text-center">
                  <img src="<?php echo e(asset('pictures/default.jpg')); ?>" class="img-edit">
                </div>
                <div class="col-12 text-center mt-2">
                  <input type="file" name="foto" hidden="">
                  <input type="text" name="nama_foto" hidden="">
                  <button type="button" class="btn btn-primary font-weight-bold btn-upload">Ubah</button>
                  <button type="button" class="btn btn-delete-img">Hapus</button>
                </div>
                <div class="col-12" hidden="">
                  <input type="text" name="id">
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-3 col-form-label font-weight-bold">Nama</label>
                <div class="col-9">
                  <input type="text" class="form-control" name="nama">
                </div>
                <div class="col-9 offset-3 error-notice" id="nama_error"></div>
              </div>
              <div class="form-group row">
                <label class="col-3 col-form-label font-weight-bold">Email</label>
                <div class="col-9">
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="col-9 offset-3 error-notice" id="email_error"></div>
              </div>
              <div class="form-group row">
                <label class="col-3 col-form-label font-weight-bold">Username</label>
                <div class="col-9">
                  <input type="text" class="form-control" name="username">
                </div>
                <div class="col-9 offset-3 error-notice" id="username_error"></div>
              </div>
              <div class="form-group row">
                <label class="col-3 col-form-label font-weight-bold">Role</label>
                <div class="col-9">
                  <select class="form-control" name="role">
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                  </select>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-update"><i class="mdi mdi-content-save"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin">
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
                  <td>
                  	<button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" data-toggle="modal" data-target="#editModal" data-edit="<?php echo e($user->id); ?>">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                    <button type="button" data-delete="<?php echo e($user->id); ?>" class="btn btn-icons btn-rounded btn-secondary ml-1 btn-delete">
                        <i class="mdi mdi-close"></i>
                    </button>
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
<script src="<?php echo e(asset('js/manage_account/account/script.js')); ?>"></script>
<script type="text/javascript">
  <?php if($message = Session::get('create_success')): ?>
    swal(
        "Berhasil!",
        "<?php echo e($message); ?>",
        "success"
    );
  <?php endif; ?>

  <?php if($message = Session::get('update_success')): ?>
    swal(
        "Berhasil!",
        "<?php echo e($message); ?>",
        "success"
    );
  <?php endif; ?>

  <?php if($message = Session::get('delete_success')): ?>
    swal(
        "Berhasil!",
        "<?php echo e($message); ?>",
        "success"
    );
  <?php endif; ?>

  <?php if($message = Session::get('both_error')): ?>
    swal(
    "",
    "<?php echo e($message); ?>",
    "error"
    );
  <?php endif; ?>

  <?php if($message = Session::get('email_error')): ?>
    swal(
    "",
    "<?php echo e($message); ?>",
    "error"
    );
  <?php endif; ?>

  <?php if($message = Session::get('username_error')): ?>
    swal(
    "",
    "<?php echo e($message); ?>",
    "error"
    );
  <?php endif; ?>

  $(document).on('click', '.filter-btn', function(e){
    e.preventDefault();
    var data_filter = $(this).attr('data-filter');
    $.ajax({
      method: "GET",
      url: "<?php echo e(url('/account/filter')); ?>/" + data_filter,
      success:function(data)
      {
        $('tbody').html(data);
      }
    });
  });

  $(document).on('click', '.btn-edit', function(){
    var data_edit = $(this).attr('data-edit');
    $.ajax({
      method: "GET",
      url: "<?php echo e(url('/account/edit')); ?>/" + data_edit,
      success:function(response)
      {
        $('.img-edit').attr("src", "<?php echo e(asset('pictures')); ?>/" + response.user.foto);
        $('input[name=id]').val(response.user.id);
        $('input[name=nama]').val(response.user.nama);
        $('input[name=email]').val(response.user.email);
        $('input[name=username]').val(response.user.username);
        $('select[name=role] option[value="'+ response.user.role +'"]').prop('selected', true);
        validator.resetForm();
      }
    });
  });

  $(document).on('click', '.btn-delete', function(e){
    e.preventDefault();
    var data_delete = $(this).attr('data-delete');
    swal({
      title: "Apa Anda Yakin?",
      text: "Data akun akan terhapus, klik oke untuk melanjutkan",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.open("<?php echo e(url('/account/delete')); ?>/" + data_delete, "_self");
      }
    });
  });

  $(document).on('click', '.btn-delete-img', function(){
    $(".img-edit").attr("src", "<?php echo e(asset('pictures')); ?>/default.jpg");
    $('input[name=nama_foto]').val('default.jpg');
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ipos-system-master\resources\views/manage_account/account.blade.php ENDPATH**/ ?>