<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Todo;
use App\Models\User;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

class TestController extends Controller
{
    public function test($userID, $todoID)
    {
//        $users = User::with(['todos' => function ($query) {
//                $query->where('state_id', 3);
//            }])
//            ->whereHas('todos', function ($query) {
//                $query->where('state_id', 3);
//            })->get();

//        $todos = Todo::query()
//            ->where('user_id', $userID)
//            ->whereNull('deleted_at')
//            ->get();
//
//        $todos2 = User::query()->find($userID)->todos()->whereNull('deleted_at')->get();

//        $todos = Todo::query()
//            ->where('state_id', 2)
//            ->whereNull('deleted_at')
//            ->get();
        try {
            $task = Todo::query()->find($todoID)->tasks()->save(new Task(array(
                'title' => 'Nuevo todo',
                'description' => 'Una descripcion bien chida',
                'due_date' => now()->addDay(),
                'user_id' => $userID,
                'state_id' => 1,
            )));

            return response()->json(array('success' => true, 'data' => $task));
        } catch (Throwable $th) {
            return response()->json(array('success' => false, 'error' => array(
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine()
            )));
        }
    }

    private function queryReduce($query)
    {
        return $query->where('state_id', 3);
    }

}
