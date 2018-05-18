<?php include './include/header.php';  ?>
<?php 

    if(isset($_POST['submit'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $contact = $_POST['contactno'];

        if($crud->create($fname,$lname,$email,$contact)){
            header("location:add-records.php?success");
        }
        else{
            header("location:add-records.php?fail");
        }
    }

?>
<?php
    if(isset($_GET['success'])){
?>
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data has been Inserted!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php
    }
?>
    <div class="container mt-3">
        <form method="post">
            <div class="form-group row">
                <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter here">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter here">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter here">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputContact" class="col-sm-2 col-form-label">Contact Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Enter here">
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Create New Record</button>
            <a href="index.php" class="btn btn-success">Back to Home</a>
        </form>
    </div>
    
<?php include './include/footer.php'; ?>