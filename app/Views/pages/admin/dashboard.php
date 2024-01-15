<?php
                if (isset($data['title'])) {
                   $title =  $data['title'];
                }
        ?>
  <?php include 'head.php' ?>
  <?php include 'header.php' ?>
    <!-- SLIDER BAR START -->
    <?php if (session()->has('success')): ?>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
        $(document).ready(function () {
            var successMessage = '<?= session('success') ?>';
            showAlert(successMessage);
        });

        function showAlert(message) {
            var alertBox = $('<div class="custom-alert">' + message + '</div>');
            $('body').append(alertBox);

            alertBox.fadeIn();

            setTimeout(function () {
                alertBox.fadeOut();
            }, 3000);
        }
    </script>
    <?php endif; ?>
    
   <?php include 'slider_bar.php' ?>
    <!-- SLIDER BAR END-->
    
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>
    <!-- End Navbar -->
    <?php include 'content_dashboard.php' ?>
  </main>
  <?php include 'setting.php' ?>
  <!--   Core JS Files   -->
 <?php include 'footer.php' ?>