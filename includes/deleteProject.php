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

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteProject'])) {
    if (isset($_GET['projectId'])){
        $numOfRowsAffected = deleteProject($conn, $projectId);
        echo "Num of Rows Affted: " . $numOfRowsAffected;
    }
} 

$sql="SELECT * FROM projects WHERE ProjectId = $projectId";
$result=$conn->query($sql);
while ($row=$result->fetch_assoc()){
    $name = $row['Name'];
    $description = $row['Description'];

?>
<h3>Delete Project</h3>
<form action="" method="POST">
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

    <button type="submit" name="deleteProject">Delete</button>
</form>

<?php
} // closing the while loop
?>

<a href="../projectDetails.php?projectId=<?php echo $projectId; ?>" class='card-link'>Project Details</a> 


<?php
    include "footer.php";
?>
 
  