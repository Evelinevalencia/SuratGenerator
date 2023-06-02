<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Link Css -->
    <link rel="stylesheet" href="/style/nico-surat.css">


    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
</head>

<body>

    
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

    <script>
        window.print();
    </script>

</body>

</html><?php /**PATH C:\xampp\htdocs\MatanaUniversityAdministration\resources\views/Nico/downloadsurat.blade.php ENDPATH**/ ?>