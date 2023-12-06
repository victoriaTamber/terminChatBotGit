<?php
  session_start();
  include "db_kobling.php";  
  //isset betyr at den må ha en variabel og deklarert som not NULL
  if(isset($_POST['brukernavn']) && isset($_POST['passord'])) {
    //kjekker om dataen er tilregnelig til serveren fra brukernavn og passord
}


$brukernavn = ($_POST['brukernavn']);
$passord = ($_POST['passord']);

$hashed_password = hash("sha256", $passord);


if(empty($brukernavn)) {
    header ("Location: index.html?error=Username is required!");
    exit();
}
else if(empty($passord)) {
    header ("Location: index.html?error=Password is required!");
    exit();
}

  $sql = "SELECT * FROM ansatt WHERE brukernavn='$brukernavn' AND passord='$hashed_password'"; 

  $result = mysqli_query($conn, $sql);


  if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['brukernavn'] === $brukernavn && $row['passord'] === $hashed_password) {
        echo 'brukernavn';
        echo "Innlogget";
        $_SESSION['idansatt'] = $row['idansatt'];
        $_SESSION['brukernavn'] = $row['brukernavn'];
        
        header("Location: ansatte_forside.php");
        exit();
    }else{
        header("Location: index.html?error=Ugyldig brukernavn eller passord!");
        exit();
    }
}else {
    header("Location: index.html");
    exit();
}
?>