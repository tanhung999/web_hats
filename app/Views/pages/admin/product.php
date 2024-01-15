 <?php include 'head.php' ?>
  <?php include 'header.php' ?>
    <!-- SLIDER BAR START -->
   <?php include 'slider_bar.php' ?>
    <!-- SLIDER BAR END-->
    <?php if(session()->getFlashdata('success')): ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            var successMessage = '<?= session()->getFlashdata('success') ?>';
            showAlert(successMessage, 'alert-success');
        });

        function showAlert(message, alertClass) {
            var alertBox = $('<div style="position: fixed; top: 5%; left: 50%; transform: translate(-50%, -50%); max-width: 300px;" class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' + message +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                '</div>');

            $('body').append(alertBox);

            alertBox.fadeIn();

            setTimeout(function () {
                alertBox.fadeOut();
            }, 3000);
        }
    </script>
<?php endif; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>
    <!-- End Navbar -->
    <?php include 'content_product.php' ?>
  </main>
  <?php include 'setting.php' ?>
  <!--   Core JS Files   -->
 <?php include 'footer.php' ?>