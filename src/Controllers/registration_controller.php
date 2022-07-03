<?php

    $nameErr = $emailErr = $dobErr = $genderErr = $usernameErr = $passErr = $cpassErr = "";
    $name = $email = $username = $dob = $gender = $password = $cpassword = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){

    //.........................................................................................

    //                           For name field checking

    //.........................................................................................

        if (empty($_POST["name"])) {
            $nameErr = "*Name is required";
        }else if (strlen($_POST["name"]) > 5) {
            $nameErr = "*Max 5 words only";
        }else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-'. ]*$/",$name)) {
                $nameErr = "*Only letters and white space allowed";
            }
        }

    //.........................................................................................

    //                                For email field checking

    //.........................................................................................
  
        if (empty($_POST["email"])) {
            $emailErr = "*Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "*Invalid email format";
            $email = "";
            }
        }

    //.........................................................................................

    //                                For username field checking

    //.........................................................................................
  
        if (empty($_POST["username"])) {
            $usernameErr = "*Username is required";
        } else if (strlen($_POST["username"]) > 5) {
            $usernameErr = "*Max 5 words only";
        } else {
            $username = test_input($_POST["username"]);
    
            if (!preg_match("/^[a-zA-Z-'. ]*$/",$username)) {
            $usernameErr = "*Only letters and white space allowed";
            $username = "";
            }
        }

    //.........................................................................................

    //                         For password and confirm password field checking

    //.........................................................................................
        
        // Password 
        if (empty($_POST["password"])) {
            $passErr = "*Password is required";
        } else {

            $password = $_POST["password"];
            $count = strlen($password);
    
            if ((!preg_match("([@#$%])",$password)) || $count < 8 ) {
              $passErr = "*Password must not be less than eight characters and  must contain at least one of the special characters (@, #, $, %) ";
            }
        }

        // Confirm password
        if (empty($_POST["cpassword"])) {
           $cpassErr = "*Password is required";
        } else {

            $cpassword = $_POST["cpassword"];
            $count = strlen("$cpassword");
           
            if($_POST['password'] != $cpassword)
            {
              $cpassErr = "Confirm password not matched";
            }

        }

    //.........................................................................................

    //                         For gender field checking

    //.........................................................................................

        if (empty($_POST["gender"])) {
            $genderErr = "*Gender is required";
        }


    //.........................................................................................

    //                         For DOB field checking

    //.........................................................................................       

        if (empty($_POST["dob"])){
            $dobErr="*Date of birth is required";
        } else {
            $dobErr = "" ;
            $dob = $_POST["dob"];
        }

    //.........................................................................................

    //                         Saving data to JSON

    //.........................................................................................

        if(!(
            strlen($nameErr)     > 0 ||
            strlen($emailErr)    > 0 ||
            strlen($usernameErr) > 0 ||
            strlen($passErr)     > 0 ||
            strlen($cpassErr)    > 0 ||
            strlen($genderErr)   > 0 ||
            strlen($dobErr)      > 0
        )){
            
            if(file_exists('../Data/Data.json')) {

                $current_data = file_get_contents('../Data/Data.json');  
                $array_data = json_decode($current_data, true);

                $extra = array(    
                            'name' => $_POST["name"],  
                            'email' => $_POST["email"],     
                            'username' => $_POST["username"],  
                            'password' => $_POST["password"],  
                            'gender' => $_POST["gender"],
                            'dob' => $dob  
                );
                    
                $array_data[] = $extra;  
                    
                $final_data = json_encode($array_data); 
                if(file_put_contents("../Data/Data.json", $final_data)){
                    $_SESSION["registration"] = "successful";
                }
                
            }
        }
    }
 

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    } 
 
?>   