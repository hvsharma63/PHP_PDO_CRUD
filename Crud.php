<?php

    class Crud{

        private $db;

        public function __construct($db){
            
            $this->db = $db;
        
        }

        public function create($fname,$lname,$email,$contact){

            try{
                $query = "INSERT INTO users(fname,lname,email,contact) VALUES (:fname,:lname,:email,:contact)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(":fname",$fname);
                $stmt->bindParam(":lname",$lname);
                $stmt->bindParam(":email",$email);
                $stmt->bindParam(":contact",$contact);
                $stmt->execute();
                return true;
            }
            catch(Exception $ex){
                echo $ex->getMessage();
                return false; 
            }
        }

        public function getID($id){

            $query="SELECT * FROM users WHERE id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(":id"=>$id));
            $values = $stmt->fetch(PDO::FETCH_ASSOC);
            return $values;

        }

        public function delete($id){

            $query="DELETE FROM users WHERE id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            return true;


        }

        public function update($id,$fname,$lname,$email,$contact){

            try{
                $query = "UPDATE users SET fname=:fname,lname=:lname,email=:email,contact=:contact WHERE id=:id";
                $stmt= $this->db->prepare($query);
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":fname", $fname);
                $stmt->bindParam(":lname", $lname);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":contact", $contact);
                $stmt->execute();
                return true;
            }
            catch(Exception $ex){
                echo $ex->getMessage();
                return false;
            }
        }


        public function dataview($query){
            
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            if($stmt->rowCount()>0){

                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
?>
                    <tr>
                        <th scope="row">
                            <?php 
                                if(isset($row['id']))
                                    print $row['id'];
                            ?>
                        </th>
                        <td>
                            <?php 
                                if(isset($row['fname']))
                                    print $row['fname'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                if(isset($row['lname']))
                                    print $row['lname'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                if(isset($row['email']))
                                    print $row['email'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                if(isset($row['contact']))
                                    print $row['contact'];
                            ?>
                        </td>
                        <td><a href="delete-records.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                        <td><a href="update-records.php?id=<?php echo $row['id'] ?>">Update</a></td>
                    </tr>
<?php                    
                }
            }
        }
        
    }

?>