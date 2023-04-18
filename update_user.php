<?php 

include "header.php";
include "navigation.php";


 
 if(isset($_GET['id']))
 {

   require_once'user_db.php';


     $connection=openconnection();


 

         $id=$_GET['id'];

        $query="select user_name,password,email_id,role from add_users where id=$id";
        $result=mysqli_query($connection,$query);
        $numrow=mysqli_num_rows($result);

       if($numrow==1)
        {
             $row=mysqli_fetch_assoc($result);
        
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
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                   <b><label for="">User Name:</label></b>
                    <input type="text" name="user_name" id="user_name" value="<?php echo"$row[user_name]"; ?>"> 
          
        
          
                   <b><label for="">Password:</label> </b>
                    <input type="password" name="password" id="password" value="<?php echo"$row[password]"; ?>" >
         
        

         
                   <b> <label for="">Email ID:</label> </b>
                   <input type="email" name="email_id" id="email_id" value="<?php echo"$row[email_id]"; ?>">
         
         
 
         
                   <b> <label for="">Role:</label> </b>
                  <input type="radio" name="role" id="role" value="Administrator" <?php if($row['role']=="Administrator"){echo "checked";}?>>Administrator
                  <input type="radio" name="role" id="role" value="Editor" <?php if($row['role']=="Editor"){echo "checked";}?>>Editor
                   <input type="radio" name="role" id="role" value="Author"<?php if($row['role']=="Author"){echo "checked";}?>>Author
                   <input type="radio" name="role" id="role" value="Contributor" <?php if($row['role']=="Contributor"){echo "checked";}?>>Contributor
                   <input type="radio" name="role" id="role" value="Subscriber"<?php if($row['role']=="Subscriber"){echo "checked";}?>>Subscriber  <br><br>

            
                 <input type="submit" name="update_submit" value="update">

         
                 </div>
        
                 </form>
   

              <?php  include "footer.php"; ?>
               </body>
               </html>
          <?php
        }  
}  
   
   
   
   ?>
