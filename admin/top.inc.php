<?php
require_once("inc/functions.inc.php");
if (!isset($_SESSION["ADMIN_LOGIN"])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= single_value("author")?> Admin</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="css/starlight.css">
</head>

<body>
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Rakib Hasan</a></div>
    <div class="sl-sideleft">
        <label class="sidebar-label">Navigation</label>
        <div class="sl-sideleft-menu">
            <a href="index.php" class="sl-menu-link <?= (isset($dashboard)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-home tx-22"></i>
                    <span class="menu-item-label">Dashboard</span>
                </div>
            </a>
            <a href="experiance.php" class="sl-menu-link <?= (isset($experiance)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-briefcase tx-20"></i>
                    <span class="menu-item-label">Experience</span>
                </div>
            </a>
            <a href="testimonial.php" class="sl-menu-link <?= (isset($testimonial)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-quote tx-20"></i>
                    <span class="menu-item-label">Testimonial</span>
                </div>
            </a>
            <a href="latest_news.php" class="sl-menu-link <?= (isset($latest_news)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-paper  tx-20"></i>
                    <span class="menu-item-label">Latest News</span>
                </div>
            </a>
            <a href="banner.php" class="sl-menu-link <?= (isset($banner)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-android-image  tx-20"></i>
                    <span class="menu-item-label">Banner Management</span>
                </div>
            </a>
            <a href="projects.php" class="sl-menu-link <?= (isset($projects)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-trophy  tx-20"></i>
                    <span class="menu-item-label">Featured Projects</span>
                </div>
            </a>
            <a href="social.php" class="sl-menu-link <?= (isset($social)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-social-facebook  tx-20"></i>
                    <span class="menu-item-label">Social profile</span>
                </div>
            </a>
            <a href="partners.php" class="sl-menu-link <?= (isset($partners)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-android-globe tx-20"></i>
                    <span class="menu-item-label">Partners</span>
                </div>
            </a>
            <a href="general_settings.php" class="sl-menu-link <?= (isset($general_settings)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-gear-outline tx-20"></i>
                    <span class="menu-item-label">General Settings</span>
                </div>
            </a>
            <a href="#" class="sl-menu-link <?= (isset($skill)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-paper tx-22"></i>
                    <span class="menu-item-label">Skills</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item "><a href="skill_details.php" class="nav-link">Details</a></li>
                <li class="nav-item"><a href="skills.php" class="nav-link">Skill Percentage</a></li>

            </ul>
            <a href="user_list.php" class="sl-menu-link <?= (isset($usermanagement)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-android-person-add tx-20"></i>
                    <span class="menu-item-label">User Management</span>
                </div>
            </a>
            <a href="user_list.php" class="sl-menu-link <?= (isset($usermanagement)) ? "active" : "" ?>">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-android-mail tx-20"></i>
                    <span class="menu-item-label">Mail Box</span>
                </div>
            </a>
        </div>
        <br>
    </div>
    <div class="sl-header">
        <div class="sl-header-left">
            <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
            <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        </div>
        <div class="sl-header-right">
            <nav class="nav">
                <div class="dropdown">
                    <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                        <span class="logged-name"><?= $_SESSION['ADMIN_NAME'] ?></span>
                        <i class="icon ion-android-person tx-20"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-header wd-200">
                        <ul class="list-unstyled user-profile-nav">
                            <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                            <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                            <li><a target="_blank" href="../index.php"><i class="icon ion-android-globe"></i> Web page</a></li>
                            <li><a href="logout.php"><i class="icon ion-power"></i> Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>