<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
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
      width: 40%
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

    .login-container input[type="text"],
    .login-container input[type="email"],
    .login-container input[type="password"]{
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: none;
      outline: none;
      font-size: 16px;
    }

    .login-container button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 5px;
      background-color: #1a4d2e;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 8px;
    }

    .login-container button:hover {
      background-color: #153a24;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Hommlie</h1>
    <h3>Register to start your session</h3>
    <form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    <button type="submit">Register<i class='bx  bx-arrow-in-right-square-half'  ></i> </button>
    </form>

    @if(session('success'))
    <p>{{ session('success') }}</p>
    @endif

    @if($errors->any())
    <p>{{ $errors->first() }}</p>
    @endif
  </div>
</body>
</html>