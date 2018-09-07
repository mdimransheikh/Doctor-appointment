<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

    <div class="span9">
        <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>Update Contact info</h3>
            </div>
            <div class="module-body">
<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $address = mysqli_real_escape_string($db->link, $_POST['address']);
        $phone = mysqli_real_escape_string($db->link, $_POST['phone']);
        $email = mysqli_real_escape_string($db->link, $_POST['email']);


        if($address == '' || $phone == '' || $email == ''){
            echo "<span style='font-size:18px;color:red'>Field must not be empty. !!</span>";
        }else{
            $query = "UPDATE tbl_contact
                      SET address='$address',
                          phone='$phone',
                          email='$email'
                        WHERE id='1'";
            $updated_rows = $db->update($query);
            if ($updated_rows) {
             echo "<span style='font-size:18px;color:green'>Contact Info Updated Successfully.
             </span>";
            }else {
             echo "<span style='font-size:18px;color:red'>Contact info is not Updated !!</span>";
            }
            }
        }
?>

            <?php 
                $querySelect = "SELECT * FROM tbl_contact WHERE id='1'";
                $data = $db->select($querySelect);
                if($data){
                    while($result = $data->fetch_assoc()){
            ?>
                <form class="form-horizontal row-fluid" action="" method="post">
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Address: </label>
                        <div class="controls">
                            <input type="text" id="address" name="address" value="<?php echo $result['address']; ?>" class="span8">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Phone no.: </label>
                        <div class="controls">
                            <input type="text" id="phone" name="phone" value="<?php echo $result['phone']; ?>" class="span8">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Email: </label>
                        <div class="controls">
                            <input type="text" id="award" name="email" value="<?php echo $result['email']; ?>" class="span8">
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