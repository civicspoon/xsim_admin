<?php  
include("config.php");
if(isset($_POST["submit"]))
{
	
if($_FILES['file']['name'])
 {
$filename = explode(".", $_FILES['file']['name']);
if($filename[1] == 'csv')
{
$handle = fopen($_FILES['file']['tmp_name'], "r");
while($data = fgetcsv($handle))//handling csv file 
{
$item1 = mysqli_real_escape_string($connect, $data[0]);  
$item2 = mysqli_real_escape_string($connect, $data[1]);
$item3 = mysqli_real_escape_string($connect, $data[2]);
$item4 = mysqli_real_escape_string($connect, $data[3]);
$item5 = mysqli_real_escape_string($connect, $data[4]);
$item6 = mysqli_real_escape_string($connect, $data[5]);
$item7 = mysqli_real_escape_string($connect, $data[6]);
//insert data from CSV file 
$query = "INSERT INTO `cbt`( `user_id`, `record_date`, `time_record`, `image_count`, `score`, `item_list`, `start_use`)  
values('$item1','$item2','$item3','$item4','$item5','$item6','$item7')";
mysqli_query($connect, $query);
}
fclose($handle);
echo "File sucessfully imported";
}
}
}
?>

