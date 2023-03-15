<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">
              <span data-feather="home"></span>
                <i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard
            </a>
      
    <hr>
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <span data-feather="home"></span>
            <i class="fa fa-book" aria-hidden="true"></i> รายงาน
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="">
            <span data-feather="file"></span>
            เก็บชัวโมง OJT
          </a>
        </li>
        <li class="nav-item">
         
          <a class="nav-link" href="ojtperyear.php">
            <span data-feather="shopping-cart"></span>
            เก็บชั่วโมงประจำปี  
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="users"></span>
            สอบวิเคราะห์ภาพ
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            สอบภาคทฤษฎี
          </a>
        </li>
        
      </ul>
      <hr>
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              <i class="fa fa-user" aria-hidden="true"></i> ผู้ใช้
            </a>
      
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            เพิ่มชื่อ
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Reset รหัสผ่าน
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            ค้นหา
          </a>
        </li>
<?php

        if($_SESSION['role_id'] == 1 ){
          echo '   <li class="nav-item">
              <a class="nav-link" href="uploadexcel.php">
                <span data-feather="file-text"></span>
                Upload Excel
              </a>
            </li>';
        }
          
       
?>
      </ul>
    </div>
    <hr>
    <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span><i class="fa fa-sign-out" aria-hidden="true"></i> ออกจาระบบ</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h4>


  </nav>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">X-SIM2 By AOTAVSEC</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="รหัสพนักงาน" aria-label="Search">
  <button class="btn btn-lg-block text-light"><i class="fa fa-search" aria-hidden="true"></i> ค้นหา</button>
  </nav>