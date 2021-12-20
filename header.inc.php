<?php
require_once "admin/inc/functions.inc.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= single_value("author") ?>. - Easy Onepage Personal Template">
    <meta name="author" content="Paul">

    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title><?= single_value("author") ?>. - Easy Onepage Personal Template</title>
</head>

<body>

    <!-- Loader -->
    <!-- <div class="loader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div> -->

    <!-- Click capture -->
    <div class="click-capture d-lg-none"></div>

    <!-- Navbar -->
    <nav id="scrollspy" class="navbar navbar-desctop">

        <div class="d-flex position-relative w-100">

            <!-- Brand-->
            <a class="navbar-brand" href="index.php"><?= single_value("author") ?>.</a>
            <ul class="navbar-nav-desctop mr-auto d-none d-lg-block">
                <li><a class="nav-link" href="#home">Home</a></li>
                <li><a class="nav-link" href="#about">About</a></li>
                <li><a class="nav-link" href="#experience">Experience</a></li>
                <li><a class="nav-link" href="#projects">Projects</a></li>
                <li><a class="nav-link" href="#testimonials">Testimonials</a></li>
                <li><a class="nav-link" href="#news">Latest News</a></li>
            </ul>

            <!-- Social -->
            <ul class="social-icons mr-auto mr-lg-0 d-none d-sm-block">
                <?php
                foreach (select_all("social", "") as $social) :
                ?>
                    <li><a target="_blank" href="<?= $social['profile_link'] ?>">
                            <ion-icon name="<?= $social['icon'] ?>"></ion-icon>
                        </a></li>
                <?php endforeach ?>
            </ul>

            <!-- Toggler -->
            <button class="toggler d-lg-none ml-auto">
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- Navbar Mobile -->
    <nav id="navbar-mobile" class="navbar navbar-mobile d-lg-none">
        <ion-icon class="close" name="close-outline"></ion-icon>
        <!-- Social -->
        <ul class="social-icons mr-auto mr-lg-0">
            <?php
            foreach (select_all("social", "") as $social) :
            ?>
                <li><a target="_blank" href="<?= $social['profile_link'] ?>">
                        <ion-icon name="<?= $social['icon'] ?>"></ion-icon>
                    </a></li>
            <?php endforeach ?>
        </ul>
        <ul class="navbar-nav navbar-nav-mobile">
            <li><a class="nav-link" href="#home">Home</a></li>
            <li><a class="nav-link" href="#about">About</a></li>
            <li><a class="nav-link" href="#experience">Experience</a></li>
            <li><a class="nav-link" href="#projects">Projects</a></li>
            <li><a class="nav-link" href="#testimonials">Testimonials</a></li>
            <li><a class="nav-link" href="#news">Latest News</a></li>
        </ul>
        <div class="navbar-mobile-footer">
            <p>&&copy <?= date("Y ") . single_value("author") ?>. All Rights Reserved.</p>
        </div>
    </nav>
    <!-- Masthead -->
    <?php
    $banner = mysqli_fetch_assoc(select_all("banner", "WHERE status=1 ORDER BY banner.id DESC"));
    ?>
    <main id="home" class="masthead jarallax" style="background-image:url('img/banner/<?= $banner['banner_photo'] ?>');" role="main">
        <div class="opener">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <h1><?= $banner['intro'] ?></h1>
                        <p class="lead mt-4 mb-5"><?= $banner['message'] ?></p>
                        <button type="button" class="btn" data-toggle="modal" data-target="#send-request">Let's talk</button>
                    </div>
                </div>
            </div>
        </div>
    </main>