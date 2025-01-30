
<?php
$query = "SELECT * FROM portfolio_item WHERE status = 1 ORDER BY ID DESC LIMIT 4";
$query_run = mysqli_query($connection, $query);
$allItem = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

?>
<section class="projects-section pt-120 pb-120 br-bottom-n3">
  <div class="container">
    <div class="d-flex gap-3 flex-wrap flex-xxl-nowrap justify-content-between align-items-end mb-8 mb-md-15">
      <div data-aos="zoom-in-left" class="section-heading">
        <div class="d-flex align-items-center gap-2">
          <div class="title-line"></div>
          <h2 class="display-four n5-color fw-semibold">
            Featured Projects
          </h2>
        </div>
        <p class="fs-seven n4-color mt-2 mt-md-4">
        Explore a showcase of my meticulously crafted projects, each reflecting a seamless blend of creativity and functionality. From concept to completion, 
        I prioritize quality and attention to detail, delivering solutions that make a lasting impact.
        </p>
      </div>
      <a data-aos="zoom-in-right" href="portfolio.php"
        class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 h-100 text-nowrap">
        <i class="ph ph-arrow-right"></i>View Portfolio
      </a>
    </div>
    <div class="row g-6 g-md-8">

    <?php foreach ($allItem as $key => $item):?>
      <div data-aos="fade-up" data-aos-duration="800" class="col-xl-6">
        <div class="project-card">

        <?php 
          $imageQuery = "SELECT * FROM portfolio_image WHERE portfolio_item_id = $item[id]";
          $imageQuery_run = mysqli_query($connection, $imageQuery);
          $allImage = mysqli_fetch_all($imageQuery_run, MYSQLI_ASSOC);
        ?>
          <div id="carousel-<?php echo $key; ?>" class="carousel slide" data-bs-ride="carousel">
            
            <div class="carousel-indicators">
              <?php foreach($allImage as $imgKey => $imagenum):?>
              <button type="button" 
                  data-bs-target="#carousel-<?php echo $key; ?>" 
                  data-bs-slide-to="<?php echo $imgKey; ?>" 
                  class="<?php echo $imgKey == 0 ? 'active': '';?>" 
                  aria-current="<?php echo $imgKey == 0 ? 'true': 'false';?>" 
                  aria-label="<?php echo $imgKey + 1;?>">
              </button>
              <?php endforeach; ?>
            </div>
            <div class="carousel-inner">
              <?php foreach($allImage as $imageKey=>$mainImage):?>
                <div class="carousel-item <?php echo $imageKey == 0 ? 'active' : '';?>">
                    <img src="<?php echo "upload/project_Img/". $mainImage['image'];?>" class="d-block w-100" alt="...">
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



          <div class="d-flex justify-content-between gap-2 align-items-center pt-4 pt-md-8 px-3 px-md-6" style="margin-top: 0;">
            <div>
              <a href="portfolio_details.php?id=<?php echo $item['id'];?>" class="project-title fs-five fw-semibold n5-color mt-1 mt-md-5 d-block">
                <?php echo $item['service_title'];?> </a>
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
</section>