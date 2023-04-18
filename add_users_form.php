<?php 

include "header.php";
include "navigation.php";



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add user</title>

    <style>
body {font-family: Arial, Helvetica, sans-serif;}


input[type=text], input[type=password],input[type=email] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.container {
    padding:16px;
    width:40%;
    
    

}

div{
  width: 30%;
  background-color:skyblue;
  margin-left:30%;
}

</style>
</head>
<body>
     <br><br>
   <center><h4 style="color:green">ADD USER</h4></center>
    
   
   
   <form action="add_users_query.php" method="post">
        
       <div class="container">
         <b><label for="">User Name:</label></b>
            <input type="text" name="user_name" id="user_name"> 
          
        
          
            <b><label for="">Password:</label> </b>
            <input type="password" name="password" id="password">
         
        

         
            <b> <label for="">Email ID:</label> </b>
            <input type="email" name="email_id" id="email_id">
         
         
 
         
            <b> <label for="">Role:</label> </b>
                <input type="radio" name="role" id="role" value="Administrator">Administrator
                <input type="radio" name="role" id="role" value="Editor">Editor
                <input type="radio" name="role" id="role" value="Author">Author
                <input type="radio" name="role" id="role" value="Contributor">Contributor
                <input type="radio" name="role" id="role" value="Subscriber">Subscriber  <br><br>

            
                 <input type="submit" name="submit" value="submit">

         
        </div>
        
    </form>
    
    <?php include "footer.php"; ?>
</body>
</html>