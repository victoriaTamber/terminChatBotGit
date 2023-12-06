<?php
    session_start();
    include "db_kobling.php";



    //isset betyr at den må ha en variabel og deklarert som not NULL
    if (isset($_POST['brukernavnReg']) && isset($_POST['passordReg'])) {
	  //kjekker om dataen er tilregnelig til serveren fra brukernavn og passord
    }


    //sjekker fra funkjsjonen validate til disse tabellene
    $fornavn = ($_POST['fornavnReg']);
    $etternavn = ($_POST['etternavnReg']);
    //generell jobb info om den ansatt
    $jobbTelefonnummer = ($_POST['jobbTelefonnummerReg']);
    $jobbEpost = ($_POST['jobbEpostReg']);
    //brukernavn og passord for inlogging
    $brukernavn = ($_POST['brukernavnReg']);
    $passord = ($_POST['passordReg']);
 

    //kryptere passord med sha256
    $hashed_password = hash("sha256", $passord);


    if (empty($brukernavn)) {
	    header("Location: index.html?error=Username is required!");
	    exit();
    } else if (empty($passord)) {
	    header("Location: index.html?error=Password is required!");
	    exit();
    }

    //innfører data til databasen fra bruker input
  
    //kjekker om foreign key har en verdi en 0
    $sql = "SET FOREIGN_KEY_CHECKS=0";
    $result = mysqli_query($conn, $sql);
 
    //utfører data fra kunde beskrivelse til databasen	
    $sql = "INSERT INTO terminchat.ansatt (fornavn, etternavn, jobb_telefonnummer, jobb_epost, brukernavn, passord)
      VALUES ('$fornavn', '$etternavn', '$jobbTelefonnummer', '$jobbEpost', '$brukernavn', '$hashed_password')";
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
	    //Ugyldig registrering
	    header("ansatte_forside.php");
	    exit();
    }


  ?>