<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="shortcut icon" href="{{asset("storage/svg/user-regular-white.svg")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset("css/profile.css")}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="back">
            <a href="{{route("main.page")}}"><img src="{{asset("storage/svg/arrow-left-solid.svg")}}" alt=""> Back</a>
        </div>
    </nav>
    <div class="main">
        <div class="container">
            <div class="content">
                <div class="main-content">
                    <div class="logo">
                        <img src="{{asset("storage/svg/user-regular.svg")}}" alt="">
                    </div>
                    <div class="user-info">
                        <div class="name">
                            <div class="name-txt"><b>Name</b></div>
                            <div class="name-value">
                                {{$user["name"]}}
                            </div>
                        </div>
                        <div class="email">
                            <div class="email-txt"><b>Email</b></div>
                            <div class="email-value">
                                {{$user["email"]}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="content-footer">
                <a class="update" href="{{route("update.profile.page")}}">Update</a>
                <a class="logout" href="{{route("user.logout")}}">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
