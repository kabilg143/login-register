<?php

include "header.php";
include "navigation.php";





require_once('user_db.php');
$connection=openconnection();

$query="SELECT * FROM add_users";

$result=mysqli_query($connection,$query);

$numrows=mysqli_num_rows($result);

if($numrows>0)
{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
       table,th,tr,td{
        border:1px solid black;
        border-collapse:collapse;
        padding:8px;
       }
       body {font-family: Arial, Helvetica, sans-serif;}
         
       header{
         margin-top:15px
       }
       

       a{
        text-decoration:none;
       }

    </style>
    
</head>

<body>
  <br><br>
<h4 align="center" style="color:green">DISPLAY USERS </h4>
<center>
<!-- Button trigger modal -->


<!-- Modal -->
<!--<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="delete_user.php" method="post">
        <div class="modal-body">
        
         <input type="hidden" name="delete_id" id="delete_id" >
         <h4>do  you want to delete this data..?</h4>
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">no</button>
         <button type="submit" name="deletedata" class="btn btn-primary">yes delete it</button>
        </div> 
      </form>
    </div>
  </div>
</div>
</center>-->


<table align="center" style="background-color:white" >
  <tr>
        <td>id</td>
        <td>user_name</td> 
        <td>password</td> 
        <td>email_id</td> 
        <td>role</td> 
        <td>update</td>  
        <td>delete</td>     
  </tr>
  
    <?php 
       
      while($row=mysqli_fetch_assoc($result))
      {
        $id=$row['id'];
        echo"
        <tr id=$row[id]>
        <td>$row[id]</td>
        <td>$row[user_name]</td> 
        <td>$row[password]</td> 
        <td>$row[email_id]</td> 
        <td>$row[role]</td> 
        <td> <button type='button' class='btn btn-info  upt_btn'><a href='update_user.php?id=$id'>update</a></button></td>
        <td> <button type='button' class='btn btn-danger dltbtn'> delete </button></td>
        </tr>
        ";
      }
    ?>
    
  

</table>
</body>
</html>

<?php 
}
include "footer.php";
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>


<?php

/*
$(document).ready(function(){

  $('.dltbtn').on('click',function(){

    $('#deletemodal').modal('show');

     $tr=$(this).closest('tr');

     var data=$tr.children("td").map(function(){
         return $(this),text();
     }).get();

     console.log(data);

     $('#delete_id').val(data[0]);
      });
});*/?>

<script >
  $(document).ready(function(){
    $(".dltbtn").click(function(){
        var id = $(this).parents("tr").attr("id");
         
       //alert(id);
        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'delete_user.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");
                     
               }
            });
        }
    });
  });

</script>





