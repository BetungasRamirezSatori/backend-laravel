<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Todo;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(User $user){
        return $user;
    }

    public function create(User $user){
        return $user;
    }

    public function update(Request $request,User $user){
        //dd($request);
        DB::beginTransaction();
        try {
            $user->name = $request->get('name');
            $user->saveOrFail();
            DB::commit();
            return response()->json([
                'success' => true,
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
            ]);
        }
        
    }

    public function update2(Request $request,User $user,$todoId){
        //dd($request);
        DB::beginTransaction();
        try {
            $user->name = $request->get('name');
            $user->saveOrFail();
            DB::commit();
            return response()->json([
                'success' => true,
                'user' => $user,
                'todoId' => $todoId
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
            ]);
        }
        
    }

    public function getUserTodo(User $user, Todo $todo){
        return response()->json([
            'success' => true,
            'user' => $user,
            'todo' => $todo
        ]);
    }

    public function getUserTodo2(User $user, Todo $todos){
        return response()->json([
            'success' => true,
            'user' => $user,
            'todo' => $todos
        ]);
    }
}
