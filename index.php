


<?php
    $pageTitle ="About Me";
    include "includes/header.php";
?>
         <?php
                    if(isset($_POST['view'])) {
                        header('Location:read.php');
                    }
                ?>
        <div id="picOfMe">
            <img src="includes/img/KhoiPicture.jpg" style=" border-radius: 50%; width: 600px;height: 600px;display: block;margin-left: auto; margin-right: auto;"/>
            <h1 style="text-align:center; margin-top: 10px;">My name is Khoi Nguyen</h1>
        </div>
        
  
        <!-- <h1>Skill</h1>
        <p>
            Skill sets is here...
        </p>

        <h1>Work Experience</h1>
        <p>
            Work Experience is here...
        </p>


        <h1>Reference</h1>
        <p>
            Reference is here
        </p> -->
        <?php
            echo date("Y/m/d") . "<br>";
            ?>
        <section class="section-features js--section-features" id="features" style="border-style: dashed; padding: 3%;" >
      
            <h1>Introduction</h1>
            <p>
                    Need a passionate Web Developer? I would love to help 😀. I really love back-end! :D
                    |
                    Hello, my name is Khoi, I am a 2nd-year student at NBCC of Web and Mobile Application Development program. I'm also an international student from Vietnam who is currently staying in Canada to explore new experiences in a country I have never been to before. With the strong set skills of HTML5, CSS3, JavaScript, Java, C#, ASP.NET MVC, Node.js, Angular, SQL, and related web development skills, I am confident to build business applications with those skills and also using Agile Methodologies to control the workflow of the team well. 

                    On the other hand, I had a chance to volunteer at Rodgers Rental Inc as a maintenance worker for apartment buildings. With this volunteer experience, I improved myself in the aspect of communication skills and customer service, so I am not shy at all to help people out whenever challenges come to me. More than that, I have been studying at NBCC for 2 years and most of the time I have been dealing with virtual works due to Covid-19. Therefore, I am in good control of working with teams virtually or physically. In general, I am looking forward to working in a Web Developer position, and my passion of being a Web Developer never stops burning, I will be glad to work with any teams to build amazing applications. Cheers!
            </p>
        

            <div class="row">
                <h1>Main Skills</h1>
            </div>
            
            <div class="row js--wp-1">
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-infinite-outline icon-big"></i>
                    <h3>C#</h3>
                    <p>
                        C# is a general-purpose, 
                        multi-paradigm programming language, made by Microsoft.  
                        Can be used for: mobile apps, desktop apps, cloud-based services, websites, etc.

                    </p>
                </div>
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-infinite-outline icon-big"></i>
                    <h3>HTML5</h3>
                    <p>
                         HTML5 is a markup language used for structuring and presenting content on the World Wide Web. It is the fifth and final major HTML version that is a World Wide Web Consortium recommendation
                     </p>
                </div>
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-infinite-outline icon-big"></i>
                    <h3>CSS3</h3>
                    <p>
                         CSS3 is the latest version of the CSS specification. CSS3 adds several new styling features and improvements to enhance the web presentation capabilities.
                     </p>
                </div>
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-stopwatch-outline icon-big"></i>
                    <h3>PHP</h3>
                    <p>
                         PHP is a server scripting language, and a powerful tool for making 
                         dynamic and interactive Web pages. PHP is a widely-used, free, and 
                         efficien                    
                    </p>
                </div>
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-nutrition-outline icon-big"></i>
                    <h3>JavaScript</h3>
                    <p>
                         JavaScript, often abbreviated JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. Over 97% of websites use JavaScript
                    </p>
                </div>
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-cart-outline icon-big"></i>
                    <h3>SQL</h3>
                    <p>
                    SQL is a domain-specific language used in programming and designed for managing data held in a relational database management system, or for stream processing in a relational data stream management system
                    </p>
                </div>
            </div>  
            
            <div class="row">
              
                <h1>View My Resume Here!</h1>
                <form action="" method="post">
                    <button name="view">View Resume</button>
                </form>
            </div>
        </section>

<?php
    include "includes/footer.php";
?>