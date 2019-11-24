<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{

    public function index(){
    	$data = ['data' => Todo::all()];
    	return response()->json($data);
    }

    public function show(Todo $id){
    	$data = ['data' => $id];
    	return response()->json($data);
    }

    public function add(Request $request){
        $todoData = $request->all();
        Todo::create($todoData);

        $responseData = ['msg' => 'To-do created!'];
        return response()->json($responseData, 201);
    }

    public function delete(Todo $id){
        $id->delete();
        $responseData = ['msg' => 'Todo deleted!', 'data' => $id];
        return response()->json($responseData);
    }

    public function update(Request $request, $id){
        $todoData = $request->all();
        $todo = Todo::find($id);
        $todo->update($todoData);

        $responseData = ['msg' => 'To-do updated!'];
        return response()->json($responseData, 201);
    }

}
