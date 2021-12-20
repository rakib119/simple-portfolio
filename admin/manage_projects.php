<?php
$projects = "";
require_once('top.inc.php');
$project_name = $project_type = $clients = $authors = $budget = $starting_date = $completation_date = $project_image = '';
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_SESSION["edit_projects_id"]  = $_GET['id'];
    $projects = mysqli_fetch_assoc(select_all("projects", "WHERE id='$id'"));
    $project_name = $projects['project_name'];
    $project_type = $projects['project_type'];
    $clients = $projects['clients'];
    $authors = $projects['authors'];
    $budget = $projects['budget'];
    $starting_date = $projects['starting_date'];
    $completation_date = $projects['completation_date'];
    $project_image = $projects['project_image'];
} else {
    unset($_SESSION["edit_projects_id"]);
}
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <a class="breadcrumb-item" href="projects.php">projects</a>
        <span class="breadcrumb-item active">Manage projects</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-project_name"> Manage projects</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your working projects to fill up this form.</p>
           
            <div class="form-layout">
                <form action="submit_projects.php" method="post" enctype="multipart/form-data">
                    <div class="col-xl-12">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Project Name: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control <?= (isset($_SESSION['project_name_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_project_name"]) ? $_SESSION["old_project_name"] : "$project_name"; ?>" type="text" name="project_name" placeholder="Enter  project name">
                                    <?php if (isset($_SESSION['project_name_error'])) : ?>
                                        <small class="text-danger"><?= $_SESSION['project_name_error'] ?></small>
                                    <?php
                                        unset($_SESSION['project_name_error']);
                                    endif
                                    ?>
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Project Type: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control <?= (isset($_SESSION['project_type_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_project_type"]) ? $_SESSION["old_project_type"] : "$project_type"; ?>" type="text" name="project_type" placeholder="Enter  project type">
                                    <?php if (isset($_SESSION['project_type_error'])) : ?>
                                        <small class="text-danger"><?= $_SESSION['project_type_error'] ?></small>
                                    <?php
                                        unset($_SESSION['project_type_error']);
                                    endif
                                    ?>
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Clints Name: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control <?= (isset($_SESSION['clients_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_clients"]) ? $_SESSION["old_clients"] : "$clients"; ?>" type="text" name="clients" placeholder="Enter  Clints name">
                                    <?php if (isset($_SESSION['clients_error'])) : ?>
                                        <small class="text-danger"><?= $_SESSION['clients_error'] ?></small>
                                    <?php
                                        unset($_SESSION['clients_error']);
                                    endif
                                    ?>
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Authors Name: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control <?= (isset($_SESSION['authors_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_authors"]) ? $_SESSION["old_authors"] : "$authors"; ?>" type="text" name="authors" placeholder="Enter  project authors">
                                    <?php if (isset($_SESSION['authors_error'])) : ?>
                                        <small class="text-danger"><?= $_SESSION['authors_error'] ?></small>
                                    <?php
                                        unset($_SESSION['authors_error']);
                                    endif
                                    ?>
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Budget: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control <?= (isset($_SESSION['budget_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_budget"]) ? $_SESSION["old_budget"] : "$budget"; ?>" type="text" name="budget" placeholder="Enter  project budget">
                                    <?php if (isset($_SESSION['budget_error'])) : ?>
                                        <small class="text-danger"><?= $_SESSION['budget_error'] ?></small>
                                    <?php
                                        unset($_SESSION['budget_error']);
                                    endif
                                    ?>
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Starting Date: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control <?= (isset($_SESSION['starting_date_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_starting_date"]) ? $_SESSION["old_starting_date"] : "$starting_date"; ?>" type="date" name="starting_date">
                                    <?php if (isset($_SESSION['starting_date_error'])) : ?>
                                        <small class="text-danger"><?= $_SESSION['starting_date_error'] ?></small>
                                    <?php
                                        unset($_SESSION['starting_date_error']);
                                    endif
                                    ?>
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Completation Date: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control <?= (isset($_SESSION['completation_date_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_completation_date"]) ? $_SESSION["old_completation_date"] : "$completation_date"; ?>" type="date" name="completation_date">
                                    <?php if (isset($_SESSION['completation_date_error'])) : ?>
                                        <small class="text-danger"><?= $_SESSION['completation_date_error'] ?></small>
                                    <?php
                                        unset($_SESSION['completation_date_error']);
                                    endif
                                    ?>
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Project Image: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <label style="width:100% !important;" class="custom-file">
                                        <input type="file" id="file" name="project_image" value="<?= $images ?>" class="custom-file-input <?= (isset($_SESSION['project_image_error'])) ? 'is-invalid' : '' ?>">
                                        <span class="custom-file-control"></span>
                                    </label>
                                    <?php if (isset($_SESSION['project_image_error'])) : ?>
                                        <small class="text-danger"><?= $_SESSION['project_image_error'] ?></small>
                                    <?php
                                        unset($_SESSION['project_image_error']);
                                    endif
                                    ?>
                                </div>
                            </div>
                            <div class="form-layout-footer mg-t-30">
                                <button type="submit" name="<?= isset($_SESSION["edit_projects_id"]) ? "edit_projects" : "submit_projects" ?>" class="btn btn-info mg-r-5"><?= isset($_SESSION["edit_projects_id"]) ? "Update" : "Submit" ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    unset($_SESSION['old_project_name']);
    unset($_SESSION['old_message']);
    require_once "footer.inc.php";
    ?>