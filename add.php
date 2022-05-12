<?php
    require 'config.php';
    
    if($_POST){
        $title = $_POST['title'];
        $desc = $_POST['description'];

        // echo $title.$desc;
        $sql = "INSERT INTO todo(title,description) VALUES (?,?)";
        $pdostatement = $pdo->prepare($sql);
        $result = $pdostatement->execute([$title,$desc]);
        if($result){
            echo "<script>
                    alert('New ToDo is added');
                    window.location.href='index.php';
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New ToDo</h2>
            <form action="add.php" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" id="" cols="80" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="SUBMIT">
                    <a href="index.php" class="btn btn-warning" name="">BACK</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>