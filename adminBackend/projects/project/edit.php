<?php session_start(); ?>
<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>
<?php include '../../layout/topbar.php'; ?>
<?php include '../../../config/connection.php'; ?>

<?php 
$categories = "SELECT * FROM portfolio_categories";
$categories_run = mysqli_query($connection,"$categories");

$id = $_GET['id'];
$query = "SELECT * FROM portfolio_item WHERE ID = $id";
$queryResult = mysqli_query($connection, $query);

$imageQuery = "SELECT * FROM portfolio_image WHERE portfolio_item_id = $id";
$ImageQueryResult = mysqli_query($connection, $imageQuery);
$query_run = mysqli_fetch_all($ImageQueryResult, MYSQLI_ASSOC);

$imagesData = json_encode($query_run);
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
                        <h4 class="card-title">Edit Item</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <?php
                            if(mysqli_num_rows($queryResult) > 0){
                                foreach ($queryResult as $item){
                        ?>
                    <form action="../../controller/project_item.php" method="POST" enctype="multipart/form-data">
                                <div class="d-flex">
                                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Project Category</label>
                                                <select class="form-select my-1 my-md-0 me-sm-3" data-toggle="select2" id="productCategory" name="category_id">
                                                    <?php foreach($categories_run as $category):?>
                                                        <option value="<?php echo $category['id']?>" <?php echo $category['id'] == $item['portfolio_category_id'] ? 'selected' : '' ; ?>><?php echo $category['name'];?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Service Title</label>
                                            <input type="text" class="form-control" name="service_title" value="<?php echo $item['service_title'];?>" required >
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Service Name</label>
                                            <input type="text" class="form-control" name="service_name" value="<?php echo $item['service_name'];?>" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Technology Name</label>
                                            <input type="text" class="form-control" name="technology_name" value="<?php echo $item['Technologies'];?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Client Name</label>
                                            <input type="text" class="form-control" name="client_name" value="<?php echo $item['client_name'];?>" >
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ms-2">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Preview Link</label>
                                            <input type="text" class="form-control" name="preview_link" value="<?php echo $item['view_link'];?>" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Content</label>
                                        <textarea class="form-control" name="content" id="myEditor" rows="12"
                                            placeholder=""><?php echo $item['description'];?></textarea>
                                    </div>
                                </div>




                                <div class="col-lg-12">
                                    <div class="mb-3 dropzone">
                                        <label for="productType" class="form-label">Image</label>
                                        <p style="font-size: 12px; color:black; margin-bottom: 0;">please upload 1200 x 1200 px image for perfect view</p>
                                        <input type="file" name="image[]" id="multi_images" multiple onchange="previewImages()">
                                        <div id="previewContainer" data-images='<?php echo $imagesData; ?>'></div>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="productType" class="form-label">Status</label>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="active" <?php echo $item['status'] == 1 ? 'checked' : '' ?>
                                                    value="1"  required>
                                                <label class="form-check-label" for="active">Active</label>
                                            </div>
                                            <div class="form-check ms-2">
                                                <input class="form-check-input" type="radio" name="status" <?php echo $item['status'] == 0 ? 'checked' : '' ?>
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
                                <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                                <a href="index.php" class="btn btn-danger">Retuen List</a>
                            </div>
                        </div>
                    </form>
                    <?php 
                            }
                        }else{
                            echo "Data Not Found";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div> <!-- container -->


<script>

function previewImages() {
            var previewContainer = document.getElementById('previewContainer');
            previewContainer.innerHTML = ''; // Clear any existing previews

            var files = document.getElementById('multi_images').files;

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.width = '150px';
                img.style.height = '150px';
                img.style.margin = '5px';
                previewContainer.appendChild(img);
            }
    }




let previewContainer = document.getElementById("previewContainer");
let images = JSON.parse(previewContainer.getAttribute("data-images"));

images.forEach(function(image) {
    let imgElement = document.createElement("img");
    imgElement.src = "../../../upload/project_Img/" + image.image;
    imgElement.alt = "Portfolio Image";
    imgElement.style.width = "150px";
    imgElement.style.height = "100px";
    imgElement.style.margin = "5px";
    previewContainer.appendChild(imgElement);
});
</script>


    <?php include '../../layout/footer.php'; ?>