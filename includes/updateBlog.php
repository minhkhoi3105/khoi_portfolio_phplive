<?php
    $pageTitle ="Update Blog";
    include "header.php";
    include "dbConnection.php";
    include "dbFunctions.php";
?>
<main>
    <?php

        if (isset($_GET['blogId'])){
            $blogId =$_GET['blogId'];
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBlog'])) {
            if(  isset($_POST['title']) && !empty($_POST['title']) &&
                isset($_POST['content']) && !empty($_POST['content']) &&
                isset($_POST['categoryList']) && !empty($_POST['categoryList'])
                && !empty($_FILES["image"]["name"])) {
                
               
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
                    
                $numberOfRows = updateBlogPost($conn, $_POST['title'], $_POST['content'],$blogId, $_POST['categoryList'], $imageId);
                echo "The Number Of Rows Affected is: $numberOfRows." ;
            } else {
                echo "Field is required";
            }
        }
        
        $sql="SELECT * FROM blogs WHERE blogId = $blogId";
        $result=$conn->query($sql);
        while ($row=$result->fetch_assoc()){
            $title = $row['Title'];
            $date = $row['Date'];
            $content = $row['Content'];
        
    ?>
    <!--Insert Blog Form-->
    <h3>Update Blog</h3>
    <form action="" method="POST" enctype="multipart/form-data">
            <label for="blogId">Blog Id: <?php echo $blogId?> </label> <br>

            <!-- <label for="title">Title: </label>
                <input type="text" name="title"> -->
            <!-- <label for="content">Content: </label>
                <input type="text" name="content"> -->

            <label for="title">Title: </label>
                <input type="text" name="title" value="<?php echo $title?>"/>
            <div class="col-2">
                    <label for="content">Content</label>
            </div>
            <div class="col-10">
                <textarea  name="content" type="text" rows="15" cols="100"><?php echo $content?></textarea><br>
            </div>
            <input type="hidden" name="size" value="1000000">
            <div>
                <br>
                <label for="image">Image</label>     <br>
                <input type="file" name="image">
            </div>
            <div>
                <textarea name="text" cols="40" rows="4" placeholder="Text about image..."></textarea>
            </div>
                <?php 
                function getBlogCategories($conn,$id){
                    $sql = "SELECT * FROM categories_blogs, categories 
                    WHERE categories.CategoryId = categories_blogs.CategoryId AND BlogId = $id";
                            
                    $stmt = $conn->query($sql);
                    return $stmt;
                }             
                    $resultCategories = getBlogCategories($conn, $blogId);
                ?>
                    <label><b>Categories of This Blog:</b></label>
                <?php
                    while ($rowCategory=$resultCategories->fetch_assoc()){ 
                ?>
                    <hr>
                        <p><?php echo $rowCategory['Category']?></p>
                <?php
                        }// closing loop for categories
                ?>


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
        <button type="submit" name="updateBlog">Submit</button>
    </form>

    <?php
        } // closing the while loop
      
    ?>
    <a href="../blogDetails.php?blogId=<?php echo $blogId; ?>" class='card-link'>Blog Details</a> 


<?php
    include "footer.php";
?>
 
  