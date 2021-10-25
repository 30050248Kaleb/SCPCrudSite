<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/scp_logo.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

    <title>Add Entry | SCP Foundation</title>
  </head>
  <body class="container">
      
    <?php include "connection.php"; ?>
      
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
                
                <h1>Add Entry</h1>
                <form class="form-group" method="post" action="connection.php">
                    
                    <label>SCP Item #*</label>
                    <br>
                    <input type="text" class="form-control" name="item" placeholder="Example: SCP-002" required>
                    <br>
                    
                    <label>Object Class*</label>
                    <br>
                    <input type="text" class="form-control" name="scpclass" placeholder="Example: Euclid" required>
                    <br>
                    
                    <label>Image Address</label>
                    <br>
                    <input type="text" name="image" class="form-control" placeholder="Example: images/name-of-image">
                    <br>
                    
                    <label>Special Containment Procedures*</label>
                    <br>
                    <textarea class="form-control" name="scp" rows="5" placeholder="Special Containment Procedures" required></textarea>
                    <br>
                    
                    <label>Description*</label>
                    <br>
                    <textarea class="form-control" name="description" rows="5" placeholder="Description" required></textarea>
                    <br>
                    
                    <label>Additional Information (Addendums/Documents)</label>
                    <br>
                    <textarea class="form-control" name="additional" rows="5" placeholder="Additional Information"></textarea>
                    <br>

                   <input type="submit" class="btn btn-primary" name="submit" value="Submit Record">
                    
                </form>
            </section>
        </article>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>