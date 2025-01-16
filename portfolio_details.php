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
    $id = $_GET['id'];
    $query = "SELECT * FROM portfolio_item WHERE id= $id";
    $query_run = mysqli_query($connection, $query);
    ?>


    <!-- Portfolio details section start -->
    <section class="pt-120 pb-120 mt-10 mt-lg-0">
      <div class="pb-60">
        <div data-aos="zoom-in" class="page-heading">
        <?php
        if (mysqli_num_rows($query_run) > 0) {

          foreach ($query_run as $key => $item) {
            ?>
          <h4 class="page-title fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
            Details information about <?php echo $item['service_title']; ?> for <?php echo $item['client_name']; ?>.
          </h4>
          <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
            This project demonstrates a tailored solution that addresses specific client needs, ensuring quality and delivering measurable results. 
            Let this inspire confidence in your next endeavor.
          </p>
          <?php
          }
        } else {
          echo "Details information Not found";
        }
        ?>
          <a href="contact.php"
            class="w-max primary-btn fw-medium n11-color px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto">
            <i class="ph ph-paper-plane-tilt"></i>Hire Me
          </a>
        </div>
      </div>
      <div class="container mt-8 mt-md-15 pb-60">

        <?php
        if (mysqli_num_rows($query_run) > 0) {

          foreach ($query_run as $key => $item) {
            ?>
            <div class="row g-6">
              <div data-aos="fade-left" class="col-12 col-xl-3">
                <div class="d-flex flex-column gap-5 position-sticky top-5 brn4 p-3 rounded">
                  <div>
                    <span class="n4-color fs-eight fw-medium d-block">Title:</span>
                    <span class="n5-color fs-six fw-medium"><?php echo $item['service_title']; ?></span>
                  </div>
                  <div>
                    <span class="n4-color fs-eight fw-medium d-block">Client:</span>
                    <span class="n5-color fs-six fw-medium"><?php echo $item['client_name']; ?></span>
                  </div>
                  <div>
                    <span class="n4-color fs-eight fw-medium d-block">Services</span>
                    <span class="n5-color fs-six fw-medium"><?php echo $item['service_name']; ?></span>
                  </div>
                  <div>
                    <span class="n4-color fs-eight fw-medium d-block">Technologies</span>
                    <span class="n5-color fs-six fw-medium"><?php echo $item['Technologies']; ?></span>
                  </div>
                  <div>
                    <span class="n4-color fs-eight fw-medium d-block">Website</span>
                    <a href="<?php echo $item['view_link']; ?>"
                      class="n5-color fs-six fw-medium d-flex align-items-center gap-2">Live
                      preview <i class="ph-bold ph-arrow-right"></i></a>
                  </div>
                </div>
              </div>

              <div data-aos="fade-right" class="col-12 col-xl-9">
                <div class="project-details-content d-flex flex-column gap-8 gap-md-15">
                  <div class="overflow-hidden">


                    <?php
                    $imageQuery = "SELECT * FROM portfolio_image WHERE portfolio_item_id = $item[id]";
                    $imageQuery_run = mysqli_query($connection, $imageQuery);
                    $allImage = mysqli_fetch_all($imageQuery_run, MYSQLI_ASSOC);
                    ?>
                    <div id="carousel-<?php echo $key; ?>" class="carousel slide" data-bs-ride="carousel">

                      <div class="carousel-indicators">
                        <?php foreach ($allImage as $imgKey => $image): ?>
                          <button type="button" data-bs-target="#carousel-<?php echo $key; ?>"
                            data-bs-slide-to="<?php echo $imgKey; ?>" class="<?php echo $imgKey == 0 ? 'active' : ''; ?>"
                            aria-current="<?php echo $imgKey == 0 ? 'true' : 'false'; ?>"
                            aria-label="<?php echo $imgKey + 1; ?>">
                          </button>
                        <?php endforeach; ?>
                      </div>
                      <div class="carousel-inner">
                        <?php foreach ($allImage as $imageKey => $mainimage): ?>
                          <div class="carousel-item <?php echo $imageKey == 0 ? 'active' : ''; ?>">
                            <img src="<?php echo "upload/project_Img/" . $mainimage['image']; ?>" class="d-block w-100" alt="...">
                          </div>
                        <?php endforeach; ?>
                      </div>

                      <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $key; ?>"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $key; ?>"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                    <style>
                      .external, p, h1, h2, h3, h4, h5, h6, a {
                        color: rgba(var(--n5), 1);
                      }
                  </style>
                  <div class="external mt-5 mb-4">
                    <?php echo $item['description']; ?>
                  </div>


                  </div>
                </div>
              </div>
        <?php
          }
        } else {
          echo "Details information Not found";
        }
        ?>
        </div>

        <!-- next project section start -->
        <div class="next-project pt-120 pb-120">
          <div class="container d-flex gap-3 gap-md-6 flex-wrap justify-content-between align-items-center">
            <div data-aos="zoom-in-left" class="next-project-content">
              <h3 class="display-four n11-color fw-semibold mb-2 mb-md-4">
                Let’s Work together on your next Project
              </h3>
              <p class="fs-seven n11-color">
                I am available for freelance projects. Hire me and get your
                project done.
              </p>
            </div>
            <a data-aos="zoom-in-right" href="contact.php"
              class="primary-btn bg1-color fw-medium n11-color px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 h-100 text-nowrap">
              <i class="ph ph-arrow-right"></i>Let’s get in touch
            </a>
          </div>
        </div>
        <!-- next project section end -->
    </section>

    <!-- Portfolio details section end -->

    <!-- footer section start -->
    <?php include 'layout/footer.php'; ?>