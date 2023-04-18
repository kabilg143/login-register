      
<?php

require_once "user_db.php";
$connection=openconnection();
//echo $_GET['id'];
/*
if(isset($_post['delete_id'])){
    $id=$_post['delete_id'];
    $query="DELETE from add_users where id=$id";
    $result=mysqli_query($connection,$query);
     //echo'<script>alert("you are going to delete the record");</script>';
    if($result){
            
      header('location:display_users.php');
     
    }       
} 
else{
  echo"value not come";
}   */

 
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  
 
  
  $sql = "DELETE FROM add_users WHERE id=$id";
  $connection->query($sql);
  echo 'Deleted successfully.';
  

}
  
?>


