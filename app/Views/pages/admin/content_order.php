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
                      <th class= "text-secondary  opacity-7">STT</th>
                      <th class= "text-secondary  opacity-7 ps-2">User</th>
                      <th class="text-center text-secondary  opacity-7">Create At</th>
                      <th class="text-center text-secondary  opacity-7">Total Amount</th>
                      <th class="text-center text-secondary  opacity-7">Status</th>
                      <th class="text-secondary opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php foreach ($orders as $index => $order): ?>
                            <tr>
                                <td class="align-middle"><?= $index + 1; ?></td>
                                <td class="align-middle"><?= $order['user']; ?></td>
                                <td class="align-middle text-center">
                                  <?php
                                  $orderDate = new DateTime($order['order_date']);
                                  $formatter = new IntlDateFormatter('vi_VN', IntlDateFormatter::MEDIUM, IntlDateFormatter::NONE);
                                  echo $formatter->format($orderDate);
                                  ?>
                              </td>

                                <td class="align-middle text-center"><?= $order['total_amount']; ?> $</td>
                                <td class="align-middle text-center"><?= $order['status']; ?></td>
                                <td class="align-middle">
                                            <a href="<?=base_url('/admin/order_detail/'.$order['order_id'])?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Show order detail">
                                                <i class="fas fa-edit"></i> Detail
                                            </a>
                                        </td>
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