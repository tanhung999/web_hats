
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?php echo $title; ?>table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th  class="text-secondary opacity-7">STT</th>
                                <th  class="text-secondary opacity-7">Name</th>
                                <th  class="text-secondary opacity-7">Action</th>
                                <th  class="text-secondary opacity-7">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($categories as $index => $category): ?>
                                    <tr>
                                        <td class="align-middle"><?=  $index + 1; ?></td>
                                        <td class="align-middle"><?=  $category['name']; ?></td>
                                        <td class="align-middle">
                                            <a href="<?= base_url('admin/category/edit/' . $category['category_id']) ?>" class="text-secondary font-weight-bold text-xs">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete category" onclick="openCustomConfirm()">
                                                <i class="fas fa-trash-alt"></i> Delete
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

</div>
    
    <?php include('footer_body.php')?>
    <div style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);" id="overlay"></div>

    <div style="display: none; position: fixed; top: 40%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: #fff; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); z-index: 1000;" id="custom-confirm">
        <p>Bạn có thật sự muốn xoá không?</p>
        <button onclick="confirmDelete()" style="padding: 8px; background-color:#2ecc71; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Xác nhận</button>
        <button onclick="closeCustomConfirm()" style="margin-left: 100px; padding: 8px; background-color:#e74c3c; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Hủy</button>

    </div>


    <!-- Nội dung trang web của bạn tiếp theo ở đây -->

    <script>
        function openCustomConfirm() {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('custom-confirm').style.display = 'block';
        }

        function closeCustomConfirm() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('custom-confirm').style.display = 'none';
        }

        function confirmDelete() {
            // Đóng modal sau khi xác nhận
            closeCustomConfirm(); 
            // Thực hiện hành động xoá ở đây
            // Ví dụ: window.location.href = "xoa.php";
            alert("Trước khi xoá Category này, hãy xoá tất cả các Products.");
            
        }
    </script>
</div>

