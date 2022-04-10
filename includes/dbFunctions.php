<?php 
    include "dbConnection.php"; 
    


    function allProjs($conn, $categoryId, $tagId){

        //projects (Name, Description, Category)
        $sql = "SELECT 
                    projects.ProjectId, projects.Name, projects.Description, projects.Category,
                    categories_to_project.category_id, categories.category,
                    tags_to_project.tag_id, tags.tag
                FROM categories,tags,projects
                    LEFT OUTER JOIN categories_to_project ON categories_to_project.project_id = projects.id
                    LEFT OUTER JOIN tags_to_project ON tags_to_project.project_id = projects.id
                WHERE
                    categories_to_project.category_id = categories.id AND
                    tags_to_project.tag_id = tags.id AND
                    categories_to_project.category_id = IF($categoryId = '', category_id, $categoryId) AND
                    tags_to_project.tag_id=IF($tagId = '', tag_id, $tagId)";
                    
        $stmt = $conn->query($sql);
        return $stmt;
    }

    function updateBlogPost($conn,$title,$content,$blogId, $categoryListIds, $imageId) {
        $sql="UPDATE blogs SET Title=?, Content=?, ImageId = ? WHERE BlogId=?";
        // $sql="UPDATE blogs
        //         INNER JOIN categories_blogs ON categories_blogs.BlogId = blogs.BlogId
        //     SET blogs.Title=?, blogs.Content=?, categories_blogs.CategoryId=?
        //     WHERE blogs.BlogId=?";
        $stmt=$conn->prepare($sql) or die("Errors in query");
    
        $stmt->bind_param('ssii',$title,$content, $imageId, $blogId);
        $stmt->execute();


        //add to bridge table
        if ($categoryListIds != null){
          //  if(count($categoryListIds) > 1) {
                //Delete the recors first
                $sql =  "DELETE FROM categories_blogs WHERE BlogId = ? ";
                $stmt=$conn->prepare($sql) or die("Errors in query");
                //bind params 
                $stmt-> bind_param('i', $blogId);
                $stmt -> execute();

                foreach($categoryListIds as $categoryId){
        
                    //re add
                    $sql = "INSERT INTO categories_blogs (CategoryId, BlogId) VALUES (?, ?)";
                    $stmt=$conn->prepare($sql) or die("Errors in query");
                    $stmt->bind_param('ii',$categoryId, $blogId);
                    $stmt->execute();
                }
        }
        return $stmt->affected_rows;
        $stmt->close();
    }

    function insertBlogPost($conn , $title, $content, $userId, $imageId, $categoryListIds) {
        $sql =  "INSERT INTO blogs (Title, Content, UserId, ImageId ) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql) or die("Errors in query");
         //bind params 
        $stmt->bind_param('ssii', $title, $content,$userId, $imageId);
        $stmt -> execute();
        $blogId = $conn->insert_id;

        
        //add to bridge table
        if ($categoryListIds != null){
            foreach($categoryListIds as $categoryId){
                $sql = "INSERT INTO categories_blogs (CategoryId, BlogId) VALUES (?, ?)";
                $stmt=$conn->prepare($sql) or die("Errors in query");
                $stmt->bind_param('ii',$categoryId, $blogId);
                $stmt->execute();
            }
        }

        return $blogId;
        $stmt ->close();
    }
    
    function deleteBlogPost($conn , $blogId) {

        $sql =  "DELETE FROM categories_blogs WHERE BlogId = ? ";
        $stmt=$conn->prepare($sql) or die("Errors in query");
        //bind params 
        $stmt-> bind_param('i', $blogId);
        $stmt -> execute();


        $sql =  "DELETE FROM blogs WHERE BlogId = ? ";
        $stmt=$conn->prepare($sql) or die("Errors in query");
        //bind params 
        $stmt-> bind_param('i', $blogId);
        $stmt -> execute();
        return $stmt->affected_rows;
        $stmt -> close();
    }

    function insertProject($conn, $name, $description, $imagesId, $categoriesIds, $skillsIds ) {
        $sql = "INSERT INTO projects (Name, Description) VALUES (?,?)";
        $stmt=$conn->prepare($sql) or die("Errors in query");
        $stmt->bind_param('ss',$name,$description);
        $stmt->execute();

        $projectId = $conn->insert_id;

        if ($categoriesIds != null){
            foreach($categoriesIds as $categoryId){
                $sql = "INSERT INTO categories_projects (CategoryId, ProjectId) VALUES (?, ?)";
                $stmt=$conn->prepare($sql) or die("Errors in query");
                $stmt->bind_param('ii',$categoryId, $projectId);
                $stmt->execute();
            }
        }

        if ($skillsIds != null){
            foreach($skillsIds as $skillId){
                $sql = "INSERT INTO skills_projects (SkillId, ProjectId) VALUES (?, ?)";
                $stmt=$conn->prepare($sql) or die("Errors in query");
                $stmt->bind_param('ii',$skillId, $projectId);
                $stmt->execute();
            }
        }

        //add to bridge table
        if ($imagesId != null){
            foreach($imagesId as $imageId){
                $sql = "INSERT INTO images_projects (ImageId, ProjectId) VALUES (?, ?)";
                $stmt=$conn->prepare($sql) or die("Errors in query");
                $stmt->bind_param('ii',$imageId, $projectId);
                $stmt->execute();
            }
        }
        return $projectId;
        $stmt->close();
    }


    
    function updateProject($conn,$name,$description,$projectId, $categoryListIds, $skillListIds) {
        $sql="UPDATE projects SET Name=?, Description=? WHERE ProjectId=?";
        $stmt=$conn->prepare($sql) or die("Errors in query");    
        $stmt->bind_param('ssi',$name,$description, $projectId);
        $stmt->execute();


        //add to bridge table
        if ($categoryListIds != null){
          //  if(count($categoryListIds) > 1) {
                //Delete the recors first
                $sql =  "DELETE FROM categories_projects WHERE ProjectId = ? ";
                $stmt=$conn->prepare($sql) or die("Errors in query");
                //bind params 
                $stmt-> bind_param('i', $projectId);
                $stmt -> execute();

                foreach($categoryListIds as $categoryId){
        
                    //re add
                    $sql = "INSERT INTO categories_projects (CategoryId, ProjectId) VALUES (?, ?)";
                    $stmt=$conn->prepare($sql) or die("Errors in query");
                    $stmt->bind_param('ii',$categoryId, $projectId);
                    $stmt->execute();
                }
        }



        //add to bridge table
        if ($skillListIds != null){
            //  if(count($categoryListIds) > 1) {
                  //Delete the recors first
                  $sql =  "DELETE FROM skills_projects WHERE ProjectId = ? ";
                  $stmt=$conn->prepare($sql) or die("Errors in query");
                  //bind params 
                  $stmt-> bind_param('i', $projectId);
                  $stmt -> execute();
  
                  foreach($skillListIds as $skillId){
          
                      //re add
                      $sql = "INSERT INTO skills_projects (SkillId, ProjectId) VALUES (?, ?)";
                      $stmt=$conn->prepare($sql) or die("Errors in query");
                      $stmt->bind_param('ii',$skillId, $projectId);
                      $stmt->execute();
                  }
          }
        return $stmt->affected_rows;
        $stmt->close();
    }



    
    function deleteProject($conn , $projectId) {


        $sql =  "DELETE FROM images_projects WHERE ProjectId = ? ";
        $stmt=$conn->prepare($sql) or die("Errors in query");
        //bind params 
        $stmt-> bind_param('i', $projectId);
        $stmt -> execute();

        $sql =  "DELETE FROM categories_projects WHERE ProjectId = ? ";
        $stmt=$conn->prepare($sql) or die("Errors in query");
        //bind params 
        $stmt-> bind_param('i', $projectId);
        $stmt -> execute();

        $sql =  "DELETE FROM skills_projects WHERE ProjectId = ? ";
        $stmt=$conn->prepare($sql) or die("Errors in query");
        //bind params 
        $stmt-> bind_param('i', $projectId);
        $stmt -> execute();


        $sql =  "DELETE FROM projects WHERE ProjectId = ? ";
        $stmt=$conn->prepare($sql) or die("Errors in query");
        //bind params 
        $stmt-> bind_param('i', $projectId);
        $stmt -> execute();
        return $stmt->affected_rows;
        $stmt -> close();
    }

    function loginValidation($conn,$username,$password){
        $sql="SELECT Username, Password FROM users WHERE Username=? AND Password=?";
        $stmt=$conn->prepare($sql) or die("Errors in query");
        $stmt->bind_param('ss',$username,$password);
        $stmt->execute();

        /* fetch values */
        $username = $stmt->fetch();
    
        // Check if the value is valid or not then return boolean for this function
        if ($username) {
            return true;
        } else {
            return false;
        } 
    }
?>