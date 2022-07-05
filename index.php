<?php

// connect to database
//$db = mysqli_connect('localhost', 'wetrader_admin', 'wetrader_Passme@123', 'wetrader_mycard');
$db = mysqli_connect('localhost', 'admin', 'Omonegois7744', 'my_card_xchange');

include('head.php');
include ('header.php');
include ('slider.php');
?>


<!-- Managment area start -->
<div class="managment-area-2 content-area-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="managment-info">
                    <h1><span>Why</span> Choose Us?</h1>
                    <div class="managment-border-"></div>
                    <p>WeTrader is an organization which provides you platform to trade all your giftcards.
                        We offer 24 hours prompt service.</p>
                    <p>At WeTrader we are tested and trustworthy with seemingly trading service.</p>
                    <ul>
                        <li>
                            <i class="fa fa-check"></i>Swift Payments
                            We pay you really fast</li>

                        <li><i class="fa fa-check"></i>Available
                            We are ready to trade!</li>
                        <li><i class="fa fa-check"></i>
                           Reliable
                            We do not disappoint</li>
                        <li><i class="fa fa-check"></i>
                            Competitive Rates
                            We offer awesome rates</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 offset-lg-1">

                <span class="heading">User Rating</span>
                <span class="fa fa-star star-checked"></span>
                <span class="fa fa-star star-checked"></span>
                <span class="fa fa-star star-checked"></span>
                <span class="fa fa-star star-checked"></span>
                <span class="fa fa-star"></span>
                <p>4.1 average based on 254 reviews.</p>
                <hr style="border:3px solid #f1f1f1">


                    <div class="star-side">
                        <div>5 star</div>
                    </div>
                    <div class="star-middle">
                        <div class="star-container">
                            <div class="star-5">&nbsp;</div>
                        </div>
                    </div>
                    <div class="star-side star-right">
                        <div>150</div>
                    </div>

                    <div class="star-side">
                        <div>4 star</div>
                    </div>
                    <div class="star-middle">
                        <div class="star-container">
                            <div class="star-4"></div>
                        </div>
                    </div>
                    <div class="star-side star-right">
                        <div>63</div>
                    </div>
                    <div class="star-side">
                        <div>3 star</div>
                    </div>
                    <div class="star-middle">
                        <div class="star--container">
                            <div class="star-3"></div>
                        </div>
                    </div>
                    <div class="star-side star-right">
                        <div>15</div>
                    </div>
                    <div class="star-side">
                        <div>2 star</div>
                    </div>
                    <div class="star-middle">
                        <div class="star-container">
                            <div class="star-2"></div>
                        </div>
                    </div>
                    <div class="star-side star-right">
                        <div>6</div>
                    </div>
                    <div class="star-side">
                        <div>1 star</div>
                    </div>
                    <div class="star-middle">
                        <div class="star--container">
                            <div class="star-1"></div>
                        </div>
                    </div>
                    <div class="star-side star-right">
                        <div>20</div>
                    </div>
                </div>

        </div>
    </div>
</div>
<!-- Managment area end -->



<!-- Counters start -->
<div class="counters overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-cup"></i>
                    <h1 class="counter">967</h1>
                    <h5>Awards</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-people-1"></i>
                    <h1 class="counter">254</h1>
                    <h5>Gift Cards</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-people"></i>
                    <h1 class="counter">130</h1>
                    <h5>Happy Clients</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-bars"></i>
                    <h1 class="counter">94</h1>
                    <h5>Cards</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters end -->

    <div class="space">&nbsp;</div>

<!-- Pricing tables start -->
<div class="pricing-tables content-area-2">

    <div class="container">
        <div class="main-title">
            <h1><span>Our</span> Prices</h1>
            <marquee behavior="scroll" direction="left" scrollamount="10"><h4 class="text-primary">Flash Sales: <?php
                   global $db;
                   $query = "SELECT dollar_100 from flash_rates";
                   $results = mysqli_query($db, $query);
                   if($results->num_rows > 0) {
                       while ($row = $results->fetch_assoc()) {
                           echo "$row[dollar_100]";
                       }
                   }
                   ?></h4></marquee>
        </div>
       <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="pricing-2">
                    <div class="title dolar">Google</div>
                    <div class="price-for-user">
                        <img src="assets/images/shop/google.png" width="150" height="150">
                    </div>
                    <div class="content">
                         <table class="table-bordered">
                            <thead>
                            <th>Value</th>
                            <th>Dollar</th>
                            <th>Pounds</th>
                            <th>Euro</th>
                            </thead>
                            <tbody>
                            <tr>
                            <td>25</td>
                            <td>  <?php
                                global $db;
                                $query = "SELECT dollar_25 from google_rates";
                                $results = mysqli_query($db, $query);
                                if($results->num_rows > 0) {
                                    while ($row = $results->fetch_assoc()) {
                                        echo "$row[dollar_25]";
                                    }
                                }
                                ?></td>
                            <td>  <?php
                                global $db;
                                $query = "SELECT pounds_25 from google_pounds_rates";
                                $results = mysqli_query($db, $query);
                                if($results->num_rows > 0) {
                                    while ($row = $results->fetch_assoc()) {
                                        echo "$row[pounds_25]";
                                    }
                                }
                                ?></td>
                            <td>  <?php
                                global $db;
                                $query = "SELECT euro_25 from google_euro_rates";
                                $results = mysqli_query($db, $query);
                                if($results->num_rows > 0) {
                                    while ($row = $results->fetch_assoc()) {
                                        echo "$row[euro_25]";
                                    }
                                }
                                ?></td>
                            </tr>

                            <tr>
                                <td>50</td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT dollar_50 from google_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_50]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT pounds_50 from google_pounds_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[pounds_50]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT euro_50 from google_euro_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[euro_50]";
                                        }
                                    }
                                    ?></td>
                            </tr>

                            <tr>
                                <td>100</td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT dollar_100 from google_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_100]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT pounds_100 from google_pounds_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[pounds_100]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT euro_100 from google_euro_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[euro_100]";
                                        }
                                    }
                                    ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="button"><a href="client-area/google-card" class="btn btn-sm btn-primary">Trade Google</a></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 ">
                <div class="pricing-2">
                    <div class="title">Amazon</div>
                    <div class="price-for-user">
                        <img src="assets/images/shop/amazon.png" width="150" height="150">
                    </div>
                    <div class="content">
                           <table class="table-bordered">
                            <thead>
                            <th>Value</th>
                            <th>Dollar</th>
                            <th>Pounds</th>
                            <th>Euro</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>25</td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT dollar_25 from amazon_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_25]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT pounds_25 from amazon_pounds_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[pounds_25]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT euro_25 from amazon_euro_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[euro_25]";
                                        }
                                    }
                                    ?></td>
                            </tr>

                            <tr>
                                <td>50</td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT dollar_50 from amazon_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_50]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT pounds_50 from amazon_pounds_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[pounds_50]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT euro_50 from amazon_euro_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[euro_50]";
                                        }
                                    }
                                    ?></td>
                            </tr>

                            <tr>
                                <td>100</td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT dollar_100 from amazon_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_100]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT pounds_100 from amazon_pounds_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[pounds_100]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT euro_100 from amazon_euro_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[euro_100]";
                                        }
                                    }
                                    ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="button"><a href="client-area/amazon-card" class="btn btn-border btn-sm btn-primary">Trade Amazon</a></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="pricing-2">
                    <div class="title">Steam</div>
                    <div class="price-for-user">
                        <img src="assets/images/shop/steam.png" width="150" height="150">
                    </div>
                    <div class="content">
                            <table class="table-bordered">
                            <thead>
                            <th>Value</th>
                            <th>Dollar</th>
                            <th>Pounds</th>
                            <th>Euro</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>25</td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT dollar_25 from steam_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_25]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT pounds_25 from steam_pounds_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[pounds_25]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT euro_25 from steam_euro_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[euro_25]";
                                        }
                                    }
                                    ?></td>
                            </tr>

                            <tr>
                                <td>50</td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT dollar_50 from steam_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_50]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT pounds_50 from steam_pounds_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[pounds_50]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT euro_50 from steam_euro_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[euro_50]";
                                        }
                                    }
                                    ?></td>
                            </tr>

                            <tr>
                                <td>100</td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT dollar_100 from steam_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_100]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT pounds_100 from steam_pounds_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[pounds_100]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT euro_100 from steam_euro_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[euro_100]";
                                        }
                                    }
                                    ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="button"><a href="client-area/steam-card" class="btn btn-sm btn-color btn-outline-primary">Trade Steam</a></div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="pricing-2">
                    <div class="title">iTunes</div>
                    <div class="price-for-user">
                        <img src="assets/images/shop/itunes.png" width="150" height="150">
                    </div>
                    <div class="content">
                         <table class="table-bordered">
                            <thead>
                            <th>Value</th>
                            <th>Dollar</th>
                            <th>Pounds</th>
                            <th>Euro</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>25</td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT dollar_25 from itunes_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_25]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT pounds_25 from itunes_pounds_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[pounds_25]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT euro_25 from itunes_euro_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[euro_25]";
                                        }
                                    }
                                    ?></td>
                            </tr>

                            <tr>
                                <td>50</td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT dollar_50 from itunes_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_50]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT pounds_50 from itunes_pounds_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[pounds_50]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT euro_50 from itunes_euro_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[euro_50]";
                                        }
                                    }
                                    ?></td>
                            </tr>

                            <tr>
                                <td>100</td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT dollar_100 from itunes_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_100]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT pounds_100 from itunes_pounds_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[pounds_100]";
                                        }
                                    }
                                    ?></td>
                                <td>  <?php
                                    global $db;
                                    $query = "SELECT euro_100 from itunes_euro_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[euro_100]";
                                        }
                                    }
                                    ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="button"><a href="client-area/itunes-card" class="btn btn-border btn-sm btn-primary">Trade iTunes</a></div>
                </div>
            </div>
        </div><!-- row for select card--->


        <!-- Price row 2-->
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="pricing-2">
                        <div class="title dolar">Ebay</div>
                        <div class="price-for-user">
                            <img src="assets/images/shop/ebay.png" width="150" height="150">
                        </div>
                        <div class="content">
                            <ul>
                                <li>25 Dollar
                                    <?php
                                    global $db;
                                    $query = "SELECT dollar_25 from ebay_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_25]";
                                        }
                                    }
                                    ?>
                                </li>
                                <li>50 Dollar
                                    <?php
                                    global $db;
                                    $query = "SELECT dollar_50 from ebay_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_50]";
                                        }
                                    }
                                    ?>
                                </li>
                                <li>100 Dollar
                                    <?php
                                    global $db;
                                    $query = "SELECT dollar_100 from ebay_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_100]";
                                        }
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <div class="button"><a href="client-area/ebay-card" class="btn btn-border btn-sm btn-outline-primary">Trade Ebay</a></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 ">
                    <div class="pricing-2">
                        <div class="title">Nike</div>
                        <div class="price-for-user">
                            <img src="assets/images/shop/nike.png" width="150" height="150">
                        </div>
                        <div class="content">
                            <ul>
                                <li>25 Dollar
                                    <?php
                                    global $db;
                                    $query = "SELECT dollar_25 from nike_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_25]";
                                        }
                                    }
                                    ?>
                                </li>
                                <li>50 Dollar
                                    <?php
                                    global $db;
                                    $query = "SELECT dollar_50 from nike_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_50]";
                                        }
                                    }
                                    ?>
                                </li>
                                <li>100 Dollar
                                    <?php
                                    global $db;
                                    $query = "SELECT dollar_100 from nike_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_100]";
                                        }
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <div class="button"><a href="client-area/nike-card" class="btn btn-sm btn-color btn-primary">Trade Nike</a></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="pricing-2">
                        <div class="title">Sephora</div>
                        <div class="price-for-user">
                            <img src="assets/images/shop/sephora.png" width="150" height="150">
                        </div>
                        <div class="content">
                            <ul>
                                <li>25 Dollar
                                    <?php
                                    global $db;
                                    $query = "SELECT dollar_25 from sephora_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_25]";
                                        }
                                    }
                                    ?>
                                </li>
                                <li>50 Dollar
                                    <?php
                                    global $db;
                                    $query = "SELECT dollar_50 from sephora_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_50]";
                                        }
                                    }
                                    ?>
                                </li>
                                <li>100 Dollar
                                    <?php
                                    global $db;
                                    $query = "SELECT dollar_100 from sephora_rates";
                                    $results = mysqli_query($db, $query);
                                    if($results->num_rows > 0) {
                                        while ($row = $results->fetch_assoc()) {
                                            echo "$row[dollar_100]";
                                        }
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <div class="button"><a href="client-area/sephora-card" class="btn btn-border btn-sm btn-outline-primary">Trade Sephora</a></div>
                    </div>
                </div>
            </div>
        </div><!-- Price row 2-->
        <!-- Price row 2-->
</div><!-- Pricing tables end -->

    <div class="space"></div>

<!-- Testimonial 1 start -->
    <div class="main-title">
        <h1><span>Our</span> Testimonials</h1>
    </div>
    <div class="testimonial-1 overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-white">
                <marquee behavior="scroll" direction="left" scrollamount="10"> <?php
                    global $db;
                    $query = "SELECT feedback, fname FROM testimonial WHERE status ='Approved' ORDER BY date DESC";
                    $results = mysqli_query($db, $query);
                    if($results->num_rows > 0) {
                        while ($row = $results->fetch_assoc()) {
                            echo "
                           
                       <span> <i class='fa fa-user' style='font-si'></i> $row[fname]: - $row[feedback]
                        <i class='fa fa-star'></i>     <i class='fa fa-star'></i>     <i class='fa fa-star'></i></span>  &nbsp; &nbsp;  
                         
                            ";
                        }
                    }
                    ?></marquee>
            </div>
        </div>
    </div>
    </div>

<!-- Testimonial 1 end -->


    <div class="space"></div>
<!-- services start -->
<div class="services content-area-2 bg-grea">
    <div class="container">
        <div class="main-title">
            <h1>How do i <span>Trade</span></h1>
            <p>Our Simple Process.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="media services-info">
                    <i class="flaticon-up-arrow"></i>
                    <div class="media-body">
                        <h5>Signup / Login</h5>
                        <p>Sign up or Login to your account and start trading....</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="media services-info">
                    <i class="flaticon-commerce"></i>
                    <div class="media-body">
                        <h5>Choose Trade Type</h5>
                        <p>Select card and denominations and supply your bank account details</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="media services-info">
                    <i class="flaticon-graphic"></i>
                    <div class="media-body">
                        <h5>Get Your Money</h5>
                        <p>Once validated, you get credited to your bank account</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
    <!-- Full Page Search -->
    <div id="full-page-search">
        <button type="button" class="close">×</button>
        <form action="#">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="button" class="btn btn-sm btn-color">Search</button>
        </form>
    </div>

<!-- services end -->
<!-- partner start -->
<!-- partner end -->


<?php include ('footer.php');?>