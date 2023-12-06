<?php
    session_start();
    include "db_kobling.php";



    //isset betyr at den må ha en variabel og deklarert som not NULL
    if (isset($_POST['oppskrNavnReg']) && isset($_POST['instruksjon']) && isset($_POST['beskrivelse'])) {
	       $oppskrift = ($_POST['oppskrNavnReg']);
         $instruksjon = ($_POST['instruksjonReg']);
         $beskrivelse = ($_POST['beskrivelseReg']);
         $moltid = ($_POST['måltiderReg']);

    }


    //sjekker fra funkjsjonen validate til disse tabellene
 

 
    if (empty($oppskrift)) {
	    header("Location: ansatte_forside.php?error=oppskrift is required!");
	    exit();
    }else if (empty($instruksjon)){
      header("Location: ansatte_forside?error=instruksjon is required!");
	    exit();
    }else if (empty($beskrivelse)) {
      header("Location: ansatte_forside?error=beskrivelse is required!");
	    exit();
    }else if (empty($moltid)) {
	    header("Location: ansatte_forside?error=moltid is required!");
	    exit();
    }

    //innfører data til databasen fra bruker input
  
    //kjekker om foreign key har en verdi en 0
    $sql = "SET FOREIGN_KEY_CHECKS=0";
    $result = mysqli_query($conn, $sql);
 
    //utfører data fra kunde beskrivelse til databasen	
    $sql = "INSERT INTO terminchat.oppskrift (instruksjon, oppskr_beskrivelse, moltider)
      VALUES ('$instruksjon', '$beskrivelse', '$moltid')";
    $result = mysqli_query($conn, $sql)
	    or die('Error querying database.');


    $sql = "SELECT * FROM ansatt WHERE brukernavn='$brukernavn' AND passord='$hashed_password'";
    $result = mysqli_query($conn, $sql);

    //Sjekke om spørringen gir resultater
    if ($result) {
	    //Gyldig login
	    $row = mysqli_fetch_assoc($result);
	    $_SESSION['idansatt'] = $row['idansatt'];
	    $_SESSION['brukernavn'] = $row['brukernavn'];

	    header("Location: ansatte_forside.php");
	    exit();
    } else {
	    header("Location: ansatte_forside.php");
	    exit();
    }


  ?>