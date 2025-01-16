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
                        <h4 class="card-title">Add Item</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                                $id = $_GET['id'];
                                $editQuery = "SELECT * FROM what_i_do WHERE id= $id";
                                $editQuery_run = mysqli_query($connection, $editQuery); 

                                if(mysqli_num_rows($editQuery_run) > 0) {
                                foreach($editQuery_run as $item) {
                            ?>
                            <form action="../controller/whatDo.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $item['id'];?>">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id="" placeholder="" value="<?php echo $item['title'];?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Content</label>
                                        <textarea class="form-control" name="content" id="" rows="7"
                                            placeholder=""><?php echo $item['content'];?></textarea>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="productType" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" oninput="img.src=window.URL.createObjectURL(this.files[0])">
                                        <input type="hidden" name="old_image" value="<?php echo $item['image'];?>">
                                        <img src="<?php echo "../../upload/whatDo/".$item['image'];?>" alt="" id="img" class="thum-image mt-3" width="150px" height="auto"
                                            style="outline: none; border: none; background: transparent;">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="productType" class="form-label">Status</label>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="active" <?php echo $item['status'] == 1 ? 'checked' : '';?>
                                                    value="1" required>
                                                <label class="form-check-label" for="active">Active</label>
                                            </div>
                                            <div class="form-check ms-2">
                                                <input class="form-check-input" type="radio" name="status" <?php echo $item['status'] == 0 ? 'checked' : '';?>
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
                                <button type="submit" name="editbtn" class="btn btn-primary">Update</button>
                                <a href="index.php" class="btn btn-danger">Retuen List</a>
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

    <?php include '../layout/footer.php'; ?>