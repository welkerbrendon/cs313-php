<!DOCTYPE html>
<html>
    <head>
        <title>Editing day</title>
        <link rel="stylesheet" href="/home/navbar.css">
    </head>
    <body>
        <?php include '../../home/nav.php';?>
        <div class="not_nav" method="GET">
            <form action="edit_day.php">
                Day to edit: <input type="date" name="day">
                <br><input type="submit">
            </form>
        </div>
    </body>
</html>