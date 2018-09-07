<?php include 'inc/header.php'; ?>


<?php 
    if(!isset($_GET['deleteId']) || $_GET['deleteId']==NULL){
        header("Location:listexperience.php");
    }else{
        $deleteId = $_GET['deleteId'];
        $delquery = "DELETE FROM tbl_experience WHERE id='$deleteId'";
        $deldata = $db->delete($delquery);
        if($deldata){
        	echo "<script> location.href='listexperience.php'; </script>";
        }else{
        	echo "<script> location.href='listexperience.php'; </script>";
        }
    }
?>