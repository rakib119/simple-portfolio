<?php
$testimonial = "";
require_once('top.inc.php');
$name = $designation = $comment = "";
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_SESSION["edit_testimonial_id"]  = $_GET['id'];
    $testimonial = mysqli_fetch_assoc(select_all("testimonial", "WHERE id='$id'"));


    $name = $testimonial['name'];
    $designation = $testimonial['designation'];
    $comment = $testimonial['comment'];
} else {
    unset($_SESSION["edit_testimonial_id"]);
}

?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <span class="breadcrumb-item active">Testimonial</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Testimonial</h6>
            <p class="mg-b-20 mg-sm-b-30">Add testimonials to fill up this form.</p>
          
            <div class="form-layout">
                <form action="submit_testimonial.php" method="post">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_name"]) ? $_SESSION["old_name"] : "$name"; ?>" type="text" name="name" placeholder="Enter name">
                                <?php if (isset($_SESSION['name_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['name_error'] ?></small>
                                <?php
                                    unset($_SESSION['name_error']);
                                endif
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Designation: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['designation_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_designation"]) ? $_SESSION["old_designation"] : "$designation" ?>" type="text" name="designation" placeholder="CEO of Google">
                                <?php if (isset($_SESSION['designation_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['designation_error'] ?></small>
                                <?php
                                    unset($_SESSION['designation_error']);
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">About this site: <span class="tx-danger">*</span></label>
                                <textarea type="text" name="comment" class="form-control <?= (isset($_SESSION['comment_error'])) ? 'is-invalid' : "" ?>" rows="4"> <?= $comment ?></textarea>
                                <?php if (isset($_SESSION['comment_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['comment_error'] ?></small>
                                <?php
                                    unset($_SESSION['comment_error']);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-layout-footer">
                        <button type="submit" name="<?= isset($_SESSION["edit_testimonial_id"]) ? "edit_testimonial" : "submit_testimonial" ?>" class="btn btn-info mg-r-5"><?= isset($_SESSION["edit_testimonial_id"]) ? "Update" : "Submit" ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['old_company_name']);
    unset($_SESSION['old_designation']);
    unset($_SESSION['old_duration']);
    require_once "footer.inc.php";
    ?>