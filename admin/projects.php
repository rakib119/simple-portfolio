<?php
$projects = "";
require_once('top.inc.php');
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <span class="breadcrumb-item active">projects</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-intro">projects</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your working projects to fill up this form.</p>

            <div class="form-layout">
                <?php
                $row = mysqli_num_rows(select_all("projects", ""));
                if ($row < 1) {
                    echo "<h6 class='text-danger text-center'>* No projects added yet *</h6>";
                } else {
                ?>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Project Type</th>
                                <th scope="col">Clients</th>
                                <th scope="col">Authors</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Project Photo</th>
                                <th width="10%" scope="col"></th>
                                <th width="10%" scope="col">Actions</th>
                                <th width="10%" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (select_all("projects", "") as $projects) :
                            ?>
                                <tr>
                                    <th scope="row"><?= ++$i ?></th>
                                    <td><?= $projects['project_name'] ?></td>
                                    <td><?= $projects['project_type'] ?></td>
                                    <td><?= $projects['clients'] ?></td>
                                    <td><?= $projects['authors'] ?></td>
                                    <td><?= $projects['budget'] ?></td>
                                    <td><img src="../img/projects/<?= $projects['project_image'] ?>" width="50"> </td>
                                    <td scope="col">
                                        <a class="text-white" href="submit_projects.php?id=<?= $projects['id'] ?>&task=update_status">
                                            <button class="btn <?= ($projects['status'] == 1) ? 'btn-teal active' : 'btn-warning' ?>  btn-block mg-b-10"><?= ($projects['status'] == 1) ? 'Active' : 'Deactive' ?></button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <a class="text-white" href="manage_projects.php?id=<?= $projects['id'] ?>&task=edit">
                                            <button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-edit mg-r-10"></i> Edit
                                            </button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <button value="submit_projects.php?id=<?= $projects['id'] ?>&task=delete" class="btn btn-danger delete_row btn-block mg-b-10"> <i class="fa fa-trash mg-r-10"></i> Delete</button>
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
                <a href="manage_projects.php">
                    <button class="btn btn-primary mg-b-10"><i class="fa fa-plus mg-r-10"></i>Add projects</button>
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