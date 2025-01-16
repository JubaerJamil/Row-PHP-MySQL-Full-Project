<?php include '../config/connection.php'; ?>
<?php 
    $blog = "SELECT COUNT(ID) AS total_blog FROM blogs";
    $blog_run = mysqli_query($connection, $blog);
    $result = mysqli_fetch_assoc($blog_run);
    $totalBlogs = $result['total_blog'];

    $project = "SELECT COUNT(ID) AS total_project FROM portfolio_item";
    $project_run = mysqli_query($connection, $project);
    $pResult = mysqli_fetch_assoc($project_run);
    $totalproject = $pResult['total_project'];

    $product = "SELECT COUNT(ID) AS total_product FROM products";
    $product_query_run = mysqli_query($connection, $product);
    $proResult = mysqli_fetch_assoc($product_query_run);
    $totalProduct = $proResult['total_product'];

    $today = date('Y-m-d');
    $message = "SELECT COUNT(ID) AS today_message FROM contact WHERE DATE(created_at) = '$today'";
    $message_query_run = mysqli_query($connection, $message);
    $messageResult = mysqli_fetch_assoc($message_query_run);
    $todaysMessage = $messageResult['today_message'];

?>
<div class="page-content">
    <div class="page-container">

        <div class="row">
            <div class="col-12">
                <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-42 fw-semibold m-0">Dashboard</h4>
                        
                    </div>
                    <div class="mt-3 mt-sm-0">
                        <form action="javascript:void(0);">
                            <div class="row g-2 mb-0 align-items-center">
                                <div class="col-auto">
                                    <a href="javascript: void(0);" class="btn btn-light">
                                        <i class="ti ti-sort-ascending me-1"></i> Sort By
                                    </a>
                                </div>
                                <!--end col-->
                                <div class="col-sm-auto">
                                    <div class="input-group">
                                        <input type="text" class="form-control border-0 shadow"
                                            data-provider="flatpickr" data-deafult-date="01 May to 31 May"
                                            data-date-format="d M" data-range-date="true">
                                        <span class="input-group-text bg-primary border-primary text-white">
                                            <i class="ti ti-calendar fs-15"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div><!-- end card header -->
            </div>
            <!--end col-->
        </div> <!-- end row-->

        <div class="row">
            <div class="col">
                <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1 text-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Total blog post</h5>
                                <div class="d-flex align-items-center justify-content-center gap-2 my-2 py-1">
                                    <div class="user-img fs-42 flex-shrink-0">
                                        <span class="avatar-title text-bg-primary rounded-circle fs-22">
                                            <iconify-icon
                                                icon="solar:case-round-minimalistic-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                    <h3 class="mb-0 fw-bold">Total: <?php echo $totalBlogs ;?> post</h3>
                                </div>
                                <p class="mb-0 text-muted">
                                    <!-- <span class="text-danger me-2"><i class="ti ti-caret-down-filled"></i> 9.19%</span> -->
                                    <!-- <span class="text-nowrap">Since last month</span> -->
                                </p>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Total Projects</h5>
                                <div class="d-flex align-items-center justify-content-center gap-2 my-2 py-1">
                                    <div class="user-img fs-42 flex-shrink-0">
                                        <span class="avatar-title text-bg-primary rounded-circle fs-22">
                                            <iconify-icon icon="solar:bill-list-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                    <h3 class="mb-0 fw-bold">Total: <?php echo $totalproject;?> Projects</h3>
                                </div>
                                <p class="mb-0 text-muted">
                                    <!-- <span class="text-success me-2"><i class="ti ti-caret-up-filled"></i> 26.87%</span>
                                    <span class="text-nowrap">Since last month</span> -->
                                </p>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Total Products
                                </h5>
                                <div class="d-flex align-items-center justify-content-center gap-2 my-2 py-1">
                                    <div class="user-img fs-42 flex-shrink-0">
                                        <span class="avatar-title text-bg-primary rounded-circle fs-22">
                                            <iconify-icon icon="solar:wallet-money-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                    <h3 class="mb-0 fw-bold">Total: <?php echo $totalProduct;?> Product </h3>
                                </div>
                                <p class="mb-0 text-muted">
                                    <!-- <span class="text-success me-2"><i class="ti ti-caret-up-filled"></i> 3.51%</span>
                                    <span class="text-nowrap">Since last month</span> -->
                                </p>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Customer message
                                </h5>
                                <div class="d-flex align-items-center justify-content-center gap-2 my-2 py-1">
                                    <div class="user-img fs-42 flex-shrink-0">
                                        <span class="avatar-title text-bg-primary rounded-circle fs-22">
                                            <iconify-icon icon="solar:eye-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                    <h3 class="mb-0 fw-bold fs-20">Today received:<br> <span class="<?php echo $todaysMessage > 0? 'text-danger' : ''; ?>"><?php echo $todaysMessage;?> message</span></h3>
                                </div>
                                <p class="mb-0 text-muted">
                                    <!-- <span class="text-danger me-2"><i class="ti ti-caret-down-filled"></i> 1.05%</span>
                                    <span class="text-nowrap">Since last month</span> -->
                                </p>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

        

            </div> <!-- end col-->

            <div class="col-auto info-sidebar">
                <div class="alert alert-primary d-flex align-items-center">
                    <iconify-icon icon="solar:help-bold-duotone" class="fs-24 me-1"></iconify-icon> <b>Help line:</b>
                    <span class="fw-medium ms-1">+(012) 123 456 78</span>
                </div>

                <div class="card bg-primary">
                    <div class="card-body"
                        style="background-image: url(assets/images/png/arrows.svg); background-size: contain; background-repeat: no-repeat; background-position: right bottom;">
                        <h1><i class="ti ti-receipt-tax text-white"></i></h1>
                        <h4 class="text-white">Estimated tax for this year</h4>
                        <p class="text-white text-opacity-75">We kindly encourage you to review your recent transactions
                        </p>
                        <a href="#!" class="btn btn-sm rounded-pill btn-info">Activate Now</a>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex mb-3 justify-content-between align-items-center">
                            <h4 class="header-title">Recent Orders:</h4>
                            <div>
                                <a href="javascript:void(0);" class="btn btn-sm btn-primary rounded-circle btn-icon"><i
                                        class="ti ti-plus"></i></a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 position-relative mb-2">
                            <div class="avatar-md flex-shrink-0">
                                <img src="assets/images/products/p-6.png" alt="product-pic" height="36">
                            </div>
                            <div>
                                <h5 class="fs-14 my-1"><a href="apps-ecommerce-order-details.php"
                                        class="stretched-link link-reset">Marco Shoes</a></h5>
                                <span class="text-muted fs-12">$29.99 x 1 = $29.99</span>
                            </div>
                            <div class="ms-auto">
                                <span class="badge badge-soft-success px-2 py-1">Sold</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2 position-relative mb-2">
                            <div class="avatar-md flex-shrink-0">
                                <img src="assets/images/products/p-1.png" alt="product-pic" height="36">
                            </div>
                            <div>
                                <h5 class="fs-14 my-1"><a href="apps-ecommerce-order-details.php"
                                        class="stretched-link link-reset">High Waist Tshirt</a></h5>
                                <span class="text-muted fs-12">$9.99 x 3 = $29.97</span>
                            </div>
                            <div class="ms-auto">
                                <span class="badge badge-soft-success px-2 py-1">Sold</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2 position-relative mb-2">
                            <div class="avatar-md flex-shrink-0">
                                <img src="assets/images/products/p-3.png" alt="product-pic" height="36">
                            </div>
                            <div>
                                <h5 class="fs-14 my-1"><a href="apps-ecommerce-order-details.php"
                                        class="stretched-link link-reset">Comfirt Chair</a></h5>
                                <span class="text-muted fs-12">$49.99 x 1 = $49.99</span>
                            </div>
                            <div class="ms-auto">
                                <span class="badge badge-soft-danger px-2 py-1">Return</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2 position-relative mb-2">
                            <div class="avatar-md flex-shrink-0">
                                <img src="assets/images/products/p-4.png" alt="product-pic" height="36">
                            </div>
                            <div>
                                <h5 class="fs-14 my-1"><a href="apps-ecommerce-order-details.php"
                                        class="stretched-link link-reset">Smart Headphone</a></h5>
                                <span class="text-muted fs-12">$39.99 x 1 = $39.99</span>
                            </div>
                            <div class="ms-auto">
                                <span class="badge badge-soft-success px-2 py-1">Sold</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2 position-relative">
                            <div class="avatar-md flex-shrink-0">
                                <img src="assets/images/products/p-2.png" alt="product-pic" height="36">
                            </div>
                            <div>
                                <h5 class="fs-14 my-1"><a href="apps-ecommerce-order-details.php"
                                        class="stretched-link link-reset">Laptop Bag</a></h5>
                                <span class="text-muted fs-12">$12.99 x 4 = $51.96</span>
                            </div>
                            <div class="ms-auto">
                                <span class="badge badge-soft-success px-2 py-1">Sold</span>
                            </div>
                        </div>

                        <div class="mt-3 text-center">
                            <a href="#!"
                                class="text-decoration-underline fw-semibold ms-auto link-offset-2 link-dark">View
                                All</a>
                        </div>
                    </div>
                    <div class="card-body p-0 border-top border-dashed">
                        <h4 class="header-title px-3 mb-2 mt-3">Recent Activity:</h4>
                        <div class="my-3 px-3" data-simplebar style="max-height: 370px;">
                            <div class="timeline-alt py-0">
                                <div class="timeline-item">
                                    <i class="ti ti-basket bg-info-subtle text-info timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">You
                                            sold an item</a>
                                        <span class="mb-1">Paul Burgess just purchased “My - Admin Dashboard”!</span>
                                        <p class="mb-0 pb-3">
                                            <small class="text-muted">5 minutes ago</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <i class="ti ti-rocket bg-primary-subtle text-primary timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="javascript:void(0);"
                                            class="link-reset fw-semibold mb-1 d-block">Product on the Theme Market</a>
                                        <span class="mb-1">Reviewer added
                                            <span class="fw-medium">Admin Dashboard</span>
                                        </span>
                                        <p class="mb-0 pb-3">
                                            <small class="text-muted">30 minutes ago</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <i class="ti ti-message bg-info-subtle text-info timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">Robert
                                            Delaney</a>
                                        <span class="mb-1">Send you message
                                            <span class="fw-medium">"Are you there?"</span>
                                        </span>
                                        <p class="mb-0 pb-3">
                                            <small class="text-muted">2 hours ago</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <i class="ti ti-photo bg-primary-subtle text-primary timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">Audrey
                                            Tobey</a>
                                        <span class="mb-1">Uploaded a photo
                                            <span class="fw-medium">"Error.jpg"</span>
                                        </span>
                                        <p class="mb-0 pb-3">
                                            <small class="text-muted">14 hours ago</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <i class="ti ti-basket bg-info-subtle text-info timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">You
                                            sold an item</a>
                                        <span class="mb-1">Paul Burgess just purchased “My - Admin Dashboard”!</span>
                                        <p class="mb-0 pb-3">
                                            <small class="text-muted">16 hours ago</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <i class="ti ti-rocket bg-primary-subtle text-primary timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="javascript:void(0);"
                                            class="link-reset fw-semibold mb-1 d-block">Product on the Bootstrap
                                            Market</a>
                                        <span class="mb-1">Reviewer added
                                            <span class="fw-medium">Admin Dashboard</span>
                                        </span>
                                        <p class="mb-0 pb-3">
                                            <small class="text-muted">22 hours ago</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <i class="ti ti-message bg-info-subtle text-info timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">Robert
                                            Delaney</a>
                                        <span class="mb-1">Send you message
                                            <span class="fw-medium">"Are you there?"</span>
                                        </span>
                                        <p class="mb-0 pb-2">
                                            <small class="text-muted">2 days ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- end timeline -->
                        </div> <!-- end slimscroll -->
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row-->

    </div> <!-- container -->