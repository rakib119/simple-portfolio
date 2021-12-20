<?php
$social = "";
require_once('top.inc.php');
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <span class="breadcrumb-item active">social</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-icon">social</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your working social to fill up this form.</p>

            <div class="form-layout">
                <?php
                $row = mysqli_num_rows(select_all("social", ""));
                if ($row < 1) {
                    echo "<h6 class='text-danger text-center'>* No social added yet *</h6>";
                } else {
                ?>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">icon</th>
                                <th scope="col">social Details</th>
                                <th scope="col">social Photo</th>
                                <th width="10%" scope="col"></th>
                                <th width="10%" scope="col">Actions</th>
                                <th width="10%" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (select_all("social", "") as $social) :
                            ?>
                                <tr>
                                    <th scope="row"><?= ++$i ?></th>
                                    <td>
                                        <ion-icon name="<?= $social['icon'] ?>"></ion-icon>
                                    </td>
                                    <td><?= mb_substr($social['profile_link'], 0, 60) . "....." ?></td>

                                    <td scope="col">
                                        <a class="text-white" href="submit_social.php?id=<?= $social['id'] ?>&task=update_status">
                                            <button class="btn <?= ($social['status'] == 1) ? 'btn-teal active' : 'btn-warning' ?>  btn-block mg-b-10"><?= ($social['status'] == 1) ? 'Active' : 'Deactive' ?></button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <a class="text-white" href="manage_social.php?id=<?= $social['id'] ?>&task=edit">
                                            <button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-edit mg-r-10"></i> Edit
                                            </button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <button value="submit_social.php?id=<?= $social['id'] ?>&task=delete" class="btn btn-danger delete_row btn-block mg-b-10"> <i class="fa fa-trash mg-r-10"></i> Delete</button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
                <a href="manage_social.php">
                    <button class="btn btn-primary mg-b-10"><i class="fa fa-plus mg-r-10"></i>Add social</button>
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