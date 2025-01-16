<?php session_start(); ?>
<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>
<?php include '../../layout/topbar.php'; ?>
<?php include '../../../config/connection.php'; ?>

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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header border-bottom border-dashed">
                        <h4 class="card-title">Edit Item</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $id = $_GET['id'];
                            $editQuery = "SELECT * FROM portfolio_categories WHERE ID= $id";
                            $editQuery_run = mysqli_query($connection, $editQuery);

                            if (mysqli_num_rows($editQuery_run) > 0) {
                                foreach ($editQuery_run as $item) {
                                    ?>
                                    <form action="../../controller/p_category.php" method="POST" enctype="multipart/form-data">
                                        <div class="col-lg-12">
                                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                            <div class="mb-3">
                                                <label for="productName" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" name="name" id="" value="<?php echo $item['name']; ?>" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="productType" class="form-label">Status</label>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="active" <?php echo $item['status'] == 1 ? 'checked' : '';?>
                                                            value="1">
                                                        <label class="form-check-label" for="active">Active</label>
                                                    </div>
                                                    <div class="form-check ms-2">
                                                        <input class="form-check-input" type="radio" name="status" id="inactive" <?php echo $item['status'] == 0 ? 'checked' : '';?>
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
                                    <button type="submit" name="updatebtn" class="btn btn-primary">Save</button>
                                    <a href="index.php" class="btn btn-danger">Retuen List</a>
                                </div>
                            </div>
                            </form>
                        <?php
                                }
                            } else {
                                echo "data not found";
                            }
                        ?>


                </div>
            </div>
        </div>

    </div> <!-- container -->

    <?php include '../../layout/footer.php'; ?>