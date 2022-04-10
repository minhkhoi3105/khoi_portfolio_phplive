
<?php
    $pageTitle ="Blog";
    include "includes/header.php";
    include "includes/dbConnection.php";
?>

<?php

echo date("Y/m/d") . "<br>";
?>
<div style="color:#AFAF00;min-width:200px;text-align:center;font-size:30px;">
        All Blogs
</div>

<?php

try {
    if(isset($_SESSION['username']) ) {
?>
    <nav class=""> 
         <a href="includes/insertBlog.php" style="float:right;">Insert Blog </a> 
    </nav>      
<?php
    } else {
        if(isset($_GET['logout'])) {
            if($_GET['logout']) {
                echo "You have been logged out<br>";
            }
        }
    } 
?>
     <form action="#" method="POST" enctype="multipart/form-data" style="height: 100px;"> 
            <select name="blogList" style="width:300px;">
                <option value="0">--Select a Blog--</option>
                <?php 

                    $BlogId = 0;
                    if(isset($_POST['search'])){
                        //Check that blogList is not empty
                        if(!empty($_POST['blogList'])){
                            //set id from blogList Value
                            $BlogId=$_POST['blogList'];
                        }            
                    }

                    $sqlSearch = "Select Title, BlogId from blogs";
                    $resultSearch = $conn -> query($sqlSearch);
                    while($rowSearch = $resultSearch->fetch_assoc()){
                        //Check if id is the same as the current id variable
                        if($rowSearch['BlogId'] == $BlogId) {
                          // set the selected attribute
                            $selected = "selected = 'selected'";
                        } else {
                            $selected = "";
                        }
                        echo "<option value='".$rowSearch['BlogId']."'".$selected.">".$rowSearch['Title']."</option>";
                      }
                ?>
            </select>
            <select name="categoryList" style="width:300px;">
                <option value="0">--Select a Category--</option>
                <?php 

                    $CategoryId = 0;
                    if(isset($_POST['search'])){
                        //Check that blogList is not empty
                        if(!empty($_POST['categoryList'])){
                            //set id from blogList Value
                            $BlogId=$_POST['categoryList'];
                        }            
                    }

                    $sqlSearch = "Select CategoryId, Category from categories";
                    $resultSearch = $conn -> query($sqlSearch);
                    while($rowSearch = $resultSearch->fetch_assoc()){
                        //Check if id is the same as the current id variable
                        if($rowSearch['CategoryId'] == $CategoryId) {
                          // set the selected attribute
                            $selected = "selected = 'selected'";
                        } else {
                            $selected = "";
                        }
                        echo "<option value='".$rowSearch['CategoryId']."'".$selected.">".$rowSearch['Category']."</option>";
                      }
                ?>
            </select>
            <div class="col-2">   
                <button type="submit" name="search" style="height:30px;"> Search </button>    
            </div> 
    </form>

<?php
    $sql = "Select * from blogs";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
        if($_POST["blogList"] != 0)
        {
            $blogId = $_POST["blogList"];
            $sql = "Select * from blogs WHERE BlogId = $blogId";
        }

        if($_POST["categoryList"] != 0)
        {
            $categoryId = $_POST["categoryList"];
            $sql = "Select * from blogs LEFT JOIN categories_blogs
                    ON blogs.BlogId = categories_blogs.BlogId
                    WHERE categories_blogs.CategoryId =   $categoryId ";
        }
 
    }     
        $result = $conn -> query($sql);
        if($result->num_rows > 0){
            //$result = mysqli_query($conn, $sql);
            while($row = $result -> fetch_assoc()) {
                    $title = $row['Title'];
                    $date = $row['Date'];
                    $content = $row['Content'];
                    $blogId = $row['BlogId'];

?>

                    <div style='display:inline-block; text-align: center;'>
                        <div class='card align-items-center' style='width: 320px; height: 130px;margin:10px;  border-radius: 5%; '>
                            <div class='card-body'>
                                <h5 class='card-title'><?php echo $title?></h5>
                                <h6 class='card-subtitle mb-2 text-muted'><?php echo date('m-d-y @ g:i:s A', strtotime($row['Date'])) ?></h6>
                        
                                <a href="blogDetails.php?blogId=<?php echo $blogId; ?>" class='card-link'>Details</a> |
                                <?php if(isset($_SESSION['username'])){?>
                                    <a href="includes/deleteBlog.php?blogId=<?php echo $blogId; ?>">Delete Blog</a> | 
                                    <a href="includes/updateBlog.php?blogId=<?php echo $blogId; ?>">Update Blog</a>     
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php             
            } 
            $result -> close();
            $conn -> close();
        } //end the big if numRows > 0

}
catch (Exception $ex) {
    echo "An error has occured: " . $ex->getMessage();
}
?>


<?php
    include "includes/footer.php";
?>