<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="action_page.php">
        <div class="container">
          <h1>Sign In</h1>
          <p>Please fill in this form to sign in.</p>
          <hr>
      
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>

          {{-- <label for="fullname"><b>Full Name</b></label>
          <input type="text" placeholder="Enter Full Name" name="fullname" id="fullname" required> --}}
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
      
          {{-- <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
          <hr> --}}
      
          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
          <button type="submit" class="signinbtn">Sign In</button>
        </div>
      
        <div class="container register">
          <p>Don't have an account yet? <a href="/">Register</a>.</p>
        </div>
      </form>
</body>
</html>