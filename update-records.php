<?php include './include/header.php' ?>
<?php 
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        //$rowValues = $crud->getID($id); then $rowValues['fname'];
        extract($crud->getID($id));
    }
?>
<?php
    if(isset($_POST['update'])){

        $id = $_GET['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $contact = $_POST['contactno'];

        if($crud->update($id,$fname,$lname,$email,$contact)){
            $msg = '
            <div class="container mt-3">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    Data has been Updated!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
        }
        else{
            $msg = '
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something went Wrong!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
        }
    }
?>
    <div class="container mt-3">
        
        <form method="post">
            <div class="form-group row">
                <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fname" value="<?php echo $fname ?>" name="fname" placeholder="Enter here">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lname" value="<?php echo $lname ?>" name="lname" placeholder="Enter here">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" value="<?php echo $email ?>" name="email" placeholder="Enter here">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputContact" class="col-sm-2 col-form-label">Contact Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="contactno" value="<?php echo $contact ?>" name="contactno" placeholder="Enter here">
                </div>
            </div>
            <button class="btn btn-success" type="submit" name="update">Update</button>
            <a href="index.php" class="btn btn-danger">Back to Home</a>
        </form>

    </div>
    <?php 
        if(isset($msg)){
            echo $msg;
        }
    ?>
<?php include './include/footer.php' ?> 