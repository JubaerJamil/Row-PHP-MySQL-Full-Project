<style>
  .Stars {
    --star-size: 25px;
    --star-color: #fff;
    --star-background: #fc0;
  }

  .Stars {
    --percent: calc(var(--rating) / 5 * 100%);

    display: inline-block;
    font-size: var(--star-size);
    font-family: Times; // make sure ★ appears correctly
    line-height: 1;

    &::before {
      content: '★★★★★';
      letter-spacing: 3px;
      background: linear-gradient(90deg, var(--star-background) var(--percent), var(--star-color) var(--percent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  }

  // Just to make a preview more beautifull

  .Stars {
    background: #eee;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
</style>
<?php
$query = "SELECT * FROM review WHERE status = 1 ORDER BY ID DESC";
$queryResult = mysqli_query($connection, $query);
$allList = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
?>
<section class="pt-120 pb-120 br-bottom-n3">
  <div class="container">
    <div data-aos="zoom-in-up" class="section-heading">
      <div class="d-flex align-items-center gap-2">
        <div class="title-line"></div>
        <h2 class="display-four n5-color fw-semibold">Testimonials</h2>
      </div>
      <p class="fs-seven n4-color mt-2 mt-md-4">
        See how I've helped our clients succeed. IT’s a highly
        Customizable,creative, modern, visually stunning and Bootstrap5
        HTML5 Template.
      </p>
    </div>
    <div class="mt-8 mt-md-15 overflow-x-hidden">
      <div class="swiper testimonial_slider">
        <div class="swiper-wrapper">
        <?php foreach ($allList as $index => $item): ?>
          <div class="swiper-slide">
            <div class="slide-card px-5 px-md-10 py-5 py-md-10 bgn2-color box-shadow1 br-left-p1">
              <!-- <div class="d-flex gap-1 mb-2 mb-md-3"> -->

              <div class="Stars" style="--rating: <?php echo $item['star']; ?>;" aria-label="Rating of this product is 2.3 out of 5."></div>

              <!-- </div> -->
              <p class="n4-color fs-six">
                “<?php echo $item['review']; ?>”
              </p>
              <div class="d-flex gap-3 align-items-center mt-4 mt-md-7">
                <img src="<?php echo "upload/review/" . $item['image']; ?>" alt="<?php echo $item['client_name']; ?>" class="testimonial_img" />

                <div>
                  <span class="fs-eight d-block n5-color"><?php echo $item['client_name']; ?>
                  </span>
                  <span class="fs-nine d-block n5-color"><?php echo $item['client_pro']; ?>
                  </span>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        </div>
        <div class="relative mt-15">
          <div class="swiper-pagination d-flex allign-items-center justify-content-center gap-2"></div>
        </div>
      </div>
    </div>
  </div>
</section>