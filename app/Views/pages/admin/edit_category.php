<!-- pages/admin/edit_category.php -->

<?php include 'head.php' ?>
<?php include 'header.php' ?>
<!-- SLIDER BAR START -->
<?php include 'slider_bar.php' ?>
<!-- SLIDER BAR END-->

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>
    <!-- End Navbar -->

    <!-- Display category details -->
    <div class="container mt-6">
        <div class="card my-4 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Edit Category</h6>
                </div>
            </div>
            <div class="card-body px-4 pb-2"> <!-- Added padding to the card body -->
                <form id="editCategoryForm" action="<?= base_url('admin/category/update') ?>" method="post">
                    <div class="mb-3">
                        <label for="editCategoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="editCategoryName" name="name" value="<?= esc($category['name']) ?>" style="border: 1px solid #ccc; border-radius: 5px; padding: 8px;">
                    </div>
                    <input type="hidden" id="editCategoryId" name="id" value="<?= esc($category['category_id']) ?>">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <?php include('footer_body.php')?>
</main>


<?php include 'setting.php' ?>
<!-- Core JS Files -->
<?php include 'footer.php' ?>
