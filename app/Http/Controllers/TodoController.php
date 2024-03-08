<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Models\Todo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function main(){
        if($this->authorize("viewAny", Todo::class)){
            $user = Auth::user();
            $todos = $user->todos;

            // $userNow = User::find($user->id);
            // $deletedTodos = $userNow->todos()->where("deleted_at", "!=", null);
            // $deletedTodos->forceDelete();
            return view("main", ["todos" => $todos, "user" => $user]);
        }
    }

    public function createPage(){
       if($this->authorize("viewAny", Todo::class)){
            return view("create_todo");
       }
    }

    public function create(CreateTodoRequest $request){
        $data = $request->validated();

        if($this->authorize("create", Todo::class)){
            $user = Auth::user();
            $todo = Todo::create([
                "task" => $data["task"],
                "description" => $data["description"],
                "user_id" => $user->id,
            ]);

            return redirect(route("main.page"))->with([
                "status" => "Created successfully",
                "newTodo" => $todo
            ]);
        }
    }

    public function detail($id){
        $todo = Todo::find($id);
        if($this->authorize("view", $todo)){
            return view("detail", ["todo" => $todo]);
        }
        return abort(404);
    }

    public function check($id){
        $todo = Todo::find($id);
        if($this->authorize("update", $todo)){
            $todo->update([
                "status" => "1"
            ]);
        }

        return redirect("/main")->with("checked", "Great, you work on it!");
    }

    public function delete($id){
        $todo = Todo::find($id);
        if($this->authorize("delete", $todo)){
            $todo->delete();
            return redirect("/main")->with([
                "deleteStatus" => "Delete successfully",
                "deletedTodo" => $todo->id
            ]);
        }

        return abort(404);
    }

    public function undo($id){
        $undoTodo = Todo::withTrashed()->find($id);
        $undoTodo->restore();

        // $user = Auth::user();
        // $userNow = User::find($user->id);
        // $userNowTodos = $userNow->todos()->where("deleted_at", "!=", null);
        // $userNowTodos->forceDelete();


        return redirect()->route("main.page")->with("undoStatus", "Successfull undo");
    }
}