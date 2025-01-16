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
                    <form action="../../controller/packages.php" method="POST">
                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Name</label>
                                            <input type="text" class="form-control" name="p_name" id="" placeholder="" required >
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Duration</label>
                                            <input type="text" class="form-control" name="p_duration" id="" placeholder="" required >
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Price</label>
                                            <input type="number" class="form-control" name="p_amount" id="" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Have any discount</label>
                                            <select class="form-control" name="have_dis" id="have_discount">
                                                <option value="">Select any one</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 ms-1 me-1 d-none" id="dis_amount">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Discount Amount</label>
                                            <input type="number" class="form-control" id="discount_amount" name="dis_amount" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 01</label>
                                            <input type="text" class="form-control" name="p_c_1" id="" placeholder="" >
                                        </div>
                                    </div>

                                     <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 02</label>
                                            <input type="text" class="form-control" name="p_c_2" id="" placeholder="" >
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 03</label>
                                            <input type="text" class="form-control" name="p_c_3" id="" placeholder="" >
                                        </div>
                                    </div>

                                     <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 04</label>
                                            <input type="text" class="form-control" name="p_c_4" id="" placeholder="" >
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 05</label>
                                            <input type="text" class="form-control" name="p_c_5" id="" placeholder="" >
                                        </div>
                                    </div>

                                     <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 06</label>
                                            <input type="text" class="form-control" name="p_c_6" id="" placeholder="" >
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Package Content 07</label>
                                            <input type="text" class="form-control" name="p_c_7" id="" placeholder="" >
                                        </div>
                                    </div>

                                     <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">It's Popular Item</label>
                                            <select class="form-control" name="popular" id="">
                                                <option value="">Select any one</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="productType" class="form-label">Status</label>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="active" value="1" required>
                                                <label class="form-check-label" for="active">Active</label>
                                            </div>
                                            <div class="form-check ms-2">
                                                <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
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