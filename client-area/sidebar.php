<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav bg-primary" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a  class="nav-link text-dark d-sm-none d-md-none d-lg-none " style="font-size: 12px;">     <?php  if (isset($_SESSION['user'])) : ?>
                            <strong class="text-dark"><?php echo $_SESSION['user']['email']; ?></strong>

                            <small>
                                <i  style="color: #888;" class="text-white">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>

                            </small>

                        <?php endif ?></a>

                    <a class="nav-link text-white" href="home">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link collapsed text-white" href="new-trade" >
                        <div class="sb-nav-link-icon"><i class="fa fa-plus-circle"></i></div>
                        New Trade
                    </a>

                    <a class="nav-link collapsed text-white" href="testimonial" >
                        <div class="sb-nav-link-icon"><i class="fas fa-reply"></i></div>
                        Testimonial
                    </a>

                    <a class="nav-link collapsed text-white d-sm-block d-md-none d-lg-none" href="profile"><i class="fa fa-edit"></i> Profile</a>
                    <a class="nav-link collapsed text-white d-sm-block d-md-none d-lg-none" href="home.php?logout='1'""><i class="fa fa-arrow-right"></i> Logout</a>
                </div>
            </div>

        </nav>
    </div>