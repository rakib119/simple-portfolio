<?php
$usermanagement = "";
require_once('top.inc.php');
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <span class="breadcrumb-item active">User Management</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">User Management</h6>
            <p class="mg-b-20 mg-sm-b-30">Add general settingss to fill up this form.</p>
            <div class="form-layout">
                <?php
                $row = mysqli_num_rows(select_all("admin_user", ""));
                if ($row < 1) {
                    echo "<h6 class='text-danger text-center'>* admin_user do not added yet *</h6>";
                } else {
                ?>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email ID</th>
                                <th scope="col">Joining Date</th>

                                <th colspan="2" class="text-center">Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (select_all("admin_user", "") as $admin_user) :

                            ?>
                                <tr>
                                    <th scope="row"><?= ++$i ?></th>
                                    <td scope="col"><?= ucfirst($admin_user['name']) ?></td>
                                    <td scope="col"><?= $admin_user['email'] ?> </td>
                                    <td scope="col"><?= $admin_user['create_at'] ?> </td>
                                    <td scope="col">
                                        <a class="text-white" href="register_submit.php?id=<?= $admin_user['id'] ?>&task=update_status">
                                            <button class="btn <?= ($admin_user['status'] == 1) ? 'btn-teal active' : 'btn-warning' ?>  btn-block mg-b-10"><?= ($admin_user['status'] == 1) ? 'Active' : 'Deactive' ?></button>
                                        </a>
                                    </td>
                                    <td scope="col">

                                        <button value="register_submit.php?id=<?= $admin_user['id'] ?>&task=delete" class="btn btn-danger delete_row btn-block mg-b-10"> <i class="fa fa-trash mg-r-10"></i> Delete</button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
                <a href="register.php">
                    <button class="btn btn-primary mg-b-10"><i class="fa fa-plus mg-r-10"></i>Add New Admin</button>
                </a>
            </div>
        </div>
    </div>
    <?php
    require_once "footer.inc.php";
    ?>