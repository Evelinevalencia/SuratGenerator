
<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="alertNotif alOff" id="alertPing">
    <h4 class="fw-bold text-center">Anda yakin ingin melanjutkan proses penghapusan?</h4>
    <div class="col-12 d-flex my-3 justify-content-center">
      <a href="#" class="btn btnSolid buRed me-2" id="canClick">Batal</a>
      <a href="#" class="btn btnSolid buGreen" id="yesClick">Simpan</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="mb-5">
        <h4 class="fw-bold mb-5">Review Surat</h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" style="text-align:center;">Nama Surat</th>
              <th scope="col" style="text-align:center;">Status Surat</th>
              <th scope="col" style="text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($value->status_surat == 'menunggu approval'): ?>
            <tr>
              <th scope="row"><?php echo e($value->nama_surat); ?></th>
              <td>
                <p class="staGrey fw-bold"><?php echo e($value->status_surat); ?></p>
              </td>
              <td>
                <div class="d-flex justify-content-around">
                  <a href="<?php echo e(url('/reviewsurat/'.$value->id_surat)); ?>">
                    <img src="/img-sec/eyeAct.png" alt="">
                  </a>
                  <a href="<?php echo e(url('/reviewsurat/'.$value->id_surat.'/edit')); ?>">
                    <img src="/img-sec/edAct.png" alt="">
                  </a>
                  <form class="delete-form" action=" <?php echo e(URL::to('reviewsurat/'.$value->id_surat)); ?> " method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" style="background:none; border: none;" class="deleteSurat">
                      <img src="/img-sec/trAct.png" alt="">
                      </button>
                  </form>
                </div>
              </td>
            </tr>
            <?php elseif($value->status_surat == 'ditolak'): ?>
            <tr>
              <th scope="row"><?php echo e($value->nama_surat); ?></th>
              <td>
                <p class="staRed fw-bold"><?php echo e($value->status_surat); ?></p>
              </td>
              <td>
                <div class="d-flex justify-content-around">
                  <a href="<?php echo e(url('/reviewsurat/'.$value->id_surat)); ?>">
                    <img src="/img-sec/eyeAct.png" alt="">
                  </a>
                  <a href="<?php echo e(url('/reviewsurat/'.$value->id_surat.'/edit')); ?>">
                    <img src="/img-sec/edAct.png" alt="">
                  </a>
                  <form class="delete-form" action=" <?php echo e(URL::to('reviewsurat/'.$value->id_surat)); ?> " method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" style="background:none; border: none;" class="deleteSurat">
                      <img src="/img-sec/trAct.png" alt="">
                      </button>
                  </form>
                </div>
              </td>
            </tr>
            <?php elseif($value->status_surat == 'diterima'): ?>
            <tr>
              <th scope="row"><?php echo e($value->nama_surat); ?></th>
              <td>
                <p class="staGreen fw-bold"><?php echo e($value->status_surat); ?></p>
              </td>
              <td>
                <div class="d-flex justify-content-around">
                  <a href="<?php echo e(url('/reviewsurat/'.$value->id_surat)); ?>">
                    <img src="/img-sec/eyeAct.png" alt="">
                  </a>
                  <a href="<?php echo e(url('/reviewsurat/'.$value->id_surat.'/edit')); ?>">
                    <img src="/img-sec/edAct.png" alt="">
                  </a>
                  <form class="delete-form" action=" <?php echo e(URL::to('reviewsurat/'.$value->id_surat)); ?> " method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" style="background:none; border: none;" class="deleteSurat">
                      <img src="/img-sec/trAct.png" alt="">
</button>
                  </form>
                </div>
              </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $__env->startSection('script'); ?>
<script>
      const deleteSurats = document.querySelectorAll('.deleteSurat')
      const alertPing = document.getElementById('alertPing')
      const canClick = document.getElementById('canClick')
      const yesClick = document.getElementById('yesClick')

      deleteSurats.forEach(deleteSurat => 
        deleteSurat.addEventListener(
          'click', () => {
            alertPing.classList.remove('alOff')
            alertPing.classList.add('alOn')
          }
        )
      );

      canClick.addEventListener('click', () => {
        alertPing.classList.remove('alOn')
        alertPing.classList.add('alOff')
      })

    </script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MatanaUniversityAdministration\resources\views/Nico/reviewsurat.blade.php ENDPATH**/ ?>