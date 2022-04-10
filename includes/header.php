<!DOCTYPE html>
<html> 
    <head>  
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/styles.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">

        <title><?php echo $pageTitle?></title>
        <style>
            body{
                font-family: 'Times New Roman', serif;
                background-color: pink; 
                color: #000;
                margin-left:auto;
                margin-right: auto;
                font-size: 20px;
            }


            #wrapper{
                background-color: #ccccff; 
                width: 85%;
                margin: 1% auto;
                padding: 5%;
                border-radius: 3%;
            }


            #picOfMe {
                /* background-image: -webkit-linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(img/cute.jpg);
                background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(img/cute.jpg); */
                background-size: cover;
                background-position: center;
                /* background-attachment: fixed;  */
                /* background-color: #ccccff; */
                width: 100%; 
                padding-top: 10%;
                height: 110vh;
                margin-bottom: 0%;
                
            }

            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
            }
        </style>
    </head>
    <body>
        <main>
        <!-- style="text-align:center;" -->
                <nav class="navbar justify-content-center" style="font-family: 'Lobster', cursive; font-size:x-large; text-shadow: -1px 1px 0 #000;" >
                            <a class="nav-link" style="color: #fff;" href="../index.php">About Me </a>
                            <a class="nav-link" style="color: #fff;" href="../blog.php">Blog</a> 
                            <a class="nav-link" style="color: #fff;" href="../project.php">Project</a>
                            <?php 
                            session_start();
                            
                            if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['username']) && loginValidation($conn,$_POST['username'], $_POST['password']))
                            {
                                $username = $_POST['username'];
                                $_SESSION['username'] = $username;
                            }

                            if(isset($_SESSION['username'])){
                                echo "<a  href='logout.php'>Logout</a>";
                            }else{
                                echo "<a href='login.php'>Login</a>";
                            }
                            ?>
                </nav>
            <div id="wrapper">
                
            <br>