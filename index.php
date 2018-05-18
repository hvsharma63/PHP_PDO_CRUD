<?php include './include/header.php'; ?>

    <div class="container mt-3">
        <a href="add-records.php" class="btn btn-info">Add Records</a>
    </div>

    <div class="container mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact No.</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                    $query = "SELECT * from users";
                    $crud->dataview($query);
                
                ?>
            </tbody>
        </table>
    </div>

<?php include './include/footer.php'; ?>  