<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
<!-- action atributet spesifiserer hvor form dataen skal publiseres.   -->
<form action="includes/outputFrokost.php" method="post">
  <label for="frokost">Frokost:</label>
  <!-- <input id="frokost" type="text" name="frokost" placeholder=""> -->
    <select name="frokost" id="frokostValg">
      <option value="oppskrifter">oppskrifter:</option>
      <option value="eggBaconFr">Egg og bacon</option>
      <option value="pannekakerFr">pannekaker</option>
    </select>
    
    <input type="submit" value="Velg" name="submit">
</form>
 
<form action="">
  
</form>

  <script>
    function loggutFrokost() {
      //document.forms.frokostOut.frokost.value = matInn
    }
  </script>
</body>
</html>