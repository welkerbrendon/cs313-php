<!DOCTYPE html>
<html>
    <head>
        <title>January 22 Team Activity</title>
    </head>
    <body>
        <form action="team-teach01-result.php" method="post">
            Name: <input type="text" name="name"><br>
            Email: <input type="text" name="email"><br>
            Major: <input type="radio" name="majors" value="CS">CS 
            <input type="radio" name="majors" value="WDD">WDD 
            <input type="radio" name="majors" value="CIT">CIT 
            <input type="radio" name="majors" value="CE">CE<br>
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