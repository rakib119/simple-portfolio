<?php
$banner = "";
require_once('top.inc.php');
$intro = $banner_photo = $message = '';
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_SESSION["edit_banner_id"]  = $_GET['id'];
    $banner = mysqli_fetch_assoc(select_all("banner", "WHERE id='$id'"));
    $intro = $banner['intro'];
    $banner_photo = $banner['banner_photo'];
    $message = $banner['message'];
} else {
    unset($_SESSION["edit_banner_id"]);
}
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <a class="breadcrumb-item" href="banner.php">Banner</a>
        <span class="breadcrumb-item active">Manage Banner</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-intro"> Manage Banner</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your working banner to fill up this form.</p>
            <div class="form-layout">
                <form action="submit_banner.php" method="post" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Introduction: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['intro_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_intro"]) ? $_SESSION["old_intro"] : "$intro"; ?>" type="text" name="intro" placeholder="Enter banner intro">
                                <?php if (isset($_SESSION['intro_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['intro_error'] ?></small>
                                <?php
                                    unset($_SESSION['intro_error']);
                                endif
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label class="form-control-label" for="file">Banner Photo: <span class="tx-danger">*</span></label>
                            </div>
                            <label class="custom-file" style="width: 100%;">
                                <input type="file" id="file" name="banner_photo" value="<?= $banner_photo ?>" class="custom-file-input">
                                <span class="custom-file-control"></span>
                            </label>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Message: <span class="tx-danger">*</span></label>
                                <textarea type="text" name="message" class="form-control <?= (isset($_SESSION['message_error'])) ? 'is-invalid' : '' ?>" rows="4"><?= isset($_SESSION["old_message"]) ? $_SESSION["old_message"] : "$message" ?></textarea>
                                <?php if (isset($_SESSION['message_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['message_error'] ?></small>
                                <?php
                                    unset($_SESSION['message_error']);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-layout-footer">
                        <button type="submit" name="<?= isset($_SESSION["edit_banner_id"]) ? "edit_banner" : "submit_banner" ?>" class="btn btn-info mg-r-5"><?= isset($_SESSION["edit_banner_id"]) ? "Update" : "Submit" ?></button>
                        <!-- <button class="btn btn-secondary">Cancel</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    unset($_SESSION['old_intro']);
    unset($_SESSION['old_message']);
    require_once "footer.inc.php";
    ?>