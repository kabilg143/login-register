<?php
require_once 'user_db.php';
$con = openconnection();
$valid_mail = "";
$valid_require = "";
$insert = 0;

if (isset($_FILES['xml-file'])) {


    $file = $_FILES['xml-file']['tmp_name'];

    $xml = simplexml_load_file($file);

    foreach ($xml->student as $std) {
        $user_name = $std->name;
        $password = $std->password;
        $email_id = $std->email;
        $role = $std->role;

        $valid_mail .= is_valid_email($con, $email_id);
        

        $valid_require .= is_empty_require_field($std);

        if (strlen("$valid_mail") == 0 && strlen("$valid_require") == 0) {

            $result = insert_fun($user_name, $password, $email_id, $role, $con);
            if ($result) {
                $insert++;
            }
        }
    }
    
    
    
    if (strlen("$valid_mail") > 0) {
        $data="<ul>".$valid_mail."</ul>";
        //echo json_encode($data);
        echo '<h5 id="email">The following emalis are already exists:</h4>'.$data;
    
    }
    if (strlen("$valid_require")>0) {

        echo $valid_require;
    }

    if ($insert > 0) {
        echo "inserted successsfuly";
    }







}
function is_valid_email($con, $email_id)
{
    $v_email = "";

    $query = "SELECT email_id FROM add_users WHERE email_id='$email_id' ";
    $output = mysqli_query($con, $query);
    $row = mysqli_num_rows($output);


    if ($row > 0) {
        $v_email ="<li>". $email_id ."</li>";
        return $v_email;
    }
}

function is_empty_require_field($std)
{
    ;
    $text = "";

    if (empty($std->name)) {


        $text .= "<b>".$std->email."</b> name is required <br>  ";

    }
    if (empty($std->password)) {


        $text .= "password is required <br> ";
    }
    if (empty($std->email)) {

        $text .= "<b>".$std->name."</b> email id is required <br> ";
    }
    if (empty($std->role)) {

        $text .= "role is required <br> ";
    }



    return $text;




}

function insert_fun($user_name, $password, $email_id, $role, $con)
{
    $sql = "INSERT INTO add_users(user_name,password,email_id,role) VALUES('$user_name', '$password','$email_id','$role')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        return true;
    }
}
?>