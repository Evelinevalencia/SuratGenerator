
<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="mb-5">
        <h4 class="fw-bold">Review Surat</h4>
        <div class="suratTableS">
          <div style="border: 3px solid black; margin-bottom: 1%" class="rounded-3">
            <form method="GET" action="reviewsurat" class="d-flex">
              <input class="form-control me-2" style="border:white;" type="search" name="filter" placeholder="Search" value="<?php echo e(old('filter')); ?>">
              <button class="btn" type="submit">
                <img src="/img-sec/search.png" alt="">
              </button>
              <?php if($sort == 'desc'): ?>
              <button class="btn" type="submit" value="asc" name="sort">
                <img src="/img-sec/sort.png" alt="">
              </button>
              <?php else: ?>
              <button class="btn" type="submit" value="desc" name="sort">
                <img src="/img-sec/sort.png" alt="">
              </button>
              <?php endif; ?>
              <div class="dropdown">
                <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="/img-sec/filter.png" alt="">
                </button>
                <ul class="dropdown-menu">
                  <li><button type="submit" class="dropdown-item" name="filter" value="menunggu approval">Menunggu Persetujuan</button></li>
                  <li><button type="submit" class="dropdown-item" name="filter" value="diterima">Disetujui</button></li>
                  <li><button type="submit" class="dropdown-item" name="filter" value="ditolak">Ditolak</button></li>
                </ul>
              </div>
            </form>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th style="text-align: center" scope="col">No</th>
                <th style="text-align: center" scope="col">Nama Surat</th>
                <th style="text-align: center" scope="col">Pratinjau</th>
                <th style="text-align: center" scope="col">Status</th>
                <th style="text-align: center" scope="col">Simpan</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <th style="text-align: center" scope="row"><?php echo e($value->id_surat); ?></th>
                <td style="text-align: center"><?php echo e($value->nama_surat); ?></td>
                <td style="text-align: center">
                  <a href="<?php echo e(url('/reviewsurat/'.$value->id_surat)); ?>">
                    <img src="/img-sec/eyeAct.png" alt="">
                  </a>
                </td>
                <Form method="POST" action=" /reviewsurat/edit ">
                  <?php echo method_field('PUT'); ?>
                  <?php echo csrf_field(); ?>
                  <td style="text-align: center">
                    <?php if($value->status_surat == 'diterima'): ?>
                    <select class="form-select" name="status" aria-label="Default select example" disabled>
                      <option value="menunggu approval">Menunggu Disetujui</option>
                      <option selected value="diterima">Disetujui</option>
                      <option value="ditolak">Ditolak</option>
                    </select>
                    <?php else: ?>
                    <select class="form-select" name="status" aria-label="Default select example">
                      <option selected value="<?php echo e($value->status_surat); ?>"><?php echo e($value->status_surat); ?></option>
                      <?php if($value->status_surat == 'ditolak'): ?>
                      <option value="diterima">Disetujui</option>
                      <option value="menunggu approval">Menunggu Approval</option>
                      <?php else: ?>
                      <option value="diterima">Disetujui</option>
                      <option value="ditolak">Ditolak</option>
                      <?php endif; ?>
                    </select>
                    <?php endif; ?>
                  </td>
                  <input type="hidden" name="idsurat" value="<?php echo e($value->id_surat); ?>" />
                  <?php if($value->status_surat == 'diterima'): ?>
                  <td style="text-align: center">
                    <button type="submit" class="btn btnSolid buGreen" disabled>Simpan</button>
                  </td>
                  <?php else: ?>
                  <td style="text-align: center">
                    <button type="submit" class="btn btnSolid buGreen">Simpan</button>
                  </td>
                  <?php endif; ?>
                  </form>
              </tr>
              
              
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 d-flex my-3 justify-content-end">
    <a href="<?php echo e(url('dashboard')); ?>" class="btn btnSolid buRed me-2">Kembali</a>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MatanaUniversityAdministration\resources\views/Yoyo/halamanreview.blade.php ENDPATH**/ ?>