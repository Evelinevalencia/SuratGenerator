
<?php $__env->startSection('script2'); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<style>
  .kbw-signature {
    width: 30%;
    height: 200px;
  }

  #sig canvas {
    width: 100% !important;
    height: auto;
  }
</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="mb-3">
        <h4 class="fw-bold">Pengeditan Tanda Tangan</h4>
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success  alert-dismissible">
          <strong><?php echo e($message); ?></strong>
        </div>
        <?php endif; ?>
        <br />
        <form method="POST" action="<?php echo e(URL::to('ttd')); ?>">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="nama" value="<?php echo e($akun->name); ?>" />
          <input type="hidden" name="id_surat" value="<?php echo e($id_surat); ?>" />
          <div class="col-md-12">
            <label class="" for="">Signature:</label>
            <br />
            <div id="sig"></div>
            <br />
            <div class="col-12 d-flex my-3">
              <a href="<?php echo e(url('dashboard')); ?>" class="btn btnSolid buBlue me-2">Batal</a>
              <button id="clear" class="btn btnSolid buRed me-2">Hapus</button>
              <textarea id="signature64" name="signed" style="display: none"></textarea>
              <button class="btn btn-success btnSolid buGreen">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php $__env->startSection('script'); ?>
  <script type="text/javascript">
    var sig = $('#sig').signature({
      syncField: '#signature64',
      syncFormat: 'PNG'
    });
    $('#clear').click(function(e) {
      e.preventDefault();
      sig.signature('clear');
      $("#signature64").val('');
    });
  </script>
  <?php $__env->stopSection(); ?>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MatanaUniversityAdministration\resources\views/Yoyo/halamaneditsignature.blade.php ENDPATH**/ ?>