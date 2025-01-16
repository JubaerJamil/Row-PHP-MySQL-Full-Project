<?php session_start(); ?>
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

    <!-- Contact Details section start -->
    <section class="pt-120 pb-120 mt-10 mt-lg-0">
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
      <div class="pb-60 br-bottom-n3">
        <div data-aos="zoom-in" class="page-heading">
          <h3 class="page-title fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
            Contact
          </h3>
          <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
            Interested in hiring me for your project or just want to say hi?
            You can fill in the contact form below or send me an email to
            <a href="#" class="p1-color">evans@yourwebsite.com</a> .Want to
            get connected? Follow me on the social channels below.
          </p>
          <div class="d-flex flex-wrap justify-content-center gap-2 align-items-center mt-4">
            <a href="javascript:void(0)" class="social-icon">
              <i class="ph ph-facebook-logo p1-color"></i>
            </a>
            <a href="javascript:void(0)" class="social-icon">
              <i class="ph ph-instagram-logo p1-color"></i>
            </a>
            <a href="javascript:void(0)" class="social-icon">
              <i class="ph ph-x-logo p1-color"></i>
            </a>
            <a href="javascript:void(0)" class="social-icon">
              <i class="ph ph-linkedin-logo p1-color"></i>
            </a>
            <a href="javascript:void(0)" class="social-icon">
              <i class="ph ph-stack-overflow-logo p1-color"></i>
            </a>
            <a href="javascript:void(0)" class="social-icon">
              <i class="ph ph-youtube-logo p1-color"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="container mt-8 mt-md-15">
        <div data-aos="fade-left" class="section-heading">
          <div class="d-flex align-items-center gap-2">
            <div class="title-line"></div>
            <h2 class="display-four n5-color fw-semibold">
              Contact Details
            </h2>
          </div>
          <p class="fs-seven n4-color mt-2 mt-md-4">
            If you are going to use a passage of Lorem Ipsum, you need to be
            sure there isn't anything embarrassing hidden in the middle of
            text.
          </p>
        </div>

        <div data-aos="fade-up"
          class="d-flex flex-wrap gap-3 gap-md-6 align-items-center justify-content-between mt-8 mt-md-15">
          <div class="d-flex gap-3 align-items-center p-3 p-md-5 br1-left">
            <i class="ph ph-device-mobile-camera p1-color fs-one"></i>
            <div>
              <span class="n5-color fs-five fw-semibold d-block mb-2">Phone</span>
              <a href="tel:+6494461709" class="n4-color fs-nine">+123-456-7890</a>
            </div>
          </div>
          <div class="d-flex gap-3 align-items-center p-3 p-md-5 br1-left">
            <i class="ph ph-compass p1-color fs-one"></i>
            <div>
              <span class="n5-color fs-five fw-semibold d-block mb-2">Location</span>
              <span class="n4-color fs-nine">123 Example Street, City, Country</span>
            </div>
          </div>
          <div class="d-flex gap-3 align-items-center p-3 p-md-5 br1-left">
            <i class="ph ph-envelope-open p1-color fs-one"></i>
            <div>
              <span class="n5-color fs-five fw-semibold d-block mb-2">Email</span>
              <a href="mailto:someone@example.com" class="n4-color fs-nine">yourmail@domain.com</a>
            </div>
          </div>
        </div>

        <div data-aos="zoom-in" class="mt-8 mt-md-15">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3747016.8778039054!2d87.7035567133411!3d23.489442669650543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adaaed80e18ba7%3A0xf2d28e0c4e1fc6b!2sBangladesh!5e0!3m2!1sen!2sbd!4v1719998700959!5m2!1sen!2sbd"
            style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            class="w-100 h-400"></iframe>
        </div>
      </div>
    </section>
    <!-- Contact Details section end -->

    <!-- Get In Touch section start -->
    <section class="pb-120">
      <div class="container">
        <div data-aos="fade-up" class="section-heading">
          <div class="d-flex align-items-center gap-2">
            <div class="title-line"></div>
            <h2 class="display-four n5-color fw-semibold">Get In Touch</h2>
          </div>
          <p class="fs-seven n4-color mt-2 mt-md-4">
            If you are going to use a passage of Lorem Ipsum, you need to be
            sure there isn't anything embarrassing hidden in the middle of
            text.
          </p>
        </div>
        

        <form action="proccess/contact.php" method="post" class="mt-8 mt-md-15 p-5 p-md-10 rounded-5 brn4">
          <div class="d-flex flex-wrap flex-md-nowrap gap-3 gap-md-6 mb-3 mb-md-6">
            <div class="d-flex align-items-center gap-2 px-3 px-md-5 py-2 py-md-4 rounded-2 brn4 w-100">
              <i class="ph ph-octagon p1-color fs-six mb-1"></i>
              <input class="n5-color border-0" placeholder="Your Name*" type="text" id="name" name="name" />
            </div>
            <div class="d-flex align-items-center gap-2 px-3 px-md-5 py-2 py-md-4 rounded-2 brn4 w-100">
              <i class="ph ph-envelope p1-color fs-six mb-1"></i>
              <input class="n5-color border-0" placeholder="Email address*" type="email" id="email" name="email" />
            </div>
          </div>
          <div class="d-flex flex-wrap flex-md-nowrap gap-3 gap-md-6">
            <div class="d-flex align-items-center gap-2 px-3 px-md-5 py-2 py-md-4 rounded-2 brn4 w-100">
              <i class="ph ph-device-mobile-camera p1-color fs-six mb-1"></i>
              <input class="n5-color border-0" placeholder="Phone*" type="text" id="phone" name="phone" />
            </div>
            <div class="d-flex align-items-center gap-2 px-3 px-md-5 py-2 py-md-4 rounded-2 brn4 w-100">
              <i class="ph ph-map-pin p1-color fs-six mb-1"></i>
              <input class="n5-color border-0" placeholder="Location*" type="text" id="location" name="location" />
            </div>
          </div>
          <div class="mt-3 mt-md-6">
            <textarea class="n5-color px-3 px-md-6 py-2 py-md-4 rounded-2 brn4 w-100 h-120" placeholder="Your Message:"
              id="message" name="message"></textarea>
          </div>

          <!-- <div class="d-flex gap-2 align-items-center mt-3 mt-md-5">
            <input id="check" type="checkbox" class="cursor-pointer checkbox-single" />
            <label for="check" class="n4-color fs-nine cursor-pointer">
              Save my name, email, and website in this browser for the next
              time.
            </label>
          </div> -->
          <button type="submit" name="savebtn" class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill mt-5 mt-md-10">
            Send Message
          </button>
        </form>



      </div>
    </section>
    <!-- Get In Touch section end -->

    <!-- footer section start -->
    <?php include 'layout/footer.php'; ?>