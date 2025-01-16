<?php include 'config/connection.php'; ?>
<?php include 'layout/header.php'; ?>

<div class="d-flex gap-6">
  <!-- sidebar start -->
  <?php include 'layout/sidebar.php'; ?>
  <!-- sidebar end -->

  <div class="main-content w-100">
    
    <!-- top header  -->
    <?php include 'layout/responsive_top_Header.php';?>

    <!-- bottom header  -->
    <?php include 'layout/responsive_bottom_Header.php';?>

    <!-- color palettes btns -->
    <?php include 'layout/color_palettes.php';?>

<?php
  $query = "SELECT * FROM package_price WHERE status = 1 ORDER BY id DESC ";
  $queryResult = mysqli_query($connection, $query);
  $allList = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);

  $qaquery = "SELECT * FROM q_and_ans WHERE status = 1 ORDER BY id DESC";
  $qaqueryResult = mysqli_query($connection, $qaquery);
  $allQA = mysqli_fetch_all($qaqueryResult, MYSQLI_ASSOC);
?>

    <!-- Services & Pricing section start -->
    <section class="pt-120 pb-120 br-bottom-n3 mt-10 mt-lg-0">
      <div class="pb-60 br-bottom-n3">
        <div data-aos="zoom-in" class="page-heading">
          <h3 class="page-title fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
            Services & Pricing
          </h3>
          <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
            I have 2+ years of development experience building web application like Website and software. You can take a look at my
            <a href="resume.php" class="p1-color">online resume</a> and
            <a href="portfolio.php" class="p1-color">project portfolio</a>
            to find out more about my skills and experiences.
          </p>

          <a href="contact.php"
            class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto w-max">
            <i class="ph ph-paper-plane-tilt"></i>Hire Me
          </a>
        </div>
      </div>

      <div class="container mt-8 mt-md-15">
        <div data-aos="zoom-in" class="section-heading">
          <div class="d-flex align-items-center gap-2">
            <div class="title-line"></div>
            <h2 class="display-four n5-color fw-semibold">
              Service Packages
            </h2>
          </div>
          <p class="fs-seven n4-color mt-2 mt-md-4">
            Explore the range of services I provide to help bring your
            projects to life. From initial concept to final delivery, I am
            committed to delivering high-quality results tailored to your
            needs.
          </p>
        </div>

        <div class="mt-8 mt-md-15">
          <div class="row g-6">
            <?php foreach ($allList as $item): ?>
            <div data-aos="fade-up" data-aos-delay="700" class="col-sm-6 col-xl-4">
              <div class="pricing-card bgn2-color brn4 px-3 px-md-6 py-4 py-md-8 text-center overflow-hidden position-relative">
              <div class="popular-price px-2 px-md-5 py-1 py-md-3 py-xl-2 py-xxl-3 <?php echo $item['popular'] == 1 ? 'd-block' : 'd-none'; ?>" style="position: absolute;top: 32px;right: 0;left: 0;">
                  <span class="fs-seven n1-color">Most popular</span>
              </div>
                <span class="fs-seven n5-color"><?php echo $item['p_name'];?></span>
                <div class="d-flex justify-content-center" style="margin-left: 90px;">
                <h3 class="p1-color fs-two"><?php echo $item['p_price'] - $item['p_dis_amount'];?></h3>

                <h5 class="p1-color ms-3 mb-5 <?php echo $item['have_dis'] == 1 ? 'd-block' : 'd-none'; ?>" style="color:rgb(243, 145, 138);text-decoration: line-through;"><?php echo $item['p_price'];?></h5>

                </div>
                <span class="fs-eight n5-color">Per Month</span>
                <div class="line-divider my-4 my-md-7"></div>
                <ul>
                  <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                    <i class="ph-fill ph-check-circle fs-six p1-color"></i><?php echo $item['item_1'];?>
                  </li>
                  <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                    <i class="ph-fill ph-check-circle fs-six p1-color"></i></i><?php echo $item['item_2'];?>
                  </li>
                  <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                    <i class="ph-fill ph-check-circle fs-six p1-color"></i></i><?php echo $item['item_3'];?>
                  </li>
                  <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                    <i class="ph-fill ph-check-circle fs-six p1-color"></i></i><?php echo $item['item_4'];?>
                  </li>
                  <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                    <i class="ph-fill ph-check-circle fs-six p1-color"></i></i><?php echo $item['item_5'];?>
                  </li>
                  <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                    <i class="ph-fill ph-check-circle fs-six p1-color"></i></i><?php echo $item['item_6'];?>
                  </li>
                  <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                    <i class="ph-fill ph-check-circle fs-six p1-color"></i></i><?php echo $item['item_7'];?>
                  </li>
                </ul>

                <a href="javascript:void(0)"
                  class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto mt-5 mt-md-10 w-max">
                  <i class="ph ph-arrow-right"></i>Choose <?php echo $item['p_name'];?>
                </a>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div data-aos="zoom-in" class="hire-content mt-8 mt-md-15">
          <h4 class="n5-color fs-three fw-semibold text-center mb-2 mb-md-4">
            Want to hire me for custom package?
          </h4>
          <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
            Lorem ipsum dolor sit amet consectetur adipiscing elit sed do
            eiusmod tempor incididunt ut labore et dolore.
          </p>
          <a href="contact.php"
            class="w-max primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto">
            <i class="ph ph-paper-plane-tilt"></i>Hire Me
          </a>
        </div>
      </div>
    </section>
    <!-- Services & Pricing section end -->

    <!-- Have any questions section start -->
    <section class="pt-120 pb-120">
      <div class="container">
        <div data-aos="zoom-in" class="section-heading">
          <div class="d-flex align-items-center gap-2">
            <div class="title-line"></div>
            <h2 class="display-four n5-color fw-semibold">
              Have any questions?
            </h2>
          </div>
          <p class="fs-seven n4-color mt-2 mt-md-4">
            You can use this section to address any queries your potential
            clients may have.
          </p>
        </div>
        <div class="row mt-8 mt-md-15 justify-content-between g-6">
          <div class="col-12 col-md-12 col-xl-6">
            <div class="accordion-section d-grid gap-2 gap-md-4">
              <?php foreach ($allQA as $qaItem): ?>
              <div class="accordion-single" data-aos="fade-up">
                <h5 class="header-area p-2 p-sm-4 p-md-8">
                  <button
                    class="accordion-btn n4-color d-flex gap-2 align-items-center position-relative w-100 fs-six fw-medium"
                    type="button">
                    <span
                      class="faq_icon_width d-flex flex-shrink-0 align-items-center justify-content-between n2-color">
                      <i class="ph ph-arrow-right"></i>
                    </span>
                      <?php echo $qaItem['question'];?>
                  </button>
                </h5>
                <div class="content-area overflow-hidden">
                  <p class="content-body n5-color px-4 px-md-8 pb-4 pb-md-8 fs-six">
                    <?php echo $qaItem['answer'];?>
                  </p>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="col-12 col-md-12 col-xl-6">
            <div class="overflow-hidden d-flex justify-content-center align-items-center">
              <img src="assets/images/light.png" alt="light" class="faq-light" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Have any questions section end -->

    <!-- footer section start -->
    <?php include 'layout/footer.php'; ?>