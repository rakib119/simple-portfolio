<?php
require_once('top.inc.php');
?>
<div class="sl-mainpanel">

    <div class="mailbox-content">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <a class="breadcrumb-item" href="index.html">Mailbox</a>
            <span class="breadcrumb-item active">Inbox</span>
        </nav>

        <div class="pd-t-25 pd-x-25">
            <div class="mailbox-content-header">
                <div>
                    <div class="btn-group mg-b-0 mg-r-5 hidden-lg-up">
                        <button id="showMailboxLeft" class="btn btn-dark"><i class="icon ion-navicon-round tx-16"></i></button>
                    </div>
                    <div class="btn-group mg-b-0 hidden-xs-down">
                        <button class="btn btn-secondary"><i class="icon ion-ios-flag-outline tx-24"></i></button>
                        <button class="btn btn-secondary"><i class="icon ion-ios-box-outline tx-24"></i></button>
                        <button class="btn btn-secondary disabled"><i class="icon ion-ios-trash-outline tx-20"></i></button>
                        <button class="btn btn-secondary"><i class="icon ion-ios-pricetags-outline tx-20"></i></button>
                    </div>
                </div>
                <div class="mg-l-auto">
                    <span class="mg-r-5 hidden-xs-down">1 - 30 of 2,322</span>
                    <div class="btn-group mg-b-0">
                        <button class="btn btn-secondary disabled"><i class="icon ion-ios-arrow-back tx-20"></i></button>
                        <button class="btn btn-secondary"><i class="icon ion-ios-arrow-forward tx-20"></i></button>
                    </div>

                    <div class="btn-group mg-b-0 mg-l-5">
                        <button class="btn btn-secondary"><i class="icon ion-ios-gear-outline tx-20"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-hover mg-t-25 mg-b-0">
            <tbody>
                <?php foreach (select_all("contact_us") as $contact) : ?>
                    <tr class="bg-<?= ($contact['status'] == "unread") ? "dark" : "" ?>">
                        <td width="5%" class="valign-middle">
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td width="15%">
                            <a href="mail-details.php?id=<?= $contact['id'] ?>">
                                <p class="mg-b-0 text-<?= ($contact['status'] == "unread") ? "white" : "dark" ?>"> <?= $contact["name"] ?> </p>
                            </a>
                        </td>

                        <td class="valign-middle">
                            <a href="mail-details.php?id=<?= $contact['id'] ?>">
                                <p class="mg-b-0 text-<?= ($contact['status'] == "unread") ? "white" : "dark" ?>">
                                    <?= $contact['message'] ?>
                                </p>
                            </a>
                        </td>
                        <td>
                            <?php
                            if ($contact['status'] == "unread") {
                                $title = "Mark as read";
                                $icon = "ion-android-drafts";
                            } else {
                                $title = "Mark as unread";
                                $icon = "ion-android-mail";
                            }
                            ?>
                            <a title="Delete" onclick="<?php delete_row("contact_us", "id=$id") ?>"><i class="mr-3 text-dark menu-item-icon ion-android-delete tx-20"></i></a>
                            <a title="<?= $title ?>" href=""><i class="text-dark menu-item-icon icon <?= $icon ?>   tx-20"></i></a>
                        </td>
                        <td width="10%" class="valign-middle text-<?= ($contact['status'] == "unread") ? "white" : "dark" ?>">Nov 5, 2017</td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once "footer.inc.php";
?>