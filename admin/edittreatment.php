<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    if(!isset($_GET['editId']) || $_GET['editId']==NULL){
        header("Location:listtreatment.php");
    }else{
        $editId = $_GET['editId'];
    }
?>
    <div class="span9">
        <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>My Treatments</h3>
            </div>
            <div class="module-body">
    <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $title = mysqli_real_escape_string($db->link, $_POST['title']);
            $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);
            $author = mysqli_real_escape_string($db->link, $_POST['author']);

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if($title == '' || $cat == '' || $author == ''){
                echo "<span style='font-size:18px;color:red'>Field must not be empty. !!</span>";
            }
            if(!empty($file_name)){
                 if (in_array($file_ext, $permited) === false) {
                 echo "<span style='font-size:18px;color:red'>You can upload only:-"
                 .implode(', ', $permited)."</span>";
                }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_post
                              SET title='$title',
                                image='$uploaded_image',
                                cat='$cat',
                                body = '$body',
                                author='$author'
                                WHERE id='$editId'";
                    $updated_rows = $db->update($query);
                    if ($updated_rows) {
                     echo "<span style='font-size:18px;color:green'>Treatment Is Updated Successfully.
                     </span>";
                    }else {
                     echo "<span style='font-size:18px;color:red'>Treatment is not Updated !!</span>";
                    }
            }
            }else{
                $query = "UPDATE tbl_post
                          SET author='$author',
                            title='$title',
                            cat='$cat',
                            body = '$body',
                            author='$author'
                            WHERE id='$editId'";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                 echo "<span style='font-size:18px;color:green'>Treatment Is Updated Successfully.
                 </span>";
                }else {
                 echo "<span style='font-size:18px;color:red'>Treatment is not Updated !!</span>";
                }
            }
    }
    ?>

    <?php 
        $querySelect = "SELECT * FROM tbl_post WHERE id='$editId'";
        $data = $db->select($querySelect);
        if($data){
            while($result = $data->fetch_assoc()){
    ?>
                <form class="form-horizontal row-fluid" action="" method="post" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Title: </label>
                        <div class="controls">
                            <input type="text" id="title" name="title" value="<?php echo $result['title']; ?>" class="span8">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Image: </label>
                        <div class="controls">
                            <img src="<?php echo $result['image']; ?>" width="100px" height="80px" />
                            <input type="file" name="image"/>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label" for="basicinput">Catagory: </label>
                    <div class="controls">
                        <select name="cat" class="span8">
                            <option value="">Select one..</option>
                        <?php 
                            $query = "SELECT * FROM tbl_category";
                            $data = $db->select($query);
                            if($data){
                                while($value = $data->fetch_assoc()){
                        ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php } } ?>
                        </select>
                    </div>
                </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Description: </label>
                        <div class="controls">
                            <textarea class="span8" rows="10" name="body">
                                <?php echo $result['body']; ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Author: </label>
                        <div class="controls">
                            <input type="text" id="author" name="author" value="<?php echo $result['author']; ?>" class="span4">
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