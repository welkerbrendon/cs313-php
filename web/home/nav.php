<?php
echo "
<a class='logo' href='../home/homepage.php'><img class='navbar' src=../pictures/BMW-Emblem.jpg></a>
<div class='navbar'>
  <div class='dropdown' id='first-dropdwn'>
    <button class='dropbtn'>Assignments 
      <i class='fa fa-caret-down'></i>
    </button>
    <div class='dropdown-content' id='first-content'>
      <a href='../assignments/assignment1.php'>Assignment1</a>
      <a href='../assignments/team-teach01.php'>TeamActivity1</a>
    </div>
  </div> 
  <div class='dropdown' id='second-dropdwn'>
    <button class='dropbtn'>About Me 
      <i class='fa fa-caret-down'></i>
    </button>
    <div class='dropdown-content' id='second-content'>
      <a href='../aboutme/testimony.php'>Testimony</a>
      <a href='../aboutme/wife.php'>Wife</a>
      <a href='../aboutme/hobbies.php'>Hobbies</a>
    </div>
  </div> 
  <a href='../home/homepage.php'>Home</a>
</div>";
?>