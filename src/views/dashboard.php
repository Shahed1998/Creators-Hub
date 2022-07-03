<?php

    session_start();

    if(!(isset($_SESSION["username"]) && isset($_SESSION["password"]))){
        header("location:login.php");
        $_SESSION["login"] = false;
    }

    include("./includes/header.php");

?>

<fieldset>
    <br>
        <nav>
            Logged in as <?php  echo  $_SESSION["username"]; ?></a> ||
            <a href="./logout.php">Log Out</a>
        </nav>
        <br>
    </fieldset>
    <h2 align="center"> Welcome <?php if(isset($_SESSION['username'])): ?> <?php echo $_SESSION["username"]; ?> <?php endif; ?> </h2> 
<fieldset>
    <table >
        <tr>
            <td >
                <label>Account</label>
                <br>
                
                <ul>
                    
                    <li><a href=''>View Profile</a></li>
                    <li><a href=''>Edit Profile</a></li>
                    <li><a href=''>Change Profile Picture</a></li>
                    <li><a href=''>Change Password</a></li>
                    <li><a href='./logout.php'>Logout</a></li>
               </ul>
            </td>
            <td >
                <table align="center" >
                
                    <br><br><br>

                </table>
                <br>
            </td>
        </tr>
    </table>
</fieldset>

<?php include("./includes/footer.php"); ?>

