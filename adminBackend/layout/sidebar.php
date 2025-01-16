<div class="sidenav-menu">

<!-- Brand Logo -->
<a href="<?php echo BASE_URL; ?>index.php" class="logo">
    <span class="logo-light">
        <span class="logo-lg"><img src="<?php echo BASE_URL; ?>assets/images/faviconjj_.png" alt="logo"><span class="text-white ms-1 fw-bold">Admin Panel</span></span>
        <span class="logo-sm"><img src="<?php echo BASE_URL; ?>assets/images/faviconjj_.png" alt="small logo"></span>
    </span>

    <span class="logo-dark">
        <span class="logo-lg"><img src="<?php echo BASE_URL; ?>assets/images/logo-dark.png" alt="dark logo"></span>
        <span class="logo-sm"><img src="<?php echo BASE_URL; ?>assets/images/faviconjj_.png" alt="small logo"></span>
    </span>
</a>

<!-- Sidebar Hover Menu Toggle Button -->
<button class="button-sm-hover">
    <i class="fa-regular fa-circle-dot"></i>
</button>

<!-- Full Sidebar Menu Close Button -->
<button class="button-close-fullsidebar">
    <i class="ti ti-x align-middle"></i>
</button>

<div data-simplebar>

    <!--- Sidenav Menu -->
    <ul class="side-nav">
        <li class="side-nav-title">Dashboard</li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                <span class="menu-icon"><i class="fa-solid fa-diagram-project"></i></span>
                <span class="menu-text"> Projects </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarEcommerce">
                <ul class="sub-menu">
                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>projects/categories/index.php" class="side-nav-link">
                            <span class="menu-text">Categories</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>projects/project/index.php" class="side-nav-link">
                            <span class="menu-text">Project List</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#price&qa" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                <span class="menu-icon"><i class="fa-solid fa-suitcase"></i></span>
                <span class="menu-text"> Packages & QA </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="price&qa">
                <ul class="sub-menu">
                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>package_qa/package/index.php" class="side-nav-link">
                            <span class="menu-text">Packages</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>package_qa/q&a/index.php" class="side-nav-link">
                            <span class="menu-text">Q & A</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#resume" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                <span class="menu-icon"><i class="fa-solid fa-file"></i></span>
                <span class="menu-text"> Resume</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="resume">
                <ul class="sub-menu">
                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>resume/header/create.php" class="side-nav-link">
                            <span class="menu-text">Header</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>resume/skills/technicals/index.php" class="side-nav-link">
                            <span class="menu-text">Technical Skills</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>resume/skills/professional/index.php" class="side-nav-link">
                            <span class="menu-text">Professional Skills</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>resume/languages/index.php" class="side-nav-link">
                            <span class="menu-text">Languages Skills</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>resume/interests/index.php" class="side-nav-link">
                            <span class="menu-text">Interests</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>resume/education/pro_edu/index.php" class="side-nav-link">
                            <span class="menu-text">Pro Education</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>resume/education/academic_edu/index.php" class="side-nav-link">
                            <span class="menu-text">Academic Education</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>resume/project/index.php" class="side-nav-link">
                            <span class="menu-text">Projects</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>resume/work_experience/index.php" class="side-nav-link">
                            <span class="menu-text">Work Experiences</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#products" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                <span class="menu-icon"><i class="fa-brands fa-shopware"></i></span>
                <span class="menu-text"> Products </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="products">
                <ul class="sub-menu">
                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>products/categories/index.php" class="side-nav-link">
                            <span class="menu-text">Categories</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>products/live_card/index.php" class="side-nav-link">
                            <span class="menu-text">Live Card</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>products/products/index.php" class="side-nav-link">
                            <span class="menu-text">Product List</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#blogs" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                <span class="menu-icon"><i class="fa-brands fa-microblog"></i></span>
                <span class="menu-text"> Blogs </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="blogs">
                <ul class="sub-menu">
                    <li class="side-nav-item">
                        <a href="<?php echo BASE_URL; ?>blog/index.php" class="side-nav-link">
                            <span class="menu-text">All Blog</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a href="<?php echo BASE_URL; ?>whatDo/index.php" class="side-nav-link">
                <span class="menu-icon"><i class="fa-solid fa-gauge"></i></span>
                <span class="menu-text"> What I Do </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="<?php echo BASE_URL; ?>review/index.php" class="side-nav-link">
                <span class="menu-icon"><i class="fa-solid fa-star-half-stroke"></i></span>
                <span class="menu-text"> Review </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="<?php echo BASE_URL; ?>contact/index.php" class="side-nav-link">
                <span class="menu-icon"><i class="fa-solid fa-message"></i></span>
                <span class="menu-text"> Client Message </span>
            </a>
        </li>
    </ul>
</div>
</div>