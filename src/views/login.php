<?php

    session_start();
    include("../controllers/login_controller.php");
    include("./includes/Header.php");
?>

    <form method="post">
        <fieldset>

            <label>Username: </label>
            <input name="username" type="text"
            value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"
            class="input-field">
            <br>

            <label>Password:</label>
            <input name="password" type="password"
            value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"
            class="input-field">
            <br>

            <?php

                if(isset($_COOKIE["remember_checkbox"])){
                    echo "<input checked type='checkbox' name='remember' />";
                }else{
                    echo "<input type='checkbox' name='remember' />";
                }

            ?>  Remember me
            <br>

            <label>Login</label>
            <input name = "login" type="submit" value="Login">
            <P>Didn't sign up? <a  href="./Registration.php">Sign Up</a> </p>
            
        </fieldset>
    </form>

<?php include("./includes/Footer.php"); ?>