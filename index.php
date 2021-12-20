<?php
require_once "header.inc.php";
?>
<!-- About -->
<section id="about" class="section">
  <div class="container">
    <h2 data-aos="fade-up">Just trust me.</h2>
    <section class="mt-4">
      <div class="row">
        <div class="col-md-6 col-lg-5 mb-5 mb-md-0" data-aos="fade-up">
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered </p>
          <div class="experience d-flex align-items-center">

            <div class="experience-number text-parallax"><?= single_value("experience") ?></div>
            <div class="text-dark mt-3 ml-4">Years<br> of experience</div>
          </div>
        </div>
        <div class="col-md-5 offset-lg-2" data-aos="fade-in" data-aos-delay="50">
          <?php
          foreach (select_all("skills", "WHERE status=1 ORDER BY parcentage DESC") as $skill) :
          ?>
            <h6 class="mt-0"><?= $skill['skill_name'] ?></h6>
            <div class="progress mb-5">
              <div class="progress-bar" role="progressbar" data-aos="width" style="width:<?= $skill['parcentage'] . "%" ?>" aria-valuenow="<?= $skill['parcentage'] ?>" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>
</section>

<section class="section bg-dark">
  <div class="container">
    <div class="container">
      <div class="row">
        <?php
        foreach (select_all("skill_details", "WHERE status=1") as $skill_details) :
        ?>
          <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-in">
            <ion-icon class="text-white" name="<?= $skill_details['icon'] ?>"></ion-icon>
            <h6 class="text-white"><?= $skill_details['skill_name'] ?></h6>
            <p><?= $skill_details['skill_description'] ?></p>
          </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>
  </div>
</section>

<!-- Experience -->
<section id="experience" class="section pb-0">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-md-6" data-aos="fade-up">
        <h2 class="mb-3 mb-md-0">Experience</h2>
      </div>
      <div class="col-md-5 offset-md-1 text-md-right">
        <h6 class="my-0 text-gray"><a download href="cv/<?= single_value("cv") ?>">Download my cv</a></h6>
      </div>
    </div>
    <div class="mt-5 pt-5">
      <?php
      foreach (select_all("experiance", "WHERE status=1") as $experiance) :
      ?>
        <div class="row-experience row justify-content-between" data-aos="fade-up">
          <div class="col-md-4">
            <div class="h6 my-0 text-gray"><?= $experiance['duration'] ?></div>
            <h5 class="mt-2 text-primary text-uppercase"><?= $experiance['company_name'] ?></h5>
          </div>
          <div class="col-md-4">
            <h5 class="mb-3 mt-0 text-uppercase"><?= $experiance['designation'] ?></h5>
          </div>
          <div class="col-md-4">
            <p><?= $experiance['description'] ?></p>
          </div>
        </div>
      <?php
      endforeach;
      ?>
    </div>
  </div>
</section>

<!-- Projects -->
<section id="projects" class="section">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-md-6" data-aos="fade-up">
        <h2 class="mb-3 mb-md-0">Featured projects</h2>
      </div>
      <div class="col-md-5 offset-md-1 text-md-right">
        <h6 class="my-0 text-gray"><a href="#">View all projects</a></h6>
      </div>
    </div>
    <div class="mt-5 pt-5" data-aos="fade-in">
      <div class="carousel-project owl-carousel">
        <?php
        foreach (select_all("projects", "WHERE status=1 ORDER BY id DESC") as $projects) :
        ?>
          <div class="project-item">
            <a href="#project<?= $projects['id'] ?>" class="popup-with-zoom-anim">
              <figure class="position-relative">
                <img alt="" class="w-100" src="img/projects/<?= $projects['project_image'] ?>">
                <figcaption class="text-white">
                  <h3 class="mb-2 text-white"><?= $projects['project_name'] ?></h3>
                </figcaption>
              </figure>
            </a>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>
<?php
foreach (select_all("projects", "WHERE status=1 ORDER BY id DESC") as $projects) :
?>
  <div id="project<?= $projects['id'] ?>" class="container mfp-hide zoom-anim-dialog">
    <h2 class="mt-0"><?= $projects['project_name'] ?></h2>
    <div class="mt-5 pt-2 text-dark">
      <div class="row">
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0">Clients:</h6>
          <span><?= $projects['clients'] ?></span>
        </div>
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0">Starting:</h6>
          <span><?= $projects['starting_date'] ?></span>
        </div>
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0">Project Type:</h6>
          <span><?= $projects['project_type'] ?></span>
        </div>
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0">Authors</h6>
          <span><?= $projects['authors'] ?></span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <h6 class="my-0">Budget:</h6>
          <span><?= $projects['budget'] ?></span>
        </div>
        <div class="col-md-6 col-lg-3">
          <h6 class="my-0">Completion</h6>
          <span><?= $projects['completation_date'] ?></span>
        </div>
      </div>
    </div>
    <img alt="" class="mt-5 pt-2 w-100" src="img/projects/<?= $projects['project_image'] ?>">
  </div>
<?php endforeach ?>


<!-- Testimonials -->
<section id="testimonials" class="testimonials section">
  <div class="container">

    <div class="carousel-testimonials owl-carousel">
      <?php
      foreach (select_all("testimonial", "WHERE status=1") as $testimonial) :
      ?>
        <div class="col-testimonial" data-aos="fade-up">
          <span class="quiote">"</span>
          <p data-aos="fade-up"><?= $testimonial['comment'] ?></p>
          <p class="mt-5 text-dark" data-aos="fade-up"><strong><?= $testimonial['name'] ?></strong> -<?= $testimonial['designation'] ?></p>
        </div>
      <?php
      endforeach;
      ?>
    </div>
  </div>
</section>

<!-- News -->
<section id="news" class="section bg-light">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-md-6" data-aos="fade-up">
        <h2 class="mb-3 mb-md-0">Latest news</h2>
      </div>
      <div class="col-md-5 offset-md-1 text-md-right">
        <h6 class="text-gray my-0"><a href="all_news.php">View all news</a></h6>
      </div>
    </div>
    <div class="mt-5 pt-5">
      <div class="row-news row">
        <?php
        foreach (select_all('latest_news', "WHERE status=1 ORDER BY latest_news.title ASC LIMIT 3") as $latest_news) :
        ?>
          <div class="col-news col-md-6 col-lg-4" data-aos="fade-in" data-aos-delay="0">
            <figure class="position-relative">
              <div class="position-relative">
                <a href="news_details.php?id=<?= $latest_news['id'] ?>"><img alt="<?= $latest_news['title'] ?>" class="w-100 d-block" src="img/news/<?= $latest_news['news_photo'] ?>"></a>
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

<!-- Partners -->
<section class="section-sm">
  <div class="container">
    <div class="row-partners row">
      <?php
      $i = 0;
      foreach (select_all("partners", "WHERE status=1 ") as $partners) :
      ?>
        <div class="col-partner col-md-6 col-lg-3" data-aos="fade-in">
          <img alt="" src="img/partners/<?= $partners['partner_image'] ?>" alt="<?= $partners['partner_name'] ?>">
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<?php
require_once "footer.inc.php";
?>