<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    <link rel="shortcut icon" href="{{asset("storage/svg/list-check-solid-white.svg")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset("css/detail.css")}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav>
            <div class="back"><a href="{{route("main.page")}}"><img src="{{asset("storage/svg/arrow-left-solid.svg")}}" alt="">Back</a></div>
        </nav>
        <div class="detail-container">

            <div class="main">
                @csrf
                <div class="task-box">
                    <label for="task">Task</label>
                    <div class="task-value">{{$todo["task"]}}</div>
                    {{-- <input type="text" name="task" @disabled(true) value="{{$todo["task"]}}"> --}}
                </div>
                <div class="status">
                    <h4>Status :
                        @if ($todo["status"] == 0)
                            <span class="pending">Pending</span>
                            @else
                            <span class="done">Done</span>
                        @endif
                    </h4>
                    @if ($todo["status"] == 1)
                    <h4>Done at :
                            <span class="done_at">{{$todo["updated_at"]->format("Y-m-d")}}</span>
                        </h4>
                    @endif
                </div>
                <div class="description-box">
                    <label for="description">Description</label>
                    <div class="description">{{$todo["description"]}}</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
