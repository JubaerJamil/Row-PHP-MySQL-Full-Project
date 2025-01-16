<?php session_start(); ?>
<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>
<?php include '../../layout/topbar.php'; ?>
<?php include '../../../config/connection.php'; ?>

<?php 
    $categories = "SELECT * FROM portfolio_categories";
    $categories_run = mysqli_query($connection,"$categories");
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
                if (isset($_SESSION['status']) && $_SESSION != '') {
                } ?>
                <?php
                if (isset($_SESSION['status'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {

                }
                ?>

                <?php unset($_SESSION['status']); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header border-bottom border-dashed">
                        <h4 class="card-title">Add Item</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                    <form action="../../controller/project_item.php" method="POST" enctype="multipart/form-data">
                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Project Category</label>
                                                <select class="form-select my-1 my-md-0 me-sm-3" data-toggle="select2" id="productCategory" name="category_id" required>
                                                    <option value="">Select any one</option>
                                                    <?php foreach($categories_run as $category):?>
                                                        <option value="<?php echo $category['id']?>"><?php echo $category['name'];?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Service Title</label>
                                            <input type="text" class="form-control" name="service_title" id="" placeholder="" required >
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Service Name</label>
                                            <input type="text" class="form-control" name="service_name" id="" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Technology Name</label>
                                            <input type="text" class="form-control" name="technology_name" id="" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Client Name</label>
                                            <input type="text" class="form-control" name="client_name" id="" placeholder="" >
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Preview Link</label>
                                            <input type="text" class="form-control" name="preview_link" id="" placeholder="" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Content</label>
                                        <textarea class="form-control" name="content" id="myEditor" rows="12"
                                            placeholder=""></textarea>
                                    </div>
                                </div>




                                <div class="col-lg-12">
                                    <div class="mb-3 dropzone">
                                        <label for="productType" class="form-label">Image</label>
                                        <p style="font-size: 12px; color:black; margin-bottom: 0;">please upload 1200 x 1200 px image for perfect view</p>
                                        <input type="file" name="image[]" id="multi_images" multiple onchange="previewImages()" required>
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
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="inactive" value="0">
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
    </script>

    <?php include '../../layout/footer.php'; ?>