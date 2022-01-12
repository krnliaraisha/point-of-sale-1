<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/report/detail_report_worker/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/css/datedropper.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header d-flex justify-content-between align-items-center">
      <div class="quick-link-wrapper d-md-flex flex-md-wrap">
        <ul class="quick-links">
          <li><a href="<?php echo e(url('report/workers')); ?>">Laporan Pegawai</a></li>
          <li><a href="<?php echo e(url('report/workers/detail/' . $worker->id)); ?>"><?php echo e($worker->nama); ?></a></li>
        </ul>
      </div>
      <div class="print-btn-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="mdi mdi-export print-icon"></i>
            </div>
            <button class="btn btn-print" type="button" data-toggle="modal" data-target="#cetakModal">Export Laporan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row modal-group">
  <div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="cetakModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cetakModalLabel">Export Laporan</h5>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(url('/report/workers/export/' . $worker->id)); ?>" name="export_form" method="POST" target="_blank">
            <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col-12">
                <div class="form-group row">
                  <div class="col-5 border rounded-left offset-col-1">
                    <div class="form-radio">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jns_laporan" value="period" checked> Periode</label>
                    </div>
                  </div>
                  <div class="col-5 border rounded-right">
                    <div class="form-radio">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jns_laporan" value="manual"> Manual</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 period-form">
                <div class="form-group row">
                  <div class="col-10 p-0 offset-col-1">
                    <p>Pilih waktu dan periode</p>
                  </div>
                  <div class="col-4 p-0 offset-col-1">
                    <input type="number" class="form-control form-control-lg time-input number-input dis-backspace input-notzero" name="time" value="1" min="1" max="4">
                  </div>
                  <div class="col-6 p-0">
                    <select class="form-control form-control-lg period-select" name="period">
                      <option value="minggu" selected="">Minggu</option>
                      <option value="bulan">Bulan</option>
                      <option value="tahun">Tahun</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12 manual-form" hidden="">
                <div class="form-group row">
                  <div class="col-10 p-0 offset-col-1">
                    <p>Pilih tanggal awal dan akhir</p>
                  </div>
                  <div class="col-10 p-0 offset-col-1 input-group mb-2">
                    <input type="text" name="tgl_awal_export" class="form-control form-control-lg date" placeholder="Tanggal awal">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <i class="mdi mdi-calendar calendar-icon"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-10 p-0 offset-col-1 input-group">
                    <input type="text" name="tgl_akhir_export" class="form-control form-control-lg date" placeholder="Tanggal akhir">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <i class="mdi mdi-calendar calendar-icon"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
              	<div class="form-group row">
              		<div class="col-10 p-0 offset-col-1">
              			<p>Pilih laporan<span class="txt-info ml-3">Pilihan dapat lebih dari 1</span></p>
              		</div>
              		<div class="col-5 p-0 offset-col-1 border rounded-left">
              			<div class="form-check form-check-flat ml-4">
	                      <label class="form-check-label">
	                        <input type="checkbox" class="form-check-input checkbox_laporan" data-check="0" name="laporan[]" value="pasok"> Pasok</label>
	                    </div>
              		</div>
              		<div class="col-5 p-0 border rounded-right">
              			<div class="form-check form-check-flat ml-4">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input checkbox_laporan" data-check="0" name="laporan[]" value="transaksi"> Transaksi</label>
                        </div>
              		</div>
              	</div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-export">Export</button>
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
					<div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-start align-items-center">
						<img src="<?php echo e(asset('pictures/' . $worker->foto)); ?>" class="foto-worker">
						<div class="p-group ml-3">
							<div class="nama-worker-div">
								<p class="nama-worker"><?php echo e($worker->nama); ?></p>
							</div>
							<div class="email-worker-div">
								<p class="email-worker txt-light"><?php echo e($worker->email); ?></p>
							</div>
							<?php if($worker->role == 'admin'): ?>
		                    <span class="btn admin-span mt-2"><?php echo e($worker->role); ?></span>
		                    <?php else: ?>
		                    <span class="btn kasir-span mt-2"><?php echo e($worker->role); ?></span>
		                    <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="card card-noborder b-radius">
			<div class="card-body">
				<div class="row">
					<div class="col-8 d-flex">
						<div class="line-tab-space"></div>
						<button type="button" class="pasok-btn btn-tab btn-active">Pasok</button>
						<div class="line-tab-space"></div>
						<button type="button" class="transaksi-btn btn-tab">Transaksi</button>
						<div class="line-tab"></div>
					</div>
					<div class="col-4 d-flex justify-content-end align-items-center">
						<div class="input-group big-search">
				          <div class="input-group-prepend">
				            <div class="input-group-text">
				              <i class="mdi mdi-magnify search-icon"></i>
				            </div>
				          </div>
				          <input type="text" class="form-control form-control-lg mr-2" name="search" placeholder="Cari data">
				        </div>
						<div class="dropdown small-search" hidden="">
				          <button class="btn-search shadow-sm mr-2" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				            <i class="mdi mdi-magnify"></i>
				          </button>
				          <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuIconButton1">
				            <div class="row">
				              <div class="col-11">
				                <input type="text" class="form-control" name="search" placeholder="Cari data">
				              </div>
				            </div>
				          </div>
				        </div>
					</div>
					<div class="col-12">
						<ul class="list-date" id="list-date-pasok">
			              <?php $__currentLoopData = $dates_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			              <li class="txt-light"><?php echo e(date('d M, Y', strtotime($date))); ?></li>
			              <?php
			              $supplies = \App\Supply::whereDate('created_at', $date)
			              ->where('id_pemasok', $worker->id)
			              ->select('supplies.*')
			              ->latest()
			              ->get();
			              ?>
			              <div class="table-responsive">
			                <table class="table table-custom">
							  <tr>
							    <th>Nama Barang</th>
							    <th>Kode Barang</th>
							    <th>Jumlah</th>
							    <th>Harga Beli</th>
							    <th>Total</th>
							  </tr>
			                  <?php $__currentLoopData = $supplies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                  <tr>
			                    <td class="td-1">
			                      <span class="d-block font-weight-bold big-font"><?php echo e($supply->nama_barang); ?></span>
			                      <span class="d-block mt-2 txt-light"><?php echo e(date('d M, Y', strtotime($supply->created_at)) . ' pada ' . date('H:i', strtotime($supply->created_at))); ?></span>
			                    </td>
			                    <td class="td-2 font-weight-bold"><?php echo e($supply->kode_barang); ?></td>
			                    <td class="td-3 font-weight-bold"><span class="ammount-box bg-secondary"><i class="mdi mdi-cube-outline"></i></span><?php echo e($supply->jumlah); ?></td>
			                    <td class="font-weight-bold td-4"><input type="text" name="harga" value="<?php echo e($supply->harga_beli); ?>" hidden=""><span class="ammount-box bg-green"><i class="mdi mdi-coin"></i></span>Rp. <?php echo e(number_format($supply->harga_beli,2,',','.')); ?></td>
			                    <td class="total-field font-weight-bold text-success"></td>
			                  </tr>
			                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                </table>
			              </div>
			              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			            </ul>
			            <ul class="list-date" id="list-date-transaksi" hidden="">
			              <?php $__currentLoopData = $dates_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			              <li class="txt-light"><?php echo e(date('d M, Y', strtotime($date))); ?></li>
			              <?php
			              $transactions = \App\Transaction::select('kode_transaksi')
			              ->whereDate('transactions.created_at', $date)
			              ->distinct()
			              ->latest()
			              ->get();
			              ?>
			              <div class="table-responsive">
			                <table class="table table-custom">
			                  <tr>
			                    <th>Kode Transaksi</th>
			                    <th>Total</th>
			                    <th>Bayar</th>
			                    <th>Kembali</th>
			                    <th></th>
			                  </tr>
			                  <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                  <tr>
			                    <?php
			                    $transaksi = \App\Transaction::where('kode_transaksi', $transaction->kode_transaksi)
			                    ->select('transactions.*')
			                    ->first();
			                    $products = \App\Transaction::where('kode_transaksi', $transaction->kode_transaksi)
			                    ->select('transactions.*')
			                    ->get();
			                    $tgl_transaksi = \App\Transaction::where('kode_transaksi', '=' , $transaction->kode_transaksi)
			                    ->select('created_at')
			                    ->first();
			                    ?>
			                    <td class="td-1">
			                      <span class="d-block font-weight-bold big-font"><?php echo e($transaction->kode_transaksi); ?></span>
			                      <span class="d-block mt-2 txt-light"><?php echo e(date('d M, Y', strtotime($tgl_transaksi->created_at)) . ' pada ' . date('H:i', strtotime($tgl_transaksi->created_at))); ?></span>
			                    </td>
			                    <td><span class="ammount-box bg-green"><i class="mdi mdi-coin"></i></span>Rp. <?php echo e(number_format($transaksi->total,2,',','.')); ?></td>
			                    <td class="text-success font-weight-bold">- Rp. <?php echo e(number_format($transaksi->bayar,2,',','.')); ?></td>
			                    <td>Rp. <?php echo e(number_format($transaksi->kembali,2,',','.')); ?></td>
			                    <td>
			                      <button class="btn btn-selengkapnya font-weight-bold" type="button" data-target="#dropdownTransaksi<?php echo e($transaction->kode_transaksi); ?>"><i class="mdi mdi-chevron-down arrow-view"></i></button>
			                    </td>
			                  </tr>
			                  <tr id="dropdownTransaksi<?php echo e($transaction->kode_transaksi); ?>" data-status="0" class="dis-none">
			                    <td colspan="5" class="dropdown-content">
			                      <div class="d-flex justify-content-between align-items-center">
			                        <div class="total-barang mb-3">
			                          Total Barang : <?php echo e($products->count()); ?>

			                        </div>
			                      </div>
			                      <table class="table">
			                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                        <tr>
			                          <td><span class="numbering"><?php echo e($loop->iteration); ?></span></td>
			                          <td>
			                            <span class="bold-td"><?php echo e($product->nama_barang); ?></span>
			                            <span class="light-td mt-1"><?php echo e($product->kode_barang); ?></span>
			                          </td>
			                          <td><span class="ammount-box-2 bg-secondary"><i class="mdi mdi-cube-outline"></i></span> <?php echo e($product->jumlah); ?></td>
			                          <td>
			                            <span class="light-td mb-1">Harga</span>
			                            <span class="bold-td">Rp. <?php echo e(number_format($product->harga,2,',','.')); ?></span>
			                          </td>
			                          <td>
			                            <span class="light-td mb-1">Total Barang</span>
			                            <span class="bold-td">Rp. <?php echo e(number_format($product->total_barang,2,',','.')); ?></span>
			                          </td>
			                        </tr>
			                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                      </table>
			                    </td>
			                  </tr>
			                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                </table>
			              </div>
			              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			            </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('plugins/js/datedropper.js')); ?>"></script>
<script src="<?php echo e(asset('js/report/detail_report_worker/script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ipos-system-master\resources\views/report/detail_report_worker.blade.php ENDPATH**/ ?>