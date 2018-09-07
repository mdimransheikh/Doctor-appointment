<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    if(!isset($_GET['editId']) || $_GET['editId']==NULL){
        header("Location:listeducation.php");
    }else{
        $editId = $_GET['editId'];
    }
?>
    <div class="span9">
        <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>Your Education Field</h3>
            </div>
            <div class="module-body">
<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $degree = mysqli_real_escape_string($db->link, $_POST['degree']);
        $year = mysqli_real_escape_string($db->link, $_POST['year']);
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $details = mysqli_real_escape_string($db->link, $_POST['details']);

        if($year == '' || $name == '' || $degree == ''){
            echo "<span style='font-size:18px;color:red'>Field must not be empty. !!</span>";
        }else{
            $query = "UPDATE tbl_education
                      SET degree='$degree',
                          year='$year',
                          name='$name',
                          details='$details'
                        WHERE id='$editId'";
            $updated_rows = $db->update($query);
            if ($updated_rows) {
             echo "<span style='font-size:18px;color:green'>Education Field Updated Successfully.
             </span>";
            }else {
             echo "<span style='font-size:18px;color:red'>Education Field is not Updated !!</span>";
            }
            }
        }
?>

            <?php 
                $querySelect = "SELECT * FROM tbl_education WHERE id='$editId'";
                $data = $db->select($querySelect);
                if($data){
                    while($result = $data->fetch_assoc()){
            ?>
                <form class="form-horizontal row-fluid" action="" method="post">
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Degree: </label>
                        <div class="controls">
                            <input type="text" id="degree" name="degree" value="<?php echo $result['degree']; ?>" class="span8">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Year: </label>
                        <div class="controls">
                            <input type="text" id="year" name="year" value="<?php echo $result['year']; ?>" class="span8">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Institute name: </label>
                        <div class="controls">
                            <input type="text" id="name" name="name" value="<?php echo $result['name']; ?>" class="span8">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Details: </label>
                        <div class="controls">
                            <textarea class="span12" rows="15" name="details">
                                <?php echo $result['details']; ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="submit" class="btn">Update!</button>
                        </div>
                    </div>
                </form>
            <?php } } ?>
            </div>
        </div>

            
            
        </div><!--/.content-->
    </div><!--/.span9-->
<?php include 'inc/footer.php'; ?>