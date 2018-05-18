<?php include './include/header.php'; ?>


<?php
    if(isset($_GET['deleted'])){
?>
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Record has been deleted!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <a href="index.php" class="btn btn-success">Back to Home Page</a>
    </div>
    <?php
    }
    
    else {
    ?>
    <div class="container mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Are you sure, you wanna delete the record?
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php
    }
?>

<div class="container mt-3">

    <?php
        if(isset($_GET['id'])){
    ?>
         <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact No.</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * from users WHERE id=:id";
                    $stmt=$db->prepare($query);
                    $stmt->execute(array(":id"=>$_GET['id']));
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <th scope="row">
                            <?php echo $row['id']; ?>
                        </th>
                        <td>
                            <?php echo $row['fname']; ?>
                        </td>
                        <td>
                            <?php echo $row['lname']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['contact']; ?>
                        </td>
                    </tr>
                <?php                        
                    }
                ?>
            </tbody>
        </table>
    <?php
        }
    ?>
</div>

<div class="container mt-3">
    <?php
        if(isset($_GET['id'])){
    ?>
            <form method="post">
                <button class="btn btn-success" type="submit" name="btn-del">Yes</button>
                <a href="index.php" class="btn btn-info">No</a>
            </form>
    <?php
        }
    ?>
</div>

<?php
    if(isset($_POST['btn-del'])){
        $id= $_GET['id'];
        $crud->delete($id);
        header("location:delete-records.php?deleted");
    }
?>


<?php include './include/footer.php'; ?> 