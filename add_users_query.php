<?php


    require_once'user_db.php';
    $con=openconnection();

    

    if(isset($_POST['submit']))
    {
        $user_name=$_POST['user_name'];
        $password=$_POST['password'];
        $email_id=$_POST['email_id'];
        $role=$_POST['role'];
        
        if( $user_name!="" && $password!="" && $email_id!="" && $role!="")
        {
           $sql="INSERT INTO add_users(user_name,password,email_id,role) VALUES('$user_name', '$password','$email_id','$role')";
           $result=mysqli_query($con,$sql);

           if($result){
             
             echo'<script>alert("datas stored successfully")</script>';
             header('location:display_users.php');
           }
        }
        else
        {
          echo"enter all the values";
        }
    }
     else if(isset($_POST['update_submit']))
     {
      $user_name=$_POST['user_name'];
      $password=$_POST['password'];
      $email_id=$_POST['email_id'];
      $role=$_POST['role'];
      $id=$_POST['id'];
      
      if( $user_name!="" && $password!="" && $email_id!="" && $role!="")
      {
        $query="UPDATE add_users SET user_name='$user_name',password='$password',email_id='$email_id',role='$role' WHERE id=$id";
        $result=mysqli_query($con,$query);
      }
      if($result){
             
        echo'<script>alert("datas updated successfully")</script>';
        header('location:display_users.php');
      }
  }


?>