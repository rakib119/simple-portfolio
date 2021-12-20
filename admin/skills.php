<?php
$skill = "";
require_once('top.inc.php');
?>
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.php">Dashboard</a>
    <a class="breadcrumb-item" href="#">Skills</a>
    <span class="breadcrumb-item active">Skill Percentage</span>
  </nav>

  <div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Skill Percentage</h6>
      <p class="mg-b-20 mg-sm-b-30">Add your precentage of skill to fill up this form.</p>

      <div class="form-layout">
        <?php
        $row = mysqli_num_rows(select_all("skills", ""));
        if ($row < 1) {
          echo "<h6 class='text-danger text-center'>* No skill added yet *</h6>";
        } else {
        ?>
          <table class="table table-hover ">
            <thead>
              <tr>
                <th width="10%" scope="col">No</th>
                <th width="20%" scope="col">Skill Name</th>
                <th width="40%" scope="col">progress</th>
                <th width="10%" scope="col"></th>
                <th width="10%" scope="col">Actions</th>
                <th width="10%" scope="col"></th>
            </thead>
            <tbody>
              <?php
              $i = 0;
              foreach (select_all("skills", "") as $skill) :
              ?>
                <tr>
                  <th scope="row"><?= ++$i ?></th>
                  <td scope="col"><?= $skill['skill_name'] ?></td>
                  <td scope="col">
                    <div class="progress mg-b-10">
                      <div class="progress-bar progress-bar-striped" style="width: <?= $skill['parcentage'] . "%" ?>;" role="progressbar" aria-valuenow="<?= $skill['parcentage'] ?>" aria-valuemin="0" aria-valuemax="100"><?= $skill['parcentage'] ?>%</div>
                    </div>
                  </td>
                  <td scope="col">
                    <a class="text-white" href="submit_skills.php?id=<?= $skill['id'] ?>&task=update_status">
                      <button class="btn <?= ($skill['status'] == 1) ? 'btn-teal active' : 'btn-warning' ?>  btn-block mg-b-10"><?= ($skill['status'] == 1) ? 'Active' : 'Deactive' ?></button>
                    </a>
                  </td>
                  <td scope="col">
                    <a class="text-white" href="manage_skills.php?id=<?= $skill['id'] ?>&task=edit">
                      <button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-edit mg-r-10"></i> Edit
                      </button>
                    </a>
                  </td>
                  <td scope="col">
                    <button value="submit_skills.php?id=<?= $skill['id'] ?>&task=delete" class="btn btn-danger delete_row btn-block mg-b-10"> <i class="fa fa-trash mg-r-10"></i> Delete</button>
                  </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php } ?>
        <a href="manage_skills.php">
          <button class="btn btn-primary mg-b-10"><i class="fa fa-plus mg-r-10"></i>Add Skills</button>
        </a>
      </div>
    </div>
  </div>
  <?php
  require_once "footer.inc.php";
  ?>