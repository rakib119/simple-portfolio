  <footer class="sl-footer">
      <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; <?= date('Y') ?>. Rakib Hasan. All Rights Reserved.</div>
      </div>
      <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Share:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
      </div>
  </footer>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <script src=" lib/jquery/jquery.js"></script>
  <script src=" lib/popper.js/popper.js"></script>
  <script src=" lib/bootstrap/bootstrap.js"></script>
  <script src=" lib/jquery-ui/jquery-ui.js"></script>
  <script src=" lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src=" lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
  <script src=" lib/d3/d3.js"></script>
  <script src=" lib/rickshaw/rickshaw.min.js"></script>
  <script src=" lib/chart.js/Chart.js"></script>
  <script src=" lib/Flot/jquery.flot.js"></script>
  <script src=" lib/Flot/jquery.flot.pie.js"></script>
  <script src=" lib/Flot/jquery.flot.resize.js"></script>
  <script src=" lib/flot-spline/jquery.flot.spline.js"></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script src=" js/starlight.js"></script>
  <script src=" js/ResizeSensor.js"></script>
  <script src=" js/dashboard.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      $(function() {

          'use strict';

          // Datepicker
          $('.fc-datepicker').datepicker({
              showOtherMonths: true,
              selectOtherMonths: true
          });

          $('#datepickerNoOfMonths').datepicker({
              showOtherMonths: true,
              selectOtherMonths: true,
              numberOfMonths: 2
          });


      });
  </script>
  <?php if (isset($_SESSION['success'])) : ?>
      <script>
          Swal.fire({
              position: 'center',
              icon: 'success',
              title: '<?= $_SESSION['success'] ?>',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
          })
      </script>
  <?php
        unset($_SESSION['success']);
    endif;
    ?>

  <script>
      $(".delete_row").click(function() {
          var link = $(this).val();
          Swal.fire({
              title: 'Are you sure?',
              text: "You want to delete this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = link;
              }
          })
      });
  </script>
  </body>

  </html>