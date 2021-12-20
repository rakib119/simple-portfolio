<?php
require_once("inc/connection.inc.php");
require_once('inc/functions.inc.php');

if (isset($_SESSION["ADMIN_LOGIN"])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Login</title>
    <!-- vendor css -->
    <link href=" lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href=" lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href=" lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href=" css/starlight.css">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Admin <span class="tx-info tx-normal">Login</span></div>
            <div class="tx-center mg-b-60">Enter your email and password for login</div>
          
            <form action="login_submit.php" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control <?= (isset($_SESSION['email_error'])) ? 'is-invalid' : '' ?>" placeholder="Enter your email">
                    <?php if (isset($_SESSION['email_error'])) :  ?>
                        <small class="text-danger"><?= $_SESSION['email_error'] ?></small>
                    <?php
                        unset($_SESSION['email_error']);
                        endif; ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control <?= (isset($_SESSION['password_error'])) ? 'is-invalid' : '' ?>" placeholder="Enter your password">
                    <?php if (isset($_SESSION['password_error'])) :  ?>
                        <small class="text-danger"><?= $_SESSION['password_error'] ?></small>
                    <?php
                        unset($_SESSION['password_error']);
                        endif; ?>
                    <!-- <a class="tx-info tx-12 d-block mg-t-10">Forgot password?</a> -->
                </div>
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
            </form>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->
    <script src=" lib/jquery/jquery.js"></script>
    <script src=" lib/popper.js/popper.js"></script>
    <script src=" lib/bootstrap/bootstrap.js"></script>
    <script src=" lib/select2/js/select2.min.js"></script>
    <script>
        $(function() {
            'use strict';

            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script>

</body>

</html>