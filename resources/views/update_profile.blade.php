<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Profile</title>
    <link rel="shortcut icon" href="{{asset("storage/svg/user-regular-white.svg")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset("css/update-profile.css")}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="back">
            <a href="{{route("profile.page")}}"><img src="{{asset("storage/svg/arrow-left-solid.svg")}}" alt=""> Back</a>
        </div>
    </nav>
    <div class="main">

        @if(Session::has("message"))
            <div class="notif">
                <div class="notif-txt">
                    {{Session::get("message")}}
                </div>
            </div>
        @endif
        <div class="container">
            <div class="content">
                <form action="{{route("update.profile.action")}}" method="post">
                    @csrf
                        <div class="form">
                            <div class="name input">
                                <label for="name">Name</label>
                                @error('name')
                                    <p class="message">{{$message}}</p>
                                @enderror
                                <input type="text" name="name" value="{{$user["name"]}}" autocomplete="off">
                            </div>
                            <div class="email input">
                                <label for="name">Email</label>
                                @error('email')
                                    <p class="message">{{$message}}</p>
                                @enderror
                                <input type="email" name="email" value="{{$user["email"]}}" autocomplete="off">
                            </div>
                            <div class="old_password input">
                                <label for="password">Old Password</label>
                                @error('old_password')
                                    <p class="message">{{$message}}</p>
                                @enderror
                                <input type="password" name="old_password">
                            </div>
                            <div class="password input">
                                <label for="password">New Password</label>
                                @error('new_password')
                                    <p class="message">{{$message}}</p>
                                @enderror
                                <input type="password" name="new_password">
                            </div>
                            <div class="update-button">
                                <input id="submit-button" type="submit" value="Save Changes">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
