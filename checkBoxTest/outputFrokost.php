<?php
  //lar serveren poste  
  if($_SERVER["REQUEST_METHOD"] == "post"){

    $frokost = htmlspecialchars($_POST["frokost"]);
     
    //koble til databasen
    $dbcon = mysqli_connect('localhost', 'root', 'Admin', 'terminoppgchatbot', 'oppskrifter');


  }

  if($frokost){
  
  }
  
  // if($frokost = $_POST["frokost"]){

  //   $dbc = mysqli_connect('localhost', 'root', 'Admin', 'terminoppgchatbot')
  //   or die('Error connecting to MySQL server.');

  

  // }
?>