
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a  class="nav-link text-dark d-sm-none d-md-none d-lg-none " style="font-size: 12px;">     <?php  if (isset($_SESSION['user'])) : ?>
                            <strong class="text-white"><?php echo $_SESSION['user']['email']; ?></strong>

                            <small>
                                <i  style="color: #888;" class="text-white">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>

                            </small>

                        <?php endif ?></a>
                    <a class="nav-link" href="index">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Rates
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="google-rate">
                                Google
                            </a>
                            <a class="nav-link collapsed" href="amazon-rate">
                                Amazon
                            </a>
                            <a class="nav-link collapsed" href="steam-rate">
                                Steam
                            </a>
                            <a class="nav-link collapsed" href="itunes-rate">
                                Itunes
                            </a>
                            <a class="nav-link collapsed" href="ebay-rate">
                                Ebay
                            </a>

                            <a class="nav-link collapsed" href="nike-rate">
                                Nike
                            </a>
                            <a class="nav-link collapsed" href="sephora-rate">
                                Sephora
                            </a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages1">
                        <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                        Flash Sales
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages1" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="flash">
                                Sales
                            </a>
                            <a class="nav-link collapsed" href="flash_amazon">
                                Flash Amazon
                            </a>

                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="adduser">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Add New User <i class="fa fa-plus-circle"></i>
                    </a>

                    <a class="nav-link collapsed" href="testimonial">
                        <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                        Testimonials
                    </a>
                    <a class="nav-link collapsed" href="profile">
                        <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                        Profile
                    </a>

                    <a class="nav-link collapsed text-white d-sm-block d-md-none d-lg-none" href="profile"><i class="fa fa-edit"></i>Profile</a>
                    <a class="nav-link collapsed text-white d-sm-block d-md-none d-lg-none" href="index.php?logout='1'""><i class="fa fa-arrow-right"></i> Logout</a>


                </div>
            </div>

        </nav>
    </div>
