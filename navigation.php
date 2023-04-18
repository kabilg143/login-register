<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navigation bar</title>


    <style>
           
         body 
         {
            margin: 0;
         }
        ul 
        {
            list-style-type: none;
            margin:-10px;
            margin-top:-16px;
            padding-right:4px;
            padding:0;
            width: 10%;
            background-color:grey;
            position: fixed;
            height: 87%;
  
        }

        li a{
            display:block;
            text-decoration: none;
            padding: 4px 12px;
            color:white;

        }
 
        li a:hover {
            background-color:#009b77;
            color:aqua;
            text-decoration: none;
        }

    </style>
</head>
<body>
  

<ul>
  <li><a  href="add_users_form.php">Add User</a></li>
  <li><a href="display_users.php">Display Users</a></li>
  
</ul>

</body>
</html>