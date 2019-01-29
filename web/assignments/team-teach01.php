<!DOCTYPE html>
<html>
    <head>
        <title>January 22 Team Activity</title>
    </head>
    <body>
        <?php $radio_majors = array("CS", "WDD", "CIT", "CE")?>
        <form action="./team-teach01-result.php" method="post">
            Name: <input type="text" name="name"><br>
            Email: <input type="text" name="email"><br>
            Major: <?php foreach($radio_majors as $value){
                echo "<input type='radio' name='majors' value=$value>$value ";
            }?>
            <br>
            Continents Visted: <br>
            <input type="checkbox" name="NA" value="NA">North  America<br>
            <input type="checkbox" name="SA" value="SA">South America<br>
            <input type="checkbox" name="EU" value="EU">Europe<br>
            <input type="checkbox" name="AS" value="AS">Asia<br>
            <input type="checkbox" name="AU" value="AU">Australia<br>
            <input type="checkbox" name="AF" value="AF">Africa<br>
            <input type="checkbox" name="AN" value="AN">Antartica<br>
            Comments: <textarea name="comments"></textarea><br>
            <input type="submit">
        </form>
    </body>
</html>