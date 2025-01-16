<?php include 'config/connection.php'; ?>
<?php include 'layout/header.php'; ?>

<div class="d-flex gap-6">
  <!-- sidebar start -->
  <?php include 'layout/sidebar.php'; ?>
  <!-- sidebar end -->

  <!-- main content -->
  <div class="main-content w-100">
    <!-- top header  -->
    <?php include 'layout/responsive_top_Header.php';?>

    <!-- bottom header  -->
    <?php include 'layout/responsive_bottom_Header.php';?>

    <!-- color palettes btns -->
    <?php include 'layout/color_palettes.php';?>
  
  <?php 
    $cardQuery = "SELECT * FROM product_card WHERE status = 1 ORDER BY id DESC";
    $cardQueryResult = mysqli_query($connection, $cardQuery);
    $allcards = mysqli_fetch_all($cardQueryResult, MYSQLI_ASSOC);

    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id= $id";
    $queryResult = mysqli_query($connection, $query);

    $ramdQuery = "SELECT * FROM products WHERE status = 1 ORDER BY RAND() LIMIT 6";
    $ramdQueryResult = mysqli_query($connection, $ramdQuery);

  ?>

      <div class="container">
        <!-- products details banner section start -->
        <?php
        if (mysqli_num_rows($queryResult) > 0) {

          foreach ($queryResult as $product) {
        ?>
        <section class="pt-120 mt-10 mt-lg-0">
          <div class="row g-6 g-sm-12 g-xl-20 align-items-center justify-content-between">
            <div class="col-xl-6">
              <h2 class="fs-two n4-color"><?php echo $product['product_name'];?></h2>
              <p class="n3-color fs-six mt-3 mt-xl-6">
                <?php echo $product['product_short_info'];?>
              </p>
              <div class="d-flex align-items-center gap-3 gap-md-4 mt-5 mt-xl-10">

              <?php  $offerPrice = $product['price'] - $product['dis_price']; ?>


              <?php
                if($product['have_dis'] == 1){
              ?>

                <span class="fs-five fw-semibold n5-color"><i class="fa-solid fa-bangladeshi-taka-sign me-1"></i><?php echo number_format($offerPrice); ?>.00 </span>

              <?php
                }else{
              ?>
                <span class="fs-five fw-semibold n5-color"><i class="fa-solid fa-bangladeshi-taka-sign me-1"></i><?php echo number_format($product['price']);?>.00 </span>
              <?php
                }
              ?>

              <?php if($product['have_dis'] == 1):?>
                <span class="fs-six fw-semibold n5-color mb-3  text-danger text-decoration-line-through">
                <i class="fa-solid fa-bangladeshi-taka-sign me-1"></i><?php echo number_format($product['price']);?>
                </span>
                <?php endif; ?>
              </div>
                <div class="d-flex">
                <button type="button" class="primary-btn p-3 rounded n11-color mt-2"> Add to Cart </button>
                <a href="<?php echo $product['preview_link'];?>" target="_blank" class="primary-btn p-3 rounded n11-color mt-2 ms-2"> Live Preview </a>
                </div>

            </div>
            <div class="col-xl-6 d-flex align-items-center justify-content-center">
              <div class="overflow-hidden">
                <img src="<?php echo "upload/product_img/". $product['image'];?>" alt="<?php echo $product['product_name'];?>" class="product-details-img" />
              </div>
            </div>
          </div>
        </section>
        <!-- products details banner section end -->

        <!-- products details card start -->
        <section class="pt-60">
          <div class="row g-3 g-md-6">

          <?php foreach($allcards as $card):?>
            <div class="col-sm-6 col-xl-4 col-xxl-3">
              <div class="bgn2-color brn4 p-3 p-md-5 rounded">
                <span class="fs-five p1-color d-block">
                  <i class="ph-fill ph-seal-check"></i>
                </span>
                <span class="fs-five fw-medium n5-color mt-1 mt-md-2"><?php echo $card['card_info'];?></span>
              </div>
            </div>
          <?php endforeach; ?>
          </div>
        </section>
        <!-- products details card end -->

        <!-- products details description start -->
        <style>
                .external,
                p,
                h1,
                h2,
                h3,
                h4,
                h5,
                h6,
                a {
                  color: rgba(var(--n5), 1);
                }
              </style>
        <section class="details-description pt-60 pb-60 d-flex flex-column gap-4 gap-md-8">
          <p class="n3-color fs-seven external">
          <?php echo $product['product_details'];?>
          </p>
        </section>
        <?php
          }
        } else {
          echo "Details information Not found";
        }
        ?>

        <!-- products details description end -->

        <!-- similar products section start -->
        <section class="pb-120">
          <h3 class="fs-two n5-color mb-5 mb-md-10">
              Check out some of our other products
          </h3>
          <div class="row g-6 g-md-8">

            <?php foreach($ramdQueryResult as $item):?>
            <div class="col-sm-6 col-xxl-4">
                <!-- <div data-aos="fade-up" data-aos-duration="800" class="col-sm-6 col-xxl-4"> -->
                  <div class="product-card">
                    <a href="products-details.php?id=<?php echo $item['id'];?>" class="thumb d-block">
                      <div class="post-thumb">
                        <div class="post-thumb-inner">
                          <img src="<?php echo "upload/product_img/". $item['image'];?>" alt="<?php echo $item['product_name'];?>" class="product-img w-100 p-2" />
                        </div>
                      </div>
                      <div class="post-thumb">
                        <div class="post-thumb-inner">
                          <img src="<?php echo "upload/product_img/". $item['image'];?>" alt="<?php echo $item['product_name'];?>" class="product-img w-100 p-2" />
                        </div>
                      </div>
                    </a>
                    <div class="px-2">
                      <a href="products-details.php?id=<?php echo $item['id'];?>"
                        class="project-title fs-six fw-semibold n5-color mt-3 mt-md-5 mb-2 d-block">
                        <?php echo $item['product_name'];?>
                      </a>
                      <?php
                          $shortDis = $item['product_short_info'];
                      ?>
                      <p class="fs-six n3-color">
                        <?php echo substr($shortDis, 0, 75).'... <a href="products-details.php?id='.$item['id'].'" class="text-success">read more</a>'?>
                      </p>


                      <?php  $offerPrice = $item['price'] - $item['dis_price']; ?>

                      <?php
                        if($item['have_dis'] == 1){
                      ?>
                          <span class="n5-color fs-seven fw-medium mt-2 mt-md-3">Price: <i class="fa-solid fa-bangladeshi-taka-sign me-1"></i>
                          <?php echo number_format($offerPrice); ?>.00
                        </span>
                      <?php
                        }else{
                      ?>
                          <span class="n5-color fs-seven fw-medium mt-2 mt-md-3">Price: <i class="fa-solid fa-bangladeshi-taka-sign me-1"></i>
                          <?php echo number_format($item['price']);?>.00
                          </span>
                      <?php
                        }
                      ?>
                      

                      <?php if($item['have_dis'] == 1):?>
                        <span class="n5-color fs-eight fw-medium mt-2 mt-md-3 ms-2 text-danger text-decoration-line-through"> 
                        <i class="fa-solid fa-bangladeshi-taka-sign me-1"></i><?php echo number_format($item['price']);?> </span>
                      <?php endif; ?>
                      <div class="d-flex gap-3 gap-md-4 align-items-center mt-3 mt-md-5">
                        <button type="button" class="primary-btn px-3 py-2 rounded n11-color" data-bs-toggle="modal"
                          data-bs-target="#exampleModal">
                          Add to Cart
                        </button>

                        <a href="products-details.php?id=<?php echo $item['id'];?>"
                          class="project-link d-flex align-items-center justify-content-center flex-shrink-0">
                          <i class="ph-bold ph-arrow-up-right n5-color"></i>
                        </a>

                        <a href="<?php echo $product['preview_link'];?>" target="_blank" class="px-3 py-1 rounded btn btn-outline-success">
                          Live Preview
                        </a>


                      </div>
                    </div>
                  </div>
                <!-- </div> -->
              </div>
              <?php endforeach; ?>


          </div>
        </section>
        <!-- similar products section end -->
      </div>

      <!-- footer section start -->
      <?php include 'layout/footer.php'; ?>