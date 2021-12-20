<?php
$general_settings = "";
require_once('top.inc.php');
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <span class="breadcrumb-item active">general_settings</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">general_settings</h6>
            <p class="mg-b-20 mg-sm-b-30">Add general settingss to fill up this form.</p>
            <div class="form-layout">
                <?php
                $row = mysqli_num_rows(select_all("general_settings", ""));
                if ($row < 1) {
                    echo "<h6 class='text-danger text-center'>* general_settings do not added yet *</h6>";
                } else {
                ?>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Field Name</th>
                                <th scope="col">Value</th>
                                <th scope="col"></th>
                                <th scope="col">Action</th>
                                <th scope="col"></th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (select_all("general_settings", "") as $general_settings) :

                            ?>
                                <tr>
                                    <th scope="row"><?= ++$i ?></th>
                                    <td scope="col"><?= ucfirst($general_settings['field_name']) ?></td>
                                    <td scope="col"><?= $general_settings['value'] ?> </td>
                                    <td scope="col">
                                        <a class="text-white" href="submit_general_settings.php?id=<?= $general_settings['id'] ?>&&task=update_status">
                                            <button class="btn <?= ($general_settings['status'] == 1) ? 'btn-teal active' : 'btn-warning' ?>  btn-block mg-b-10"><?= ($general_settings['status'] == 1) ? 'Active' : 'Deactive' ?></button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <a class="text-white" href="manage_general_settings.php?id=<?= $general_settings['id'] ?>&&task=edit">
                                            <button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-edit mg-r-10"></i> Edit</button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <button value="submit_general_settings.php?id=<?= $general_settings['id'] ?>&&task=delete" class="btn btn-danger delete_row btn-block mg-b-10"> <i class="fa fa-trash mg-r-10"></i> Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
                <a href="manage_general_settings.php">
                    <button class="btn btn-primary mg-b-10"><i class="fa fa-plus mg-r-10"></i>Add General Settings</button>
                </a>
                <?php if (!single_value("cv")) : ?>
                    <a href="manage_general_settings.php?field='cv'">
                        <button class="btn btn-primary mg-b-10"><i class="fa fa-plus mg-r-10"></i>ADD CV</button>
                    </a>
                    <<?php endif ?> </div>
            </div>
        </div>
        <?php
        require_once "footer.inc.php";
        ?>