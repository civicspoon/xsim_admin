<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">
              <span data-feather="home"></span>
                <i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard
            </a>
      
    <hr>
    <div class="position-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <span data-feather="home"></span>
            <i class="fa fa-book" aria-hidden="true"></i> รายงาน
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php?pageid=5">
            <span data-feather="file"></span>
            Innitial Test
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">
            <span data-feather="file"></span>
            เก็บชัวโมง OJT
          </a>
        </li>
        <li class="nav-item">
        
          <a class="nav-link " href="home.php?pageid=3">
          
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
      <div class="position-sticky">
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
            </li>
            
            <li class="nav-item">
            <a class="nav-link" href="home.php?pageid=4">
              <span data-feather="file-text"></span>
              รายการซ้ำ
            </a>
          </li>
          
       
        ';
        }
          
       
?>
<?php

if($_SESSION['role_id'] == 3 || $_SESSION['role_id'] == 1 ){
  echo'
<hr>
    <div class="position-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <span data-feather="home"></span>
            <i class="fa fa-wrench" aria-hidden="true"></i> ตั้งค่าหลักสูตร
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="home.php?pageid=6">
          <span data-feather="file-text"></span>
          ตั้งค่า
        </a>
      </li>
    ';
}
  ?>
      </ul>
    </div>
 


  </nav>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">X-SIM2 By AOTAVSEC</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <p style="width: 90%;"></p>
    <input class="form-control  form-control-dark rounded" id="uid" type="text" placeholder="รหัสพนักงาน" aria-label="Search">
  <button onclick="search()" class="btn btn-lg text-light btn-info m-2 w-50"><i class="fa fa-search" aria-hidden="true"></i> ค้นหา</button>
    <button onclick="search()" class="btn btn-lg btn-outline-light text-light btn-dark m-2 w-50"><i class="fa fa-sign-out" aria-hidden="true"></i> ออกจากระบบ</button>

  </nav>

  <script>
    function search(){
      let uid = document.getElementById('uid').value
      window.location.replace("home.php?pageid=2&uid="+uid)
    }
  </script>