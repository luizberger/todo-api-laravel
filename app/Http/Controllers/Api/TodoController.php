<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Todo;
use App\API\ApiError;

class TodoController extends Controller
{

    public function index(){
    	$data = ['data' => Todo::all()];
    	return response()->json($data);
    }

    public function show($id){
        $todo = Todo::find($id);

        if (!$todo) return response()->json(ApiError::errorMessage('To-do not found', 1), 404);

    	$data = ['data' => $todo];
    	return response()->json($data);
    }

    public function add(Request $request){

        try {
            $todoData = $request->all();
            Todo::create($todoData);

            $responseData = ['msg' => 'To-do created!'];
            return response()->json($responseData, 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1), 500);
            }

            return response()->json(ApiError::errorMessage('Error inserting to-do', 1), 500);
        }

    }

    public function delete(Todo $id){
        try {
            $id->delete();
            $responseData = ['msg' => 'Todo deleted!', 'data' => $id];
            return response()->json($responseData);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1), 500);
            }

            return response()->json(ApiError::errorMessage('Error deleting to-do', 1), 500);
        }

    }

    public function update(Request $request, $id){
        try {
            $todoData = $request->all();
            $todo = Todo::find($id);
            $todo->update($todoData);

            $responseData = ['msg' => 'To-do updated!'];
            return response()->json($responseData, 201);
        } catch (\Exception $e) {
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1), 500);
            }

            return response()->json(ApiError::errorMessage('Error updating to-do', 1), 500);
        }
    }

}
