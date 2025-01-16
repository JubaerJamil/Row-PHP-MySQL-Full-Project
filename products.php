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
      $catQuery = "SELECT * FROM product_categories WHERE status = 1 ORDER BY id DESC";
      $catQueryResult = mysqli_query($connection, $catQuery);
      $allcategories = mysqli_fetch_all($catQueryResult, MYSQLI_ASSOC);

      $query = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC";
      $queryResult = mysqli_query($connection, $query);
      $allproducts = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);

    ?>

    <!-- best project section start -->
    <section class="pt-120 pb-120 mt-10 mt-lg-0">
      <div class="pb-60 br-bottom-n3">
        <div data-aos="zoom-in" class="page-heading">
          <h3 class="page-title n5-color fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
            Check Out What I've Created for You
          </h3>
          <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
            Explore a collection of projects where creativity meets code.
            From sleek, responsive designs to intuitive user experiences,
            each project represents a unique solution tailored to meet
            client needs. Dive in to see how ideas transform into digital
            realities.
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
            class="tabs d-flex gap-5 gap-md-10 justify-content-center flex-wrap p-2 pb-5 pb-md-10">
            <li data-tab-target="#all" class="active fs-seven fw-medium cursor-pointer n3-color pb-1 tab"> All </li>
            <?php foreach($allcategories as $category):?>
            <li data-tab-target="#e-books<?php echo $category['id'];?>" class="fs-seven fw-medium cursor-pointer n3-color pb-1 tab"> <?php echo $category['category_name'];?> </li>
            <?php endforeach; ?>
          </ul>

          <div class="tab-content position-relative overflow-hidden">
            <div id="all" data-tab-content class="active">
              <div class="row g-6 g-md-8">
               <?php foreach($allproducts as $product):?>
                <div data-aos="fade-up" data-aos-duration="800" class="col-sm-6 col-xxl-4">
                  <div class="product-card">
                    <a href="products-details.php?id=<?php echo $product['id'];?>" class="thumb d-block">
                      <div class="post-thumb">
                        <div class="post-thumb-inner">
                          <img src="<?php echo "upload/product_img/". $product['image'];?>" alt="<?php echo $product['product_name'];?>" class="product-img w-100 p-2" />
                        </div>
                      </div>
                      <div class="post-thumb">
                        <div class="post-thumb-inner">
                          <img src="<?php echo "upload/product_img/". $product['image'];?>" alt="<?php echo $product['product_name'];?>" class="product-img w-100 p-2" />
                        </div>
                      </div>
                    </a>
                    <div class="px-2">
                      <a href="products-details.php?id=<?php echo $product['id'];?>"
                        class="project-title fs-six fw-semibold n5-color mt-3 mt-md-5 mb-2 d-block">
                        <?php echo $product['product_name'];?>
                      </a>
                      <?php
                          $shortDis = $product['product_short_info'];
                      ?>
                      <p class="fs-six n3-color">
                        <?php echo substr($shortDis, 0, 75).'... <a href="products-details.php?id='.$product['id'].'" class="text-success">read more</a>'?>
                      </p>


                      <?php  $offerPrice = $product['price'] - $product['dis_price']; ?>

                      <?php
                        if($product['have_dis'] == 1){
                      ?>
                          <span class="n5-color fs-seven fw-medium mt-2 mt-md-3">Price: <i class="fa-solid fa-bangladeshi-taka-sign me-1"></i>
                          <?php echo number_format($offerPrice); ?>.00
                        </span>
                      <?php
                        }else{
                      ?>
                          <span class="n5-color fs-seven fw-medium mt-2 mt-md-3">Price: <i class="fa-solid fa-bangladeshi-taka-sign me-1"></i>
                          <?php echo number_format($product['price']);?>.00
                          </span>
                      <?php
                        }
                      ?>
                      

                      <?php if($product['have_dis'] == 1):?>
                        <span class="n5-color fs-eight fw-medium mt-2 mt-md-3 ms-2 text-danger text-decoration-line-through"> 
                        <i class="fa-solid fa-bangladeshi-taka-sign me-1"></i><?php echo number_format($product['price']);?> </span>
                      <?php endif; ?>
                      <div class="d-flex gap-3 gap-md-4 align-items-center mt-3 mt-md-5">
                        <button type="button" class="primary-btn px-3 py-2 rounded n11-color" data-bs-toggle="modal"
                          data-bs-target="#exampleModal">
                          Add to Cart
                        </button>

                        <a href="products-details.php?id=<?php echo $product['id'];?>"
                          class="project-link d-flex align-items-center justify-content-center flex-shrink-0">
                          <i class="ph-bold ph-arrow-up-right n5-color"></i>
                        </a>

                        <a href="<?php echo $product['preview_link'];?>" target="_blank" class="px-3 py-1 rounded btn btn-outline-success">
                          Live Preview
                        </a>

                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>

              </div>
            </div>

            <?php foreach($allcategories as $category):?>
              <div id="e-books<?php echo $category['id'];?>" data-tab-content>
            
              <div class="row g-6 g-md-8">
                <?php foreach($allproducts as $product):?>
                  <?php if($category['id'] == $product['category_id']):?>
                <div class="col-sm-6 col-xxl-4">
                <div class="product-card">
                    <a href="products-details.php?id=<?php echo $product['id'];?>" class="thumb d-block">
                      <div class="post-thumb">
                        <div class="post-thumb-inner">
                          <img src="<?php echo "upload/product_img/". $product['image'];?>" alt="<?php echo $product['product_name'];?>" class="product-img w-100 p-2" />
                        </div>
                      </div>
                      <div class="post-thumb">
                        <div class="post-thumb-inner">
                          <img src="<?php echo "upload/product_img/". $product['image'];?>" alt="<?php echo $product['product_name'];?>" class="product-img w-100 p-2" />
                        </div>
                      </div>
                    </a>
                    <div class="px-2">
                      <a href="products-details.php?id=<?php echo $product['id'];?>"
                        class="project-title fs-six fw-semibold n5-color mt-3 mt-md-5 mb-2 d-block">
                        <?php echo $product['product_name'];?>
                      </a>
                      <?php
                          $shortDis = $product['product_short_info'];
                      ?>
                      <p class="fs-six n3-color">
                        <?php echo substr($shortDis, 0, 75).'... <a href="products-details.php?id='.$product['id'].'" class="text-success">read more</a>'?>
                      </p>


                      <?php  $offerPrice = $product['price'] - $product['dis_price']; ?>

                      <?php
                        if($product['have_dis'] == 1){
                      ?>
                          <span class="n5-color fs-seven fw-medium mt-2 mt-md-3">Price: <i class="fa-solid fa-bangladeshi-taka-sign me-1"></i>
                          <?php echo number_format($offerPrice); ?>.00
                        </span>
                      <?php
                        }else{
                      ?>
                          <span class="n5-color fs-seven fw-medium mt-2 mt-md-3">Price: <i class="fa-solid fa-bangladeshi-taka-sign me-1"></i>
                          <?php echo number_format($product['price']);?>.00
                          </span>
                      <?php
                        }
                      ?>
                      

                      <?php if($product['have_dis'] == 1):?>
                        <span class="n5-color fs-eight fw-medium mt-2 mt-md-3 ms-2 text-danger text-decoration-line-through"> 
                        <i class="fa-solid fa-bangladeshi-taka-sign me-1"></i><?php echo number_format($product['price']);?> </span>
                      <?php endif; ?>
                      <div class="d-flex gap-3 gap-md-4 align-items-center mt-3 mt-md-5">
                        <button type="button" class="primary-btn px-3 py-2 rounded n11-color" data-bs-toggle="modal"
                          data-bs-target="#exampleModal">
                          Add to Cart
                        </button>
                        <a href="products-details.php?id=<?php echo $product['id'];?>"
                          class="project-link d-flex align-items-center justify-content-center flex-shrink-0">
                          <i class="ph-bold ph-arrow-up-right n5-color"></i>
                        </a>

                        <a href="<?php echo $product['preview_link'];?>" target="_blank" class="px-3 py-1 rounded btn btn-outline-success">
                          Live Preview
                        </a>

                      </div>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                



              </div>
            </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>
    </section>
    <!-- best project section end -->

    <!-- The Modal start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bgn1-color">
          <div class="modal-header bg1-color br-bottom-n5">
            <h1 class="modal-title n11-color fs-five fw-medium" id="exampleModalLabel">
              Your Cart
            </h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-3 p-md-5">
            <div class="d-flex gap-2 align-items-center justify-content-between mb-3 mb-md-4">
              <div class="d-flex gap-4 align-items-center">
                <img src="assets/images/blog4.png" alt="..." class="add-cart-img" />
                <div>
                  <h5 class="fs-seven fw-medium n5-color mb-1">
                    Unleashing Creativity in Code
                  </h5>
                  <span class="fs-eight p1-color d-block mb-1">$120.00 USD</span>
                  <button class="text-danger">Remove</button>
                </div>
              </div>
              <div class="d-flex gap-1 align-items-center">
                <span class="discrement fs-six n5-color cursor-pointer">
                  <i class="ph-bold ph-minus"></i>
                </span>
                <span class="product-count fs-six fw-semibold n5-color py-1 px-2 brn4">1</span>
                <span class="increment fs-six n5-color cursor-pointer">
                  <i class="ph-bold ph-plus"></i>
                </span>
              </div>
            </div>
            <div class="d-flex gap-2 align-items-center justify-content-between">
              <div class="d-flex gap-4 align-items-start">
                <img src="assets/images/blog5.png" alt="..." class="add-cart-img" />
                <div>
                  <h5 class="fs-seven fw-medium n5-color mb-1">
                    Mastering Modern Development
                  </h5>
                  <span class="fs-eight p1-color d-block mb-1">$100.00 USD</span>
                  <button class="text-danger">Remove</button>
                </div>
              </div>
              <div class="d-flex gap-1 align-items-center">
                <span class="discrement fs-six n5-color cursor-pointer">
                  <i class="ph-bold ph-minus"></i>
                </span>
                <span class="product-count fs-six fw-semibold n5-color py-1 px-2 brn4">1</span>
                <span class="increment fs-six n5-color cursor-pointer">
                  <i class="ph-bold ph-plus"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="modal-footer br-top-n5">
            <div class="w-full d-flex gap-2 align-items-center justify-content-between mb-2 mb-md-3">
              <h5 class="fs-seven fw-medium n5-color">Sub-total:</h5>
              <span class="fs-six n5-color">$220.00 USD</span>
            </div>
            <a href="checkout.php" class="primary-btn w-100 py-3 rounded-pill text-center n11-color fw-medium">Continu
              to Checkout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- The Modal end -->

    <!-- footer section start -->
    <?php include 'layout/footer.php'; ?>