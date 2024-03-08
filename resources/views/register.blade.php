<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="shortcut icon" href="{{asset("storage/svg/user-regular-white.svg")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset("css/register.css")}}">
</head>
<body>
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
    <div class="container">

        <div class="registration form">
          <header>Signup</header>
          <form action="{{route("register.action")}}" method="post">
            @csrf
            @error("name")
                <p class="message">{{$message}}</p>
            @enderror
            <input type="text" placeholder="Enter your name" name="name" value="{{old("name")}}" autocomplete="off">
            @error("email")
                <p class="message">{{$message}}</p>
            @enderror
            <input type="text" placeholder="Enter your email" name="email" value="{{old("email")}}" autocomplete="off">
            @error("one_password")
                <p class="message">{{$message}}</p>
            @enderror
            <input type="password" placeholder="Create a password" name="one_password">
            @error("repeat_password")
                <p class="message">{{$message}}</p>
            @enderror
            <input type="password" placeholder="Repeat password" name="repeat_password">
            <input type="submit" class="button" value="Signup">
          </form>
          <div class="signup">
            <span class="signup">Already have an account?
             <a href="{{route("login.page")}}">Login</a>
            </span>
          </div>
        </div>
      </div>
  </body>

</body>
</html>
