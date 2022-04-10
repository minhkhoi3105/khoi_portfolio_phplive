<?php
    $pageTitle ="Project Details";
    include "includes/header.php";
    include "includes/dbConnection.php";
?>

<?php

echo date("Y/m/d") . "<br>";

if (isset($_GET['projectId'])){
    $projectId=$_GET['projectId'];
}
// $sql="SELECT projects.Name, projects.Description, projects.Category, images.Image, images.Text 
//             FROM projects LEFT OUTER JOIN images_projects ON projects.ProjectId = images_projects.ProjectId
//             LEFT OUTER  JOIN images ON images.ImageId = images_projects.ImageId
//              WHERE projects.ProjectId = $projectId";
$sql = "SELECT * FROM projects WHERE ProjectId = $projectId";
$result=$conn->query($sql);
?>
<h3>Project Details</h3>


<?php 

while ($row=$result->fetch_assoc()){
    $name = $row['Name'];
    $description = $row['Description'];

?>
                    <h1><?php echo $name; ?></h1>
                    <?php 
                            function getProjImages($conn,$id){
                                $sql = "SELECT * FROM images_projects, images 
                                WHERE images.ImageId = images_projects.ImageId AND ProjectId = $id";
                                        
                                $stmt = $conn->query($sql);
                                return $stmt;
                            }             
                            $resultImage = getProjImages($conn, $projectId);
                            while ($rowImage=$resultImage->fetch_assoc()){ 
                    ?>
                    <hr>
                        <img src="includes/img/<?php echo $rowImage['Image']?>" height="400px"  width='200px' alt="<?php echo $rowImage['Text']?>" class="center" >
                
 
   
<?php
    }// closing loop for image
?>
    <div style="margin-top: 5%;">
        <p>
        <?php echo $description?>
        </p><br>
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

<br>
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
<?php
} // closing big while loop of the project
?>
    
    <a href="project.php" class='card-link'>All Projects</a> |
    <?php if(isset($_SESSION['username'])){?>
        <a href="includes/deleteProject.php?projectId=<?php echo $projectId; ?>">Delete Project</a> | 
        <a href="includes/updateProject.php?projectId=<?php echo $projectId; ?>">Update Project</a>     
    <?php } ?>




<?php
    include "includes/footer.php";
?>