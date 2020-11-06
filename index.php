<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>SCP_Foundation</title>
  </head>
  <body class="container">
      <!-- Just an image -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="logo.jpg" width="100%" height="100" alt="" loading="lazy">
  </a>
</nav>

     <?php include 'Database.php'; ?>
     <div class="row">
          <div class="col">
              <ul class="nav navbar-light bg-light">
                  <li><a href="index.php" class="nav-link">Home</a></li>
                  
                  <!--loop thru table to retrieve pg names that will serve as our menu-->
                  <?php foreach($record as $menu): ?>
                  
                  <li class="nav-item active">
                      
                      <a href="index.php?page='<?php echo $menu['pg']; ?>'" class="nav-link"><?php echo $menu['pg']; ?></a>
                      
                  </li>
                  
                  <?php endforeach; ?>
                   <li><a href="Create.php" class="nav-link">Create new record</a></li>
              </ul>
          </div>
      </div>
      
      <div class="row">
          <div class="col">
              <?php 
                    
                    if(isset($_GET['page']))
                    {
                        $pg = trim($_GET['page'], "'");
                        
                        // run sql query based on our $pg value
                        $record = $connection->query("select * from Pages where pg='$pg'") or die($connection->error());
                        
                        $single = $record->fetch_assoc();
                        
                        // create variables to hold all our field names from table
                        $h1 = $single['h1'];
                        $h2 = $single['h2'];
                        
                        $p1 = $single['p1'];
                        $p2 = $single['p2'];
                        $p3 = $single['p3'];
                        
                        $id = $single['id'];
                        $update = "Update.php?update=" . $id;
                            $delete = "Database.php?delete=" . $id;
                        
                        echo "
                        <div style='background-color: #e3f2fd;'>
                        <h1>{$h1}</h1>
                        <p>{$h2}</p>
                        
                        <p>{$p1}</p>
                        <p>{$p2}</p>
                        <p>{$p3}</p>
                        
                        <p><a href='{$update}' class='btn btn-danger'>Update</a><p>
                         <p><a href='{$delete}' class='btn btn-danger'>Delete</a><p>
                        </div>
                        ";
                    

                        
                    }
                    else
                    {
                        // default view of index.php
                        
                        echo "
                       <!-- Just an image -->
<nav class='navbar navbar-light bg-light'>
  <a class=' navbar-brand' href='#'>
    <img src='scplogo.jpg' width='100%' height='400' alt='' loading='lazy'>
  </a>
</nav> 
<h1 class='text-center'>WELCOME TO SCP</h1>
                        
                        ";
                    }
              
              ?>
          </div>
      </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>