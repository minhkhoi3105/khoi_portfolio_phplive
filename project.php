<?php
    $pageTitle ="Project";
    include "includes/header.php";
    include "includes/dbConnection.php";
?>

<?php

echo date("Y/m/d") . "<br>";
?>

<div style="color:#AFAF00;min-width:200px;text-align:center;font-size:30px;">
        All Projects
</div>
<?php

try {
    if(isset($_SESSION['username']) ) {
?>
    <nav style="float:right;"> 
         <a href="includes/insertProject.php">Insert Project </a> 
    </nav>   
<?php
    }  else {
        if(isset($_GET['logout'])) {
            if($_GET['logout']) {
                echo "You have been logged out<br>";
            }
        }
    } 
?>
     <form action="" method="POST" enctype="multipart/form-data" style="height: 100px;"> 
                <select name="categoryList" style="width:300px;">
                    <option value="0">--Select Category--</option>
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


                <select name="skillList" style="width:300px;">
                    <option value="0">--Select Skill--</option>
                    <?php 

                        $SkillId = 0;
                        if(isset($_POST['search'])){
                            //Check that blogList is not empty
                            if(!empty($_POST['skillList'])){
                                //set id from blogList Value
                                $CategoryId=$_POST['skillList'];
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
                            echo "<option value='".$rowSkills['SkillId']."'".$selected.">".$rowSkills['Skill']."</option>";
                        }
                    ?>
                </select>
            <div class="col-2">   
                <button type="submit" name="search" style="height:30px;"> Search </button>    
            </div> 
    </form>
<?php
        //projects (Name, Description, Category)
    
    $sql = "Select * from projects";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {

        if($_POST["categoryList"] != 0)
        {
            $categoryId = $_POST["categoryList"];
            $sql = "Select * from projects LEFT JOIN categories_projects
                    ON projects.ProjectId = categories_projects.ProjectId
                    WHERE categories_projects.CategoryId = $categoryId ";
        }

        if($_POST["skillList"] != 0)
        {
            $skillId = $_POST["skillList"];
            $sql = "Select * from projects LEFT JOIN skills_projects
                    ON projects.ProjectId = skills_projects.ProjectId
                    WHERE skills_projects.SkillId = $skillId ";
        }
    }      
    $result = $conn -> query($sql);
    if($result->num_rows > 0){
        //$result = mysqli_query($conn, $sql);
        while($row = $result -> fetch_assoc()) {
                $name = $row['Name'];
                $description = $row['Description'];
                $projectId = $row['ProjectId'];
?>
     
        <div style='display:inline-block; text-align: center;'>
                    <div class='card align-items-center' style='width: 360px; height: 130px;margin:10px;  border-radius: 5%; '>
                        <div class='card-body'>
                            <h5 class='card-title'><?php echo $name?></h5>                    
                            <a href="projectDetails.php?projectId=<?php echo $projectId; ?>" class='card-link'>Details</a> |
                            <?php if(isset($_SESSION['username'])){?>
                                <a href="includes/deleteProject.php?projectId=<?php echo $projectId; ?>">Delete Project</a> | 
                                <a href="includes/updateProject.php?projectId=<?php echo $projectId; ?>">Update Project</a>     
                            <?php } ?>
                        </div>
                    </div>
                </div>

<?php
        } //closing while
        $result -> close();
        $conn -> close();
    } //closing if
} catch (Exception $ex) {
    echo "An error has occured: " . $ex->getMessage();
}
?>


<?php
    include "includes/footer.php";
?>