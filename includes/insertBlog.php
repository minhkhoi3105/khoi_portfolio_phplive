<?php
    $pageTitle ="Insert Blog";
    include "header.php";
    include "dbConnection.php";
    include "dbFunctions.php";
?>
<main>
    <!--Insert Blog Form-->
    <h3>Insert Blog</h3>
    <form action="insertBlog.php" method="POST" enctype="multipart/form-data">
            <label for="title">Title: </label>
                <input type="text" name="title">
            <div class="col-2">
                    <label for="content">Content</label>
            </div>
            <div class="col-10">
                <textarea  name="content" type="text" rows="15" cols="100"></textarea><br>
            </div>

            <input type="hidden" name="size" value="1000000">
            <div>
                <br>
                <label for="image">Image</label>     <br>
                <input type="file" name="image">
            </div>
            <br>
            <div>
                <label for="categories">Choose a category:</label>
                <select name="categoryList[]" style="width:300px;" multiple>
                    <option value="0">--Select a Category--</option>
                    <?php 

                        $CategoryId = 0;
                        if(isset($_POST['search'])){
                            //Check that blogList is not empty
                            if(!empty($_POST['categoryList'])){
                                //set id from blogList Value
                                $CategoryId=$_POST['categoryList'];
                            }            
                        }

                        $sqlCategories = "Select * from categories";
                        $resultCategories = $conn -> query($sqlCategories);
                        while($rowCategories = $resultCategories->fetch_assoc()){
                            //Check if id is the same as the current id variable
                            if($rowCategories['CategoryId'] == $CategoryId) {
                            // set the selected attribute
                                $selected = "selected = 'selected'";
                            } else {
                                $selected = "";
                            }
                            echo "<option value='".$rowCategories['CategoryId']."'".$selected.">".$rowCategories['Category']."</option>";
                        }
                    ?>
                </select>
            </div>
            <br>


            <div>
                <textarea name="text" cols="40" rows="4" placeholder="Text about image..."></textarea>
            </div>
            <!-- 
            <label for="content">Content: </label>
                <input type="text" name="content"> -->
        <button type="submit" name="newBlog">Submit</button>
    </form>

    <?php
        // if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     foreach ($_POST['categoryList'] as $category){
        //     print "You selected $category<br/>";
        //     }
        // }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newBlog'])) {
            if(isset($_POST['title']) && !empty($_POST['title']) 
                && isset($_POST['content']) && !empty($_POST['content']) && !empty($_FILES["image"]["name"])
                && isset($_POST['categoryList']) && !empty($_POST['categoryList'])) {
                


                $msg= "";            
                //the path to store the uploaded image
                $target = "img/".basename($_FILES['image']['name']);
    
                //connect to the database
                include "dbConnection.php";
                
                //Get all the submitted data from the form
                $image = $_FILES['image']['name'];
                $text = $_POST['text'];
    
                // $sql = "INSERT INTO images (image,text) VALUES ('$image', '$text')";
                $sql = "INSERT INTO images (image,text) VALUES (?, ?)";              
                $statement=$conn->prepare($sql) or die("Problem with query");
                $statement->bind_param('ss',$image,$text);
                $statement->execute();
    
                $imageId = $conn->insert_id;

                $statement->close();

                if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $msg = "Image upload successfully";
                } else {
                    $msg = "";
                }
                $imageId = $conn->insert_id;
                
                
                $newId = insertBlogPost($conn, $_POST['title'], $_POST['content'], 1, $imageId, $_POST['categoryList']); 
                echo "The Blog Id is: $newId." ;
            } else {
                echo $_POST['title'];
                echo $_POST['content'];
      
                echo $_POST['categoryList'];
                echo $_FILES["image"]["name"];

                echo "Field is required";
            }
        }
    ?>
    

<?php
    include "footer.php";
?>
 
  