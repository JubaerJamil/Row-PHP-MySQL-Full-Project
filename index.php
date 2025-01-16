<?php include 'layout/header.php'; ?>

  <div class="d-flex gap-6">
    <!-- sidebar start -->
      <?php include 'layout/sidebar.php';?>
    <!-- sidebar end -->

    <div class="main-content w-100">

    <!-- top header  -->
    <?php include 'layout/responsive_top_Header.php';?>

    <!-- bottom header  -->
    <?php include 'layout/responsive_bottom_Header.php';?>

    <!-- color palettes btns -->
    <?php include 'layout/color_palettes.php';?>

    

      <!-- banner section start  -->
        <?php include 'home/about.php';?>
      <!-- banner section end -->

      <!-- What I do section start -->
      <?php include 'home/whatIDo.php';?>
      <!-- What I do section end -->

      <!-- next project section start -->
        <?php include 'home/letsWork.php';?>
      <!-- next project section end -->

      <!-- Featured Projects section start -->
        <?php include 'home/featuredProjects.php';?>
      <!-- Featured Projects section end -->

      <!-- Testimonials section start -->
        <?php include 'home/Testimonials.php';?>
      <!-- Testimonials section end -->

      <!-- Latest Blog Posts section start -->
        <?php include 'home/blog.php';?>
      <!-- Latest Blog Posts section end -->

      <!-- footer section start -->
     <?php include 'layout/footer.php';?>