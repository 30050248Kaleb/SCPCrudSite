<?php

    // Database credentials
    $user = "a3005024_scpcruduser";
    $pw = "Toiohomai1234";
    $db = "a3005024_scpdb";
    
    // Database connection PHP object
    $connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));
    
    // return all records from database and save as variable
    $result = $connection->query("select * from scpdb") or die(mysqli_error($connection));

    

    if(isset($_POST['submit']))
    {
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='icon' type='image/png' href='images/scp_logo.png'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU' crossorigin='anonymous'>
                <link rel='stylesheet' href='css/main.css'>
                <title>Add Record | SCP Foundation</title>
                <style>
                    *
                    {
                        box-sizing: border-box;
                    }
                    .row::after 
                    {
                        content: '';
                        clear: both;
                        display: table;
                        margin-bottom: 20px;
                    }
                    .col
                    {
                        text-align: center;
                    }
                </style>
            </head>
            <body class='container'>
                <main>
                    <article>
                        <header class='my-3 p-3 shadow rounded text-center'>
                            <nav class='navbar navbar-expand-lg navbar-dark'>
                                <a id='logo' class='navbar-brand'><img src='images/scp_logo.png' /> SCP Foundation</a>
                            </nav>
                        </header>
                        <div class='my-3 p-3 px-5 shadow rounded text-center bg-light'>";
                        
        $item = mysqli_real_escape_string($connection, $_POST['item']);
        $scpclass = mysqli_real_escape_string($connection, $_POST['scpclass']);
        $image = mysqli_real_escape_string($connection, $_POST['image']);
        $scp = mysqli_real_escape_string($connection, $_POST['scp']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        $additional = mysqli_real_escape_string($connection, $_POST['additional']);
        
        $insert = "insert into scpdb(item,scpclass,image,scp,description,additional) values('$item', '$scpclass', '$image', '$scp', '$description', '$additional')";
        
        if($connection->query($insert) === TRUE)
        {
            echo "
            <h1 style='color:#198754;'>Record added successfully</h1>
            <p><a href='index.php' class='btn btn-success'>Back to index.php</a></p>
            ";
        }
        else
        {
            echo "
            <h1 style='color:#dc3545;'>Error submitting record.</h1>
            <p>$connection->error</p>
            <p><a href='form.php' class='btn btn-danger'>Back to form.php</a></p>
            ";
        }
    }
    
    if(isset($_GET['delete']))
    {
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='icon' type='image/png' href='images/scp_logo.png'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU' crossorigin='anonymous'>
                <link rel='stylesheet' href='css/main.css'>
                <title>Delete Record | SCP Foundation</title>
                <style>
                    *
                    {
                        box-sizing: border-box;
                    }
                    .row::after 
                    {
                        content: '';
                        clear: both;
                        display: table;
                        margin-bottom: 20px;
                    }
                    .col
                    {
                        text-align: center;
                    }
                </style>
            </head>
            <body class='container'>
                <main>
                    <article>
                        <header class='my-3 p-3 shadow rounded text-center'>
                            <nav class='navbar navbar-expand-lg navbar-dark'>
                                <a id='logo' class='navbar-brand'><img src='images/scp_logo.png' /> SCP Foundation</a>
                            </nav>
                        </header>
                        <div class='my-3 p-3 px-5 shadow rounded text-center bg-light'>";
        
        $id = $_GET['delete'];
        //create a delete sql command
        $del = "delete from scpdb where id=$id";
        if($connection->query($del)===true)
        {
            echo "
            <h1 style='color:#198754;'>Record deleted.</h1>
            <p><a href='index.php' class='btn btn-success'>Back to index page</a></p>
            ";
        }
        else
        {
            echo "
            <h1 style='color:#dc3545;'>Error deleting record.</h1>
            <p>$connection->error</p>
            <p><a href='index.php' class='btn btn-danger'>Back to index page</a></p>
            ";
        }
    }
    
    if(isset($_POST['update']))
    {
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='icon' type='image/png' href='images/scp_logo.png'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU' crossorigin='anonymous'>
                <link rel='stylesheet' href='css/main.css'>
                <title>Update Record | SCP Foundation</title>
                <style>
                    *
                    {
                        box-sizing: border-box;
                    }
                    .row::after 
                    {
                        content: '';
                        clear: both;
                        display: table;
                        margin-bottom: 20px;
                    }
                    .col
                    {
                        text-align: center;
                    }
                </style>
            </head>
            <body class='container'>
                <main>
                    <article>
                        <header class='my-3 p-3 shadow rounded text-center'>
                            <nav class='navbar navbar-expand-lg navbar-dark'>
                                <a id='logo' class='navbar-brand'><img src='images/scp_logo.png' /> SCP Foundation</a>
                            </nav>
                        </header>
                        <div class='my-3 p-3 px-5 shadow rounded text-center bg-light'>";
        
        //create variables from our posted form values
        $id = mysqli_real_escape_string($connection, $_POST['id']);
        $item = mysqli_real_escape_string($connection, $_POST['item']);
        $scpclass = mysqli_real_escape_string($connection, $_POST['scpclass']);
        $image = mysqli_real_escape_string($connection, $_POST['image']);
        $scp = mysqli_real_escape_string($connection, $_POST['scp']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        $additional = mysqli_real_escape_string($connection, $_POST['additional']);
        
        //update sql command
        $update = "update scpdb set item='$item', scpclass='$scpclass', image='$image', scp='$scp', description='$description', additional='$additional' where id='$id'";
        
        //run update query and display success/error message
        if($connection->query($update) === TRUE)
        {
            echo "
            <h1 style='color:#198754;'>Record Updated.</h1>
            <p><a href='index.php' class='btn btn-success'>Back to index page</a></p>
            ";
        }
        else
        {
            echo "
            <h1 style='color:#dc3545;'>Error updating record.</h1>
            <p>$connection->error</p>
            <p><a href='index.php' class='btn btn-danger'>Back to index page</a></p>
            ";
        }
    }
    
    echo "</div>
        </article>
    </main>";

?>