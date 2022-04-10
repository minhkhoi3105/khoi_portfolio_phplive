<?php
    $pageTitle ="Blog Details";
    include "includes/header.php";
    include "includes/dbConnection.php";
?>

<?php

echo date("Y/m/d") . "<br>";

if (isset($_GET['blogId'])){
    $blogId=$_GET['blogId'];
}
$sql="SELECT blogs.Title, blogs.Date, blogs.Content, images.Image, images.Text FROM blogs INNER JOIN images ON blogs.ImageId = images.ImageId WHERE blogs.blogId = $blogId";
$result=$conn->query($sql);
?>
<h3>Blog Details</h3>


<?php 

while ($row=$result->fetch_assoc()){
    $title = $row['Title'];
    $date = $row['Date'];
    $content = $row['Content'];
?>
    <div>
            <h1><?php echo $title; ?></h1>
    </div>
    <div>
            <small>Date Posted: <?php echo date('m-d-y @ g:i:s A', strtotime($row['Date'])) ?></small>
            <hr>
            <div>
                <img src="includes/img/<?php echo $row['Image']?>" height="400px"  width='200px' alt="<?php echo $row['Text']?>" class="center">
            </div>
            <p style="display:inline-block; text-align:justify;"><?php echo $content?></p><br>
            
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
            } //closing the big while loop
        ?>
        <a href="blog.php" class='card-link'>All Blogs</a> |
        <?php if(isset($_SESSION['username'])){?>
            <a href="includes/deleteBlog.php?blogId=<?php echo $blogId; ?>">Delete Blog</a> | 
            <a href="includes/updateBlog.php?blogId=<?php echo $blogId; ?>">Update Blog</a>     
        <?php } ?>

<?php
    include "includes/footer.php";
?>