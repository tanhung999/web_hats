<?php include('head.php') ?>

<body class="">
<div class="container position-sticky z-index-sticky top-0">
    <?php include('navbar_sign.php') ?>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body">
                <?php if (isset($validation)): ?>
                        <div class="alert alert-danger">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->has('error')): ?>
                        <div class="alert alert-danger">
                            <?= session('error') ?>
                        </div>
                <?php endif; ?>
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
                  <form role="form" method="post" action="<?= base_url('atc_register')?>">
                      <label class="form-label">Username:</label>
                      <div class="input-group input-group-outline ">
                        <input type="text" class="form-control" name="username" placeholder="Enter your name...">
                      </div>
                      <?php if (isset($validation) && $validation->hasError('email')): ?>
                          <div class="alert alert-danger"><?= $validation->getError('email') ?></div>
                      <?php endif; ?>
                      <label class="form-label">Email:</label>
                      <div class="input-group input-group-outline ">
                        <input type="email" class="form-control" name="email" placeholder="Enter your email...">
                      </div>
                      <label class="form-label">Password:</label>
                      <div class="input-group input-group-outline ">
                        <input type="password" class="form-control" name="password" placeholder="Enter your password...">
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                      </div>
                      </form>

                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="<?= base_url('login')?>" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main> 
<?php include('footer.php') ?>

