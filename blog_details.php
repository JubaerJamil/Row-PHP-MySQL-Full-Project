<?php session_start(); ?>
<?php include 'config/connection.php'; ?>
<?php include 'layout/header.php'; ?>

<div class="d-flex gap-6">
  <!-- sidebar start -->
  <?php include 'layout/sidebar.php'; ?>
  <!-- sidebar end -->

  <!-- main content -->
  <div class="main-content w-100">
    <!-- top header  -->
    <?php include 'layout/responsive_top_Header.php'; ?>

    <!-- bottom header  -->
    <?php include 'layout/responsive_bottom_Header.php'; ?>

    <!-- color palettes btns -->
    <?php include 'layout/color_palettes.php'; ?>

    <?php
    $id = $_GET['id'];
    $query = "SELECT * FROM blogs WHERE id = $id";
    $queryResult = mysqli_query($connection, $query);
    // $singleBlog = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);

    $commentQuery = "SELECT * FROM comments WHERE post_id = $id ORDER BY id DESC";
    $commentQueryResult = mysqli_query($connection, $commentQuery);
    $allComments = mysqli_fetch_all($commentQueryResult, MYSQLI_ASSOC);
    
    $Comments = "SELECT COUNT(*) AS comment_count FROM comments WHERE post_id = $id";
    $CommentS_run = mysqli_query($connection, $Comments);
    $result = mysqli_fetch_assoc($CommentS_run);
    $commentCount = $result['comment_count'];

    ?>

    <!-- Latest Blog Posts section start -->
    <section class="blog-details-section pt-120 pb-120 mt-10 mt-lg-0">
      <div class="container">
        <div class="text-start">
          <?php
          if (isset($_SESSION['success']) && $_SESSION != '') {
          } ?>
          <?php
          if (isset($_SESSION['success'])) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> <?php echo $_SESSION['success']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
          } else {

          }
          ?>

          <?php unset($_SESSION['success']); ?>

          <?php
          if (isset($_SESSION['failed']) && $_SESSION != '') {
          } ?>
          <?php
          if (isset($_SESSION['failed'])) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> <?php echo $_SESSION['failed']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
          } else {

          }
          ?>
          <?php unset($_SESSION['failed']); ?>
        </div>

        <?php
        if (mysqli_num_rows($queryResult) > 0) {
          foreach ($queryResult as $item) {
            ?>
            <div class="mb-8 mb-md-15">
              <div data-aos="fade-left" class="aos-init aos-animate">
                <h3 class="n5-color fs-one">
                  <?php echo $item['title']; ?>
                </h3>
                <h3 class="n5-color fs-six mb-1 mt-1"><?php echo $item['subject']; ?></h3>
                <div class="d-flex flex-wrap align-items-center gap-2 gap-md-3 mt-3">

                  <span class="n3-color fs-eight">
                    <?php
                    $date = new DateTime($item['created_at']);
                    $now = new DateTime();

                    $diff = $date->diff($now);

                    if ($diff->y > 0) {
                      if ($diff->y > 0 && $diff->m === 0) {
                        echo "Published " . $diff->y . " year ago";
                      } else {
                        echo "Published " . $diff->y . " year" . ($diff->y > 1 ? 's' : '') . " " . "and " . $diff->m . " month" . ($diff->m > 1 ? 's' : '') . " ago";
                      }
                    } elseif ($diff->m > 0) {
                      echo "Published " . $diff->m . " month" . ($diff->m > 1 ? 's' : '') . " ago";
                    } elseif ($diff->d > 0) {
                      echo "Published " . $diff->d . " day" . ($diff->d > 1 ? 's' : '') . " ago";
                    } else {
                      echo "Published today";
                    }
                    // var_dump($diff);
                    ?>

                  </span>
                  <ul class="d-flex align-items-center gap-3">
                    <!-- <li class="n3-color fs-eight">
                      <span class="n4-color">5</span> min read
                    </li> -->
                    <li class="n3-color fs-eight">
                      <span class="n4-color"><?php echo $commentCount;?></span> comments
                    </li>
                  </ul>
                </div>
              </div>
              <div class="my-5 my-md-10 overflow-hidden">
                <img src="<?php echo "upload/blog_img/" . $item['image']; ?>" alt="<?php echo $item['title']; ?>"
                  class="blog-details-img" />
              </div>
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

              <div data-aos="fade-up" class="external mb-8 mb-md-15 aos-init aos-animate">
                <?php echo $item['content']; ?>
              </div>
            </div>
          <?php
          }
        } else {
          echo "Blog content not available";
        }
        ?>


        <!-- <div data-aos="fade-up" class="mb-8 mb-md-15 py-4 py-md-8 brn4-y aos-init aos-animate">
          <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
            <div class="d-flex flex-wrap gap-4 gap-md-8 align-items-center">
              <h4 class="fs-five fw-semibold n5-color">Tag:</h4>
              <div class="d-flex flex-wrap align-items-center gap-2">
                <a href="javascript:void(0)"
                  class="bgn2-color n4-color py-2 py-md-3 px-3 px-md-5 d-block rounded-pill brn4">Business</a>
                <a href="javascript:void(0)"
                  class="bgn2-color n4-color py-2 py-md-3 px-3 px-md-5 d-block rounded-pill brn4">Analysis</a>
                <a href="javascript:void(0)"
                  class="bgn2-color n4-color py-2 py-md-3 px-3 px-md-5 d-block rounded-pill brn4">Technology</a>
                <a href="javascript:void(0)"
                  class="bgn2-color n4-color py-2 py-md-3 px-3 px-md-5 d-block rounded-pill brn4">Design</a>
                <a href="javascript:void(0)"
                  class="bgn2-color n4-color py-2 py-md-3 px-3 px-md-5 d-block rounded-pill brn4">Strategy</a>
              </div>
            </div>
            <div class="d-flex flex-wrap justify-content-center gap-2 align-items-center">
              <a href="javascript:void(0)" class="blog-social-icon brn4">
                <i class="ph ph-facebook-logo p1-color"></i>
              </a>
              <a href="javascript:void(0)" class="blog-social-icon brn4">
                <i class="ph ph-instagram-logo p1-color"></i>
              </a>
              <a href="javascript:void(0)" class="blog-social-icon brn4">
                <i class="ph ph-x-logo p1-color"></i>
              </a>
              <a href="javascript:void(0)" class="blog-social-icon brn4">
                <i class="ph ph-linkedin-logo p1-color"></i>
              </a>
            </div>
          </div>

          <div class="d-flex flex-wrap flex-md-nowrap gap-3 gap-md-6 mt-4 mt-md-8">
            <a href="javascript:void(0)" class="prev-card d-flex gap-3 gap-md-6 align-items-center p-3 brn4 rounded-3">
              <div class="overflow-hidden">
                <img src="assets/images/blog3.png" alt="..." class="prev-img" />
              </div>
              <div>
                <span class="d-flex gap-1 align-items-center p1-color">
                  <i class="ph ph-caret-double-left"></i>
                  Previous
                </span>
                <span class="n5-color fw-semibold fs-eight mt-2 d-block">7 Great Web Development Languages to Learn
                  this
                  Year</span>
              </div>
            </a>
            <a href="javascript:void(0)" class="next-card d-flex gap-3 gap-md-6 align-items-center p-3 brn4 rounded-3">
              <div class="overflow-hidden">
                <img src="assets/images/blog1.png" alt="..." class="prev-img" />
              </div>
              <div>
                <span class="d-flex gap-1 align-items-center p1-color">
                  Next
                  <i class="ph ph-caret-double-right"></i>
                </span>
                <span class="n5-color fw-semibold fs-eight mt-2 d-block">How to Optimize your Website for Better
                  Performance</span>
              </div>
            </a>
          </div>
        </div> -->

        <!-- reply section -->
        <section data-aos="fade-up" class="mt-8 mt-md-15 aos-init aos-animate">


          <h3 class="n5-color fs-three mb-2 mb-md-3">Type Comment</h3>

          <form action="adminBackend/controller/comments.php" method="post" class="mt-5 mt-md-10">
            <input type="hidden" name="postId" value="<?php echo $id; ?>">
            <textarea name="comment" class="n5-color px-3 px-md-5 py-2 py-md-4 rounded-2 brn4 w-100 h-120"
              placeholder="Write here:"></textarea>
            <button type="submit" name="comtBtn"
              class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill mt-5 mt-md-10"> Post Comment </button>
          </form>
        </section>

        <!-- comments -->
        <hr>
        <section data-aos="fade-up" class="mt-8 mt-md-15 aos-init aos-animate">
          <h3 class="n5-color fs-three fw-semibold mb-4 mb-md-8">
          <?php echo $commentCount;?> Comments
          </h3>
        <?php foreach($allComments as $comment):?>
          <div class="reply-container">
            <div class="d-flex flex-wrap flex-md-nowrap gap-4 gap-md-8 px-4 px-md-8 py-3 py-md-6 rounded-3 w-100 brn4">
              <div class="flex-shrink-0">
                <img src="assets/images/commentImage.jpg" alt="..." class="cmnt-img flex-shrink-0" />
              </div>

              <div class="w-100">
                <div class="d-flex gap-3 justify-content-between align-items-center w-100">
                  <div class="w-100">
                    <h6 class="n5-color fs-eight fw-medium">Anonymous</h6>
                    <?php 
                        $date = $comment['created_at'];
                        $dateobj = date_create($date);
                    ?>
                    <span class="n5-color fs-nine fw-medium"><?php echo $dateobj->format('d M Y');?></span>
                  </div>
                  <!-- <button class="reply-btn px-3 px-md-5 py-2 p1-color br1 rounded-pill">
                    Reply
                  </button> -->
                </div>
                <p class="n4-color fs-six mt-2 mt-md-4">
                  <?php echo $comment['comment'];?>
                  
                </p>
              </div>
            </div>

            <div class="reply-answer my-3 my-md-6 ms-5 ms-md-10">
              <form>
                <div class="d-flex align-items-center gap-3 gap-md-5">
                  <input type="text" placeholder="Enter Your comments"
                    class="px-3 px-md-6 py-2 py-md-4 w-100 brn4 rounded-3 n5-color" />
                  <button class="fs-six n11-color bg1-color px-3 px-md-5 py-2 rounded-pill">
                    <i class="ph ph-paper-plane-right"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
          <?php endforeach; ?>

          
   
        </section>


      </div>
    </section>
    <!-- Latest Blog Posts section end -->

    <!-- footer section start -->
    <?php include 'layout/footer.php'; ?>