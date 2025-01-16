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
                        <h4 class="card-title">Add Work Experience Item</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="../../controller/work_exprience.php" method="POST">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Designation</label>
                                        <input type="text" class="form-control" name="designation" id="" placeholder=""
                                            required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Company name</label>
                                        <input type="text" class="form-control" name="company_name" id="" placeholder=""
                                            required>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Job Start Date</label>
                                            <input type="date" class="form-control" name="start_date" id=""
                                                placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 ms-3">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Job End Date</label>
                                            <input type="date" class="form-control" name="end_date" id="end_date"
                                                placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 ms-3 mt-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="continue"
                                                class="continue" id="flexCheckDefault" value="1">
                                            <label class="form-check-label" for="flexCheckDefault"> Continue </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Job Description</label>
                                        <textarea class="form-control" name="description" cols="137"
                                            rows="8"></textarea>
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
        const continueCheckbox = document.getElementById('flexCheckDefault');
        const endDateInput = document.getElementById('end_date');

        continueCheckbox.addEventListener('change', function () {
            if (this.checked) {
                endDateInput.disabled = true;
                endDateInput.value = "";
            } else {
                endDateInput.disabled = false;
            }
        });
    </script>
    <?php include '../../layout/footer.php'; ?>