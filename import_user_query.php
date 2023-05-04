<?php
     require_once'user_db.php';
     $con=openconnection();
?>

<?php

    if($_FILES['xmlfile']&& $_FILES['xmlfile']['error'] == 0)
    {

      
      $file = $_FILES['xmlfile']['tmp_name'];

      $xml = simplexml_load_file($file);
      $result=0;
      $count=0;
      $text=" ";
      $pre=0;
         foreach($xml->student as $std)
             {
                 $user_name=$std->name;
                 $password=$std->password;
                 $email_id=$std->email;
                 $role=$std->role;

                 $query="SELECT * FROM add_users WHERE email_id='$email_id' ";
                 $output=mysqli_query($con,$query);
                 $row=mysqli_num_rows($output);
              if($row>0){    
             
                 $pre++;
                 }
               else{
                    if (is_name($user_name)) {
                      $count++;
                       $text.="Name is required <br>"; 
                     }
                     if (is_password($password)) {
                    $text.="password is required <br>";
                    $count++;
                    }
                    if (is_mail($email_id)) {
                      $text.="email is required <br>";
                      $count++;
                    }
                    if (is_role($role)) {
                      $text.="role is required<br>";
                    $count++;
                   }
                      
                    //echo'<script>alert("datas updated successfully")</script>';
                    //echo"<script>alert($count)</script>"; 
                    
                        if($count==0){
                          //echo"<script>alert($count)</script> ";
                          $sql="INSERT INTO add_users(user_name,password,email_id,role) VALUES('$user_name', '$password','$email_id','$role')";
                          $result=mysqli_query($con,$sql);
                           } 
                }  
              }         if($pre>0){
                           echo"<script>alert('this data already in database')</script>";
                         }
                        if($count>0){
                             echo $text;
                        }     
                        if($result!=0){
                            header('location:display_users.php');
                          }
    }
    else{
      echo"<script>alert('must select a file....!')</script>";
    }

        function is_name($user_name){
          if(empty($user_name)){
            return true;
          }
        }
        function is_password($password){
          if(empty($password)){
            return true;
          }
        }
        function is_mail($email_id){
          if(empty($email_id)){
            return true;
          }
        }
        function is_role($role){
          if(empty($role)){
            return true;
          }
        }
?>