<!DOCTYPE html>
<html>
    <head>
        <title>January 22 Team Activity Response</title>
    </head>
    <body>
        <?php 
            $name_response = 'Name: ' . $_POST['name'];
            $email_response = $_POST["email"];
            $major_response = "Major: " . $_POST["majors"];
            $cont_response = "Continents Visted: <br>";
            foreach($_POST[] as $value) {
                switch($value) {
                    case "NA":
                        $cont_response .= "North America<br>";
                        break;
                    case "SA":
                        $cont_response .= "South America<br>";
                        break;
                    case "EU":
                        $cont_response .= "Europe<br>";
                        break;
                    case "AS":
                        $cont_response .= "Asia<br>";
                        break;
                    case "AU":
                        $cont_response .= "Australia<br>";
                        break;
                    case "AF":
                        $cont_response .= "Africa<br>";
                        break;
                    case "AN":
                        $cont_response .= "Antartica<br>";
                        break;
                    default:
                        break;
                }
            }
            $comments_response = "comments: " . $_POST["comments"];
            echo "<p>$name_response</p>
            Email: <a href='mailto: ' . $email_response>$email_response</a><br>
            <p>$major_response</p>
            <p>$cont_response</p>
            <p>$comments_response</p>";
        ?>
    </body>
</html>