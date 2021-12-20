<?php
$skill = "";
require_once('top.inc.php');
$skill_name = $parcentage = '';
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_SESSION["edit_skill_id"]  = $_GET['id'];
    $skills = mysqli_fetch_assoc(select_all("skills", "WHERE id='$id'"));
    $skill_name = $skills['skill_name'];
    $parcentage = $skills['parcentage'];
} else {
    unset($_SESSION["edit_skill_id"]);
}
?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <a class="breadcrumb-item" href="#">Skills</a>
        <span class="breadcrumb-item active">Skill Percentage</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Manage Percentage</h6>
            <p class="mg-b-20 mg-sm-b-30">Add your precentage of skill to fill up this form.</p>
            
            <div class="form-layout">
                <form action="submit_skills.php" method="post">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Skill name: <span class="tx-danger">*</span></label>
                                <input class="form-control <?= (isset($_SESSION['skill_name_error'])) ? 'is-invalid' : '' ?>" value="<?= isset($_SESSION["old_skill_name"]) ? $_SESSION["old_skill_name"] : "$skill_name"; ?>" type="text" name="skill_name" placeholder="Skill name">
                                <?php if (isset($_SESSION['skill_name_error'])) : ?>
                                    <small class="text-danger"><?= $_SESSION['skill_name_error'] ?></small>
                                <?php
                                    unset($_SESSION['skill_name_error']);
                                endif
                                ?>
                            </div>

                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">

                                <label class="form-control-label">Percentage: <span class="tx-danger">*</span></label>
                                <input type="range" class="form-control" value="<?= isset($_SESSION["old_parcentage"]) ? $_SESSION["old_parcentage"] : "$parcentage"; ?>" name="parcentage" min="0" max="100">
                                <output for="parcentage" onforminput="value = parcentage.valueAsNumber;"></output>
                            </div>
                        </div>
                        <?php unset($_SESSION["old_parcentage"]) ?>
                    </div>
                    <div class="form-layout-footer">
                    <button type="submit" name="<?= isset($_SESSION["edit_skill_id"]) ? "edit_skills" : "submit_skills" ?>" class="btn btn-info mg-r-5"><?= isset($_SESSION["edit_skill_id"]) ? "Update" : "Submit" ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function modifyOffset() {
            var el, newPoint, newPlace, offset, siblings, k;
            width = this.offsetWidth;
            newPoint = (this.value - this.getAttribute("min")) / (this.getAttribute("max") - this.getAttribute("min"));
            offset = -1;
            if (newPoint < 0) {
                newPlace = 0;
            } else if (newPoint > 1) {
                newPlace = width;
            } else {
                newPlace = width * newPoint + offset;
                offset -= newPoint;
            }
            siblings = this.parentNode.childNodes;
            for (var i = 0; i < siblings.length; i++) {
                sibling = siblings[i];
                if (sibling.id == this.id) {
                    k = true;
                }
                if ((k == true) && (sibling.nodeName == "OUTPUT")) {
                    outputTag = sibling;
                }
            }
            outputTag.style.left = newPlace + "px";
            outputTag.style.marginLeft = offset + "%";
            outputTag.innerHTML = this.value;
        }

        function modifyInputs() {

            var inputs = document.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].getAttribute("type") == "range") {
                    inputs[i].onchange = modifyOffset;

                    // the following taken from http://stackoverflow.com/questions/2856513/trigger-onchange-event-manually
                    if ("fireEvent" in inputs[i]) {
                        inputs[i].fireEvent("onchange");
                    } else {
                        var evt = document.createEvent("HTMLEvents");
                        evt.initEvent("change", false, true);
                        inputs[i].dispatchEvent(evt);
                    }
                }
            }
        }

        modifyInputs();
    </script>
    <?php
    unset($_SESSION['old_company_name']);
    unset($_SESSION['old_designation']);
    unset($_SESSION['old_duration']);
    require_once "footer.inc.php";
    ?>