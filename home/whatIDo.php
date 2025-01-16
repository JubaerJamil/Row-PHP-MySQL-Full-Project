<?php include 'config/connection.php';?>
<?php
  $query = "SELECT * FROM what_i_do WHERE status = 1 ORDER BY id DESC";
  $result = mysqli_query($connection, $query);
  $allData = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<section class="pt-120 pb-120">
        <div class="container">
          <div class="d-flex gap-3 flex-wrap flex-xxl-nowrap justify-content-between align-items-end pb-60">
            <div data-aos="zoom-in-left" class="section-heading">
              <div class="d-flex align-items-center gap-2">
                <div class="title-line"></div>
                <h2 class="display-four n5-color fw-semibold">What I do</h2>
              </div>
              <p class="fs-seven n4-color mt-2 mt-md-4">
                I have more than 02 years+ experience building website and software for
                clients all over the world. Below is a brief description of the services I provide. Want to find
                out more about my experience? Check out my 
                <a href="resume.php" class="p1-color">online resume</a> and
                <a href="portfolio.php" class="p1-color">project portfolio</a>.
              </p>
            </div>
            <a href="price.php" data-aos="zoom-in-right"
              class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 h-100 text-nowrap">
              <i class="ph ph-arrow-right"></i>Services & Pricing
            </a>
          </div>

          <div class="row g-3 g-md-6">
            <?php foreach ($allData as $item):?>
                <div data-aos="fade-up" data-aos-duration="500" class="col-sm-6 col-md-4 col-lg-6 col-xl-4 col-xxl-3">
                  <div class="service-card px-4 px-lg-8 py-5 py-lg-10">
                    <img width="60px" height="55px" src="<?php echo "upload/whatDo/". $item['image'];?>" alt="js" class="service-icon rounded" />
                    <h4 class="fs-six n5-color fw-medium mt-3 mt-md-6 mb-2 mb-md-3" style="color: #57b19c;">
                    <?php echo $item['title'];?>
                    </h4>
                    <p class="fs-seven n4-color">
                    <?php echo $item['content'];?>
                    </p>
                  </div>
                </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>