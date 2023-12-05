<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="nybruker">
      <form action="nybruker_registrering.php" method="post">
        <h2>Lag en ny bruker</h2>
        <!-- registrere fornavn -->
        <label>Fornavn: </label>
        <input type="text" name="fornavnReg" placeholder="Fornavn"><br/>
        <label>Etternavn: </label>
        <input type="text" name="etternavnReg" placeholder="Etternavn"><br/>
        <!-- registrere brukernavn -->
        <label>brukernavn: </label>
        <input type="text" name="brukernavnReg" placeholder="Brukernavn"><br/>
        <!-- registrere Passord -->
        <label>Passord: </label>
        <input type="password" name="passordReg" placeholder="Passord"><br/>
        <!-- registrere teleonnummer -->
        <label>Telefonnummer: </label>
        <input type="text" name="telefonnummerReg" placeholder="Telefonnummer"><br/>
        <!-- registrere post nummer, skal få inn først -->
        <label>Postnummer: </label>
        <input type="text" name="postnummerReg" placeholder="Postnummer"><br/>
        <label>Adresse: </label>
        <input type="text" name="adresseReg" placeholder="Adresse"><br/>
        <!-- registrere post sted -->
        <select name="post_sted" id="post">
          <option value="Oslo">Oslo</option>
          <option value="Bergen">Bergen</option>
          <option value="Trondheim">Trondheim</option>
        </select><br/>

        <button type="submit" name="registrer">registrer</button><br/>
    
      </form>
    </div> 

</body>
</html>

<!-- php registrering av ny oppskrift -->
<?php
   // session_start();
    //include "db_kobling.php ";



    //isset betyr at den må ha en variabel og deklarert som not NULL
    if (isset($_POST['brukernavnReg']) && isset($_POST['passordReg'])) {
	  //kjekker om dataen er tilregnelig til serveren fra brukernavn og passord
	  function validate($data)
	    {
		    $data = trim($data);
		    $data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
	    }
    }


    //sjekker fra funkjsjonen validate til disse tabellene
    $fornavn = validate($_POST['fornavnReg']);
    $etternavn = validate($_POST['etternavnReg']);
    //generell info og post
    $telefonnummer = validate($_POST['telefonnummerReg']);
    $postNummer = validate($_POST['postnummerReg']);
    $adresse = validate($_POST['adresseReg']);
    //brukernavn og passord for inlogging
    $brukernavn = validate($_POST['brukernavnReg']);
    $passord = validate($_POST['passordReg']);
    $poststed = validate($_POST['post_sted']);

    //kryptere passord med sha256
    //$hashed_password = hash("sha256", $passord);


    if (empty($brukernavn)) {
	    header("Location: index.php?error=Username is required!");
	    exit();
    } else if (empty($passord)) {
	    header("Location: index.php?error=Password is required!");
	    exit();
    }

    //innfører data til databasen fra bruker input
  
    //kjekker om foreign key er
    $sql = "SET FOREIGN_KEY_CHECKS=0";
    $result = mysqli_query($conn, $sql);
 
    //sletter data fra post nummer
    $sql = "DELETE FROM post WHERE post_nummer = $postNummer";
    $result = mysqli_query($conn, $sql);


    //utfører data fra postNummer til databasen
    $sql = "INSERT INTO post (post_nummer, post_sted) VALUES ('$postNummer', '$poststed')";
    $result = mysqli_query($conn, $sql)
        or die('Error querying database.');

    //utfører data fra kunde beskrivelse til databasen	
    $sql = "INSERT INTO barevifterdb.kunde (fornavn, etternavn, telefonnummer, post_nummer, adresse, brukernavn, passord)
      VALUES ('$fornavn', '$etternavn', '$telefonnummer', '$postNummer', '$adresse', '$brukernavn', '$hashed_password')";
    $result = mysqli_query($conn, $sql)
	    or die('Error querying database.');


    $sql = "SELECT * FROM kunde WHERE brukernavn='$brukernavn' AND passord='$hashed_password'";
    $result = mysqli_query($conn, $sql);

    //Sjekke om spørringen gir resultater
    if ($result) {
	    //Gyldig login
	    $row = mysqli_fetch_assoc($result);
	    $_SESSION['idkunde'] = $row['idkunde'];
	    $_SESSION['brukernavn'] = $row['brukernavn'];
	    header("Location: hoved_side.php");
	    exit();
    } else {
	    //Ugyldig login
	    header("index.php");
	    exit();
    }


  ?>