<!doctype html>
<html lang="en">

<?php 

$month = array(
    "", 
    "มกราคม", 
    "กุมภาพันธ์", 
    "มีนาคม",
    "เมษายน",
    "พฤษภาคม",
    "มิถุนายน",
    "กรกฎาคม",
    "สิงหาคม",
    "กันยายน",
    "ตุลาคม",
    "พฤศจิกายน",
    "ธันวาคม"
);

//$emid = $_POST['emid'];
if(isset($_GET['emid'])){
    $emid = $_GET['emid'];
}
if(isset($_GET['year'])){
    $year = $_GET['year'];
}
require_once("conn.php");
	
/// Header Report
$strSQL = "SELECT *,user.id as  uid,count(user.id) as id_time,department.department AS DP ,SEC_TO_TIME(Sum(cbt.time_record)) AS SUMT ,sum(image_count) as totalbag FROM `user` INNER JOIN department ON department.id = user.department_id INNER JOIN cbt ON user.id = cbt.user_id WHERE cbt.user_id = ' $emid' AND YEAR(cbt.record_date)= $year;";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);


// Table Report
$detailSQL = "SELECT DAY(`record_date`) as DAYS,MONTH(`record_date`) AS MM ,YEAR(`record_date`)+543 AS YY ,Count(`id`) AS UseTime ,SUM(`image_count`) AS SUMBAG ,SEC_TO_TIME(sum(`time_record`)) AS SUMTIME FROM `CBT` WHERE user_id =  '$emid' AND YEAR(cbt.record_date) =  $year GROUP BY DAY(`record_date`) ORDER BY record_date ;";
$DetailQuery = mysqli_query($conn,$detailSQL);

?>
<head>
    <title><?PHP echo  $emid." - ". $year+543 ?> CBT Report </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- FontAwesome 6.2.0 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- (Optional) Use CSS or JS implementation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
    integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <style>
 
 body {
	  font-family: 'Sarabun';
      background-position: 50% 300px;  
      background-image: url('xsim_logo.png'); 
      background-repeat:no-repeat;
 }
 

        thead
        {
            display: table-header-group;
        }
        tfoot
        {
            display: table-footer-group;
        }
	@media print {
    

  @page {
	  font-family: 'Sarabun';
    size: A4;
    margin: 1.5cm;
    
  }
}

.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;

  text-align: center;
}
    </style>
    <style type="text/css" media="screen">
       
    </style>
</head>



<body>


      <div class="container-fluid">
        
      
    <div class="row">
        <div class="col-3">
        
                <img src="logo.png" alt="" srcset="" style="height: 2cm; width:auto;">
            </div>
        <div class="col-9 mt-3 text-center">
            <h4>รายงานบันทึกการวิเคราะห์ภาพด้วยคอมพิวเตอร์ <br>ประจำปี <?php  echo $year+543; ?></h4>
        </div>
             
    </div>
    <div class="row mt-3 p-2">
        <div class="col-6">
            <div class="row">
                <p><strong>รหัสพนักงาน</strong> <?PHP echo $objResult['uid']; ?> <br><strong>ชื่อ</strong> <?PHP echo $objResult['name']; ?>
             <br><strong>สังกัด</strong></strong> <?PHP echo $objResult['department']; ?></p></div>
        </div>
        <div class="col-6 text-end">
            
        <strong>เวลาสะสม </strong><?PHP echo $objResult['SUMT'] ?> <strong>ชั่วโมง</strong> 
        <br><a id="backbtn"  onclick="history.back()" class="btn btn-primary btn-lg " href="#" role="button"><i class="fa fa-history" aria-hidden="true"></i> Back</a> <a onclick="printdoc()" id="printbtn" class="ml-2 btn btn-primary btn-lg " href="#" role="button"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
        <script>
            function printdoc(){
              let backbtn = document.getElementById('backbtn')
              let printbtn = document.getElementById('printbtn')
              backbtn.style.visibility  ='hidden'
              printbtn.style.visibility ='hidden'
              window.print()
              printbtn.style.visibility  ='visible'
              backbtn.style.visibility ='visible'
            }
        </script>
        </div>
       
    </div>



    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr bgcolor="#CCCCCC" >
                    <th align="center"  scope="col"><center>ลำดับที่</center></th>
                    <th ><center>
                    วันที่
                    </center></th>
                    <th ><center>ครั้ง</center></th>
                    <th><center>จำนวนภาพ</center></th>
                    <th><center>เวลาสะสม</center></th>
                 </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                if ($DetailQuery->num_rows > 0) {
  // output data of each row
  $no = 1;
                while($row = $DetailQuery->fetch_assoc()) {
                    echo "<tr><td><center>" . $no. "</center> </td>"
                        ."<td><center>". $row["DAYS"]." ".$month[$row["MM"]]." ".($row["YY"]). "</center> </td>"
                        ."<td><center>". $row["UseTime"]. "</center> </td>"
                        ."<td><center>". $row["SUMBAG"]. "</center> </td>"
                        ."<td><center>". $row["SUMTIME"]. "</center> </td></tr>";
		                    $no++;
                        }
                        } else {
                        echo "0 results";
}
?></tbody>
            <tfoot class="text-center">
                <td colspan="2">รวม</td>
                
                <td><?php echo $objResult['id_time'] ?></td>
                <td><?php echo $objResult['totalbag'] ?></td>
                <td><?PHP echo $objResult['SUMT'] ?> </td>
            </tfoot>
                
            </table>
        </div>
        <!-- <div class="row justify-content-between mt-3">
            <div class="col text-center">
                ลงชื่อพนักงาน<p class="mt-5"> ____________________________________</p>
                <p> <?PHP echo $objResult['name']; ?></p>
            </div>
            
            <div class="col text-center">
                ลงชื่อ<p class="mt-5"> ____________________________________</p>
                <p> หัวหน้างาน / ผู้รับผิดชอบ</p>
            </div>
        </div> -->
    </div>
       
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <footer class="footer ">
      <div class="container">
        <span class="text-muted">พิมพ์เมื่อ <?php $mm = intval(date('m')); echo intval(date('d')) ." ". $month[$mm] ." ". date("Y")+543 ?></span>
      </div>
    </footer>
    </div>
</body>

</html>