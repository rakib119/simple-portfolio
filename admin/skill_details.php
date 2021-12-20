<?php
$skill = "";
require_once('top.inc.php');
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <a class="breadcrumb-item" href="#">Skills</a>
        <span class="breadcrumb-item active">Manage Experiance</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Skill Details</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your Skill Details to fill up this form.</p>

            <div class="form-layout">
                <?php
                $row = mysqli_num_rows(select_all("skill_details", ""));
                if ($row < 1) {
                    echo "<h6 class='text-danger text-center'>* No data add yet *</h6>";
                } else {
                ?>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th width="10%" scope="col">No</th>
                                <th width="10%" scope="col">Skill Name</th>
                                <th width="10%" scope="col">Icon name</th>
                                <th width="40%" scope="col" class="text-center">Description</th>
                                <th width="10%" scope="col" class="text-center"></th>
                                <th width="10%" scope="col" class="text-center">Actions</th>
                                <th width="10%" scope="col" class="text-center"></th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (select_all("skill_details", "") as $skill_details) :
                            ?>
                                <tr>
                                    <td scope="row"><?= ++$i ?></td>
                                    <td scope="row"><?= $skill_details['skill_name'] ?></td>
                                    <td scope="row"><?= $skill_details['icon'] ?></td>
                                    <td scope="row"><?= $skill_details['skill_description'] ?></td>
                                    <td scope="col">
                                        <a class="text-white" href="submit_skill_details.php?id=<?= $skill_details['id'] ?>&task=update_status">
                                            <button class="btn <?= ($skill_details['status'] == 1) ? 'btn-teal active' : 'btn-warning' ?>  btn-block mg-b-10"><?= ($skill_details['status'] == 1) ? 'Active' : 'Deactive' ?></button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <a class="text-white" href="manage_skill_details.php?id=<?= $skill_details['id'] ?>&task=edit">
                                            <button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-edit mg-r-10"></i> Edit
                                            </button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <button class="btn btn-danger delete_row btn-block mg-b-10"> <i class="fa fa-trash mg-r-10"></i> Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
                <a href="manage_skill_details.php">
                    <button class="btn btn-primary mg-b-10"><i class="fa fa-plus mg-r-10"></i>Add Skill Details</button>
                </a>
            </div>
        </div>
    </div>
    <?php
    require_once "footer.inc.php";
    ?>