<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>oppskrift registrering</title>
</head>
<body>
<div class="oppskriftRegistrering">
      <form action="regNyOppskrift.php" method="post">
        <h2>Lag en ny oppskrift</h2>
        <!-- oppskrift registrering  -->
        <label>oppskrift navn</label>
        <input type="text" name="oppskrNavnReg" placeholder="Oppskrift navn"><br/>
        <label>instruksjon: </label>
        <input type="text" name="instruksjonReg" placeholder="Instruksjon"><br/>
        <label>oppskrift beskrivelse: </label>
        <input type="text" name="beskrivelseReg" placeholder="beskrivelse"><br/>
        <label>måltider: </label>
        <input type="text" name="måltiderReg" placeholder="måltid"><br/>

        <label>ingrediens registrering: </label>
        <input type="checkbox" name="ingrediensEgg" placeholder="Egg"><br/>
        
         <select name="maal" id="ingrdiensMaal">
         <label for="egg"> <option value="dlMaal">dl</option></label>
          <option value="teskjeMaal">teskje</option>
          <option value="spiseskjeMaal">Spiseskje</option>
        </select>        
        <button type="submit" name="registrer">registrer</button><br/>
    
      </form>
    </div> 

</body>
</html>
