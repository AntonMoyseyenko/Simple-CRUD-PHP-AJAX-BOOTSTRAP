<?php
   include('conn.php');
    $id=$_POST['id'];
    $com =  "call spDeleteUser ('$id')";
    mysqli_query($conn, $com);
    
?>