
<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/CEStable/phpCode/index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img class="bi me-2" width="65" height="20" src="/CEStable/assets/compal_word.png" alt="">
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/CEStable/phpCode/index.php" class="nav-link px-2 text-secondary">CES Table</a></li>
        <li><a href="/CEStable/phpCode/projects/newProject.php" class="nav-link px-2 text-white">Create New Project</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>

      </ul>
<!--
      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <input type="search" class="form-control form-control-dark" placeholder="Search...">
      </form>-->

      <div class="text-end">
        <?php echo $_SERVER['PHP_AUTH_USER'] ?>
        <!--<button type="button" class="btn btn-outline-light me-2">Login</button>
        <button type="button" class="btn btn-warning">Sign-up</button>-->
      </div>
    </div>
  </div>
</header>
