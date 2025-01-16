<?php session_start(); ?>
<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>
<?php include '../../layout/topbar.php'; ?>
<?php include '../../../config/connection.php'; ?>

<?php
$categories = "SELECT * FROM product_categories";
$categories_run = mysqli_query($connection, "$categories");
?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="page-content">

    <!-- Start Content-->
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0"></h4>
            </div>

            <div class="text-end">
                <?php
                if (isset($_SESSION['success']) && $_SESSION != '') {
                } ?>
                <?php
                if (isset($_SESSION['success'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['success']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {

                }
                ?>

                <?php unset($_SESSION['success']); ?>

                <?php
                if (isset($_SESSION['failed']) && $_SESSION != '') {
                } ?>
                <?php
                if (isset($_SESSION['failed'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['failed']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {

                }
                ?>

                <?php unset($_SESSION['failed']); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header border-bottom border-dashed">
                        <h4 class="card-title">Add Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="../../controller/product.php" method="POST" enctype="multipart/form-data">
                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Product Category</label>
                                            <select class="form-select my-1 my-md-0 me-sm-3" data-toggle="select2"
                                                id="productCategory" name="category_id" required>
                                                <option value="">Select any one</option>
                                                <?php foreach ($categories_run as $category): ?>
                                                    <option value="<?php echo $category['id'] ?>">
                                                        <?php echo $category['category_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" name="product_name" id="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Product Price</label>
                                            <input type="number" class="form-control" name="product_price" id=""
                                                placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Have discount</label>
                                            <select class="form-control" name="have_dis" id="have_discount" required>
                                                <option value="">Select any one</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 ms-1 me-1 d-none" id="dis_amount">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Discount Amount</label>
                                            <input type="number" class="form-control" id="discount_amount"
                                                name="dis_amount" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Preview Link</label>
                                        <input type="text" class="form-control" name="link" id="">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Short Description</label>
                                        <input type="text" class="form-control" name="short_dis" id="" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Long Description</label>
                                        <textarea class="form-control" name="long_des" id="myEditor" rows="12"
                                            placeholder=""></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3 dropzone">
                                        <label for="productType" class="form-label">Image</label>
                                        <p style="font-size: 12px; color:black; margin-bottom: 0;">please upload 1200 x
                                            1200 px image for perfect view</p>
                                        <input type="file" name="image" id="multi_images" onchange="previewImages()"
                                            required>
                                        <div id="previewContainer"></div>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="productType" class="form-label">Status</label>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="active"
                                                    value="1" required>
                                                <label class="form-check-label" for="active">Active</label>
                                            </div>
                                            <div class="form-check ms-2">
                                                <input class="form-check-input" type="radio" name="status" id="inactive"
                                                    value="0">
                                                <label class="form-check-label" for="inactive">Inactive </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="card-footer border-top border-dashed text-end">
                        <div class="d-flex justify-content-end gap-1">
                            <button type="submit" name="savebtn" class="btn btn-primary">Save</button>
                            <a href="index.php" class="btn btn-danger">Retuen List</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div> <!-- container -->

    <script>
        function previewImages() {
            var previewContainer = document.getElementById('previewContainer');
            previewContainer.innerHTML = ''; // Clear any existing previews

            var files = document.getElementById('multi_images').files;

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.width = '150px';
                img.style.height = '150px';
                img.style.margin = '5px';
                previewContainer.appendChild(img);
            }
        }

        document.getElementById('have_discount').addEventListener('change', function () {
            const discount_amount = document.getElementById('discount_amount');
            const discountDiv = document.getElementById('dis_amount');
            const selectedValue = this.value;

            if (selectedValue === "1") {
                discountDiv.classList.remove('d-none');
                discountDiv.classList.add('d-block');
            } else {
                discountDiv.classList.remove('d-block');
                discountDiv.classList.add('d-none');
                discount_amount.value = '';
            }
        });
    </script>

    <?php include '../../layout/footer.php'; ?>