<?php

namespace App\Console\Commands;

use App\Models\Todo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class DeleteNotUndoTodos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-not-undo-todos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $oneMinuteAgo = Carbon::now()->subMinute();
        $todos = Todo::onlyTrashed()->where("deleted_at", "<", $oneMinuteAgo)->get();
        foreach($todos as $todo){
            $todo->forceDelete();
        }
    }
}