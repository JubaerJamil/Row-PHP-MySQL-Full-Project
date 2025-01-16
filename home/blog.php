<?php
    $query = "SELECT * FROM blogs WHERE status = 1 ORDER BY id DESC LIMIT 3";
    $queryResult = mysqli_query($connection, $query);
    $allBlog = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
?>
<section class="pt-120 pb-120">
        <div class="container">
          <div class="d-flex gap-3 flex-wrap flex-xxl-nowrap justify-content-between align-items-end mb-8 mb-md-15">
            <div data-aos="zoom-in-left" class="section-heading">
              <div class="d-flex align-items-center gap-2">
                <div class="title-line"></div>
                <h2 class="display-four n5-color fw-semibold">
                  Latest Blog Posts
                </h2>
              </div>
              <p class="fs-seven n4-color mt-2 mt-md-4">
                <!-- More than 1500+ agencies using Portfolify -->
              </p>
            </div>
            <a data-aos="zoom-in-right" href="blog.php"
              class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill text-nowrap">
              See All Articles
            </a>
          </div>
          <div class="row g-6">


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
        </div>
      </section>