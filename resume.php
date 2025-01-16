<?php include 'config/connection.php';?>
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
  $headerquery = "SELECT * FROM resume_header";
  $headerquery_run = mysqli_query($connection, $headerquery);
  $headerData = mysqli_fetch_all($headerquery_run, MYSQLI_ASSOC);

  $experiencequery = "SELECT * FROM work_experience WHERE status = 1 ORDER BY id DESC";
  $experiencequery_run = mysqli_query($connection, $experiencequery);
  $experienceData = mysqli_fetch_all($experiencequery_run, MYSQLI_ASSOC);

  $projectQuery = "SELECT * FROM resume_projects WHERE status = 1 ORDER BY id DESC";
  $projectQuery_run = mysqli_query($connection, $projectQuery);
  $projectData = mysqli_fetch_all($projectQuery_run, MYSQLI_ASSOC);

  $tSkillQuery = "SELECT * FROM t_skills WHERE status = 1 ORDER BY id DESC";
  $tSkillQuery_run = mysqli_query($connection, $tSkillQuery);
  $tSkillData = mysqli_fetch_all($tSkillQuery_run, MYSQLI_ASSOC);

  $proSkillQuery = "SELECT * FROM pro_skills WHERE status = 1 ORDER BY id DESC";
  $proSkillQuery_run = mysqli_query($connection, $proSkillQuery);
  $proSkillData = mysqli_fetch_all($proSkillQuery_run, MYSQLI_ASSOC);

  $lanSkillQuery = "SELECT * FROM language_skills WHERE status = 1 ORDER BY id DESC";
  $lanSkillQuery_run = mysqli_query($connection, $lanSkillQuery);
  $lanSkillData = mysqli_fetch_all($lanSkillQuery_run, MYSQLI_ASSOC);

  $interestQuery = "SELECT * FROM interests WHERE status = 1 ORDER BY id DESC";
  $interestQuery_run = mysqli_query($connection, $interestQuery);
  $interestData = mysqli_fetch_all($interestQuery_run, MYSQLI_ASSOC);

  $proEduQuery = "SELECT * FROM pro_education WHERE status = 1 ORDER BY id DESC";
  $proEduQuery_run = mysqli_query($connection, $proEduQuery);
  $proEduQueryData = mysqli_fetch_all($proEduQuery_run, MYSQLI_ASSOC);

  $acaEduQuery = "SELECT * FROM academic_edu WHERE status = 1 ORDER BY id DESC";
  $acaEduQuery_run = mysqli_query($connection, $acaEduQuery);
  $acaEduQueryData = mysqli_fetch_all($acaEduQuery_run, MYSQLI_ASSOC);
?>
    <!-- Resume section start -->
    <section class="pt-120 pb-120 mt-10 mt-lg-0">
      <div class="pb-60 br-bottom-n3">
        <div data-aos="zoom-in" class="page-heading">
          <h3 class="page-title fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
            Online Resume
          </h3>

          <a href="assets/images/resume.pdf"
            class="w-max primary-btn bg1-color fw-medium n1-color px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto"
            download>
            <i class="ph ph-file-pdf"></i>Download PDF Version
          </a>
        </div>
      </div>

      <div class="container mt-8 mt-md-15">
        <div data-aos="fade-up" class="bgn2-color p-4 p-sm-8 p-md-15 rounded-5 brn4">
        <?php foreach($headerData as $header):?>
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 br-bottom-n3 pb-3 pb-md-6">
            <div>
              <h2 class="display-six p1-color fw-semibold">
                <?php echo $header['name'];?>
              </h2>
              <span class="n4-color fs-five fw-medium mt-3"><?php echo $header['designation'];?></span>
            </div>
            <div class="ps-5 br-left-n3">
              <ul class="d-flex flex-column gap-3">
                <li>
                  <a href="tel:+6494461709" class="d-flex gap-2 align-items-center n4-color">
                    <i class="ph ph-phone"></i><?php echo $header['phone'];?></span></a>
                </li>
                <li>
                  <a href="mailto:someone@example.com" class="d-flex gap-2 align-items-center n4-color">
                    <i class="ph ph-envelope-simple"></i><?php echo $header['email'];?></a>
                </li>
                <li class="d-flex gap-2 align-items-center n4-color">
                  <i class="ph ph-globe"></i> <?php echo $header['website'];?>
                </li>
                <li class="d-flex gap-2 align-items-center n4-color">
                  <i class="ph ph-map-pin"></i> <?php echo $header['address'];?>
                </li>
              </ul>
            </div>
          </div>

          <div
            class="d-flex flex-wrap flex-md-nowrap align-items-center gap-5 gap-md-10 pb-4 pb-md-8 br-bottom-n3 pt-60">
            <div class="resume-profile flex-shrink-0">
              <img src="<?php echo "upload/resume/". $header['image'];?>" alt="profile" class="object-fit-cover" width="127" height="159" />
            </div>
            <p class="n42-color fs-seven">
            <?php echo $header['object'];?>
            </p>
          </div>
          <?php endforeach ;?>

          <div class="resume-section row g-6 pt-60 pb-60 br-bottom-n3">
            <div class="col-md-8 col-lg-12 col-xl-8 col-xxl-9">
              <div class="d-flex align-items-center gap-2 mb-5 mb-md-10">
                <div class="title-line2"></div>
                
                  <h2 class="fs-three p1-color fw-bold"> Work Experiences</h2>
              </div>
            <?php foreach($experienceData as $experience):?>
              <div class="mb-4 mb-md-6">
                <div class="d-flex flex-wrap gap-1 gap-sm-3 justify-content-between align-items-center">
                  <span class="fs-six fw-medium p1-color"><?php echo $experience['designation'];?></span>
                </div>

                <div class="d-flex flex-wrap gap-1 gap-sm-3 justify-content-between align-items-center">
                  <span class="n5-color fs-seven"><?php echo $experience['company_name'];?></span>
                  <?php 
                    $startDate = $experience['start_date'];
                    $startDateObj = date_create($startDate);

                    $endDate = $experience['end_date'];
                    $endDateObj = date_create($endDate);
                  ?>
                  <span class="n4-color fs-eight"> <?php echo date_format($startDateObj, "M-Y");?> - 

                    <?php
                    if($experience['contunue'] == 0) {
                        ?>
                        <?php echo date_format($endDateObj, "M-Y");?>
                    <?php
                    } else {
                    ?>
                        <?php echo "Present"; ?>
                    <?php
                    }
                    ?>
                
                </span>
                </div>

                <p class="n42-color fs-seven my-2 my-md-5">
                    <?php echo $experience['responsibility'];?>
                </p> 
              </div>
              <?php endforeach; ?>

            
           

              <!-- project -->
              <div class="d-flex align-items-center gap-2 mb-5 mb-md-10">
                <div class="title-line2"></div>
                <h2 class="fs-three p1-color fw-semibold">Projects</h2>
              </div>
                <?php foreach($projectData as $project):?>
                  <div class="mb-4 mb-md-6">
                    <div class="d-flex flex-wrap gap-1 gap-sm-3 justify-content-between align-items-center mb-2 mb-md-4">
                      <span class="p1-color fs-six fw-medium"><?php echo $project['project_name'];?></span>
                      <a href="<?php echo $project['project_link'];?>" class="n42-color fs-eight">view</a>
                    </div>
                    <p class="n42-color fs-seven">
                      <?php echo $project['project_details'];?>
                    </p>
                  </div>
                <?php endforeach; ?>
            </div>

            <!-- right side  -->
            <div class="col-md-4 col-lg-12 col-xl-4 col-xxl-3">
              <div class="ps-4 ps-xxl-7 br-left-n3 d-flex flex-column gap-8 gap-md-10">
                <!-- skills  -->
                <div>
                  <div class="d-flex align-items-center gap-2 mb-5 mb-md-10">
                    <div class="title-line2"></div>
                    <h2 class="fs-three p1-color fw-semibold">Skills</h2>
                  </div>

                  <div class="mb-3 mb-md-6">
                    <h5 class="fs-six n5-color fw-medium mb-2 mb-md-4 text-decoration-underline">
                      Technical
                    </h5>
                    <ul class="d-flex flex-column gap-3 ms-6 ms-lg-10">
                      <?php foreach($tSkillData as $techSkill):?>
                      <li class="n4-color fs-seven"><?php echo $techSkill['skill_name'];?></li>
                      <?php endforeach; ?>
                    </ul>
                  </div>

                  <div>
                    <h5 class="fs-six n5-color fw-medium mb-2 mb-md-4 text-decoration-underline">
                      Professional
                    </h5>
                    <ul class="d-flex flex-column gap-3 ms-6 ms-lg-10">
                    <?php foreach($proSkillData as $proSkill):?>
                      <li class="n4-color fs-seven"><?php echo $proSkill['pro_skill_name'];?></li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>

                <!-- education  -->
                <div>
                  <div class="d-flex align-items-center gap-2 mb-3 mb-md-6">
                    <div class="title-line2"></div>
                    <h2 class="fs-three p1-color fw-semibold">Education</h2>
                  </div>
                  <h5 class="fs-six n5-color fw-medium mb-2 mb-md-4 text-decoration-underline">
                    Professional
                  </h5>
                  <?php foreach($proEduQueryData as $proEdu):?>
                  <div class="d-flex gap-2 mb-3 mb-md-5">
                    <i class="ph ph-graduation-cap fs-six p1-color"></i>
                    <div>
                      <span class="n4-color fs-eight"><?php echo $proEdu['course_name'];?></span>
                      <br>
                      <span class="n4-color fs-nine"><?php echo $proEdu['institute_name'];?></span>
                      <br>
                      <span class="n4-color fs-ten"><?php echo $proEdu['course_duration'];?></span>
                      <br>
                      <span class="n4-color fs-nine fw-bold">Mentor:</span>
                      <br>
                      <span class="n4-color fs-nine"><?php echo $proEdu['mentor'];?></span>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>


                <div>
                  <h5 class="fs-six n5-color fw-medium mb-2 mb-md-4 text-decoration-underline">
                    Academic
                  </h5>
                  <?php foreach($acaEduQueryData as $acaEdu):?>
                  <div class="d-flex gap-2 mb-3 mb-md-5">
                    <i class="ph ph-graduation-cap fs-six p1-color"></i>
                    <div>
                      <span class="n4-color fs-eight"><?php echo $acaEdu['edu_title'];?></span>
                      <br>
                      <span class="n4-color fs-nine"><?php echo $acaEdu['institute_name'];?></span>
                      <br>
                      <span class="n4-color fs-ten"><?php echo $acaEdu['result'];?></span>
                      <br>
                      <span class="n4-color fs-ten"><?php echo $acaEdu['passing_year'];?></span>
                    </div>
                  </div>
                  <?php endforeach;?>
                </div>




                <!-- awards  -->
                <!-- <div>
                  <div class="d-flex align-items-center gap-2 mb-3 mb-md-6">
                    <div class="title-line2"></div>
                    <h2 class="fs-three p1-color fw-semibold">Awards</h2>
                  </div>
                  <div class="d-flex gap-2 mb-3 mb-md-5">
                    <i class="ph ph-trophy fs-six p1-color"></i>
                    <div>
                      <span class="n4-color fs-seven">Award Lorem Ipsum Microsoft lorem ipsum</span>
                      <span class="n4-color fs-eleven">2019</span>
                    </div>
                  </div>
                  <div class="d-flex gap-2">
                    <i class="ph ph-trophy fs-six p1-color"></i>
                    <div>
                      <span class="n4-color fs-seven">Award Donec Sodales Oracle Aenean</span>
                      <span class="n4-color fs-eleven">2017</span>
                    </div>
                  </div>
                </div> -->
                <!-- Languages  -->
                <div>
                  <div class="d-flex align-items-center gap-2 mb-3 mb-md-6">
                    <div class="title-line2"></div>
                    <h2 class="fs-three p1-color fw-semibold">Languages</h2>
                  </div>
                  <ul class="d-flex flex-column gap-3 ms-6 ms-lg-10">
                    <?php foreach($lanSkillData as $language):?>
                      <li class="n4-color fs-seven"><?php echo $language['languages_name'];?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <!-- Interests  -->
                <div>
                  <div class="d-flex align-items-center gap-2 mb-3 mb-md-6">
                    <div class="title-line2"></div>
                    <h2 class="fs-three p1-color fw-semibold">Interests</h2>
                  </div>
                  <ul class="d-flex flex-column gap-3 ms-6 ms-lg-10">
                  <?php foreach($interestData as $interest):?>
                      <li class="n4-color fs-seven"><?php echo $interest['interest_name'];?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex flex-wrap gap-2 gap-md-3 gap-md-5 align-items-center justify-content-center mt-4 mt-md-8">
            <a href="javascript:void(0)" class="d-flex gap-1 align-items-center resume-icon">
              <div class="social-icon">
                <i class="ph ph-github-logo p1-color"></i>
              </div>
              <span class="fs-nine n4-color">github.com/username</span>
            </a>
            <a href="javascript:void(0)" class="d-flex gap-1 align-items-center resume-icon">
              <div class="social-icon">
                <i class="ph ph-linkedin-logo p1-color"></i>
              </div>
              <span class="fs-nine n4-color">linkedin.com/in/username</span>
            </a>
            <a href="javascript:void(0)" class="d-flex gap-1 align-items-center resume-icon">
              <div class="social-icon">
                <i class="ph ph-x-logo p1-color"></i>
              </div>
              <span class="fs-nine n4-color">@twittername</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Resume section end -->

    <!-- footer section start -->
    <?php include 'layout/footer.php'; ?>