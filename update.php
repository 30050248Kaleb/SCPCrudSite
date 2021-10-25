<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

    <title>Update Entry | SCP Foundation</title>
  </head>
  <body class="container">
      
    <?php
        
        include "connection.php";
        
        $id = $_GET['update'];
        $record = $connection->query("select * from scpdb where id=$id") or die($connection->error);
        $row = $record->fetch_assoc();
        
    ?>
    
    <header class="my-3 p-3 shadow rounded">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <ul class="navbar-nav">
                <li id="logo"><a class="navbar-brand" href="index.php"><img src="images/scp_logo.png" /> SCP Foundation</a></li>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <!-- run php loop through db and display scps here -->
                    <?php foreach($result as $link): ?>
                        <li class="nav-item"><a href="index.php?link='<?php echo $link['item'] ?>'" class="nav-link active"><?php echo $link['item'] ?></a></li>
                    <?php endforeach; ?>
                   <li><a href="form.php" class="btn btn-secondary" style="background-color:#800000;border-color:#800000;">Add a record</a></li>
                </div>
            </ul>
        </nav>
    </header>
      
    <main>
        <article>
            <section class='my-3 p-4 px-5 shadow rounded'>
                
                <h1>Update Entry</h1>
                <form class="form-group" method="post" action="connection.php">
                    
                    <input type="hidden" name=id value="<?php echo $row['id']; ?>">
                    
                    <label>SCP Item #*</label>
                    <br>
                    <input type="text" class="form-control" name="item" placeholder="Example: SCP-002"  value="<?php echo $row['item']; ?>" required>
                    <br>
                    
                    <label>Object Class*</label>
                    <br>
                    <input type="text" class="form-control" name="scpclass" placeholder="Example: Euclid"  value="<?php echo $row['scpclass']; ?>" required>
                    <br>
                    
                    <label>Image Address</label>
                    <br>
                    <input type="text" name="image" class="form-control" placeholder="Example: images/name-of-image" value="<?php echo $row['image']; ?>">
                    <br>
                    
                    <label>Special Containment Procedures*</label>
                    <br>
                    <textarea class="form-control" name="scp" rows="5" placeholder="Special Containment Procedures" required><?php echo $row['scp']; ?></textarea>
                    <br>
                    
                    <label>Description*</label>
                    <br>
                    <textarea class="form-control" name="description" rows="5" placeholder="Description" required><?php echo $row['description']; ?></textarea>
                    <br>
                    
                    <label>Additional Information (Addendums/Documents)</label>
                    <br>
                    <textarea class="form-control" name="additional" rows="5" placeholder="Additional Information"><?php echo $row['additional']; ?></textarea>
                    <br>

                   <input type="submit" class="btn btn-primary" name="update" value="Update Record">
                    
                </form>
            </section>
        </article>
    </main>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>