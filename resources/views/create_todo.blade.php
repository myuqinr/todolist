<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Todo</title>
    <link rel="shortcut icon" href="{{asset("storage/svg/list-check-solid-white.svg")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset("css/create-todo.css")}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav>
            <div class="back"><a href="{{route("main.page")}}"><img src="{{asset("storage/svg/arrow-left-solid.svg")}}" alt="">Back</a></div>
        </nav>
        <div class="form-container">
            <form action="{{route("create.todo")}}" method="post">
                @csrf
                <div class="task-input">
                    <label for="task">Task</label>
                    @error('task')
                        <p class="error">* {{$message}}</p>
                    @enderror
                    <input type="text" name="task" autocomplete="off" autofocus>
                </div>
                <div class="description-input">
                    <label for="description">Description <span class="optional">&#40optional&#41</span></label>
                    @error('description')
                        <p class="error">* {{$message}}</p>
                    @enderror
                    <textarea name="description" id="description"></textarea>
                </div>
                <div class="submit-button">
                    <input type="submit" value="Add Todo">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
