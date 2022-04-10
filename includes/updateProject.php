<?php
    $pageTitle ="Update Project";
    include "header.php";
    include "dbConnection.php";
    include "dbFunctions.php";
?>

<?php

if (isset($_GET['projectId'])){
    $projectId =$_GET['projectId'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProject'])) {
    if(  isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['description']) && !empty($_POST['description']) &&
        isset($_POST['categoryList']) && !empty($_POST['categoryList']) &&
        isset($_POST['skillList']) && !empty($_POST['skillList'])) {
        
                
        $numberOfRows = updateProject($conn, $_POST['name'], $_POST['description'], $projectId,$_POST['categoryList'],$_POST['skillList']);
        echo "The Number Of Rows Affected is: $numberOfRows." ;
    } else {
        echo "Field is required";
    }
}

$sql="SELECT * FROM projects WHERE ProjectId = $projectId";
$result=$conn->query($sql);
while ($row=$result->fetch_assoc()){
    $name = $row['Name'];
    $description = $row['Description'];

?>
<!--Insert Blog Form-->
<h3>Update Project</h3>
<form action="" method="POST" enctype="multipart/form-data">
    <label for="projectId">Project Id: <?php echo $projectId?> </label> <br>


    <label for="name">Name: </label>
        <input type="text" name="name" value="<?php echo $name?>"/>
    <div class="col-2">
            <label for="description">Description: </label>
    </div>
    <div class="col-10">
        <textarea  name="description" type="text" rows="15" cols="100"><?php echo $description?></textarea><br>
    </div>



    <?php 
                    function getProjCategories($conn,$id){
                        $sql = "SELECT * FROM categories_projects, categories 
                        WHERE categories.CategoryId = categories_projects.CategoryId AND categories_projects.ProjectId = $id";
                                
                        $stmt = $conn->query($sql);
                        return $stmt;
                    }             
                    $resultCategories = getProjCategories($conn, $projectId);
    ?>
                    <label><b>Categories of This Project:</b></label>
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



            <?php 
                        function getProjSkills($conn,$id){
                            $sql = "SELECT * FROM skills_projects, skills 
                            WHERE skills.SkillId = skills_projects.SkillId AND skills_projects.ProjectId = $id";
                                    
                            $stmt = $conn->query($sql);
                            return $stmt;
                        }             
                        $resultSkills = getProjSkills($conn, $projectId);
            ?>
                            <label><b>Skills of This Project:</b></label>
            <?php
                            while ($rowSkill=$resultSkills->fetch_assoc()){ 
            ?>
                                <hr>
                                    <p><?php echo $rowSkill['Skill']?></p>
            <?php
                    }// closing loop for skills
            ?>

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


    <button type="submit" name="updateProject">Submit</button>
</form>

<?php
} // closing the while loop
?>

<a href="../projectDetails.php?projectId=<?php echo $projectId; ?>" class='card-link'>Project Details</a> 


<?php
    include "footer.php";
?>
 
  