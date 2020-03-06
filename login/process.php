<?php
include 'connection.php';

 $username = $_POST["username"];
 $password = $_POST["password"];

 if(trim($username)!=""and trim($password)!= "")
 {
     //Sanitizes whatever is entered
     $username=stripcslashes($username);
     $password=stripcslashes($password);
     $username=strip_tags($_POST["username"]);
     $password=strip_tags($_POST["password"]);
     
     $username= mysqli_real_escape_string($conn,$username);
     $password= mysqli_real_escape_string($conn,$password);

     //SQL Query
     $query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password ='$password'");
     //applay mysqli
     $numrows= mysqli_num_rows($query);
     if($numrows >0)
     {
          //session username 
         $_SESSION["username"]= $username; 

        echo "Login successful";
        }
        else
        {
        echo "Failed to login";
        }
        
   }
?>