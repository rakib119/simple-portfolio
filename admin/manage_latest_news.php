<?php
$latest_news = "";
require_once('top.inc.php');
$title = $images = $news_details = '';
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_SESSION["edit_latest_news_id"]  = $_GET['id'];
    $latest_news = mysqli_fetch_assoc(select_all("latest_news", "WHERE id='$id'"));
    $title = $latest_news['title'];
    $images = $latest_news['news_photo'];
    $news_details = $latest_news['news_details'];
} else {
    unset($_SESSION["edit_latest_news_id"]);
}
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <a class="breadcrumb-item" href="latest_news.php">Latest News</a>
        <span class="breadcrumb-item active">Manage Latest News</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title"> Manage Latest News</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your working latest_news to fill up this form.</p>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong class="d-block d-sm-inline-block-force">Congratz! &nbsp</strong><?= $_SESSION['success'] ?>
                </div>
            <?php
                unset($_SESSION['success']);
            endif;
            ?>
            <div class="form-layout">
                <form action="submit_latest_news.php" method="post" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <input type="hidden" value="<?= $id ?>">
                            <div class="form-group">
                                <label class="form-control-label">News Title: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['title_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_title"]) ? $_SESSION["old_title"] : "$title"; ?>" type="text" name="title" placeholder="Enter News title">
                                <?php if (isset($_SESSION['title_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['title_error'] ?></small>
                                <?php
                                    unset($_SESSION['title_error']);
                                endif
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label class="form-control-label" for="file">News Title: <span class="tx-danger">*</span></label>
                            </div>
                            <label style="width:100% !important" class="custom-file">
                                <input type="file" id="file" name="news_photo" style="width: 100%;" value="<?= $images ?>" class="custom-file-input">
                                <span class="custom-file-control"></span>
                            </label>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">News Details: <span class="tx-danger">*</span></label>
                                <textarea type="text" name="news_details" class="form-control <?= (isset($_SESSION['news_details_error'])) ? 'is-invalid' : '' ?>" rows="4"><?= isset($_SESSION["old_news_details"]) ? $_SESSION["old_news_details"] : "$news_details" ?></textarea>
                                <?php if (isset($_SESSION['news_details_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['news_details_error'] ?></small>
                                <?php
                                    unset($_SESSION['news_details_error']);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-layout-footer">
                        <button type="submit" name="<?= isset($_SESSION["edit_latest_news_id"]) ? "edit_latest_news" : "submit_latest_news" ?>" class="btn btn-info mg-r-5"><?= isset($_SESSION["edit_latest_news_id"]) ? "Update" : "Submit" ?></button>
                        <!-- <button class="btn btn-secondary">Cancel</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    unset($_SESSION['old_title']);
    unset($_SESSION['old_news_details']);
    require_once "footer.inc.php";
    ?>