<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h2 align-self-center" href="admin.php">
            Hustle Admin
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-start mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="product_admin.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="receipt_admin.php">Receipt</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <li class="nav-icon dropdown position-relative list-unstyled">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i> <?= $_SESSION['username']; ?>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><?= $_SESSION['username']; ?></a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                </li>
            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->