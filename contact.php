<?php
    $pageTitle ="Contact";
    include "includes/header.php";
    include "includes/dbConnection.php";
?>

<h1>Contact Me</h1>
    <form action="#" method="POST">
        <label for="to">To</label>
        <input type="text" name="to" value="minhkhoi3105@yahoo.com"> <br> <br>

        <label for="from">From</label>
        <input type="text" name="from"> <br> <br>
        
        <label for="subject">Subject</label>
        <input type="text" name="subject"> <br> <br>

        <label for="message">
            Message 
        </label>
        <textarea name="message" id="" cols="20" rows="10"></textarea><br> <br>

        <button type="submit">Send Email</button>
    </form>

    <?php 
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $to = $_POST['to'];
            $from = $_POST['from'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

                
            $header = array(
                'Mime-version' => '1.0',
                'Content-type' => 'text/html: charset=UTF-8',
                'From' => $from,
                'Cc' => 'Someone else <someoneelse@test.com>',
                'X-Priority' => '1 (Highest)'
            );

            if(mail($to, $subject , $message, $header )) {
                echo "Email Sent";
            } else {
                echo "Mail failed";
            }
        } else {
            echo "Send mail not clicked";

        }
    ?>

<?php
    include "includes/footer.php";
?>