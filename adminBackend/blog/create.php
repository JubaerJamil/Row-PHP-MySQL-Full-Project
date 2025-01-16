<?php session_start(); ?>
<?php include '../layout/header.php'; ?>
<?php include '../layout/sidebar.php'; ?>
<?php include '../layout/topbar.php'; ?>
<?php include '../../config/connection.php'; ?>


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
                        <h4 class="card-title">Add Blog</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="../controller/blogs.php" method="POST" enctype="multipart/form-data">

                                <div class="d-flex">
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Blog Title</label>
                                            <input type="text" class="form-control" name="blog_titke" id="" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 ms-1">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Blog Subject</label>
                                            <input type="text" class="form-control" name="subject" required>
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

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="productType" class="form-label">Title Image</label>
                                        <input type="file" class="form-control" name="image"
                                            oninput="img.src=window.URL.createObjectURL(this.files[0])" required>
                                        <img src="" alt="" id="img" class="thum-image mt-3" width="200px" height="auto"
                                            style="outline: none; border: none; background: transparent;">
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

    <?php include '../layout/footer.php'; ?>