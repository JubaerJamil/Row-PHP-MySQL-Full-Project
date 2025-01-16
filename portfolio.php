<?php include 'config/connection.php'; ?>
<?php include 'layout/header.php'; ?>

<div class="d-flex gap-6">
  <!-- sidebar start -->
  <?php include 'layout/sidebar.php'; ?>
  <!-- sidebar end -->

  <div class="main-content w-100">
    <!-- top header  -->
    <?php include 'layout/responsive_top_Header.php'; ?>

    <!-- bottom header  -->
    <?php include 'layout/responsive_bottom_Header.php'; ?>

    <!-- color palettes btns -->
    <?php include 'layout/color_palettes.php'; ?>

    <?php
    $cat_query = "SELECT * FROM portfolio_categories WHERE status = 1 ORDER BY id DESC";
    $cat_query_run = mysqli_query($connection, $cat_query);
    $cat_query_fetch = mysqli_fetch_all($cat_query_run, MYSQLI_ASSOC);

    $query = "SELECT * FROM portfolio_item WHERE status = 1 ORDER BY ID DESC";
    $query_run = mysqli_query($connection, $query);
    $allItem = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
    ?>
    <!-- best project section start -->
    <section class="pt-120 pb-120 mt-10 mt-lg-0">
      <div class="pb-60 br-bottom-n3">
        <div data-aos="zoom-in" class="page-heading">
          <h3 class="page-title n5-color fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
          A collection of some of my projects
          </h3>
          <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
            With many years in web development, I acquired extensive
            experience working on projects across multiple industries and
            technologies. Let me show you my best creations.
          </p>
          <a href="contact.php"
            class="w-max primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto">
            <i class="ph ph-paper-plane-tilt"></i>Hire Me
          </a>
        </div>
      </div>
      <div class="container mt-8 mt-md-15">
        <!-- tab -->
        <div>
          <ul data-aos="zoom-in" data-aos-duration="800"
            class="tabs d-flex gap-3 gap-md-6 justify-content-center flex-wrap p-2 pb-5 pb-md-10">
            <li data-tab-target="#all" class="active fs-seven fw-medium cursor-pointer n3-color pb-1 tab"> All </li>

            <?php foreach ($cat_query_fetch as $category): ?>
              <li data-tab-target="#web<?php echo $category['id']; ?>" class="fs-seven fw-medium cursor-pointer n3-color pb-1 tab"><?php echo $category['name']; ?></li>
            <?php endforeach; ?>
          </ul>

          <div class="tab-content position-relative overflow-hidden">

            <div id="all" data-tab-content class="active">
              <div class="row g-6 g-md-8">

                <?php foreach ($allItem as $key => $item): ?>
                  <div data-aos="fade-up" data-aos-duration="800" class="col-xl-6">
                    <div class="project-card">

                      <?php
                      $imageQuery = "SELECT * FROM portfolio_image WHERE portfolio_item_id = $item[id]";
                      $imageQuery_run = mysqli_query($connection, $imageQuery);
                      $allImage = mysqli_fetch_all($imageQuery_run, MYSQLI_ASSOC);
                      ?>
                      <div id="carousel-<?php echo $key + 500; ?>" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-indicators">
                          <?php foreach ($allImage as $imgKey => $image): ?>
                            <button type="button" data-bs-target="#carousel-<?php echo $key + 500; ?>"
                              data-bs-slide-to="<?php echo $imgKey; ?>" class="<?php echo $imgKey == 0 ? 'active' : ''; ?>"
                              aria-current="<?php echo $imgKey == 0 ? 'true' : 'false'; ?>"
                              aria-label="<?php echo $imgKey + 1; ?>">
                            </button>
                          <?php endforeach; ?>
                        </div>
                        <div class="carousel-inner">
                          <?php foreach ($allImage as $imageKey => $image): ?>
                            <div class="carousel-item <?php echo $imageKey == 0 ? 'active' : ''; ?>">
                              <img src="<?php echo "upload/project_img/" . $image['image']; ?>" class="d-block w-100"
                                alt="...">
                            </div>
                          <?php endforeach; ?>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $key + 500; ?>"
                          data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $key + 500; ?>"
                          data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>

                      <div class="d-flex justify-content-between gap-2 align-items-center pt-4 pt-md-8 px-3 px-md-6">
                        <div>
                          <a href="portfolio_details.php?id=<?php echo $item['id'];?>"
                            class="project-title fs-five fw-semibold n5-color mt-3 mt-md-5 d-block">
                            <?php echo $item['service_title']; ?>
                          </a>
                        </div>
                        <a href="portfolio_details.php?id=<?php echo $item['id'];?>"
                          class="project-link d-flex align-items-center justify-content-center flex-shrink-0">
                          <i class="ph-bold ph-arrow-up-right n5-color"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <?php if (isset($allItem)): ?>
              <?php foreach ($cat_query_fetch as $category): ?>
                <div id="web<?php echo $category['id']; ?>" data-tab-content>

                  <div class="row g-6 g-md-8">
                    <?php foreach ($allItem as $keyImage => $item): ?>
                      <?php if ($item['portfolio_category_id'] == $category['id']): ?>
                        <div class="col-xl-6">
                          <div class="project-card">

                            <?php
                            $imageQuery = "SELECT * FROM portfolio_image WHERE portfolio_item_id = $item[id]";
                            $imageQuery_run = mysqli_query($connection, $imageQuery);
                            $allImage = mysqli_fetch_all($imageQuery_run, MYSQLI_ASSOC);
                            ?>
                            <div id="carousel-<?php echo $keyImage; ?>" class="carousel slide" data-bs-ride="carousel">

                              <div class="carousel-indicators">
                                <?php foreach ($allImage as $imgKey => $image): ?>
                                  <button type="button" data-bs-target="#carousel-<?php echo $keyImage; ?>"
                                    data-bs-slide-to="<?php echo $imgKey; ?>" class="<?php echo $imgKey == 0 ? 'active' : ''; ?>"
                                    aria-current="<?php echo $imgKey == 0 ? 'true' : 'false'; ?>"
                                    aria-label="<?php echo $imgKey + 1; ?>">
                                  </button>
                                <?php endforeach; ?>
                              </div>
                              <div class="carousel-inner">
                                <?php foreach ($allImage as $imageKey => $image): ?>
                                  <div class="carousel-item <?php echo $imageKey == 0 ? 'active' : ''; ?>">
                                    <img src="<?php echo "upload/project_Img/" . $image['image']; ?>" class="d-block w-100"
                                      alt="...">
                                  </div>
                                <?php endforeach; ?>
                              </div>

                              <button class="carousel-control-prev" type="button"
                                data-bs-target="#carousel-<?php echo $keyImage; ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                              </button>
                              <button class="carousel-control-next" type="button"
                                data-bs-target="#carousel-<?php echo $keyImage; ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                              </button>
                            </div>

                            <div class="d-flex justify-content-between gap-2 align-items-center pt-4 pt-md-8 px-3 px-md-6">
                              <div>
                                <a href="portfolio_details.php?id=<?php echo $item['id'];?>"
                                  class="project-title fs-five fw-semibold n5-color mt-3 mt-md-5 d-block">
                                  <?php echo $item['service_title']; ?>
                                </a>
                              </div>
                              <a href="portfolio_details.php?id=<?php echo $item['id'];?>"
                                class="project-link d-flex align-items-center justify-content-center flex-shrink-0">
                                <i class="ph-bold ph-arrow-up-right n5-color"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </section>
    <!-- best project section end -->

    <!-- footer section start -->
    <?php include 'layout/footer.php'; ?>