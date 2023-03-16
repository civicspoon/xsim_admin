<?php 
if(isset($_GET['year'])){
    $year = $_GET['year'];
}
else{
    $year = date("Y");
}
?>
<div class="container-fluid">
   <div class="card">
       <h5 class="card-header bg-info"> <strong> รหัสพนักงาน : </strong> <u><?php echo $_GET['uid'] ?></u> <strong>ชื่อ : </strong><u>นายพันธ์ศักดิ์ แก้วสำราญ</u></h5>
       <div class="card-body">
           <h5 class="card-title">รายงานประจำตัว</h5>
           <p class="card-text">รายงานการสอบ Innitial</p>
           <p class="card-text ml-5">ภาคทฤษฎี</p>
           <p class="card-text ml-5">ภาคสอบวิเคราห์ภาพ</p>
           <p class="card-text">รายงานการเก็บชั่วโมง OJT</p>
           <p class="card-text">รายงานการเก็บชั่วโมง CBT ประจำปี</p>
            
       </div>
   </div>
    
</div>