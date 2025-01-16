<?php session_start(); ?>
<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>
<?php include '../../layout/topbar.php'; ?>
<?php include '../../../config/connection.php'; ?>

<?php
$categories = "SELECT * FROM product_categories";
$categories_run = mysqli_query($connection, "$categories");

$id = $_GET['id'];
$query = "SELECT * FROM products WHERE ID = $id";
$queryResult = mysqli_query($connection, $query);

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

                <?php unset($_SESSION['failed']); ?>

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
                        <h4 class="card-title">Product Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            if (mysqli_num_rows($queryResult) > 0) {
                                foreach ($queryResult as $item) {
                                    ?>
                                        <div class="d-flex">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="productName" class="form-label">Product Category</label>
                                                    <select disabled class="form-select my-1 my-md-0 me-sm-3" data-toggle="select2"
                                                        id="productCategory" name="category_id" required>
                                                        <option value="">Select any one</option>
                                                        <?php foreach ($categories_run as $category): ?>
                                                            <option value="<?php echo $category['id'] ?>" <?php echo $category['id'] == $item['category_id'] ? 'selected' : '' ; ?>>
                                                                <?php echo $category['category_name']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 ms-2">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Product Name</label>
                                                    <input readonly type="text" class="form-control" name="product_name" value="<?php echo $item['product_name'];?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex">

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Product Price</label>
                                                    <input readonly type="number" class="form-control" name="product_price" value="<?php echo $item['price'];?>"
                                                        placeholder="" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 ms-2">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Have discount</label>
                                                    <select disabled class="form-control" name="have_dis" id="have_discount" required>
                                                        <option value="">Select any one</option>
                                                        <option value="0" <?php echo $item['have_dis'] == 0 ? 'selected':'';?>>No</option>
                                                        <option value="1" <?php echo $item['have_dis'] == 1 ? 'selected':'';?>>Yes</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 ms-1 me-1 <?php echo $item['have_dis'] == 0 ? 'd-none':'d-block';?>" id="dis_amount">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Discount Amount</label>
                                                    <input readonly type="number" class="form-control" id="discount_amount"
                                                        name="dis_amount" value="<?php echo $item['dis_price'];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Preview Link</label>
                                                <input readonly type="text" class="form-control" name="link" value="<?php echo $item['preview_link'];?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Short Description</label>
                                                <input readonly type="text" class="form-control" name="short_dis" id="" value="<?php echo $item['product_short_info'];?>" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Long Description</label>
                                                <textarea readonly class="form-control" name="long_des" id="myEditor" rows="12"
                                                    placeholder=""><?php echo $item['product_details'];?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3 dropzone">
                                                <label for="productType" class="form-label">Product Image</label>
                                                <br>
                                                <input type="hidden" name="old_image" value="<?php echo $item['image'];?>">
                                                <img src="<?php echo "../../../upload/product_img/".$item['image'];?>" alt="" id="img" class="thum-image mt-3" width="150px" height="auto"
                                                    style="outline: none; border: none; background: transparent;">
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="productType" class="form-label">Status</label>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="active" <?php echo $item['status'] == 1 ? 'checked' : '' ?>
                                                    value="1"  required>
                                                <label class="form-check-label" for="active">Active</label>
                                            </div>
                                            <div class="form-check ms-2">
                                                <input class="form-check-input" type="radio" name="status" <?php echo $item['status'] == 0 ? 'checked' : '' ?>
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
                                    <a href="index.php" class="btn btn-danger">Retuen List</a>
                                </div>
                            </div>
                        <?php
                                }
                            } else {
                                echo "Data Not Found";
                            }
                            ?>
                </div>
            </div>
        </div>
    </div> <!-- container -->


    <?php include '../../layout/footer.php'; ?>