<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todolist</title>
    <link rel="shortcut icon" href="{{asset("storage/svg/list-check-solid-white.svg")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset("css/main.css")}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav>
            <div class="logo"><img src="{{asset("storage/svg/list-check-solid.svg")}}" alt=""><span class="todo">TODO</span><span class="list">LIST</span></div>
            <div class="profile"><a href="{{route("profile.page")}}"><img src="{{asset("storage/svg/user-regular.svg")}}" alt="">{{$user["name"]}}</a>
            </div>
        </nav>
        @if (Session::has("status"))
        <div class="notif">
            <div class="text">
                {{Session::get("status")}}
            </div>
        </div>
        @endif
        @if (Session::has("deleteStatus"))
        <div class="notif">
            <div class="text-delete">
                {{Session::get("deleteStatus")}}, @if (Session::has("deletedTodo"))
                <a href="{{route("todo.undo", ["id" => Session::get("deletedTodo")])}}" class="undo">undo</a>
                @endif
            </div>
        </div>
        @endif
        @if (Session::has("checked"))
        <div class="notif">
            <div class="text-check">
                {{Session::get("checked")}}
            </div>
        </div>
        @endif
        @if (Session::has("undoStatus"))
        <div class="notif">
            <div class="text-undo">
                {{Session::get("undoStatus")}}
            </div>
        </div>
        @endif
        <div class="create">
            <a href="{{route("todo.create.page")}}">
                <button class="add-todo">Add Todo <img src="{{asset("storage/svg/plus-solid.svg")}}" alt=""></button>
            </a>
        </div>
        <div class="table">
            <table border="1" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($todos as $todo)
                    <tr class="{{(Session::has("newTodo") != null) && (Session::get("newTodo")->id == $todo->id) ? "new-todo" : ""}}">
                        <td width="7%" class="center">{{$i++}}</td>
                        <td class="task-description">{{$todo["task"]}}</td>
                        <td width="15%">
                            @if ($todo["status"] == 0)
                                <p class="pending center">{{"Pending"}}</p>
                            @elseif ($todo["status"] == 1)
                                <p class="done center">{{"Done"}}</p>
                            @endif
                        </td>
                        <td class="center" width="15%">{{$todo["created_at"]->format("D, d-M-Y")}}</td>
                        @if ($todo["status"] != 1)
                            <td width="5%" class="center"><a href="{{route("todo.check", ["id" => $todo["id"]])}}"><img title="check" src="{{asset("storage/svg/check-solid.svg")}}" alt=""></a></td>
                        @endif
                        <td width="5%" class="center"><a href="{{route("todo.delete", ["id" => $todo["id"]])}}"><img title="delete" src="{{asset("storage/svg/trash-solid.svg")}}" alt=""></a></td>
                        @if ($todo["status"] == 0)
                        <td width="5%" class="center"><a href="{{route("todo.detail", ["id" => $todo["id"]])}}"><img title="detail" src="{{asset("storage/svg/circle-info-solid.svg")}}" alt=""></a></td>
                        @else
                        <td width="5%" class="center" colspan="2"><a href="{{route("todo.detail", ["id" => $todo["id"]])}}"><img title="detail" src="{{asset("storage/svg/circle-info-solid.svg")}}" alt=""></a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($todos) == 0)
            <div class="todo-blank">
                <div class="content">
                    <img src="{{asset("storage/svg/no_data.svg")}}" alt="">
                 <h3>You don't have todo data yet</h3>
                </div>
             </div>
            @endif
        </div>
    </div>
</body>
</html>
