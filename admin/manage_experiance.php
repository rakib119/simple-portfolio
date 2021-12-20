<?php
$experiance = "";
require_once('top.inc.php');
$company_name = $designation = $duration = $description = '';
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_SESSION["edit_experiance_id"]  = $_GET['id'];
    $experiance = mysqli_fetch_assoc(select_all("experiance", "WHERE id='$id'"));
    $company_name = $experiance['company_name'];
    $designation = $experiance['designation'];
    $duration = $experiance['duration'];
    $description = $experiance['description'];
} else {
    unset($_SESSION["edit_experiance_id"]);
}
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <a class="breadcrumb-item" href="experiance.php">Experiance</a>
        <span class="breadcrumb-item active">Manage Experiance</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title"> Manage Experiance</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your working experiance to fill up this form.</p>
           
            <div class="form-layout">
                <form action="submit_experiance.php" method="post">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['company_name_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_company_name"]) ? $_SESSION["old_company_name"] : "$company_name"; ?>" type="text" name="company_name" placeholder="Enter your company name">
                                <?php if (isset($_SESSION['company_name_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['company_name_error'] ?></small>
                                <?php
                                    unset($_SESSION['company_name_error']);
                                endif
                                ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Designation: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['designation_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_designation"]) ? $_SESSION["old_designation"] : "$designation" ?>" type="text" name="designation" placeholder="Enter designation">
                                <?php if (isset($_SESSION['designation_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['designation_error'] ?></small>
                                <?php
                                    unset($_SESSION['designation_error']);
                                endif;
                                ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Duration: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['duration_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_duration"]) ? $_SESSION["old_duration"] : "$duration" ?>" type="text" name="duration" placeholder="2010-2018">
                                <?php if (isset($_SESSION['duration_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['duration_error'] ?></small>
                                <?php
                                    unset($_SESSION['duration_error']);
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                                <textarea type="text" name="description" class="form-control <?= (isset($_SESSION['description_error'])) ? 'is-invalid' : '' ?>" rows="4"><?= isset($_SESSION["old_description"]) ? $_SESSION["old_description"] : "$description" ?></textarea>
                                <?php if (isset($_SESSION['description_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['description_error'] ?></small>
                                <?php
                                    unset($_SESSION['description_error']);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-layout-footer">
                        <button type="submit" name="<?= isset($_SESSION["edit_experiance_id"]) ? "edit_experiance" : "submit_experiance" ?>" class="btn btn-info mg-r-5"><?= isset($_SESSION["edit_experiance_id"]) ? "Update" : "Submit" ?></button>
                        <!-- <button class="btn btn-secondary">Cancel</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    unset($_SESSION['old_company_name']);
    unset($_SESSION['old_designation']);
    unset($_SESSION['old_duration']);
    unset($_SESSION['old_description']);
    require_once "footer.inc.php";
    ?>