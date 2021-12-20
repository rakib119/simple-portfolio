<?php
require_once "header.inc.php";
if (!array_key_exists("id", $_GET) || $_GET['id'] == '' || !is_numeric($_GET['id'])) {
?>
    <script>
        window.location.href = "index.php";
    </script>
<?php
} else {
    $id = $_GET['id'];
    $single_news = mysqli_fetch_assoc(select_all('latest_news', "WHERE status=1 and id=$id"));
}
?>
<section class="section">
    <div class="container">
        <h2 data-aos="fade-up"><?= ucfirst($single_news['title'])  ?></h2>
        <section class="mt-4">
            <div class="row">
                <div class="col-md-12 col-lg-12 mb-12 mb-md-12" data-aos="fade-up">
                    <div class="square">
                        <div>
                            <img class="news_photo" src="img/news/<?= $single_news['news_photo'] ?>" alt="" sizes="100" srcset="">
                            <p class="news_photo"> <b>Caption:</b> <?= ucfirst($single_news['title'] )?></p>
                        </div>
                        <p class="news_details"><?= $single_news['news_details'] ?>
                        </p>

                    </div>
                </div>
                <div class="col-md-5 offset-lg-2" data-aos="fade-in" data-aos-delay="50">
                </div>
            </div>
        </section>
    </div>
</section>
<?php
require_once "footer.inc.php";
?>