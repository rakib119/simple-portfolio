  <!-- Footer -->
  <footer>
    <div class="section bg-dark py-5 pb-0">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6 class="text-white mb-4">Phone:</h6>
            <p class="text-white mb-4"><?= single_value("mobile_number") ?></p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6 class="text-white mb-4">Email:</h6>
            <p class="text-white mb-4"><?= single_value("email") ?></p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6 class="text-white mb-4">Follow me:</h6>
            <ul class="social-icons">
              <?php
              foreach (select_all("social", "WHERE status=1 ") as $social) :
              ?>
                <li><a target="blank" href="<?= $social['profile_link'] ?>">
                    <ion-icon name="<?= $social['icon'] ?>"></ion-icon>
                  </a></li>
              <?php endforeach ?>
            </ul>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6 class="text-white mb-4">Subscribe:</h6>
            <form method="post" action="send_message.php">
              <div class="input-group">
                <input name="email" type="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                  <button class="btn" name="subscribe" type="submit">Go</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copy section-sm">
      <div class="container">© Copyright <?= date("Y") ?> <?= single_value("author") ?>. All Rights Reserved</div>
    </div>
  </footer>

  <!-- Modal -->
  <div class="modal fade" id="send-request">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title mt-0">Send request</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Leave your contacts and our admin
            will contact you soon.</p>
          <form class="form-request" action="send_message.php" method="post">
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" required="" placeholder="Email *">
            </div>
            <div class="form-group">
              <textarea rows="3" name="message" class="form-control" placeholder="Message"></textarea>
            </div>

            <div class="form-group mb-0 text-right">
              <button name="submit" type="submit" class="btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script src="js/jarallax.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/interface.js"></script>
  </body>

  </html>

  <!-- <?php if (isset($_SESSION['success'])) : ?> -->
    <!-- <script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?= $_SESSION['success'] ?>',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
      })
    </script> -->
  <!-- <?php
  endif;
  ?> -->
  <?php
  unset($_SESSION['success']);
  unset($_SESSION['error']);
  ?>