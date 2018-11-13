<?php
   require('conn.php');
   
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $com = "call spCreateUser ('$firstname','$lastname')";
            mysqli_query($conn, $com);
            echo($com);
 
?>