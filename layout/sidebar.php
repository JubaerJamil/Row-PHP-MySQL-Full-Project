<?php
  $current_page = basename($_SERVER['PHP_SELF']);
?>
    <div class="side-menu">
      <!-- sidebar-btn  -->
      <div class="sidebar-btn close-btn cursor-pointer d-block d-lg-none">
        <i class="ph ph-x fs-two p1-color"></i>
      </div>

      <div class="d-flex">
        <div class="side-menu-left">
          <div>
            <div class="d-flex flex-column gap-8 justify-content-center align-items-center mt-6">
              <a href="index.php" class="side-icon p1-color bgn2-color brn4" style="background: gray;">
                    <img src="assets/images/faviconjjjjj_.png" width="17px" height="22px" alt="">
              </a>
              <a href="checkout.php" class="position-relative">
                <div class="side-icon bg1-color">
                  <i class="ph ph-shopping-cart n11-color"></i>
                </div>
                <div class="cart-counter">
                  <span class="n1-color">00</span>
                </div>
              </a>
              <div class="d-flex flex-column align-items-center gap-1">
                <span class="toggle_name fs-eleven n5-color">DarkMode</span>
                <button class="side-icon bg1-color mood_toggle">
                  <i class="mood_icon ph-fill ph-moon fs-six n11-color"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="side-menu-right overflow-y-auto">
          <div class="d-flex flex-column gap-6 justify-content-between py-10 px-5 bgn2-color h-100">
            <div class="">
              <div class="sidebar-profile">
                <div class="position-relative">
                  <div class="profile-img1 d-flex justify-content-center overflow-hidden">
                    <img src="assets/images/profile3.png" alt="user" class="" />
                  </div>
                  <span class="thumb">👋</span>
                </div>

                <h4 class="n5-color fw-semibold fs-five mt-2 text-center" style="font-size: 22px;">
                  Jubaer Hossen Jamil
                </h4>
                <span class="n5-color fs-nine d-block text-center" style="font-size: 18px;">Web Developer</span>
                <div class="d-flex justify-content-center gap-2 align-items-center mt-4">
                  <a href="https://www.facebook.com/jubaer.jamil1971" target="_blank" class="social-icon p1-color">
                    <i class="ph ph-facebook-logo"></i>
                  </a>
                  <a href="https://github.com/JubaerJamil" target="_blank" class="social-icon p1-color">
                  <i class="ph ph-github-logo"></i>
                  </a>
                  <a href="https://www.linkedin.com/in/jubaerjamil" target="_blank" class="social-icon p1-color">
                    <i class="ph ph-linkedin-logo"></i>
                  </a>
                  <a href="https://x.com/MDJubaerJamil" target="_blank" class="social-icon p1-color">
                    <i class="ph ph-x-logo"></i>
                  </a>

                </div>
              </div>
              <div class="line-divider my-4 my-md-8"></div>

              <div class="menu-list">
                <ul class="d-flex flex-column gap-3">
                  <li class="rounded-3 <?php echo $current_page == 'index.php' ? 'bg1-color' : ''; ?>">
                    <a href="index.php" class="d-flex align-items-center gap-2 n5-color fs-eight px-3 py-2"><i
                        class="ph ph-user fs-six"></i> About Me</a>
                  </li>

                  <li class="rounded-3 <?php echo $current_page == 'portfolio.php' ? 'bg1-color' : ''; ?> <?php echo $current_page == 'portfolio_details.php' ? 'bg1-color' : ''; ?>">
                    <a href="portfolio.php" class="d-flex justify-content-between align-items-center">
                      <div class="d-flex align-items-center gap-2 n5-color fs-eight px-3 py-2">
                        <i class="ph ph-code-block fs-six"></i> Portfolio
                      </div>
                      <!-- <span class="n5-color bg2-color fs-ten px-1 pt-1 rounded-2 me-3">16</span> -->
                    </a>
                  </li>
                  <li class="rounded-3 <?php echo $current_page == 'price.php' ? 'bg1-color' : ''; ?>">
                    <a href="price.php" class="d-flex align-items-center gap-2 n5-color fs-eight px-3 py-2"><i
                        class="ph ph-briefcase fs-six"></i>Services & Pricing</a>
                  </li>
                  <li class="rounded-3 <?php echo $current_page == 'resume.php' ? 'bg1-color' : ''; ?>">
                    <a href="resume.php" class="d-flex align-items-center gap-2 n5-color fs-eight px-3 py-2"><i
                        class="ph ph-notebook fs-six"></i> Resume</a>
                  </li>
                  <li class="rounded-3 <?php echo $current_page == 'products.php' ? 'bg1-color' : ''; ?> <?php echo $current_page == 'products-details.php' ? 'bg1-color' : ''; ?>">
                    <a href="products.php" class="d-flex align-items-center gap-2 n5-color fs-eight px-3 py-2"><i
                        class="ph ph-shopping-bag fs-six"></i>Products</a>
                  </li>
                  <li class="rounded-3 <?php echo $current_page == 'blog.php' ? 'bg1-color' : ''; ?> <?php echo $current_page == 'blog_details.php' ? 'bg1-color' : ''; ?>">
                    <a href="blog.php" class="d-flex align-items-center gap-2 n5-color fs-eight px-3 py-2"><i
                        class="ph ph-newspaper-clipping fs-six"></i>Blog</a>
                  </li>
                  <li class="rounded-3 <?php echo $current_page == 'contact.php' ? 'bg1-color' : ''; ?>">
                    <a href="contact.php" class="d-flex align-items-center gap-2 n5-color fs-eight px-3 py-2"><i
                        class="ph ph-envelope fs-six"></i>Contact</a>
                  </li>
                </ul>
              </div>
            </div>
            <a href="contact.php"
              class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto">
              <i class="ph ph-paper-plane-tilt"></i>Hire Me
            </a>
          </div>
        </div>
      </div>
    </div>