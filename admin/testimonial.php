<?php
$testimonial = "";
require_once('top.inc.php');
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
                <?php
                $row = mysqli_num_rows(select_all("testimonial", ""));
                if ($row < 1) {
                    echo "<h6 class='text-danger text-center'>* Testimonial do not added yet *</h6>";
                } else {
                ?>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Name</th>
                                <th scope="col">comment</th>
                                <th scope="col"></th>
                                <th scope="col">Action</th>
                                <th scope="col"></th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (select_all("testimonial", "") as $testimonial) :

                            ?>
                                <tr>
                                    <th scope="row"><?= ++$i ?></th>
                                    <td scope="col"><?= $testimonial['name'] ?></td>
                                    <td scope="col"><?= $testimonial['designation'] ?> </td>
                                    <td scope="col"><?= $testimonial['comment'] ?> </td>
                                    <td scope="col">
                                        <a class="text-white" href="submit_testimonial.php?id=<?= $testimonial['id'] ?>&&task=update_status">
                                            <button class="btn <?= ($testimonial['status'] == 1) ? 'btn-teal active' : 'btn-warning' ?>  btn-block mg-b-10"><?= ($testimonial['status'] == 1) ? 'Active' : 'Deactive' ?></button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <a class="text-white" href="manage_testimonial.php?id=<?= $testimonial['id'] ?>&&task=edit">
                                            <button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-edit mg-r-10"></i> Edit</button>
                                        </a>
                                    </td>
                                    <td scope="col">
                                        <button value="submit_testimonial.php?id=<?= $testimonial['id'] ?>&&task=delete" class="btn btn-danger delete_row btn-block mg-b-10"> <i class="fa fa-trash mg-r-10"></i> Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
                <a href="manage_testimonial.php">
                    <button class="btn btn-primary mg-b-10"><i class="fa fa-plus mg-r-10"></i>Add Testimonial</button>
                </a>
            </div>
        </div>
    </div>
    <?php
    require_once "footer.inc.php";
    ?>