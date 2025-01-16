<div class="w-100 bgn1-color p-3 position-fixed z-3 bottom-0 d-block d-lg-none br-top-n5 box-shadow1">
      <div class="header-bottom-menu w-full">
        <ul class="d-flex gap-1 align-items-center justify-content-between">
          <li class="rounded-3 <?php echo $current_page == 'index.php' ? 'bg1-color' : ''; ?>">
            <a href="index.php" class="d-flex align-items-center gap-2 n5-color fs-eight p-2">
              <span class="fs-five d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-house"></i>
              </span>
              <span class="d-none d-md-block">About Me</span></a>
          </li>
          <li class="rounded-3 <?php echo $current_page == 'portfolio.php' ? 'bg1-color' : ''; ?> <?php echo $current_page == 'portfolio_details.php' ? 'bg1-color' : ''; ?>">
            <a href="portfolio.php" class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center gap-2 n5-color fs-eight p-2">
                <span class="fs-five d-flex align-items-center justify-content-center">
                    <i class="ph-fill ph-code-block fs-three"></i>
                </span>
                <span class="d-none d-md-block">Portfolio</span>
              </div>
              <!-- <span class="n5-color bg2-color fs-ten px-1 pt-1 rounded-2 me-3 d-none d-md-block">16</span> -->
            </a>
          </li>
          <li class="rounded-3 <?php echo $current_page == 'price.php' ? 'bg1-color' : ''; ?>">
            <a href="price.php" class="d-flex align-items-center gap-2 n5-color fs-eight p-2">
              <span class="fs-five d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-comment-dollar"></i>
              </span>
              <span class="d-none d-md-block">Pricing</span>
            </a>
          </li>
          <li class="rounded-3 <?php echo $current_page == 'resume.php' ? 'bg1-color' : ''; ?>">
            <a href="resume.php" class="d-flex align-items-center gap-2 n5-color fs-eight p-2">
              <span class="fs-five d-flex align-items-center justify-content-center">
              <i class="fa-regular fa-file"></i>
              </span>
              <span class="d-none d-md-block">Resume</span>
            </a>
          </li>
          <li class="rounded-3 <?php echo $current_page == 'products.php' ? 'bg1-color' : ''; ?> <?php echo $current_page == 'products-details.php' ? 'bg1-color' : ''; ?>">
            <a href="products.php" class="d-flex align-items-center gap-2 n5-color fs-eight p-2">
              <span class="fs-five d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-store"></i>
              </span>
              <span class="d-none d-md-block">Products</span>
            </a>
          </li>
          <li class="rounded-3 <?php echo $current_page == 'blog.php' ? 'bg1-color' : ''; ?> <?php echo $current_page == 'blog_details.php' ? 'bg1-color' : ''; ?>">
            <a href="blog.php" class="d-flex align-items-center gap-2 n5-color fs-eight p-2">
              <span class="fs-five d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-blog"></i>
              </span>
              <span class="d-none d-md-block">Blog</span>
            </a>
          </li>
          <li class="rounded-3 <?php echo $current_page == 'contact.php' ? 'bg1-color' : ''; ?>">
            <a href="contact.php" class="d-flex align-items-center gap-2 n5-color fs-eight p-2">
              <span class="fs-five d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-mobile-retro"></i></span>
              <span class="d-none d-md-block">Contact</span>
            </a>
          </li>
        </ul>
      </div>
    </div>