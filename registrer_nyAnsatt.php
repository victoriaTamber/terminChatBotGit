<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ny annsatt registrering</title>
</head>
<body>
<div class="nybruker">
      <form action="regNyAnsatt.php" method="post">
        <h2>Lag en ny bruker</h2>
        <!-- registrere navn -->
        <label>Fornavn: </label>
        <input type="text" name="fornavnReg" placeholder="Fornavn"><br/>
        <label>Etternavn: </label>
        <input type="text" name="etternavnReg" placeholder="Etternavn"><br/>
        <!-- registrere inloggingen -->
        <label>Brukernavn: </label>
        <input type="text" name="brukernavnReg" placeholder="Brukernavn"><br/>
        <label>Passord: </label>
        <input type="password" name="passordReg" placeholder="Passord"><br/>
        <!-- registrere teleonnummer -->
        <label>Jobb Telefonnummer registrering: </label>
        <input type="text" name="jobbTelefonnummerReg" placeholder="Telefonnummer"><br/>
        <!-- registrere jobb epost adressen -->
        <label>Jobb epost registrering: </label>
        <input type="text" name="jobbEpostReg" placeholder="Jobb epost"><br/>
        
        <button type="submit" name="registrer">registrer</button><br/>
    
      </form>
    </div> 

</body>
</html>
