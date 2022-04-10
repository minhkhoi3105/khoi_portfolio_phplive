<?php
    $pageTitle ="Login";
    include "includes/dbConnection.php";
    include "includes/dbFunctions.php";
    include "includes/functions.php";
    include "includes/header.php";
?>

<?php




    //Check to see if the user is already logged in 
    if(isset($_SESSION['username']) && loginValidation($conn,$username, $password)) {
        echo "You are already logged in as", $_SESSION['username'], "<a href='index.php'>Go to home page</a>";       
    }
    else if($_SERVER['REQUEST_METHOD'] === "POST"){
    
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            try{
                //Store escaped POST variables
                $username = htmlentities($_POST['username']);
                $password = htmlentities($_POST['password']);

                if(loginValidation($conn,$username, $password)){
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    redirectTo('index.php');
                }
                else{
                    echo "Invalid Username or Password of the user.";
                }
            }catch(Exception $ex){
                echo "Error during logging in: $ex->getMessage().";
            }
        }else{
            echo "Username or Password should be valid.";
        }
    } else {
        if(isset($_GET['logout'])) {
            if($_GET['logout']) {
                echo "You have been logged out<br>";
            }
        }
    } 
?>

<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" />
    <label for="password">Password:</label>
    <input type="password" name="password" />
    <button type="submit" name="Login">Login</button>
</form>



<?php 
include "includes/footer.php"; ?>