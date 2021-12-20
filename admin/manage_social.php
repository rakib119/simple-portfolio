<?php
$social = "";
require_once('top.inc.php');
$icon = $profile_link = '';
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_SESSION["edit_social_id"]  = $_GET['id'];
    $social = mysqli_fetch_assoc(select_all("social", "WHERE id='$id'"));
    $icon = $social['icon'];
    $profile_link = $social['profile_link'];;
} else {
    unset($_SESSION["edit_social_id"]);
}
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <a class="breadcrumb-item" href="social.php">social</a>
        <span class="breadcrumb-item active">Manage social</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-icon"> Manage social</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your working social to fill up this form.</p>
          
            <div class="form-layout">
                <form action="submit_social.php" method="post" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Icon Name: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['icon_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_icon"]) ? $_SESSION["old_icon"] : "$icon"; ?>" type="text" name="icon" placeholder="Enter ion icon name">
                                <?php if (isset($_SESSION['icon_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['icon_error'] ?></small>
                                <?php
                                    unset($_SESSION['icon_error']);
                                endif
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Profile Link: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['profile_link_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_profile_link"]) ? $_SESSION["old_profile_link"] : "$profile_link"; ?>" type="text" name="profile_link" placeholder="Enter sicial profile_link">
                                <?php if (isset($_SESSION['profile_link_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['profile_link_error'] ?></small>
                                <?php
                                    unset($_SESSION['profile_link_error']);
                                endif
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-layout-footer">
                        <button type="submit" name="<?= isset($_SESSION["edit_social_id"]) ? "edit_social" : "submit_social" ?>" class="btn btn-info mg-r-5"><?= isset($_SESSION["edit_social_id"]) ? "Update" : "Submit" ?></button>
                        <!-- <button class="btn btn-secondary">Cancel</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    unset($_SESSION['old_icon']);
    unset($_SESSION['old_profile_link']);
    require_once "footer.inc.php";
    ?>