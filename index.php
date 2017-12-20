<!doctype html>
<html>
<head>
<?php include 'include/head.php'; ?><!-- All in head tag collected in one file -->
<title>Cate & the cocktail</title>
</head>

<body>
    <?php include_once("js/googleAnalytics.php") ?><!-- Google Analyctics implemented -->
    <?php include_once("include/dbcon.php") ?><!-- Connecting to DB -->

    <div class="grid grid-pad"><!-- responsive grid -->
        <div class="container col-1-1">
            <div class="col-3-12"><!-- Desktop sidebar/nav start-->
                    <div class="col-1-1 sidebar_menu desktop">
                        <div><!-- logo start -->
                            <a href="#" class="homeChange"><img id="logo" src="icons/catenthecocktail.svg" alt="Cate & the cocktail logo"></a>
                        </div><!-- logo end -->
                        <div class="col-1-1 sidebar_menu--indhold"><!-- The sidebar nav start -->
                            <ul class="col-1-1">
                                <li id="menu_reservation" class="act resChange"><a href="#"> Reservation </a></li>
                                <li id="menu_menu" class="act menuChange"><a href="#"> Menu </a></li>
                                <li id="menu_about" class="act aboChange"><a href="#"> About </a></li>
                                <li id="menu_apply" class="act appChange"><a href="#"> Apply </a></li>
                                <li id="menu_events" class="act eveChange"><a href="#"> Events </a></li>
                                <li id="menu_contact" class="act conChange"><a href="#"> Contact </a></li>
                             </ul>
                        </div><!-- The sidebar nav end -->

                        <div class="SoMe col-1-1"><!-- SoMe start -->
                                <div><a href="#"><div class="col-1-1 insta"></div></a></div>
                                <div><a href="#"><div class="col-1-1 fb"></div></a></div>
                        </div><!-- SoMe end -->

                        <?php include("js/imageChange.php"); ?><!-- Changing the bknd images -->
                        <?php include("js/activeNav.php"); ?><!-- JS for making active links -->
                    </div>

                    <nav class="mobile"><!-- Mobile nav start -->
                        <!-- Hamburger button in Mobile nav -->
                        <button></button>
                        <div><!-- div for controlling when the nav is displayed -->
                            <ul class="col-1-1">
                                <li id="menu_reservation" class="act resChange"><a href="#"> Reservation </a></li>
                                <li id="menu_menu" class="act menuChange"><a href="#"> Menu </a></li>
                                <li id="menu_about" class="act aboChange"><a href="#"> About </a></li>
                                <li id="menu_apply" class="act appChange"><a href="#"> Apply </a></li>
                                <li id="menu_events" class="act eveChange"><a href="#"> Events </a></li>
                                <li id="menu_contact" class="act conChange"><a href="#"> Contact </a></li>
                             </ul>
                        </div>
                    </nav><!-- Mobile nav end -->
            </div><!-- Desktop sidebar/nav end-->
            <!-- 2nd: sidebar-bar - reservation  start -->
            <div class="sidebar_bar col-1-1" id="reservation_menu">
                <div class="sidebar_bar--indhold col-1-1">
                    <div class="closebar">&#10005;</div>
                    <div class="col-6-12">
                        <?php include("include/reservation.php") ?>
                    </div>
                </div>
                    <!-- 3rd: sidebar-bar-bar - calendar start -->
                    <div class="sidebar_bar_bar col-6-12" id="calendar">
                        <div class="sidebar_bar_bar--indhold col-1-1">
                            <div class="closebar_bar">&#10005;</div>
                            <div class="col-1-1">
                                The calendar is supposed to display here, when clicked! Yet to be done. 
                            </div>
                        </div>
                    </div>
                    <!-- 3rd: sidebar-bar-bar end -->
            </div>
            <!-- sidebar reservation end -->
                   
            <!-- 2nd: sidebar - menu start -->
            <div class="sidebar_bar" id="cmenu_menu">
                <div class="sidebar_bar--indhold">
                    <div class="closebar">&#10005;</div>
                    <div class="col-1-1">
                        <?php include("include/menu.php") ?>
                    </div>
                </div>
            </div>
            <!-- 2nd: sidebar - menu end -->

            <!-- 2nd: sidebar - about start -->
            <div class="sidebar_bar" id="about_menu">
                <div class="sidebar_bar--indhold col-1-1">
                    <div class="closebar">&#10005;</div>
                    <div class="col-6-12">
                        <?php include("include/about.php") ?>
                    </div>
                </div>
            </div>
            <!-- 2nd: sidebar - about end -->

             <!-- 2nd: sidebar - apply start -->
            <div class="sidebar_bar" id="apply_menu">
                <div class="sidebar_bar--indhold col-1-1">
                    <div class="closebar">&#10005;</div>
                    <div class="col-6-12">
                        <?php include("include/apply.php") ?>
                    </div>
                </div>
            </div>
            <!-- 2nd: sidebar - apply end -->

            <!-- 2nd: sidebar - events start -->
            <div class="sidebar_bar" id="events_menu">
                <div class="sidebar_bar--indhold col-1-1">
                    <div class="closebar">&#10005;</div>
                    <div class="col-6-12">
                        <?php include("include/events.php") ?>
                    </div>
                </div>
                    <!-- 3rd: sidebar-bar-bar - suggestions  start -->
                    <div class="sidebar_bar_bar col-6-12" id="suggestions">
                        <div class="sidebar_bar_bar--indhold col-1-1">
                            <div class="closebar_bar">&#10005;</div>
                            <div class="col-1-1 suggestions">
                                <h1 class="col-1-1 h1">Event suggestions:</h1>
                                <ul>
                                    <li><a href="#">Christmas event</a></li>
                                    <li><a href="#">New Year's Eve</a></li>
                                    <li><a href="#">Pirats of the Carribean</a></li>
                                    <li><a href="#">Rumspringer</a></li>
                                    <li><a href="#">The Great Gatsby</a></li>
                                    <li><a href="#">Saint Patricks Day</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- 3rd: sidebar-bar-bar end -->
            </div>
            <!-- 2nd: sidebar - events end -->

            <!-- 2nd: sidebar - contact start -->
            <div class="sidebar_bar" id="contact_menu">
                <div class="sidebar_bar--indhold">
                    <div class="closebar">&#10005;</div>
                    <?php include("include/contact.php"); ?>
                </div>
            </div>
            <!-- 2nd: sidebar - contact end -->

            

            <div class="col-9-12"><!-- The content containing bknd img's, video and cocktail menu -->  
                <div class="col-1-1 content">
                    <div class="col-1-1 video-container"><!-- The video container -->
                         <video autoplay class="col-1-1 video" id="video" onclick="this.paused ? this.play() : this.pause()"><!-- to play/pause video -->
                          <source src="video.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                        </video> 
                    </div>
                </div>
                <div class="bknd-images"><!-- The cocktail menu content -->
                    <div class="push-5-12 col-1-1 martinis">
                        <?php include("include/martini.php"); ?>
                    </div>
                    <div class="push-5-12 col-1-1 highballs">
                        <?php include("include/highball.php"); ?>
                    </div>
                    <div class="push-5-12 col-1-1 rocks">
                        <?php include("include/rock.php"); ?>
                    </div>
                    <div class="push-5-12 col-1-1 tikis">
                        <?php include("include/tiki.php"); ?>
                    </div>
                    <div class="push-5-12 col-1-1 wines">
                        <?php include("include/wine.php"); ?>
                    </div>
                    <div class="push-5-12 col-1-1 beers">
                        <?php include("include/beer.php"); ?>
                    </div>
                </div>                
            </div>
            <?php include("js/menuContent.php"); ?><!-- The JS for displaying cocktail menu content -->
            <?php include("js/sidebar.php"); ?><!-- The JS for displaying sidebars -->
            <script src="js/burgerlist.js"></script><!-- The JS for displaying nav hamburger icon in mobile -->


            <div class="col-1-1 footer">
                <p> Copyright © 2017 </p> 
                <p> Cphbusiness school project </p>
            </div>
    <div>
</body>
</html>