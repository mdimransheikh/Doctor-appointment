<?php include 'inc/header.php'; ?>

<?php 
    if(!isset($_GET['deleteId']) || $_GET['deleteId']==NULL){
        header("Location:listeducation.php");
    }else{
        $deleteId = $_GET['deleteId'];
        $delquery = "DELETE FROM tbl_education WHERE id='$deleteId'";
        $deldata = $db->delete($delquery);
        if($deldata){
        	echo "<script> location.href='listeducation.php'; </script>";
        }else{
        	echo "<script> location.href='listeducation.php'; </script>";
        }
    }
?>