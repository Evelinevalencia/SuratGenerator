
<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-9">
      <div class="mb-3">
        <h4 class="fw-bold">Pratinjau Surat</h4>
        <br>
        <div class="suratTable">
          <div class="p-4">
            <h5 class="fw-bold text-center mb-4"><?php echo e($surat->nama_surat); ?></h5>
            <br>
            <div class="mt-2">
              <h6><?php echo e($surat->id_surat); ?>/<?php echo e($surat->jenis_surat); ?>/<?php echo e($surat->created_at->format('m')); ?>/<?php echo e($surat->created_at->format('Y')); ?></h6>
              <h6>Kepada Yth,</h6>
              <h6><?php echo e($surat->nama_penerima); ?></h6>
            </div>
            <div class="mt-4">
              <p><?php echo e($surat->isi_surat); ?></p>
            </div>
            <div class="d-flex align-items-end flex-column mb-3">
            <?php if($ttd != null): ?>
              <div class="p-2"><img src="/img-sec/<?php echo e($ttd->path_img); ?>" width="100px" height="100px" alt=""></div>
              <div class="p-2">
                <p><?php echo e($ttd->ttders); ?></p>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 d-flex my-3 justify-content-end">
        <a href="<?php echo e(url('/reviewsurat/'.$surat->id_surat.'/edit')); ?>" class="btn btnSolid buGrey me-2">Edit</a>
        <a href="<?php echo e(url('reviewsurat')); ?>" class="btn btnSolid buBlue">Tutup</a>
      </div>
    </div>
    <div class="col-3">
      <div class="sideSek">
        <a href="<?php echo e(url('download/'.$surat->id_surat)); ?>">
          <button type="button" class="btn w-100 down-btn">
            <div class="d-flex justify-content-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mailico">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
              </svg>
              <span>
                Unduh Surat
              </span>
            </div>
          </button>
        </a>
        <br>
        <br>
        <h3 class="fs-6 fw-bold text-center">Komen / Revisi</h3>
        <?php $__currentLoopData = $komen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komentar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="sideSquare">
          <div class="squHead px-4 py-2 rounded-top">
            <h6><?php echo e($komentar->name); ?></h6>
          </div>
          <div class="squDesc px-4 py-2 ">
            <p class="fs-6 fw-bold"><?php echo e($komentar->komentar); ?></p>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MatanaUniversityAdministration\resources\views/Nico/viewsurat.blade.php ENDPATH**/ ?>