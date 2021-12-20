<?php
$register = "";
require_once("inc/connection.inc.php");
require_once('inc/functions.inc.php');
if (!isset($_SESSION["ADMIN_LOGIN"])) {
    header("location: login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rakib Hasan Admin Register</title>
    <!-- vendor css -->
    <link href=" lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href=" lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href=" lib/select2/css/select2.min.css" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href=" css/starlight.css">
</head>

<body>
    <?php
    // print_array($_SESSION);
    ?>
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Admin <span class="tx-info tx-normal">Register</span></div>
            <div class="tx-center mg-b-60">Give your information to register as admin</div>
            <?php if (isset($_SESSION['reg_error'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong class="d-block d-sm-inline-block-force">Sorry!</strong> Registration faild.
                </div>
            <?php endif ?>
            <form action="register_submit.php" method="post">
                <div class="form-group">
                    <input type="text" name="name" class="form-control <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_name"]) ? $_SESSION["old_name"] : "" ?>" placeholder="Enter your Name">
                    <?php if (isset($_SESSION['name_error'])) : ?>
                        <small class="text-danger"><?= $_SESSION['name_error'] ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control <?= (isset($_SESSION['email_error'])) ? 'is-invalid' : '' ?>" placeholder="Enter your email" value="<?= isset($_SESSION["old_email"]) ? $_SESSION["old_email"] : "" ?>">
                    <?php if (isset($_SESSION['email_error'])) : ?>
                        <small class="text-danger"><?= $_SESSION['email_error'] ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control <?= (isset($_SESSION['password_error'])) ? 'is-invalid' : '' ?>" placeholder="Enter your password">
                    <?php if (isset($_SESSION['password_error'])) : ?>
                        <small class="text-danger"><?= $_SESSION['password_error'] ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" class="form-control <?= (isset($_SESSION['confirm_password_error'])) ? 'is-invalid' : '' ?>" placeholder="Re-type your password">
                    <?php if (isset($_SESSION['confirm_password_error'])) : ?>
                        <small class="text-danger"><?= $_SESSION['confirm_password_error'] ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="gender" class="mr-3">Gender:</label>
                    <label class="mr-2">
                        <input name="gender" value="male" <?= (isset($_SESSION['old_gender']) && $_SESSION['old_gender'] == "male" ? "checked" : "") ?> type="radio">
                        <span>Male</span>
                    </label>
                    <label class="mr-2">
                        <input name="gender" value="female" <?= (isset($_SESSION['old_gender']) && $_SESSION['old_gender'] == "female" ? "checked" : "") ?> type="radio">
                        <span>Female</span>
                    </label>
                    <label class="mr-2">
                        <input name="gender" value="others" <?= (isset($_SESSION['old_gender']) && $_SESSION['old_gender'] == "others" ? "checked" : "") ?> type="radio">
                        <span>Others</span>
                    </label>
                    <div>
                        <?php if (isset($_SESSION['gender_error'])) : ?>
                            <small class="text-danger"><?= $_SESSION['gender_error'] ?></small>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
                <button type="submit" name="submit" class="btn btn-info btn-block">Sign Up</button>
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
