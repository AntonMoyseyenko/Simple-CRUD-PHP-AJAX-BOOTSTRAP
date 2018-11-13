<?php
   require('conn.php');
?>
<!DOCTYPE html>
<html>
<head> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
    <link rel="stylesheet" href="css/style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script scr="js/bootstrap.js"></script>       
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet" type="text/css"/>



    <title>My CRUD with AJAX/JQuery</title>
</head>
<body>
<center><h2 id="typedtext"></h2></center>


    <form>
        <div>
            <label>First Name:</label>
            <input type  = "text" id = "firstname"/>
        </div>
        <div>
            <label>Last Name:</label>
            <input type  = "text" id = "lastname"/>
        </div>
        <div>
            <button class="box" type = "button" id="addnew"> Add</button>
        </div>
    </form>
    
             
    <br>
    
    <div id="userTable"></div>

<script>
//Header Animation Script

var aText = new Array(
"Welcome Stranger!", 
"There is my CRUD with Ajax/JQuery assignment!"
);
var iSpeed = 100; 
var iIndex = 0; 
var iArrLength = aText[0].length; 
var iScrollAt = 20;
 
var iTextPos = 0;
var sContents = '';
var iRow;
 
function typewriter()
{
 sContents =  ' ';
 iRow = Math.max(0, iIndex-iScrollAt);
 var destination = document.getElementById("typedtext");
 
 while ( iRow < iIndex ) {
  sContents += aText[iRow++] + '<br />';
 }
 destination.innerHTML = sContents + aText[iIndex].substring(0, iTextPos) + "_";
 if ( iTextPos++ == iArrLength ) {
  iTextPos = 0;
  iIndex++;
  if ( iIndex != aText.length ) {
   iArrLength = aText[iIndex].length;
   setTimeout("typewriter()", 500);
  }
 } else {
  setTimeout("typewriter()", iSpeed);
 }
}
typewriter();

</script>

<script>

//Show Users Script
$(document).ready(function(){
showUser();

//Add User
$(document).on('click', '#addnew', function(){
    if ($('#firstname').val()=="" || $('#lastname').val()==""){
    alert('Please insert name and last name');
    }
    else{
        $firstname=$('#firstname').val();
        $lastname=$('#lastname').val();                         
            $.ajax({
            type: "POST",
            url: "create.php",
            data: {
            firstname: $firstname,
            lastname: $lastname,
            },
            success: function(data){
            showUser();
            }
            });
        }
    });

//Delete User
$(document).on('click', '#delete', function(){
    $id=$(this).val();
    $.ajax({
        type: "POST",
        url: "delete.php",
        data: {
            id: $id,
            },
            success: function(){
            showUser();
            }
            });
            alert("User with ID" + " " + $id + " " + "deleted!");
    });

//Update User
$(document).on('click', '#update', function(){
        $uid=$(this).val();
        $('#view-modal'+$uid).modal();
        $ufirstname=$('#ufirstname'+$uid).val();
        $ulastname=$('#ulastname'+$uid).val();
        
    //Save updated user       
        $(document).on('click', '#save', function(){
        $uid=$(this).val();
        $ufirstname=$('#ufirstname'+$uid).val();
        $ulastname=$('#ulastname'+$uid).val();
        $.ajax({
                type: "POST",
                url: "update.php",
                data: {
                id: $uid,
                firstname: $ufirstname,
                lastname: $ulastname,
                },
                success: function(){
                showUser();
                }
            });
            alert("User with ID" + " " + $uid + " " + "updated!"); 
        });
        
    });
    


//Show Users
function showUser(){
    
    $.ajax({
            url: 'show.php',
            type: 'POST',
            async: false,
            success: function(response){
            $('#userTable').html(response);
            }
            });
     }

});
</script>
</body>
</html>