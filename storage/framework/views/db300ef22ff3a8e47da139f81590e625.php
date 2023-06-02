<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Link Css -->
  <link rel="stylesheet" href="/style/nico-surat.css">

  <?php echo $__env->yieldContent('script2'); ?>

  <title><?php echo e(config('app.name', 'Laravel')); ?></title>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg py-5">
      <div class="container">
        <a href="<?php echo e(url('dashboard')); ?>" style="text-decoration:none; color:black;"><img src="/img-sec/matana.png" alt=""></a>
        <div class="dropdown">
            <button
              class="btn"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
            <img src="/img-sec/orang.png" alt="">
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>"><?php echo e(__('Profile')); ?></a></li>
              <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                this.closest('form').submit();"><?php echo e(__('Log Out')); ?></a></li>
              </form>
            </ul>
          </div>
        
      </div>
    </nav>
  </header>

  <main>
    <?php echo $__env->yieldContent('content'); ?>
  </main>
  <?php echo $__env->yieldContent('script'); ?>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>

</html><?php /**PATH C:\xampp\htdocs\MatanaUniversityAdministration\resources\views/layouts/master.blade.php ENDPATH**/ ?>