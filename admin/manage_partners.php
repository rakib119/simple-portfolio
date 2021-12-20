<?php
$partners = "";
require_once('top.inc.php');
$partner_name = $partner_image = '';
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_SESSION["edit_partners_id"]  = $_GET['id'];
    $partners = mysqli_fetch_assoc(select_all("partners", "WHERE id='$id'"));
    // pr($partners);
    // die();
    $partner_name = $partners['partner_name'];
    $partner_image = $partners['partner_image'];
} else {
    unset($_SESSION["edit_partners_id"]);
}
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <a class="breadcrumb-item" href="partners.php">partners</a>
        <span class="breadcrumb-item active">Manage partners</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-partner_name"> Manage partners</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your partners to fill up this form.</p>
           
            <div class="form-layout">
                <form action="submit_partners.php" method="post" enctype="multipart/form-data">
                    <d class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Partner Name: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['partner_name_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_partner_name"]) ? $_SESSION["old_partner_name"] : "$partner_name"; ?>" type="text" name="partner_name" placeholder="Enter ion partner name">
                                <?php if (isset($_SESSION['partner_name_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['partner_name_error'] ?></small>
                                <?php
                                    unset($_SESSION['partner_name_error']);
                                endif
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label class="form-control-label" for="file">Banner Photo: <span class="tx-danger">*</span></label>
                            </div>
                            <label class="custom-file" style="width: 100%;">
                                <input type="file" id="file" name="partner_image" value="<?= $partner_image ?>" class="custom-file-input <?= (isset($_SESSION['partner_image_error'])) ? 'is-invalid' : '' ?>">
                                <span class="custom-file-control"></span>
                            </label>

                            <?php if (isset($_SESSION['partner_image_error'])) : ?>
                                <small class="text-danger"><?= $_SESSION['partner_image_error'] ?></small>
                            <?php
                                unset($_SESSION['partner_image_error']);
                            endif
                            ?>
                        </div>
                    </d iv>
                    <div class="form-layout-footer">
                        <button type="submit" name="<?= isset($_SESSION["edit_partners_id"]) ? "edit_partners" : "submit_partners" ?>" class="btn btn-info mg-r-5"><?= isset($_SESSION["edit_partners_id"]) ? "Update" : "Submit" ?></button>
                        <!-- <button class="btn btn-secondary">Cancel</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    unset($_SESSION['old_partner_name']);
    unset($_SESSION['old_partner_image']);
    require_once "footer.inc.php";
    ?>