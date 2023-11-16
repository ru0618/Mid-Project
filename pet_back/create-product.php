<?php include("css.php") ?>
<?php include("js.php") ?>
<div class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="vendorHomepage.php"><i class="fa-solid fa-cat"></i>  小貓兩三隻</a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="text-white d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            廠商後台管理
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="vendor-login.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="product-list.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-store"></i></div>
                            商品管理
                        </a>
                        <a class="nav-link" href="order-list.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-pen-to-square"></i></div>
                            訂單管理
                        </a>
                        <a class="nav-link" href="coupon-list.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-comment-dollar"></i></div>
                            優惠管理
                        </a>
                    </div>
                </div>
            </nav>
        </div>


        <div id="layoutSidenav_content">
            <?php include("./products/create-product.php") ?>
        </div>
    </div>
</div>