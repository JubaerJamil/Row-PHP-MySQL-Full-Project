<?php session_start(); ?>
<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>
<?php include '../../layout/topbar.php'; ?>
<?php include '../../../config/connection.php'; ?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php
$query = "SELECT * FROM resume_header";
$query_run = mysqli_query($connection, $query);
$allData = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
?>
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
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {

                }
                ?>

                <?php unset($_SESSION['status']); ?>

                <?php
                if (isset($_SESSION['failed']) && $_SESSION != '') {
                } ?>
                <?php
                if (isset($_SESSION['failed'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header border-bottom border-dashed">
                        <h4 class="card-title">Resume Header Part</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach($allData as $item):?>
                            <form action="../controller/resume_header.php" method="POST" enctype="multipart/form-data">
                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Name</label>
                                            <input readonly type="text" class="form-control" name="name" value="<?php echo $item['name'];?>"
                                                >
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">designation</label>
                                            <input readonly type="text" class="form-control" name="designation" value="<?php echo $item['designation'];?>"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Phone Number</label>
                                            <input readonly type="text" class="form-control" name="phone" value="<?php echo $item['phone'];?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">E-mail</label>
                                            <input readonly type="text" class="form-control" name="email" value="<?php echo $item['email'];?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Website</label>
                                            <input readonly type="text" class="form-control" name="website" value="<?php echo $item['website'];?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Address</label>
                                            <input readonly type="text" class="form-control" name="address" value="<?php echo $item['address'];?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Career Object</label>
                                        <textarea readonly class="form-control" name="object" rows="7"><?php echo $item['object'];?></textarea>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="productType" class="form-label">Image</label>
                                        <img src="<?php echo "../../../upload/resume/" . $item['image']; ?>" alt="" id="img" class="thum-image mt-3" width="150px" height="auto"
                                            style="outline: none; border: none; background: transparent;">
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="card-footer border-top border-dashed text-end">
                        <div class="d-flex justify-content-end gap-1">

                            <a type="submit" href="edit.php?id=<?php echo $item['id'];?>" class="btn btn-primary">Edit Header</a>
                        </div>
                    </div>
                    </form>
                    <?php endforeach ;?>
                </div>
            </div>
        </div>

    </div> <!-- container -->

    <?php include '../../layout/footer.php'; ?>