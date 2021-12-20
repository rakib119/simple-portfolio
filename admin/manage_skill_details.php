<?php
$skill = "";
require_once('top.inc.php');
$skill_name=$icon=$skill_description="";
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_SESSION["edit_skill_details_id"]  = $_GET['id'];
    $skill_details = mysqli_fetch_assoc(select_all("skill_details", "WHERE id='$id'"));
    $skill_name = $skill_details['skill_name'];
    $icon = $skill_details['icon'];
    $skill_description = $skill_details['skill_description'];
}else {
    unset($_SESSION["edit_skill_details_id"]);
}
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <a class="breadcrumb-item" href="#">Skills</a>
        <span class="breadcrumb-item active">Manage Skill Details</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Manage Skill Details</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your Skill Details to fill up this form.</p>
          
            <div class="form-layout">
                <form action="submit_skill_details.php" method="post">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Skill Name: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['skill_name_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_skill_name"]) ? $_SESSION["old_skill_name"] : "$skill_name"; ?>" type="text" name="skill_name" placeholder="Enter skill name">
                                <?php if (isset($_SESSION['skill_name_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['skill_name_error'] ?></small>
                                <?php
                                    unset($_SESSION['skill_name_error']);
                                endif
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Icon: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['icon_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_icon"]) ? $_SESSION["old_icon"] : "$icon" ?>" type="text" name="icon" placeholder="Enter ion icon name">
                                <?php if (isset($_SESSION['icon_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['icon_error'] ?></small>
                                <?php
                                    unset($_SESSION['icon_error']);
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                                <textarea type="text" name="skill_description" class="form-control <?= (isset($_SESSION['skill_description_error'])) ? 'is-invalid' : '' ?>" rows="4"><?= $skill_description ?></textarea>
                                <?php if (isset($_SESSION['skill_description_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['skill_description_error'] ?></small>
                                <?php
                                    unset($_SESSION['skill_description_error']);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-layout-footer">
                        <button type="submit" name="<?= isset($_SESSION["edit_skill_details_id"]) ? "edit_skill_details" : "submit_skill_details" ?>" class="btn btn-info mg-r-5"><?= isset($_SESSION["edit_skill_details_id"]) ? "Update" : "Submit" ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['old_skill_name']);
    unset($_SESSION['old_icon']);
    require_once "footer.inc.php";
    ?>