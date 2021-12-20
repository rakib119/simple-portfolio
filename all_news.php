<?php
require_once "header.inc.php";

?>
<!-- News -->
<section id="news" class="section bg-light">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-6" data-aos="fade-up">
                <h2 class="mb-3 mb-md-0">All News</h2>
            </div>
        </div>
        <div class="mt-5 pt-5">
            <div class="row-news row">
                <?php
                foreach (select_all('latest_news', "WHERE status=1 ORDER BY latest_news.title ASC ") as $latest_news) :
                ?>
                    <div class="col-news col-md-6 col-lg-4" data-aos="fade-in" data-aos-delay="0">
                        <figure class="position-relative">
                            <div class="position-relative">
                                <a href="news_details.php?id=<?= $latest_news['id'] ?>"><img alt="" class="w-100 d-block" src="img/news/<?= $latest_news['news_photo'] ?>"></a>
                                <mark class="date">12.03.2020</mark>
                            </div>
                            <figcaption>
                                <h5><a href="news_details.php?id=<?= $latest_news['id'] ?>"><?= $latest_news['title'] ?></a></h5><?= mb_substr($latest_news['news_details'], 0, 60) . "..." ?>
                            </figcaption>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<?php
require_once "footer.inc.php";
?>