<?php 
    //print_r($_POST['CheckID']);
    $id = array();
    $id = $_POST['CheckID'];
    $member = count($id);
    // Loop delete trough array
    for($i=0;$i<$member;$i++){
        echo $id[$i]."<br>";
    }
?>

