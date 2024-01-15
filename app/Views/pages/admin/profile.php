<?php include 'head.php' ?>
  <?php include 'header.php' ?>
<body class="g-sidenav-show bg-gray-200">
<?php if(session()->getFlashdata('success')): ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            var successMessage = '<?= session()->getFlashdata('success') ?>';
            showAlert(successMessage);
        });

        function showAlert(message) {
            var alertBox = $('<div style="position: fixed; top: 50%; left: 60%; transform: translate(-50%, -50%); max-width: 300px;" class="alert alert-success alert-dismissible fade show" role="alert">' + message +
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


    <?php include 'slider_bar.php' ?>
    <?php if(session()->getFlashdata('validation')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Validation Error(s):</strong>
        <ul>
            <?php foreach (session()->getFlashdata('validation')->getErrors() as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <!-- Display the user image -->
                    <?php if (!empty($userData['image'])): ?>
                        <img src="<?= base_url('/' . $userData['image']); ?>" class="w-100 border-radius-lg shadow-sm" alt="<?= $userData['username']; ?>">
                    <?php else: ?>
                        <img src="<?= base_url('images/customer_default.jpg'); ?>" class="w-100 border-radius-lg shadow-sm" alt="<?= $userData['username']; ?>">  
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <!-- Display the user's full name and role -->
                    <h5 class="mb-1"><?= $userData['fullname']; ?></h5>
                    <p class="mb-0 font-weight-normal text-sm"><?= $userData['role']; ?></p>
                </div>
            </div>
        </div>
        <!-- The rest of your HTML content with user-specific data -->
        <div class="col-auto my-auto">
        <div class="h-100">
            <!-- Display the user's full name, email, and role -->
            <h5 class="mb-1"><?= $userData['role']; ?></h5>
            <p class="mb-0 font-weight-normal text-sm"><?= $userData['email']; ?></p>
            <p class="mb-0 font-weight-normal text-sm">Joined on <?= date('M d, Y', strtotime($userData['created_at'])); ?></p>
        </div>
    </div>
    </div>
    <!-- Display Success Message -->
   

<!-- Display Validation Errors -->

<div class="card card-plain mt-4">
    <div class="card-header pb-0 p-3">
        <h6 class="mb-0">Update Avatar</h6>
    </div>
    <div class="card-body p-3">
        <form action="<?= base_url('update-avatar'); ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="avatar" class="form-label">Choose Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Update Avatar</button>
        </form>
    </div>
</div>
   
    <?php include 'setting.php' ?>
  <!--   Core JS Files   -->
 <?php include 'footer.php' ?>
