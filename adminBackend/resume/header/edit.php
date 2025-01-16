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
                        <h4 class="card-title">Edit Resume Header</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                                $id = $_GET['id'];
                                $editQuery = "SELECT * FROM resume_header WHERE id= $id";
                                $editQuery_run = mysqli_query($connection, $editQuery); 

                                if(mysqli_num_rows($editQuery_run) > 0) {
                                foreach($editQuery_run as $item) {
                            ?>
                            <form action="../../controller/resume_header.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $item['id'];?>">
                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo $item['name'];?>"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">designation</label>
                                            <input type="text" class="form-control" name="designation" value="<?php echo $item['designation'];?>"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $item['phone'];?>"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">E-mail</label>
                                            <input type="text" class="form-control" name="email" value="<?php echo $item['email'];?>"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Website</label>
                                            <input type="text" class="form-control" name="website" value="<?php echo $item['website'];?>"
                                                >
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" value="<?php echo $item['address'];?>"
                                                >
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Career Object</label>
                                        <textarea class="form-control" name="object" rows="7"><?php echo $item['object'];?></textarea>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="productType" class="form-label">Image</label>
                                        <input type="hidden" name="old_image" value="<?php echo $item['image'];?>">
                                        <input type="file" class="form-control" name="image"
                                            oninput="img.src=window.URL.createObjectURL(this.files[0])">
                                        <img src="<?php echo "../../../upload/resume/" . $item['image']; ?>" alt="" id="img" class="thum-image mt-3" width="150px" height="auto"
                                            style="outline: none; border: none; background: transparent;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer border-top border-dashed text-end">
                            <div class="d-flex justify-content-end gap-1">
                                <button type="submit" name="editbtn" class="btn btn-primary">Update</button>
                                <a href="create.php" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>

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