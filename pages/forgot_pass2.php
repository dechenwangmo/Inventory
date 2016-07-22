<?php
    include("connection.php");
    if(isset($_POST['submit']) && $_POST['submit'] = "submit")
    {
        $uname = mysql_real_escape_string($_POST['id']); 
        $password = md5($_POST['password']);
        $newpassword = md5($_POST['newpassword']);
        $confirmnewpassword = md5($_POST['confirmnewpassword']);

        $result = mysql_query("SELECT password FROM login_details WHERE id='$uname'");

            if(!$result)
            {
                echo "The id entered does not exist!";
            }
            else
            if($password != mysql_result($result, 0))
            {
                echo "Entered an incorrect password";
            }

            if($newpassword == $confirmnewpassword)
            {
                $sql = mysql_query("UPDATE login_details SET password = '$newpassword' WHERE id='$uname'");      
            }
            else{
                 echo "Congratulations, password successfully changed!";
            }

            if(!$sql)
            {
                echo "unsuccessful";
            }
            else
            {
                echo "New password and confirm password must be the same!";
            }
        }     
    ?>


    