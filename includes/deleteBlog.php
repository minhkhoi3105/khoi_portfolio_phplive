<?php
    $pageTitle ="Delete Blog";
    include "header.php";
    include "dbConnection.php";
    include "dbFunctions.php";
?>
<main>
    <!--Insert Blog Form-->
    <h3>Delete Blog</h3>

    <?php

    if (isset($_GET['blogId'])){
        $blogId = $_GET['blogId'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteBlog'])) {
        if (isset($_GET['blogId'])){
            $numOfRowsAffected = deleteBlogPost($conn, $blogId);
            echo "Num of Rows Affted: " . $numOfRowsAffected;
        }
    } 

    $sql="SELECT * FROM blogs WHERE blogId = $blogId";
    $result=$conn->query($sql);
    while ($row=$result->fetch_assoc()){
        $title = $row['Title'];
        $date = $row['Date'];
        $content = $row['Content'];

    ?>
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


          
            <button type="submit" name="deleteBlog">Delete</button>
    </form>
            <button type="submit" name="cancel"><a href="../blog.php" class='card-link'>All Blogs</a> </button>
    <?php
    } // closing the while loop
    ?>
</main>

<?php
    include "footer.php";
?>
 