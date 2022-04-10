<?php 
    $msg= "";
    //if upload button is pressed
    if(isset($_POST['upload'])) {
        //the path to store the uploaded image
        $target = "img/".basename($_FILES['image']['name']);

        //connect to the database
        include "dbConnection.php";
        
        //Get all the submitted data from the form
        $image = $_FILES['image']['name'];
        $text = $_POST['text'];

        $sql = "INSERT INTO images (image,text) VALUES ('$image', '$text')";
        $result = $conn -> query($sql);

        if($result->num_rows > 0){
            if(move_uploaded_file($_FILES['tmp_name']['name'], $target)) {
                $msg = "Image upload successfully";
            } else {
                $msg = "";
            }
        }
    }
?>