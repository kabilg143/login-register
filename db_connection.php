<?php
    function opencon()
    {
        $con= mysqli_connect('localhost','root','','student_register&login') or die("Connect failed: %s\n". $con -> error);  
        return $con;
    }
?>