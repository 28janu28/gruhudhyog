<?php 
    session_start();

if(!empty($_POST))
{
    extract($_POST);

    if(empty($unm)||empty($pwd))
    {
        echo'<font color="red">Please enter username or password</font>';
    }
    else{
        include("config.php");

        $q="select * from admin_login
        where a_unm='$unm'
        and a_pwd='$pwd'";
        echo $q;
        $res= mysqli_query($conn,$q)or die("error".mysqli_error($conn));

        $row= mysqli_fetch_assoc($res);

    }
    if(!empty($row))
    {
        $_SESSION['admin']['unm']=$row['a_unm'];
        $_SESSION['admin']['id']=$row['a_id'];
        $_SESSION['admin']['status']=true;

        header("location:index.php");
    }
    else{
        echo"Wrong username or password";
    }
}
?>
