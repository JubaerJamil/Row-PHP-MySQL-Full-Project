<?php session_start(); ?>
<?php include '../layout/header.php'; ?>
<?php include '../layout/sidebar.php'; ?>
<?php include '../layout/topbar.php'; ?>
<?php include '../../config/connection.php'; ?>

<?php
$id = $_GET['id'];
$query = "SELECT * FROM review WHERE ID = $id";
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom border-dashed">
                        <h4 class="card-title">Edit Review</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            if (mysqli_num_rows($queryResult) > 0) {
                                foreach ($queryResult as $item) {
                                    ?>
                                    <form action="../controller/review.php" method="POST" enctype="multipart/form-data">

                                        <div class="d-flex">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Client Name</label>
                                                    <input type="text" class="form-control" name="c_name" value="<?php echo $item['client_name']; ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 ms-1">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Client Profession</label>
                                                    <input type="text" class="form-control" name="c_pro" value="<?php echo $item['client_pro']; ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 ms-1">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Rating</label>
                                                        <select name="raing" class="form-control">
                                                            <option value="">Select rating</option>
                                                            <option value="1" <?php echo $item['star'] == 1? 'selected' : '';?>>1</option>
                                                            <option value="2" <?php echo $item['star'] == 2? 'selected' : '';?>>2</option>
                                                            <option value="3" <?php echo $item['star'] == 3? 'selected' : '';?>>3</option>
                                                            <option value="4" <?php echo $item['star'] == 4? 'selected' : '';?>>4</option>
                                                            <option value="5" <?php echo $item['star'] == 5? 'selected' : '';?>>5</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Review</label>
                                                <textarea class="form-control" name="review"  rows="3"><?php echo $item['review']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="productType" class="form-label">Client Image</label>
                                                <input type="file" class="form-control" name="image"
                                                    oninput="img.src=window.URL.createObjectURL(this.files[0])">
                                                <img src="<?php echo "../../upload/review/" . $item['image']; ?>" alt=""
                                                    id="img" class="thum-image mt-3" width="200px" height="auto"
                                                    style="outline: none; border: none; background: transparent;">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="productType" class="form-label">Status</label>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="active"
                                                            value="1" <?php echo $item['status'] == 1 ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="active">Active</label>
                                                    </div>
                                                    <div class="form-check ms-2">
                                                        <input class="form-check-input" type="radio" name="status" id="inactive"
                                                            value="0" <?php echo $item['status'] == 0 ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="inactive">Inactive </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="card-footer border-top border-dashed text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                    <input type="hidden" name="old_image" value="<?php echo $item['image']; ?>">
                                    <button type="submit" name="editbtn" class="btn btn-primary">Update</button>
                                    <a href="index.php" class="btn btn-danger">Retuen List</a>
                                </div>
                            </div>
                            </form>
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


    <script>

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


    <?php include '../layout/footer.php'; ?>