<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(to right, #9dd459, #3667ac);
    }

    .login-container {
      background-color: #ffffff1a;
      padding: 40px 30px;
      border-radius: 10px;
      box-shadow: 0 8px 20px #00000033;
      text-align: center;
      backdrop-filter: blur(10px);
      min-width: 300px;
    }

    .login-container h1 {
      color: #145b0c;
      margin-bottom: 20px;
    }

    .login-container h3 {
      margin-top: 20px;
      margin-bottom: 10px;
      font-weight: normal;
      text-align: left
    }

    .links{
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }
    
    .links a{
        text-decoration: none;
        color: white;
        padding: 10px 12px;
        background-color: #145b0c;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .links a:hover {
      background-color: #153a24;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Hommlie</h1>
    <h3>Sign Or Register to start your session</h3>
    <div class="links">
        <a href="{{route('login.form')}}">Sign In</a>
        <a href="{{route('register.form')}}">Register</a>
    </div>
  </div>
</body>
</html>