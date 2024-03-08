<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="shortcut icon" href="{{asset("storage/svg/user-regular-white.svg")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset("css/login.css")}}">
</head>
<body>
    <div class="notif">
        @if (Session::has("status"))
            <div class="register-success">
                {{Session::get("status")}}
            </div>
        @endif

        @if (Session::has("error"))
            <div class="login-failed">
                {{Session::get("error")}}
            </div>
        @endif
    </div>
    <div class="container">
        <div class="login form">
          <header>Login</header>
          <form action="{{route("login.action")}}" method="post">

            @csrf
            @error('email')
                {{$message}}
            @enderror
            <input type="text" placeholder="Enter your email" name="email" autocomplete="off">
            @error('password')
                {{$message}}
            @enderror
            <input type="password" placeholder="Enter your password" name="password">
            <input type="submit" class="button" value="Login">
          </form>
          <div class="signup">
            <span class="signup">Don't have an account?
                <a href="{{route("register.page")}}">Register</a>
            </span>
          </div>
        </div>
      </div>
  </body>

</body>
</html>
