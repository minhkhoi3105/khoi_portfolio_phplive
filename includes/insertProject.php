<?php
    $pageTitle ="Insert Project";
    include "header.php";
    include "dbConnection.php";
    include "dbFunctions.php";
?>
<main>
    <!--Insert Blog Form-->
    <h3>Insert Project</h3>
    <form action="insertProject.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name: </label>
                <input type="text" name="name">
            <div class="col-2">
                    <label for="description">Description: </label>
            </div>
            <div class="col-10">
                <textarea  name="description" type="text" rows="15" cols="100"></textarea><br>
            </div>

            <!-- <label for="category">Category: </label>
                <input type="text" name="category"> -->


            <input type="hidden" name="size" value="1000000">
            <div>
                <br>
                <label for="image">Image</label>     <br>
                <input type="file" id="image" name="image[]" multiple 
                        style="width:300px; height: 35px;"/>
            </div>
            <div>
                <textarea name="text" cols="40" rows="4" placeholder="Text about image..."></textarea>
            </div>

            <div>
                <label for="categories">Choose Categories:</label>
                <select name="categoryList[]" style="width:300px;" multiple>
                    <option value="0">--Select Categories--</option>
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



            <div>
                <label for="skills">Choose Skills:</label>
                <select name="skillList[]" style="width:300px;" multiple>
                    <option value="0">--Select Skills--</option>
                    <?php 

                        $SkillId = 0;
                        if(isset($_POST['search'])){
                            if(!empty($_POST['skillList'])){
                                $SkillId=$_POST['skillList'];
                            }            
                        }

                        $sqlSkills = "Select * from skills";
                        $resultSkills = $conn -> query($sqlSkills);
                        while($rowSkills = $resultSkills->fetch_assoc()){
                            //Check if id is the same as the current id variable
                            if($rowSkills['SkillId'] == $SkillId) {
                            // set the selected attribute
                                $selected = "selected = 'selected'";
                            } else {
                                $selected = "";
                            }
                            echo "<option value='".$rowSkills['SkillId'] ."'".$selected.">".$rowSkills['Skill'] ."</option>";
                        }
                    ?>
                </select>
            </div>

        <button type="submit" name="newProject">Submit</button>
    </form>


    <?php  
    // $imageIds = array();
    // $images = array_filter($_FILES["uploadImage"]["name"]);
    
    // if(!empty($images)){
    //     foreach($_FILES["uploadImage"]["name"] as $key=>$val){
    //         $image = $_FILES["uploadImage"]["name"][$key];
    //         $tempname = $_FILES["uploadImage"]["tmp_name"][$key];    
    //         $folder = "images/".$image;

    //         $imageId=addImage($conn,$image);
    //         array_push($imageIds, $imageId);
    //         //move file to images folder
    //         move_uploaded_file($tempname, $folder);
    //     }
    // }
    ?>



<div class="2">



    
</div>
    <?php
        function addNewImage($conn,$image,$text){
            $sql="INSERT INTO images(image, text) VALUES (?,?)";
                    
            $stmt=$conn->prepare($sql) or die("Problem with query");
            $stmt->bind_param('ss',$image,$text);
            $stmt->execute();
        
            $id = $conn->insert_id;
        
            return $id;
        
            $stmt->close();
        }
        

        function addSkills() {
            
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newProject'])) {
            if(isset($_POST['name']) && !empty($_POST['name']) 
                && isset($_POST['description']) && !empty($_POST['description'])
              //  && isset($_POST['category']) && !empty($_POST['category'])
                && !empty($_FILES["image"]["name"])) {

                $imageIds = array();
                $images = array_filter($_FILES["image"]["name"]);
                
                if(!empty($images)){
                    foreach($_FILES["image"]["name"] as $key=>$val){
                        $image = $_FILES["image"]["name"][$key];
                        $tempname = $_FILES["image"]["tmp_name"][$key];    
                        $folder = "img/".basename($image);

                        $imageId=addNewImage($conn,$image, $_POST['text']);

                        /* 
                            $sql = "INSERT INTO images (image,text) VALUES (?, ?)";
                            $statement=$conn->prepare($sql) or die("Problem with query");
                            $statement->bind_param('ss',$image,$text);
                            $statement->execute();
                
                            $imageId = $conn->insert_id;

                            $stmt->close();                        
                        */
                        array_push($imageIds, $imageId);
                        //move file to images folder
                        move_uploaded_file($tempname, $folder);
                    }
                }

                /*            
                $imageId = $conn->insert_id;
                
                $newId = insertBlogPost($conn, $_POST['title'], $_POST['content'], 1, $imageId); 
                echo "The Blog Id is: $newId." ;
                */
                if(count($imageIds) >= 3) {
                    $id = insertProject($conn, $_POST['name'], $_POST['description'], $imageIds,  $_POST['categoryList'] ,  $_POST['skillList']);
                    echo "The project id is: " . $id;
                } else {
                    echo "Minimum 3 images are needed for project";
                }

            } else {
                echo "Field is required";
            }
        }
    ?>
    

<?php
    include "footer.php";
?>
 
  