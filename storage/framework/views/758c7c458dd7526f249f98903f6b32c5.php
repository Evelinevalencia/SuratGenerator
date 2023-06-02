
<?php $__env->startSection('script2'); ?>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '.textCollector'
  });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<Form method="POST" action=" <?php echo e(URL::to('reviewsurat')); ?> ">
  <?php echo csrf_field(); ?>
  <div class="container">
    <h3 class="fs-5 fw-bold">Email Penerima</h3>
    <input type="email" name="email" class="form-control yth">
    <div class="row">
      <div class="col-12 p-5 border border-secondary boxBorder">
        <div class="mb-4">
          <h3 class="fs-5 fw-bold">Judul Surat</h3>
          <input type="text" name="nama_surat" class="form-control yth">
          <input type="text" style="display:none;" value="<?php echo e($id_template); ?>" name="id_template" class="form-control yth">
          <?php if($id_template == 1): ?>
          <input type="text" style="display:none;" value="EDARAN" name="jenis_surat" class="form-control yth">
        </div>
        <h6>.../EDARAN/<?php echo e(date('m')); ?>/<?php echo e(date('Y')); ?></h6>
        <?php elseif($id_template == 2): ?>
        <input type="text" style="display:none;" value="PERMOHONAN" name="jenis_surat" class="form-control yth">
        </div>
                <h6>.../PERMOHONAN/<?php echo e(date('m')); ?>/<?php echo e(date('Y')); ?></h6>
        <?php elseif($id_template == 3): ?>
        <input type="text" style="display:none;" value="DINAS" name="jenis_surat" class="form-control yth">
        </div>
                <h6>.../DINAS/<?php echo e(date('m')); ?>/<?php echo e(date('Y')); ?></h6>
        <?php elseif($id_template == 4): ?>
        <input type="text" style="display:none;" value="TUGAS" name="jenis_surat" class="form-control yth">
        </div>
                <h6>.../TUGAS/<?php echo e(date('m')); ?>/<?php echo e(date('Y')); ?></h6>
        <?php endif; ?>
      <h6 class="fw-bold">Kepada Yth,</h6>
      <input type="text" name="nama_penerima" class="form-control yth">
      <textarea class="textCollector" name="isi_surat">Ketik isi surat disini.</textarea>
    </div>
    <div class="col-12 d-flex my-3 justify-content-end">
      <a href="<?php echo e(url('dashboard')); ?>" class="btn btnSolid buRed me-2">Batal</a>
      <button type="submit" class="btn btnSolid buGreen">Simpan</button>
    </div>
  </div>
  </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MatanaUniversityAdministration\resources\views/Nico/isisurat.blade.php ENDPATH**/ ?>