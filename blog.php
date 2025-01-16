<?php include 'config/connection.php'; ?>
<?php include 'layout/header.php'; ?>

<div class="d-flex gap-6">
  <!-- sidebar start -->
  <?php include 'layout/sidebar.php'; ?>
  <!-- sidebar end -->

  <!-- main content -->
  <div class="main-content w-100">
    <!-- top header  -->
    <?php include 'layout/responsive_top_Header.php'; ?>

    <!-- bottom header  -->
    <?php include 'layout/responsive_bottom_Header.php'; ?>

    <!-- color palettes btns -->
    <?php include 'layout/color_palettes.php'; ?>

    <?php
    // Set the number of blogs to display per page
    $blogsPerPage = 9;

    // Get the current page from the query string, default to 1 if not set
    $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $currentPage = max($currentPage, 1); // Ensure the page number is at least 1
    
    // Calculate the offset for the SQL query
    $offset = ($currentPage - 1) * $blogsPerPage;

    // Get the total number of blogs
    $totalQuery = "SELECT COUNT(*) as total FROM blogs WHERE status = 1";
    $totalResult = mysqli_query($connection, $totalQuery);
    $totalRow = mysqli_fetch_assoc($totalResult);
    $totalBlogs = $totalRow['total'];

    // Calculate total pages
    $totalPages = ceil($totalBlogs / $blogsPerPage);

    // Fetch the blogs for the current page
    $query = "SELECT * FROM blogs WHERE status = 1 ORDER BY id DESC LIMIT $offset, $blogsPerPage";
    $queryResult = mysqli_query($connection, $query);
    $allBlog = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
    ?>


    <!-- Latest Blog Posts section start -->
    <section class="pt-120 pb-120 mt-10 mt-lg-0">
      <div class="pb-60 br-bottom-n3">
        <div class="container">
          <div data-aos="zoom-in" class="page-heading">
            <h3 class="page-title fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
              A Blog About Software Development And Life
            </h3>
            <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
              Welcome to my blog. Subscribe and get my latest blog post in
              your inbox.
            </p>
            <form class="d-flex flex-wrap flex-sm-nowrap gap-3 gap-md-6">
              <input placeholder="Enter your email" class="brn4 px-4 px-md-8 py-2 py-md-4 rounded-pill n5-color" />
              <button
                class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto h-100 flex-shrink-0">
                <i class="ph ph-paper-plane-tilt"></i>Subscribe
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- blog card  -->
      <div class="container">
        <div class="row g-5 g-md-10 mt-5">

          <?php foreach ($allBlog as $item): ?>
            <div data-aos="fade-up" data-aos-duration="700" class="col-sm-6 col-xxl-4">
              <a href="blog_details.php?id=<?php echo $item['id']; ?>" class="blog-card">
                <div class="blog-img rounded-3 overflow-hidden">
                  <img src="<?php echo "upload/blog_img/" . $item['image']; ?>" alt="<?php echo $item['title']; ?>"
                    class="rounded-3 w-full" />
                </div>
                <div class="pt-4 pt-md-8 px-3 px-md-5">
                  <div class="d-flex align-items-center gap-3 mb-2 mb-md-3">
                    <?php
                    $create = $item['created_at'];
                    $createTimeObj = date_create($create);
                    ?>
                    <span class="n4-color fs-eight"><?php echo date_format($createTimeObj, 'd M Y'); ?></span>
                    <span class="p1-color fs-eight">/</span>
                    <span class="n4-color fs-eight"><?php echo $item['subject']; ?></span>
                  </div>
                  <h4 class="blog-title fs-five n5-color fw-semibold">
                    <?php echo $item['title']; ?>
                  </h4>
                </div>
              </a>
            </div>
          <?php endforeach; ?>

        </div>
        <div data-aos="zoom-in-up" class="d-flex gap-4 gap-md-8 justify-content-center mt-8 mt-md-15">
          <!-- Previous button -->
          <?php if ($currentPage > 1): ?>
            <a href="?page=<?php echo $currentPage - 1; ?>" class="pagination-countainer brn4 n5-color">
              <i class="ph-bold ph-caret-left"></i>
            </a>
          <?php else: ?>
            <span class="pagination-countainer brn4 n5-color disabled">
              <i class="ph-bold ph-caret-left"></i>
            </span>
          <?php endif; ?>

          <!-- Page numbers -->
          <div class="d-flex gap-2 align-items-center">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
              <a href="?page=<?php echo $i; ?>"
                class="pagination-countainer brn4 <?php echo $i === $currentPage ? 'pagination-active' : 'n5-color'; ?>">
                <?php echo sprintf("%02d", $i); ?>
              </a>
            <?php endfor; ?>
          </div>

          <!-- Next button -->
          <?php if ($currentPage < $totalPages): ?>
            <a href="?page=<?php echo $currentPage + 1; ?>" class="pagination-countainer brn4 n5-color">
              <i class="ph-bold ph-caret-right"></i>
            </a>
          <?php else: ?>
            <span class="pagination-countainer brn4 n5-color disabled">
              <i class="ph-bold ph-caret-right"></i>
            </span>
          <?php endif; ?>
        </div>

      </div>
    </section>
    <!-- Latest Blog Posts section end -->

    <!-- footer section start -->
    <?php include 'layout/footer.php'; ?>