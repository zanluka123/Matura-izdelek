
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="signup" style="display:none;">
      <h1 class="form-title">Ustvarite račun</h1>
      <form method="post" action="register.php">
        <div class="input-group">
          <p>Ime</p>
           <input type="text" name="fName" id="fName" placeholder="First Name" required>
           <label for="fname"></label>
        </div>
        <div class="input-group">
            <p>Priimek</p>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            <label for="lName"></label>
        </div>
        <div class="input-group">
            <p>Email Naslov</p>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <label for="email"></label>
        </div>
        <div class="input-group">
            <p>Geslo</p>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password"></label>
        </div>
       <input type="submit" class="btn" value="Ustvarite račun" name="signUp">
      </form>
     
      <div class="links">
        <p>Že imate račun ?</p>
        <button id="signInButton">Prijavite se</button>
      </div>
    </div>

    <div class="container" id="signIn">
        <h1 class="form-title">Prijava</h1>
        <form method="post" action="register.php">
          <div class="input-group">
              <p>Vnesite Email Naslov</p>
              <input type="email" name="email" id="email" placeholder="Email naslov" required>
              <label for="email"></label>
          </div>
          <div class="input-group">
              <p>Vnesite Geslo</p>
              <input type="password" name="password" id="password" placeholder="Password" required>
              <label for="password"></label>
          </div>
         <input type="submit" class="btn" value="Prijavite se" name="signIn">
        </form>
        
        <div class="links">
          <button id="signUpButton">Ustvarite račun</button>
        </div>
      </div>
      <script src="script.js"></script>
</body>
</html>
