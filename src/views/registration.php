<?php
    session_start();

    include("../controllers/registration_controller.php");

    if(isset($_SESSION["registration"]) && $_SESSION["registration"] == "successful"){
        echo "Successfully registered user";
    }

    session_destroy();

    include("./includes/Header.php");

?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <fieldset>
            <legend>
                <b>REGISTRATION</b>
            </legend>
                
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $name;?>">
            <span > <?php echo $nameErr;?></span>
            <br><br>
                    
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $email;?>">
            <span ><?php echo $emailErr;?></span>
            <br><br>
                    
            <label>User Name:</label>
            <input type="text" name="username" value="<?php echo $username;?>">
            <span ><?php echo $usernameErr;?></span>
            <br><br>
                    
            <label>Password:</label>
            <input type="password" name="password" value="<?php echo $password;?>">
            <span ><?php echo $passErr;?></span>
            <br><br>
                   
            <label>Confirm Password:</label>
            <input type="password" name="cpassword" value="<?php echo $cpassword;?>">
            <span ><?php echo $cpassErr;?></span>
            <br><br>
                    
            <label>Gender:</label>
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
            <span > <?php echo $genderErr;?></span>
            <br><br>
                       
            <label>Date of Birth:</label>
            <input type="date" name="dob">
            <span > <?php echo $dobErr;?></span>
            <br><br>
                  
            <input type='submit' name = 'submit' value="Confirm Registration">
                    
            <P>Click here to log in <a  href="./Login.php">Log in</a> </p>
                   
               
        </fieldset>
    </form>

<?php 
    
    include("./includes/Footer.php");
?>