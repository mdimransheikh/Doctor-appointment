<?php include 'inc/header.php'; ?>


<?php 
    if(!isset($_GET['deleteId']) || $_GET['deleteId']==NULL){
        header("Location:listtreatment.php");
    }else{
        $delid = $_GET['deleteId'];
        $query = "SELECT * FROM tbl_post WHERE id='$delid'";
        $result = $db->select($query);
        if($result){
        	while($delimg = $result->fetch_assoc()){
        		$dellink = $delimg['image'];
        		unlink($dellink);
        	}
        }
        $delquery = "DELETE FROM tbl_post WHERE id='$delid'";
        $deldata = $db->delete($delquery);
        if($deldata){
        	echo "<script> location.href='listtreatment.php'; </script>";
        }else{
        	echo "<script> location.href='listtreatment.php'; </script>";
        }
    }
?>