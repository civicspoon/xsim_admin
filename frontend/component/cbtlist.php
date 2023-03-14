<?php


$con = mysqli_connect('localhost', 'root', 'aot#avsec', 'xsim2');
$perpage = 20;
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}
$start = ($page - 1) * $perpage;
$sql = "SELECT user_id as 'id', user.name as 'name',SEC_TO_TIME(SUM(time_record))  as 'sumtime'
FROM cbt
INNER JOIN user ON user.id = cbt.user_id 
WHERE user.department_id =  ".$_SESSION['depid']." 
AND 
YEAR(record_date) = '$year'
GROUP BY user_id 
ORDER BY SEC_TO_TIME(SUM(time_record)) DESC 
LIMIT {$start} , {$perpage} ";
$query = mysqli_query($con, $sql);
?>
<div class="container">
<div class="row">
<div class="col-lg-12">

<table class="table table-bordered table-striped table-hover text-center rounded">
<thead class="bg-dark text-light">
<tr>
<th>#</th>
<th>รหัสพนักงาน</th>
<th>ชื่อ</th>
<th>เวลาที่เก็บได้</th>
<th>รายละเอียด</th>
</tr> 
</thead>
<tbody>
<?php
$index = 0;
while ($result = mysqli_fetch_assoc($query)) { $index++; ?>

<tr>
<td style="width: 3%;"><?php echo ($page*$perpage)+$index-$perpage; ?></td>
<td><?php echo $result['id']; ?></td>
<td><?php echo $result['name']; ?></td>
<td><?php echo $result['sumtime']; ?></td>
<td style="width: 10%;"><a class="btn btn-block btn-md bg-info" href="report.php?emid=<?php echo $result['id'].'&year='.$year; ?>" target="_blank">รายละเอียด</a></td>
</tr>
<?php } ?>
</tbody>
</table>

<?php
$sql2 = "SELECT user_id as id, user.name,SEC_TO_TIME(SUM(time_record))  as sumtime
FROM cbt
INNER JOIN user ON user.id = cbt.user_id 
WHERE user.department_id =  ".$_SESSION['depid']." 
AND 
YEAR(record_date) = '$year'
GROUP BY user_id 
ORDER BY SEC_TO_TIME(SUM(time_record)) DESC ";
$query2 = mysqli_query($con, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
echo "หน้า".$page."/".$total_page;
?>
<nav>
<ul class="pagination  pagination-md">
<li class="page-item">
<a class="page-link"  href="ojtperyear.php?page=1" aria-label="Previous">
<span aria-hidden="true">หน้าแรก</span>
</a>
</li>
<?php 
if($page>1){ ?>
<li class="page-item"><a class="page-link"  href="ojtperyear.php?page=<?php echo $page-1; ?>" aria-label="nx"><span aria-hidden="true"><<</span></a></li>

<?PHP }
?>
<?php 
$maxpage = 5;
for($i=$page;$i<=$maxpage+$page;$i++){ 
if($i<=$total_page){ ?>
    <li class="page-item <?PHP if($i==$page){echo 'active';} ?>"><a class="page-link"  href="ojtperyear.php?page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    

<?php  }
} 
if(($total_page-$page)>$maxpage) { 
?>
<li class="page-item"><a class="page-link"  href="ojtperyear.php?page=<?php echo $page+6; ?>" aria-label="nx"><span aria-hidden="true">>></span></a></li>
<?PHP  } ?>
<li class="page-item">
<a class="page-link"  href="ojtperyear.php?page=<?php echo $total_page;?>" aria-label="Next">
<span aria-hidden="true"></span>หน้าสุดท้าย</span>
</a>
</li>
</ul>
</nav>


</div>
</div>


</div>