<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <!--BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Animals</title>
</head>
<body>
<div class="container pt-5">
        <h3 class="page-header text-center">WILDLIFE</h3>
        <hr>
        <div class="row">
            <div class="">
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_animals" style="float:right">Add New Creature</a>
                <br>
                <br>
                <?php 
                    session_start();
                    if(isset($_SESSION['message'])){
                        ?>
                        <div class="alert alert-success text-center" style="margin-top:10px;">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                    }
                ?>
                <div class="table-responsive mt-3">
                    <table class="table table-hover">
                        <thead>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Type of Animals</th>
                            <th>Color</th>
                            <th>Number of Legs</th>
                            <th>Remarks</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                        </thead>
                        <tbody>
                        <?php
                            //include our connection
                            include_once('include/database.php');

                            $database = new Connection();
                            $db = $database->open();
                            try{	
                                $sql = 'SELECT * FROM animals ORDER BY name ASC';
                                $no = 0;
                                foreach ($db->query($sql) as $row) {
                                    $no++;
                        ?>
                                     <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['type_id']; ?></td>
                                        <td><?php echo $row['color']; ?></td>
                                        <td><?php echo $row['number_of_legs']; ?></td>
                                        <td><?php echo $row['remarks']; ?></td>
                                        <td><?php echo $row['created_at']; ?></td>
                                        <td><?php echo $row['updated_at']; ?></td>
                                        <td align="right">
                                            <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit_animals<?php echo $row['id']; ?>">Edit</a>
                                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_animals<?php echo $row['id']; ?>">Delete</a>
                                        </td>
                                        <?php include('animals/view_delete_animals.php'); ?>
                                        <?php include('animals/view_edit_animals.php'); ?>
                                    </tr>
                        <?php 
                                }
                            }
                            catch(PDOException $e){
                                echo "There is some problem in connection: " . $e->getMessage();
                            }

                            //close connection
                            $database->close();

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include('animals/view_add_animals.php'); ?>
    <?php include('animals/view_edit_animals.php'); ?>


    <!--TABLE TYPE--->
    <div class="container type-table mt-5">
        <div class="row">
            <br><hr>
            <h5 class="page-header text-center">Animal Type</h5>
            <hr><br>
            <div class="">
                
            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_type" style="float:right">Add Type</a>
            <br><br>
            <?php 
                if(isset($_SESSION['message'])){
            ?>
            <div class="alert alert-info text-center" style="margin-top:10px;">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php
                unset($_SESSION['message']);
            }
            ?>
            
            <div class="table-responsive" >
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>ID</th>
                        <th>Types of Animal</th>
                    </thead>
                    <tbody>
                        <?php
                            //include our connection
                            include_once('include/database.php');

                            $database = new Connection();
                            $db = $database->open();
                                try{	
                                    // $sql = 'SELECT * FROM type';
                                        $sql = 'SELECT * FROM type';
                                            $no = 0;
                                            foreach ($db->query($sql) as $row) {
                                            $no++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['type_name']; ?></td>
                                                    <td align="right">
                                                        <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit_type<?php echo $row['id']; ?>">Edit</a>
                                                        <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_type<?php echo $row['id']; ?>">Delete</a>
                                                    </td>
                                                    <?php include('animals/view_delete_type.php'); ?>
                                                    <?php include('animals/view_edit_type.php'); ?>
                                                </tr>
                                                    <?php 
                                            }
                                    }
                                catch(PDOException $e){
                                    echo "There is some problem in connection: " . $e->getMessage();
                                }

                                //close connection
                                $database->close();
                                ?>
                    </tbody>
                </table>
            </div>           
        </div>
    </div>
    <?php include('animals/view_add_type.php'); ?>

    <br><br><hr>
    <div class="footer" style="text-align:center">
        <h5>April Grethil B. Laparan</h5>
        <h5>Gian Brix Bungco</h5>
    </div>
<!--BOOTSTRAP JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>