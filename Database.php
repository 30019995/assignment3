<?php

    $db = "a3001999_SCP_SQL_DATABASE";
    $user = "a3001999_Rishit_Agrawal";
    $pwd = "Toiohomai1234";
    
    $connection = new mysqli('localhost', $user, $pwd, $db);
    
    $record = $connection->query("select * from Pages") or die($connection->error());
    
    if(isset($_POST['submit']))
    {
        $pg = $_POST['pg'];
        $h1 = $_POST['h1'];
        $h2 = $_POST['h2'];
        $p1 = $_POST['p1'];
        $p2 = $_POST['p2'];
        $p3 = $_POST['p3'];

        
        $sql = "insert into Pages(pg, h1, h2, p1, p2, p3)
        values('$pg', '$h1', '$h2', '$p1', '$p2', '$p3')";
        
        if($connection->query($sql) === TRUE)
        {
            echo "<h1>Record added</h1>";
            echo "<p><a href='index.php'>Home</a></p>";
        }
        else
        {
            echo "<h1>Error: Record not added</h1>
            <p><a href='index.php>Home</a></p>";
            echo "<p>{$connection->error()}</p>";
            echo "";
        }
    }
    
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $pg = $_POST['pg'];
        $h1 = $_POST['h1'];
        $h2 = $_POST['h2'];
        $p1 = $_POST['p1'];
        $p2 = $_POST['p2'];
        $p3 = $_POST['p3'];
        
        $update = "update Pages set pg='$pg', h1='$h1', h2='$h2', p1='$p1', p2='$p2', p3='$p3'
        where id='$id'";
        
        if($connection->query($update) === TRUE)
        {
            echo "<h1>Record Updated</h1>";
            echo "<p><a href='index.php'>Home</a></p>";
        }
        else
        {
            echo "<h1>Error: Record not updated</h1>";
            echo "<p>{$connection->error()}</p>";
            echo "<p><a href='index.php'>Home</a></p>";
        }
    }
    
    if(isset($_GET['delete']))
    {
  
        $id = $_GET['delete'];
        $delete= "delete from Pages where id='$id'";
        
        if($connection->query($delete) === TRUE)
        {
            echo "<h1>Record Deleted</h1>";
            echo "<p><a href='index.php'>Home</a></p>";
        }
        else
        {
            echo "<h1>Error: Record not Deleted</h1>";
            echo "<p>{$connection->error()}</p>";
            echo "<p><a href='index.php'>Home</a></p>";
        }
    }

?>