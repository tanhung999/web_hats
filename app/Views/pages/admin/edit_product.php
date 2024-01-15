<?php include 'head.php' ?>
<?php include 'header.php' ?>
<!-- SLIDER BAR START -->
<?php include 'slider_bar.php' ?>
<!-- SLIDER BAR END-->

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>
    <!-- End Navbar -->

    <!-- Display product details for editing -->
    <div class="container mt-6">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Edit Product</h6>
                </div>
            </div>
            <div class="card-body px-4 pb-2">
                <form id="editProductForm" action="<?= base_url('admin/product/update') ?>" method="post" enctype="multipart/form-data">
               
                    <!-- Existing Image -->
                    <label for="editProductImageOld" class="form-label">Image Old:</label>
                    <div class="mb-3 text-center">
                        <?php if (!empty($product['image_url'])) : ?>
                            <img src="<?= esc(base_url($product['image_url'])) ?>" alt="Old Image" class="img-fluid rounded" style="max-width: 20%; height: auto;">
                        <?php else : ?>
                            <p>No image available</p>
                        <?php endif; ?>
                    </div>

                    <!-- New Image Input -->
                    <div class="mb-3">
                        <label for="editProductImage" class="form-label">New Image:</label>
                        <input type="file" class="form-control" id="editProductImage" name="image" accept="image/*">
                        <small class="text-muted">Upload a new image for the product.</small>
                    </div>


                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="editProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="editProductName" name="name" value="<?= esc($product['name']) ?>" style="border: 1px solid #ccc; border-radius: 5px; padding: 8px;">
                    </div>

                    <!-- Category Selection -->
                    <div class="mb-3">
                        <label for="editProductCategory" class="form-label">Category</label>
                        <select class="form-select" id="editProductCategory" name="category_id">
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= esc($category['category_id']) ?>" <?= ($category['category_id'] == $product['category_id']) ? 'selected' : '' ?>><?= esc($category['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Product Description -->
                    <div class="mb-3">
                        <label for="editProductDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editProductDescription" name="description" rows="3" style="border: 1px solid #ccc; border-radius: 5px; padding: 8px;"><?= esc($product['description']) ?></textarea>
                    </div>

                    <!-- Product Price -->
                    <div class="mb-3">
                        <label for="editProductPrice" class="form-label">Price</label>
                        <input type="text" class="form-control" id="editProductPrice" name="price" value="<?= esc($product['price']) ?>" style="border: 1px solid #ccc; border-radius: 5px; padding: 8px;">
                    </div>

                    <!-- Hidden Input for Product ID -->
                    <input type="hidden" id="editProductId" name="id" value="<?= esc($product['product_id']) ?>">

                    <!-- Save Changes Button -->
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
