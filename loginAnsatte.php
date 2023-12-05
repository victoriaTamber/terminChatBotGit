<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login for annsatte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="wrapper">
      <!-- log in for annsatte brukernavn og passord  -->
      <div class="loginInputAnsatte">
        <form action="loginforAnsatte.php" method="post">
          <h2>Login:</h2>
          <label>Brukernavn: </label>
          <input type="text" name="brukernavn" placeholder="Brukernavn"><br/>
          <label>Passord: </label>
          <input type="password" name="passord" placeholder="Passord"><br/>
          <button type="submit" name="login">Login</button><br/>
        </form>
      </div>

    </div>
   
</body>
</html>

