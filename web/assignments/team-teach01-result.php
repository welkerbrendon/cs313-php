<!DOCTYPE html>
<html>
    <head>
        <title>January 22 Team Activity Response</title>
    </head>
    <body>
        <?php 
            $name_response = 'Name: ' . $_POST['name'];
            $email_response = "Email: " . $_POST["email"];
            $major_response = "Major: " . $_POST["majors"];
            $comments_response = "comments: " . $_POST["comments"];
            echo "<p>$name_response</p>
            <a href='mailto: ' . $email_response>$email_response</a><br>
            <p>$major_response</p>
            <p>$comments_response</p>";
        ?>
    </body>
</html>