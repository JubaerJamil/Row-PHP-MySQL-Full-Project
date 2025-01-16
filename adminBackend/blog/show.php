<?php session_start(); ?>
<?php include '../layout/header.php'; ?>
<?php include '../layout/sidebar.php'; ?>
<?php include '../layout/topbar.php'; ?>
<?php include '../../config/connection.php'; ?>

<?php
$id = $_GET['id'];
$query = "SELECT * FROM blogs WHERE ID = $id";
$queryResult = mysqli_query($connection, $query);

$commentQuery = "SELECT * FROM comments WHERE post_id = $id ORDER BY id DESC";
$commentQueryResult = mysqli_query($connection, $commentQuery);
$allComments = mysqli_fetch_all($commentQueryResult, MYSQLI_ASSOC);

?>
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
                        <h4 class="card-title">Blog Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            if (mysqli_num_rows($queryResult) > 0) {
                                foreach ($queryResult as $item) {
                                    ?>
                                    <div class="d-flex">
                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Blog Title</label>
                                                <input readonly type="text" class="form-control" name="blog_titke"
                                                    value="<?php echo $item['title']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 ms-1">
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Blog Subject</label>
                                                <input readonly type="text" class="form-control" name="subject"
                                                    value="<?php echo $item['subject']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Content</label>
                                            <br>
                                            <textarea disabled class="form-control" name="content" id="myEditor"
                                                rows="12"><?php echo $item['content']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <!-- <label for="productType" class="form-label">Title Image</label> -->
                                            <img src="<?php echo "../../upload/blog_img/" . $item['image']; ?>" alt="" id="img"
                                                class="thum-image mt-3" width="200px" height="auto"
                                                style="outline: none; border: none; background: transparent;">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="productType" class="form-label">Status</label>
                                            <div class="d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="active"
                                                        value="1" <?php echo $item['status'] == 1 ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="active">Active</label>
                                                </div>
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" type="radio" name="status" id="inactive"
                                                        value="0" <?php echo $item['status'] == 0 ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="inactive">Inactive </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer border-top border-dashed text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <a href="index.php" class="btn btn-info">Retuen List</a>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                echo "Data Not Found";
                            }
                            ?>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Comments</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>Sl No.</th>
                                <th>Comments</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php if (isset($allComments) && count($allComments) > 0): ?>
                                    <?php foreach ($allComments as $index => $comment): ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $comment['comment']; ?></td>
                                            <td>
                                                <form action="../controller/comments.php" method="POST">
                                                    <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="delete_id" value="<?php echo $comment['id']; ?>">
                                                    <button type="submit"
                                                        class="btn btn-soft-danger btn-icon btn-sm rounded-circle"
                                                        onclick="return confirm('Are you sure! Delete this item')"
                                                        name="deleteBtn">
                                                        <i class="fa-solid fa-trash-can fs-4"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center fs-4">No comment yet</td>
                                    </tr>
                                <?php endif; ?>


                            </tbody>


                        </table>
                        <div class="card-footer border-top border-dashed text-end">
                            <div class="d-flex justify-content-end gap-1">
                                <a href="index.php" class="btn btn-info">Retuen List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->


    <?php include '../layout/footer.php'; ?>