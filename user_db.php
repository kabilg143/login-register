<?php
    function openconnection()
    {
        $con= mysqli_connect('localhost','root','','add_user') or die("Connect failed: %s\n". $con -> error);  
        return $con;
        
    }
    
?>