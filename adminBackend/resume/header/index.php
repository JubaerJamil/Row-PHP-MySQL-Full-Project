<?php session_start(); ?>
<?php include '../layout/header.php'; ?>
<?php include '../layout/sidebar.php'; ?>
<?php include '../layout/topbar.php'; ?>
<?php include '../../config/connection.php'; ?>

<?php
$query = "SELECT * FROM what_i_do ORDER BY id DESC";
$queryResult = mysqli_query($connection, $query);
$allList = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="page-content">

    <!-- Start Content-->
    <div class="page-container">


        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">What I Do Content</h4>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom border-light">
                        <div class="d-flex flex-wrap gap-2">
                            <div>
                                <a href="create.php" class="btn btn-primary"><i class="ti ti-plus me-1"></i>Add Item</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap mb-0" id="myTable">
                            <thead class="bg-light-subtle">
                                <tr>

                                    <th>SL No.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 120px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allList as $index => $item): ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><img width="80px" height="65px" src="<?php echo "../../upload/whatDo/" . $item['image']; ?>" alt="<?php echo $item['title']; ?>"></td>
                                        <td><?php echo $item['title']; ?></td>
                                        <td><?php echo $item['content']; ?></td>
                                        <td>
                                            <span
                                                class="badge bg-danger-subtle <?php echo $item['status'] == 1 ? 'text-success' : 'text-danger' ?> fs-12 p-1"><?php echo $item['status'] == 1 ? 'Active' : 'Inactive' ?></span>
                                        </td>
                                        <td class="pe-3">
                                            <div class="hstack gap-1 justify-content-end">
                                                <a href="edit.php?id=<?php echo $item['id']; ?>"
                                                    class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                        class="ti ti-edit fs-20"></i>
                                                </a>
                                                <form action="../controller/whatDo.php" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $item['id']?>">
                                                    <input type="hidden" name="image" value="<?php echo $item['image']?>">
                                                    <button type="submit" class="btn btn-soft-danger btn-icon btn-sm rounded-circle" onclick="return confirm('Are you sure! Delete this item')" name="deleteBtn"> <i class="ti ti-trash fs-20"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div> <!-- end card-->
            </div><!-- end col -->
        </div><!-- end row -->

    </div> <!-- container -->

    <?php include '../layout/footer.php'; ?>