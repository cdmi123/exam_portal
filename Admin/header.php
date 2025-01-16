<?php include_once 'db.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exam Portal</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/select2.min.css" />
  <link rel="stylesheet" href="assets/css/select2-bootstrap-5-theme.min.css" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="index.html" class="text-nowrap logo-img ms-0 ms-md-1">
          <img src="https://demos.wrappixel.com/free-admin-templates/bootstrap/spike-bootstrap-free/src/assets/images/logos/dark-logo.svg" width="180" alt="">
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar" data-simplebar>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav" class="mb-0">

            <!-- ============================= -->
            <!-- Home -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-link primary-hover-bg" href="dashboard.php" aria-expanded="false">
                <span class="aside-icon p-2 bg-light-primary rounded-1">
                  <i class="ti ti-layout-dashboard fs-7"></i>
                </span>
                <span class="hide-menu ps-1">Dashboard</span>
              </a>
            </li>
            
             <li class="sidebar-item">
              <a class="sidebar-link sidebar-link primary-hover-bg" href="view_student.php" aria-expanded="false">
                <span class="aside-icon p-2 bg-light-primary rounded-1">
                  <i class="ti ti-article fs-7"></i>
                </span>
                <span class="hide-menu ps-1">View Student</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
              <span class="hide-menu">Manage Course</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-link primary-hover-bg" href="add_course.php" aria-expanded="false">
                <span class="aside-icon p-2 bg-light-primary rounded-1">
                  <i class="ti ti-article fs-7"></i>
                </span>
                <span class="hide-menu ps-1">Add Course</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-link primary-hover-bg" href="add_topic.php" aria-expanded="false">
                <span class="aside-icon p-2 bg-light-primary rounded-1">
                  <i class="ti ti-article fs-7"></i>
                </span>
                <span class="hide-menu ps-1">Add Topic</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
              <span class="hide-menu">Manage Question</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-link primary-hover-bg" href="add_question.php" aria-expanded="false">
                <span class="aside-icon p-2 bg-light-primary rounded-1">
                  <i class="ti ti-article fs-7"></i>
                </span>
                <span class="hide-menu ps-1">Add Question</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-link primary-hover-bg" href="show_question.php" aria-expanded="false">
                <span class="aside-icon p-2 bg-light-primary rounded-1">
                  <i class="ti ti-article fs-7"></i>
                </span>
                <span class="hide-menu ps-1">View Question</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
