<?php 
	
	if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['login'])) {
        
		$username = $_POST['username'];
		$password = $_POST['password'];

        // checks whether all the input variables are filled
		if (empty($username) or empty($password)) {
			echo "*Please fill up the form properly";
		}
		else {

            $dataString = file_get_contents('../Data/Data.json');
            $dataJSON = json_decode($dataString, true);
            
            // stores data from json to session
            foreach($dataJSON as $row) {
                
                if(!($row['username'] == $username && $row['password'] == $password)) {

                    continue;

                } else {

                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];                
                    $_SESSION['gender'] = $row['gender'];                                
                    $_SESSION['dob'] = $row['dob'];                                                
                    $_SESSION['username'] = $row['username'];   
                    $_SESSION['password'] = $row['password']; 

                }
            }

            if(isset($_POST['remember'])){
                setcookie("username", $username, time() + 3600); // cookie set for 1hr
                setcookie("password", $password, time() + 3600);
                setcookie("remember_checkbox", 1 , time() + 3600);
            }else {
                setcookie("username", $username, time() - 3600); // cookie expired 1hr ago
                setcookie("password", $password, time() - 3600);
                setcookie("remember_checkbox", 1 , time() - 3600);
            }


            header("location:Dashboard.php");
			
		}


	}



	
?>