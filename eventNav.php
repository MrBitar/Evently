 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="events.php" class="logo d-flex align-items-center">
    <img src="../uploads/logo.png" alt="">
    <span class="d-none d-lg-block">EVENTLY</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->
<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">



  <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../uploads/<?=$image?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$name?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

 
  <li class="nav-item">
    <a class="nav-link collapsed" href="home.php">
      <i class="bi bi-menu-button-wide"></i><span>Admins</span>
    </a>
   </li><!-- End Tables Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed"  href="guides.php">
      <i class="bi bi-map"></i><span>Guides</span>
    </a>
   
  
  </li><!-- End Components Nav -->
  <li class="nav-item">
    <a class="nav-link active"  href="events.php">
      <i class="bi bi-clipboard"></i><span>Events</span>
    </a>
   
  </li><!-- End Components Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed"  href="members.php">
      <i class="bi bi-person"></i><span>Members</span>
    </a>
    
  </li><!-- End Charts Nav -->

  <li class="nav-item">
        <a class="nav-link collapsed"  href="content.php">
          <i class="bi bi-body-text"></i><span>Website Content</span>
        </a>
        
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="lookup.php">
          <i class="bi bi-tags"></i>
          <span>Lookups</span>
        </a>
      </li>


</aside><!-- End Sidebar-->