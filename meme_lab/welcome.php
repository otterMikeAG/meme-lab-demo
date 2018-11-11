<?php 
  include 'database.php';
  function displayMemes() {
    $dbConn = getDatabaseConnection(); 
    
    $sql = "SELECT * FROM `all_memes` ORDER BY RAND() LIMIT 1";  
    
    if(isset($_POST['search']) && !empty($_POST['search'])) {
      // query the databse for any records that match this search
      //$sql = "SELECT * from all_memes WHERE line1 LIKE '%{$_POST['search']}%' OR line2 LIKE '%{$_POST['search']}%'";
    }
    
    if(isset($_POST['meme-type']) && !empty($_POST['meme-type'])) {
      $sql .= " AND meme_type = '{$_POST['meme-type']}'"; 
    }
    
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    foreach ($records as $record) {
       $memeURL = $record['meme_url']; 
       echo  '<div class="meme-div" style="background-image:url('. $memeURL .')">'; 
       echo  '<h2 class="line1">' . $record["line1"] . '</h2>'; 
       echo  '<h2 class="line2">' . $record["line2"] . '</h2>'; 
       echo  '</div>'; 
    }
    echo "<style>";
      echo ".meme-div{
        width: 450px;
        height: 450px;
        background-size: cover;
        text-align: center;
        position: relative;
        font-size: 18px;}";
    echo "</style>";
  } 

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
  </head>
  <body>
    <h1>Meme Generator</h1>
    <!--<img height="100px" width="150px" src="https://www.publicdomainpictures.net/pictures/90000/velka/alpaca-chewing.jpg" alt="a-chewing-alpaca">-->
    <?php displayMemes(); ?>
    <h2>Welcome to my Meme Generator!</h2>
    <form method="post" action="meme.php">
        Line 1: <input type="text" name="line1"></input> <br/>
        Line 2: <input type="text" name="line2"></input> <br/>
        Meme Type:
        <select name="meme-type">
          <option value="college-grad">Happy College Grad</option>
          <option value="thinking-ape">Deep Thought Monkey</option>
          <option value="coding">Learning to Code</option>
          <option value="old-class">Old Classroom</option>
        </select>
        <input type="submit"></input>
    </form>
    <a href="./meme.php">View All Memes</a>
  </body>
</html>