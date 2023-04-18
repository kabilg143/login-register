
<?php
    require_once'db_connection.php';
    $con=opencon();

    if(isset($_POST['register_submit'])){
        $std_name=$_POST['name'];
        $password=$_POST['pwd'];
        

        if( $std_name!="" && $password!="")
        {
           $sql="INSERT INTO register(std_name,password) VALUES('$std_name','$password')";
            
           $result=mysqli_query($con,$sql);

          

           if($result){    
             header("location:register.php");
             
             }
           else{
            echo "all fields required";
           }
        }
    }
 
    elseif(isset($_POST['login_submit'])){
        $std_name=$_POST['name'];
        $password=$_POST['pwd'];
    
           $sql="SELECT * FROM REGISTER WHERE std_name='$std_name' AND password='$password'";
            
           $result=mysqli_query($con,$sql);

           $row=mysqli_num_rows($result);

           if($row>0){    
             
              header('location:home.php');
             }
           else{
            echo'<script>alert("incorrected password or username")</script>';
           }
        
    }

    
?> 