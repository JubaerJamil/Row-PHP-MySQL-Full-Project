<?php session_start(); ?>
<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>
<?php include '../../layout/topbar.php'; ?>
<?php include '../../../config/connection.php'; ?>

<?php

$query = "SELECT 
            portfolio_item.*, 
            portfolio_categories.*,
            portfolio_item.id AS item_id,
            portfolio_item.status AS item_status,
            portfolio_categories.id AS category_id,
            portfolio_categories.status AS category_status
          FROM portfolio_item
          LEFT JOIN portfolio_categories 
            ON portfolio_categories.id = portfolio_item.portfolio_category_id
          ORDER BY portfolio_item.id DESC";

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
                <h4 class="fs-18 fw-semibold mb-0">Project List</h4>
                
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
                if (isset($_SESSION['error']) && $_SESSION != '') {
                } ?>
                <?php
                if (isset($_SESSION['error'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['error']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {

                }
                ?>

                <?php unset($_SESSION['error']); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom border-light">
                        <div class="d-flex justify-content-end flex-wrap gap-2">
                            <div>
                                <a href="create.php" class="btn btn-primary"><i class="ti ti-plus me-1"></i>Add Item</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap mb-0" id="myTable">
                            <?php
                            //  var_dump($allList); 
                             ?>
                            <thead class="bg-light-subtle">
                                <tr>

                                    <th>SL No.</th>
                                    <th>Project Category</th>
                                    <th>Service Title</th>
                                    <th>Service Name</th>
                                    <th>Client Name</th>
                                    <th>Technolony Use</th>
                                    <th>Preview Link</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 120px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allList as $index => $item): ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $item['name']; ?></td>
                                        <td><?php echo $item['service_title']; ?></td>
                                        <td><?php echo $item['service_name']; ?></td>
                                        <td><?php echo $item['client_name']; ?></td>
                                        <td><?php echo $item['Technologies']; ?></td>
                                        <td><?php echo $item['view_link']; ?></td>
                                        <td>
                                            <span class="badge bg-danger-subtle <?php echo $item['item_status'] == 1 ? 'text-success' : 'text-danger' ?> fs-12 p-1"><?php echo $item['item_status'] == 1 ? 'Active' : 'Inactive' ?></span>
                                        </td>
                                        <td class="pe-3">
                                            <div class="hstack gap-1 justify-content-end">
                                                <a href="show.php?id=<?php echo $item['item_id']; ?>"
                                                    class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i class="fa-regular fa-eye fs-4"></i>
                                                </a>

                                                <a href="edit.php?id=<?php echo $item['item_id']; ?>"
                                                    class="btn btn-soft-success btn-icon btn-sm rounded-circle"> 
                                                    <i class="fa-solid fa-pen-to-square fs-4"></i>
                                                </a>
                                                <form action="../../controller/project_item.php" method="POST">
                                                    <input type="hidden" name="delete_id" value="<?php echo $item['item_id']?>">
                                                    <button type="submit" class="btn btn-soft-danger btn-icon btn-sm rounded-circle" 
                                                    onclick="return confirm('Are you sure! Delete this item')" name="deleteBtn"><i class="fa-solid fa-trash-can fs-4"></i></button>
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

    <?php include '../../layout/footer.php'; ?>