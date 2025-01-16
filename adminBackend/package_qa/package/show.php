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
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header border-bottom border-dashed">
                        <h4 class="card-title">Add Item</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <?php
                                $id = $_GET['id'];
                                $editQuery = "SELECT * FROM package_price WHERE id= $id";
                                $editQuery_run = mysqli_query($connection, $editQuery); 

                                if(mysqli_num_rows($editQuery_run) > 0) {
                                foreach($editQuery_run as $item) {
                            ?>
                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Name</label>
                                            <input readonly type="text" class="form-control" name="p_name" id="" value="<?php echo $item['p_name'];?>" required >
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Duration</label>
                                            <input readonly type="text" class="form-control" name="p_duration" id="" value="<?php echo $item['p_duration'];?>" required >
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Price</label>
                                            <input readonly type="number" class="form-control" name="p_amount" id="" value="<?php echo $item['p_price'];?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Have any discount</label>
                                            <select disabled class="form-control" name="have_dis" id="have_discount">
                                                <option value="">Select any one</option>
                                                <option value="1" <?php echo $item['have_dis'] == 1 ? 'selected' : '';?>>Yes</option>
                                                <option value="0" <?php echo $item['have_dis'] == 0 ? 'selected' : '';?>>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 ms-1 me-1 <?php echo $item['have_dis'] == 0 ? 'd-none' : 'd-block';?>">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Discount Amount</label>
                                            <input readonly type="number" class="form-control" id="discount_amount" name="dis_amount" value="<?php echo $item['p_dis_amount'];?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 01</label>
                                            <input readonly type="text" class="form-control" name="p_c_1" id="" value="<?php echo $item['item_1'];?>">
                                        </div>
                                    </div>

                                     <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 02</label>
                                            <input readonly type="text" class="form-control" name="p_c_2" id="" value="<?php echo $item['item_2'];?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 03</label>
                                            <input readonly type="text" class="form-control" name="p_c_3" id="" value="<?php echo $item['item_3'];?>">
                                        </div>
                                    </div>

                                     <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 04</label>
                                            <input readonly type="text" class="form-control" name="p_c_4" id="" value="<?php echo $item['item_4'];?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 05</label>
                                            <input readonly type="text" class="form-control" name="p_c_5" id="" value="<?php echo $item['item_5'];?>">
                                        </div>
                                    </div>

                                     <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 06</label>
                                            <input readonly type="text" class="form-control" name="p_c_6" id="" value="<?php echo $item['item_6'];?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 07</label>
                                            <input readonly type="text" class="form-control" name="p_c_7" id="" value="<?php echo $item['item_7'];?>">
                                        </div>
                                    </div>

                                     <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">It's Popular Item</label>
                                            <select disabled class="form-control" name="popular" id="">
                                                <option value="">Select any one</option>
                                                <option value="1" <?php echo $item['popular'] == 1 ? 'selected' : '';?>>Yes</option>
                                                <option value="0" <?php echo $item['popular'] == 0 ? 'selected' : '';?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="productType" class="form-label">Status</label>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input readonly class="form-check-input" type="radio" name="status" id="active" value="1" <?php echo $item['status'] == 1 ? 'checked' : '';?>>
                                                <label class="form-check-label" for="active">Active</label>
                                            </div>
                                            <div class="form-check ms-2">
                                                <input readonly class="form-check-input" type="radio" name="status" id="inactive" value="0" <?php echo $item['status'] == 0 ? 'checked' : '';?>>
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

                }else{
                    echo "data not found";
                }
                ?>
                </div>
            </div>
        </div>

    </div> <!-- container -->

    <?php include '../../layout/footer.php'; ?>