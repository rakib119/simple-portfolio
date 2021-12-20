<?php
$latest_news = "";
require_once('top.inc.php');
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <span class="breadcrumb-item active">Latest News</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Latest News</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your working Latest News to fill up this form.</p>

            <div class="form-layout">
                <?php
                $row = mysqli_num_rows(select_all("latest_news", ""));
                if ($row < 1) {
                    echo "<h6 class='text-danger text-center'>* No latest_news added yet *</h6>";
                } else {
                ?>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">News Details</th>
                                <th scope="col">News Photo</th>
                                <th width="10%" scope="col"></th>
                                <th width="10%" scope="col">Actions</th>
                                <th width="10%" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (select_all("latest_news", "") as $latest_news) :
                            ?>
                                <tr>
                                    <th scope="row"><?= ++$i ?></th>
                                    <td><?= $latest_news['title'] ?></td>
                                    <td><?= mb_substr($latest_news['news_details'], 0, 60) . "....." ?></td>
                                    <td><img src="../img/news/<?= $latest_news['news_photo'] ?>" alt="<?= $latest_news['title'] ?>" width="50"> </td>
                                    <td scope="col">
                                        <a class="text-white" href="submit_latest_news.php?id=<?= $latest_news['id'] ?>&task=update_status">
                                            <button class="btn <?= ($latest_news['status'] == 1) ? 'btn-teal active' : 'btn-warning' ?>  btn-block mg-b-10"><?= ($latest_news['status'] == 1) ? 'Active' : 'Deactive' ?></button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <a class="text-white" href="manage_latest_news.php?id=<?= $latest_news['id'] ?>&task=edit">
                                            <button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-edit mg-r-10"></i> Edit
                                            </button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <button value="submit_latest_news.php?id=<?= $latest_news['id'] ?>&task=delete" class="btn btn-danger delete_row btn-block mg-b-10"> <i class="fa fa-trash mg-r-10"></i> Delete</button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
                <a href="manage_latest_news.php">
                    <button class="btn btn-primary mg-b-10"><i class="fa fa-plus mg-r-10"></i>Add Latest News</button>
                </a>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['old_company_name']);
    unset($_SESSION['old_designation']);
    unset($_SESSION['old_duration']);
    require_once "footer.inc.php";
    ?>