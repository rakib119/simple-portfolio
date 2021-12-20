<?php
$general_settings = "";
require_once('top.inc.php');
$field_name = $value = $comment = "";
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_SESSION["edit_general_settings_id"]  = $_GET['id'];
    $general_settings = mysqli_fetch_assoc(select_all("general_settings", "WHERE id='$id'"));


    $field_name = $general_settings['field_name'];
    $value = $general_settings['value'];
    $comment = $general_settings['comment'];
} else {
    unset($_SESSION["edit_general_settings_id"]);
}

?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <span class="breadcrumb-item active">general_settings</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">general_settings</h6>
            <p class="mg-b-20 mg-sm-b-30">Add general_settingss to fill up this form.</p>

            <div class="form-layout">
                <form action="submit_general_settings.php" method="post" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <?php if (!$_GET) : ?>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Field Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control <?= (isset($_SESSION['field_name_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_field_name"]) ? $_SESSION["old_field_name"] : "$field_name"; ?>" type="text" name="field_name" placeholder="Enter field name">
                                    <?php if (isset($_SESSION['field_name_error'])) : ?>
                                        <small class="text-danger"><?= $_SESSION['field_name_error'] ?></small>
                                    <?php
                                        unset($_SESSION['field_name_error']);
                                    endif
                                    ?>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if (!isset($_GET['field'])) { ?>

                            <?php if ($field_name != "cv") { ?>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">VALUE <span class="tx-danger">*</span></label>
                                        <input class="form-control <?= (isset($_SESSION['value_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_value"]) ? $_SESSION["old_value"] : "$value" ?>" type="text" name="value">
                                        <?php if (isset($_SESSION['value_error'])) : ?>
                                            <small class="text-danger"><?= $_SESSION['value_error'] ?></small>
                                        <?php
                                            unset($_SESSION['value_error']);
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-control-label" for="file">UPLOAD CV: <span class="tx-danger">*</span></label>
                                    </div>
                                    <label class="custom-file" style="width: 100%;">
                                        <input type="file" id="file" name="cv" value="<?= $cv ?>" class="custom-file-input <?= (isset($_SESSION['cv_error'])) ? 'is-invalid' : '' ?>">
                                        <span class="custom-file-control"></span>
                                    </label>

                                    <?php if (isset($_SESSION['cv_error'])) : ?>
                                        <h6 class="text-danger"><?= $_SESSION['cv_error'] ?></h6>
                                    <?php
                                        unset($_SESSION['cv_error']);
                                    endif
                                    ?>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-control-label" for="file">UPLOAD CV: <span class="tx-danger">*</span></label>
                                </div>
                                <label class="custom-file" style="width: 100%;">
                                    <input type="file" id="file" name="cv" value="<?= $cv ?>" class="custom-file-input <?= (isset($_SESSION['cv_error'])) ? 'is-invalid' : '' ?>">
                                    <span class="custom-file-control"></span>
                                </label>

                                <?php if (isset($_SESSION['cv_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['cv_error'] ?></small>
                                <?php
                                    unset($_SESSION['cv_error']);
                                endif
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-layout-footer">
                        <button type="submit" name="<?= isset($_SESSION["edit_general_settings_id"]) ? "edit_general_settings" : "submit_general_settings" ?>" class="btn btn-info mg-r-5"><?= isset($_SESSION["edit_general_settings_id"]) ? "Update" : "Submit" ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['old_field_name']);
    unset($_SESSION['old_value']);
    require_once "footer.inc.php";
    ?>