<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"><?php echo $title; ?> table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-secondary opacity-7">STT</th>
                            <th class="text-secondary opacity-7">Author</th>
                            <th class="text-secondary opacity-7 ps-2">Role</th>
                            <th class="text-center text-secondary opacity-7">Email</th>
                            <th class="text-center text-secondary opacity-7">Create At</th>
                            <!-- <th class="text-secondary opacity-7">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $index => $user): ?>
                            <tr>
                                <td class="align-middle"><?= $index + 1; ?></td>
                                <td>
                                      <div class="d-flex px-2 py-1">
                                          <div>
                                              <!-- Check if user has an image, otherwise display a default image -->
                                              <?php if (!empty($user['image'])): ?>
                                                  <img src="<?= base_url('/' . $user['image']); ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="<?= $user['username']; ?>">
                                              <?php else: ?>
                                                <img src="<?= base_url('images/customer_default.jpg'); ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="<?= $user['username']; ?>">  
                                              <?php endif; ?>
                                          </div>
                                          <div class="d-flex flex-column justify-content-center">
                                              <!--FUllname -->
                                              <h6 class="mb-0 text-sm"><?= $user['fullname']; ?></h6>
                                              <p class="text-xs text-secondary mb-0"><?= $user['username']; ?></p>
                                          </div>
                                      </div>
                                  </td>

                                <td><?= $user['role']; ?></td>
                                <td class="align-middle text-center text-sm">
                                  <h6 class="mb-0 text-sm"><?= $user['email']; ?></h6>
                                </td>
                                <td class="align-middle text-center">
                                    <!-- Date -->
                                    <?php
                                    $registrationDate = new DateTime($user['created_at']);
                                    $formattedDate = $registrationDate->format('d/m/y');
                                    ?>
                                    <span class="text-secondary text-xs font-weight-bold"><?= $formattedDate; ?></span>
                                </td>
                                <!-- <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit customer">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('footer_body.php')?>
    </div>