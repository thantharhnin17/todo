<?php
    require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <?php
        $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();
    ?>
    <div class="card">
        <div class="card-body">
            <h2 class="text-center">Todo Home Page</h2><br>
            <div class="text-center">
                <a href="add.php" class="btn btn-success">Create New</a>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                        if($result){
                            foreach($result as $value){
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $value['title'] ?></td>
                            <td><?php echo $value['description'] ?></td>
                            <td><?php echo date('Y-m-d',strtotime($value['created_at'])) ?></td>
                            <td>
                                <a class="btn btn-warning" href="edit.php?id=<?php echo $value['id']; ?>">Edit</a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $value['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                    $i++;
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>