<?php include("css.php") ?>
<?php include("js.php") ?>
<div class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="vendorHomepage.php"><i class="fa-solid fa-cat"></i> 小貓兩三隻</a>

        <!-- Navbar Search-->
        <div class="text-white d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            廠商後台管理
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="vendor-login.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <?php include("./vendor-login/vendor-login.php") ?>
    </div>
</div>