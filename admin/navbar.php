<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index">WETRADER</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"> <i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <span class="text-white">Welcome Admin</span>
    </div>

    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0 d-none d-md-inline-block d-lg-block">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
                <?php  if (isset($_SESSION['user'])) : ?>
                    <strong class="text-white"><?php echo $_SESSION['user']['email']; ?></strong>

                    <small>
                        <i class="text-white">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>

                    </small>

                <?php endif ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index?logout='1'"">Logout</a>
            </div>
        </li>
    </ul>
</nav>