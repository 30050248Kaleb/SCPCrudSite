<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/scp_logo.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Home | SCP Foundation</title>
  </head>
  <body class="container">
      
    <!-- database connection -->
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
        <?php
                
            if(isset($_GET['link']))
            {
                $item=trim($_GET['link'], "'");
                
                
                
                // run sql command to select record based on the GET value
                $record = $connection->query("select * from scpdb where item='$item'") or die($connection->mysqli_error($connection));
                
                //turn record into associative array
                $array = $record->fetch_assoc();
                
                $item=$array['item'];
                $scpclass=$array['scpclass'];
                $image=$array['image'];
                $scp=$array['scp'];
                $description=$array['description'];
                $additional=$array['additional'];
                
                //vars to hold our update and delete url strings
                $id=$array['id'];
                $update="update.php?update=" . $id;
                $delete="connection.php?delete=" . $id;
                
                echo "
                    <main>
                        <article>
                            <section class='my-3 p-4 px-5 shadow rounded text-center'>
                                <h1><b>Item #: </b>$item</h1>
                                <h2><b>Object Class: </b>$scpclass</h2>";
                                if($image != "")
                                {
                                echo "<p><img src='$image' style='max-height: 500px;' class='img-fluid rounded mx-auto d-block' alt='$item'></p>";
                                }
                                echo "
                            </section>
                            <section class='my-3 p-4 px-5 shadow rounded'>
                                <h3>Special Containment Procedures:</h3>
                                <p>$scp</p>
                            </section>
                            <section class='my-3 p-4 px-5 shadow rounded'>
                                <h3>Description:</h3>
                                <p>$description</p>
                            </section>";
                            if($additional != "")
                            {
                            echo "
                            <section class='my-3 p-4 px-5 shadow rounded'>
                                <h3>Additional Information:</h3>
                                <p>$additional</p>
                            </section>";
                            }
                            echo "
                            <a href='$update' class='btn btn-warning'>Update Record</a>
                            <a href='$delete' class='btn btn-danger'>Delete Record</a>
                        </article>
                        <br>
                    </main>
                ";
            }
            else
            {
                echo '<article>
                            <section id="warning" class="my-3 p-3 px-5 shadow rounded text-center">
                                    <p>WARNING: THE FOUNDATION DATABASE IS <b>CLASSIFIED</b></p>
                                    <p>ACCESS BY UNAUTHORIZED PERSONNEL IS STRICTLY PROHIBITED</p>
                                    <p>PERPETRATORS WILL BE TRACKED, LOCATED, AND DETAINED</p>
                            </section>
                            <section class="my-3 p-4 px-5 shadow rounded">
                                <h3>Welcome to the SCP Foundation. Use the navigation bar to view a file.</h3>
                                <br>
                                <img src="images/homepage_scp_logo_big.jpg" alt="SCP Foundation. Secure. Contain. Protect." />
                            </section>
                        </article>';
            }
        
        ?>
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